<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;

class MovieDetails extends Component
{

    public $movie;
    public function mount($id)
    {
        $apiService = new ApiService();
        $this->movie = $apiService->getMovieDetails($id);
        // dd($this->movie);
       
    }
    public function render()
    {
        return view('livewire.movie-details');
    }
}
