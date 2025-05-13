<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id',
        'tmdb_id',
        'imdb_id',
        'title',
        'original_title',
        'overview',
        'tagline',
        'release_date',
        'runtime',
        'budget',
        'revenue',
        'popularity',
        'vote_average',
        'vote_count',
        'status',
        'adult',
        'video',
        'poster_path',
        'backdrop_path',
        'homepage',
        'original_language',
        'genres',
        'production_companies',
        'production_countries',
        'spoken_languages',
        'belongs_to_collection',
        'predicted_rating',
    ];


}
