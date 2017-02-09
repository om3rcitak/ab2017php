<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(20);

        return $movies;
    }

    public function show(Movie $movie)
    {
        return $movie;
    }
}
