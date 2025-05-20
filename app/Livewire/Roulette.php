<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;

class Roulette extends Component
{
    public $accesToken;
    public $rouletteOptions;
    public $data;

    public function mount()
    {
        $token = session('access_token');
        $userId = session('user_data')['id'];
        $apiService = new ApiService();
        $this->data = $apiService->getSerendipityData($token, $userId);
        
    }
    public function render()
    {
        return view('livewire.roulette');
    }
}
