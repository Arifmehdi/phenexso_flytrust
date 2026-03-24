<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

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
    }

    public function searchByCity($cityId)
    {
        $body = [
            "criteria" => [
                "additional" => [
                    "currency" => "USD",
                    "language" => "en-us",
                    "maxResult" => 10,
                    "occupancy" => [
                        "numberOfAdult" => 2,
                        "numberOfChildren" => 0
                    ]
                ],
                "checkInDate" => now()->addDays(1)->format('Y-m-d'),
                "checkOutDate" => now()->addDays(2)->format('Y-m-d'),
                "cityId" => $cityId
            ]
        ];

        $response = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Accept-Encoding' => 'gzip,deflate',
            'Content-Type' => 'application/json'
        ])->post($this->endpoint, $body);

        return $response->json();
    }
}