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

    public function retrieveUserData($token)
    {

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


    public function getDataFromExternalApi($genre)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ0YW1teWdhcmRuZXI5NDdAZXhhbXBsZS5jb20iLCJleHAiOjE3NDkwMzc4ODh9.lvI3nQM_Lra7Zsg9XKnpUhkeO_LvxkX9jAJkUT83Vxs'
        ])->get('http://localhost:8000/api/movies/genre/' . $genre);

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

    public function getSerendipityData($token, $user_id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->post(
            'http://localhost:8000/worstrecommendations/user/' . $user_id,
            ['n_recommendations' => 10] // <-- Aquí defines cuántas recomendaciones deseas
        );

        if ($response->successful()) {
            // dd($response['recommendations']); 
            return $response['recommendations']; // o ->body() si prefieres el texto sin parsear
        }

        // Manejo de errores
        return [
            'error' => true,
            'message' => 'Error al recuperar los datos de serendipia',
            'status' => $response->status()
        ];
    }

    public function sendChatMessage($query, $token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('http://localhost:8000/api/chat', [
            'query' => $query
        ]);

        dd($response->json());
        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => true,
            'message' => 'Error al comunicarse con el chatbot.',
            'status' => $response->status()
        ];
    }

    public function getMovieDetails($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ0YW1teWdhcmRuZXI5NDdAZXhhbXBsZS5jb20iLCJleHAiOjE3NDkyMDY4MDV9.tspKQD3vFoHSjNUNv06uYII5OGPR-F5N5cDS-7NkSCE'
        ])->get('http://localhost:8000/api/movies/' . $id);

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

    public function searchMovie($query, $token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://localhost:8000/api/movies/search/' . $query);

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    public function getUserRecomendations($id, $token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post(
            'http://localhost:8000/recommendations/user/' . $id,
            ['n_recommendations' => 10]
        );
        if ($response->successful()) {
            return $response['recommendations'];
        }

        return [];
    }

    public function getTopTenMovies($token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,

        ])->get(
            'http://localhost:8000/api/top-movies'
        );
        // dd($response);
        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }
}
