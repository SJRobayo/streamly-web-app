<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;

class Home extends Component
{

    public $iterator = 10;
    public $apiService;
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

    public $movies = [];
    public $data; 

    public function mount()
    {
        // dd(session('user_data'));
        $apiService = new ApiService();
        $this->data = $apiService->getDataFromExternalApi();
        // dd($this->data);
        // $this->data = $this->data[0];
    }
    public function render()
    {


        return view('livewire.home', [
            'movies' => $this->data
        ]);
    }
}
