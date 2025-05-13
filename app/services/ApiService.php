<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    public function getDataFromExternalApi()
    {
        $response = Http::get('http://10.0.40.25:8000/api/movies/genre/Action');

        if ($response->successful()) {
            return $response->json(); // o ->body() si prefieres el texto sin parsear
        }

        // Manejo de errores
        return [
            'error' => true,
            'message' => 'Error al conectar con la API externa',
            'status' => $response->status()
        ];
    }

   
}