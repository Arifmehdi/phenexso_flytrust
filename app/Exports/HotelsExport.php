<?php

namespace App\Exports;

use App\Models\Hotel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class HotelsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Hotel::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Agoda Hotel ID',
            'Title',
            'Star Rating',
            'Price',
            'Address',
            'City ID',
            'Country',
            'Latitude',
            'Longitude',
            'Review Score',
            'Currency',
            'Last Synced At',
        ];
    }

    /**
    * @var Hotel $hotel
    */
    public function map($hotel): array
    {
        $agodaData = $hotel->agoda_data ?? [];
        
        return [
            $hotel->id,
            $hotel->agoda_hotel_id,
            $hotel->title,
            $hotel->star_rate,
            $hotel->price,
            $hotel->address,
            $agodaData['cityId'] ?? '',
            $agodaData['country'] ?? '',
            $agodaData['latitude'] ?? '',
            $agodaData['longitude'] ?? '',
            $agodaData['reviewScore'] ?? '',
            $agodaData['currency'] ?? '',
            $hotel->agoda_last_synced_at,
        ];
    }
}
