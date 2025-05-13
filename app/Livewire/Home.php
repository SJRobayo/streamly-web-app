<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;

class Home extends Component
{

    public $iterator = 10;
    public $apiService;
    public function mount()
    {
        // $this->apiService = new ApiService();
        // $data = $this->apiService->getDataFromExternalApi();
        // // dd($data);
    }
    public function render()
    {
        return view('livewire.home', []);
    }
}
