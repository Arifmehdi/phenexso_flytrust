<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AgodaService
{
    protected $endpoint;
    protected $authorization;

    public function __construct()
    {
        $this->endpoint = config('services.agoda.endpoint');
        $siteId = config('services.agoda.site_id');
        $apiKey = config('services.agoda.api_key');
        $this->authorization = $siteId . ':' . $apiKey;
        
        Log::info('Agoda Service Initialized with Site ID: ' . $siteId);
    }

    public function getCityIdByName($name)
    {
        $cityIdMap = config('cities.agoda_city_ids', []);
        
        // Convert map keys to lowercase for case-insensitive lookup
        $lowerMap = [];
        foreach ($cityIdMap as $cityName => $id) {
            $lowerMap[strtolower($cityName)] = $id;
        }

        $name = strtolower(trim($name));
        return $lowerMap[$name] ?? null;
    }

    public function searchByCity(
        $cityId, 
        $checkInDate = null, 
        $checkOutDate = null, 
        $adults = 2, 
        $children = 0,
        $rooms = 1,
        $currency = 'USD',
        $language = 'en-us',
        $maxResult = 20,
        $childrenAges = []
    ) {
        // Set default dates if not provided
        if (!$checkInDate) {
            $checkInDate = now()->addDays(1)->format('Y-m-d');
        }
        if (!$checkOutDate) {
            $checkOutDate = now()->addDays(2)->format('Y-m-d');
        }

        // Build occupancy
        $occupancy = [
            'numberOfAdult' => (int)$adults,
            'numberOfChildren' => (int)$children
        ];

        // Add children ages if children > 0 and ages provided
        if ($children > 0 && !empty($childrenAges)) {
            $occupancy['childrenAges'] = $childrenAges;
        }

        $body = [
            "criteria" => [
                "additional" => [
                    "currency" => $currency,
                    "language" => $language,
                    "maxResult" => (int)$maxResult,
                    "discountOnly" => false,
                    "minimumReviewScore" => 0,
                    "minimumStarRating" => 0,
                    "occupancy" => $occupancy,
                    "sortBy" => "PriceAsc",
                    "dailyRate" => [
                        "maximum" => 10000,
                        "minimum" => 1
                    ]
                ],
                "checkInDate" => $checkInDate,
                "checkOutDate" => $checkOutDate,
                "cityId" => (int)$cityId
            ]
        ];

        // Log request for debugging
        Log::info('Agoda API Request:', $body);

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->authorization,
                'Accept-Encoding' => 'gzip, deflate',
                'Content-Type' => 'application/json'
            ])->post($this->endpoint, $body);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Agoda API Response Success', ['count' => count($data['results'] ?? [])]);
                return $data;
            } else {
                Log::error('Agoda API Error:', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                
                return [
                    'error' => [
                        'id' => $response->status(),
                        'message' => 'API request failed with status: ' . $response->status()
                    ]
                ];
            }
        } catch (\Exception $e) {
            Log::error('Agoda API Exception: ' . $e->getMessage());
            
            return [
                'error' => [
                    'id' => 500,
                    'message' => 'Connection error: ' . $e->getMessage()
                ]
            ];
        }
    }
}