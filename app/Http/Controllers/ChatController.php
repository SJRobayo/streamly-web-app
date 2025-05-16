<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

class ChatController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function chat(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:500',
        ]);

        $token = $request->bearerToken(); // Toma el token del header Authorization: Bearer xxx

        if (!$token) {
            return response()->json(['error' => 'Token no proporcionado.'], 401);
        }

        $response = $this->apiService->sendChatMessage($request->input('query'), $token);

        return response()->json($response);
    }
}
