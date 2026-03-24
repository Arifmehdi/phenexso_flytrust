<?php

namespace App\Http\Controllers;

use App\Services\AgodaService;

class AgodaController extends Controller
{
    protected $agoda;

    public function __construct(AgodaService $agoda)
    {
        $this->agoda = $agoda;
    }

    public function search()
    {
        // Example: Dhaka cityId (you must use real Agoda cityId)
        $cityId = 9395;

        $data = $this->agoda->searchByCity($cityId);

        return response()->json($data);
    }
}