<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::paginate(10);

        if ($request->has('json'))
            return $movies;

        return view("movie.index", [
            "movies" => $movies
        ]);

    }

    /*
     * public function show($movie_id){
     *     $movie = Movie::findOrFail($movie_id);
     * }
     */

    public function show(Movie $movie)
    {
        return view("movie.show", [
            "movie" => $movie
        ]);
    }

    public function create()
    {
        return view("movie.create");
    }

    public function store(Request $request)
    {
        Movie::unguard();
        $name = $request->name;
        $description = $request->description;
        $imdb = $request->imdb;
        $duration = $request->duration;
        $publish = $request->publish;

        $movie = Movie::create([
            "name" => $name,
            "description" => $description,
            "imdb" => $imdb,
            "duration" => $duration,
            "publish" => $publish
        ]);

        return redirect('movie/' . $movie->id);
    }

    public function delete(Movie $movie)
    {
        $movie->delete();

        return redirect('/movie/list');
    }

    public function edit(Movie $movie)
    {
        return view("movie.edit", [
            "movie" => $movie
        ]);
    }

    public function update(Movie $movie, Request $request)
    {
        $movie->name = $request->get('name');
        $movie->description = $request->get('description');
        $movie->duration = $request->get('duration');
        $movie->imdb = $request->get('imdb');
        $movie->publish = $request->get('publish');
        $movie->save();

        return redirect('/movie/' . $movie->id);
    }
}
