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
    public $selectedGenre;
    public $generalData;
    public $favouriteGenre1;
    public $favouriteGenre2;
    public $favouriteGenre3;
    public $favouriteGenreMovies1;
    public $favouriteGenreMovies2;
    public $favouriteGenreMovies3;
    public $topTenMovies;
    public $searchResults;
    public $sessionId;

    public $query = '';

    public $sessionToken;
    public function mount()
    {
        $this->sessionId = session('user_data')['id'];
        // dd('hola', $this->sessionId);
        $this->sessionToken = session('access_token');
        $this->favouriteGenre1 = session('user_data')['preferred_genres'][0];
        $this->favouriteGenre2 = session('user_data')['preferred_genres'][1];
        $this->favouriteGenre3 = session('user_data')['preferred_genres'][2];
    }

    public function render()
    {
        $apiService = new ApiService();

        if ($this->query) {
            $this->searchResults = $apiService->searchMovie($this->query, $this->sessionToken);
            // dd($searchResults);
        } else {
            $this->topTenMovies = $apiService->getTopTenMovies($this->sessionId, $this->sessionToken);
            $this->favouriteGenreMovies1 = $apiService->getDataFromExternalApi($this->favouriteGenre1);
            $this->favouriteGenreMovies2 = $apiService->getDataFromExternalApi($this->favouriteGenre2);
            $this->favouriteGenreMovies3 = $apiService->getDataFromExternalApi($this->favouriteGenre3);
        }
        return view('livewire.home', [
            'movies1' => $this->favouriteGenreMovies1,
            'movies2' => $this->favouriteGenreMovies2,
            'movies3' => $this->favouriteGenreMovies3,
            // 'topTen' => $this->topTenMovies
            // 'search' => $this->searchResults,
        ]);
    }

    public function cleanFilters()
    {
        $this->selectedGenre = null;
        // $this->data = [];
    }
}
