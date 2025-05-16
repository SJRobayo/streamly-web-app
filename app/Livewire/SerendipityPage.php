<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;

class SerendipityPage extends Component
{

    public $data;
    public $genres =  [
        "Adventure",
        "Fantasy",
        "Animation",
        "Drama",
        "Horror",
        "Action",
        "Comedy",
        "History",
        "Western",
        "Thriller",
        "Crime",
        "Documentary",
        "Science Fiction",
        "Mystery",
        "Music",
        "Romance",
        "Family",
        "War",
        "TV Movie"
    ];
    public function mount()
    {
        $token = session('access_token');
        $userId = session('user_data')['id'];
   
        $apiService = new ApiService();
        $this->data = $apiService->getSerendipityData($token, $userId);
        // dd($this->data);
    }
    public function render()
    {
        return view('livewire.serendipity-page', ["data" => $this->data]);
    }
}
