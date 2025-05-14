<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{

    public function login($email, $password)
    {
        // dd($email, $password);
        $response = Http::post('http://localhost:8000/login', [
            'email' => $email,
            'password' => $password
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        // Manejo de errores
        return [
            'error' => true,
            'message' => 'Error al iniciar sesión',
            'status' => $response->status()
        ];
    }

    public function retrieveUserData($token) {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get('http://localhost:8000/me');

        if ($response->successful()) {
            // dd($response->json());
            return $response->json();
        }

        // Manejo de errores
        return [
            'error' => true,
            'message' => 'Error al recuperar los datos del usuario',
            'status' => $response->status()
        ];
    }


    public function getDataFromExternalApi()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ0YW1teWdhcmRuZXI5NDdAZXhhbXBsZS5jb20iLCJleHAiOjE3NDkwMzc4ODh9.lvI3nQM_Lra7Zsg9XKnpUhkeO_LvxkX9jAJkUT83Vxs'
        ])->get('http://localhost:8000/api/movies/genre/Action');

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
