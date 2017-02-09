<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
 * Hangi Movie sınıfının kullanılacağını
 * belirtiyoruz.
 */
use App\Movie;

class HomeController extends Controller
{
    public function index()
    {
    	return view('anasayfa');
    }
}





/*
    	$movie = new Movie;
    	$movie->name = "La La Land";
    	$movie->publish = "2016-11-25";
    	$movie->description = "Amerikan Filmi";
    	$movie->duration = 135;
    	$movie->imdb = 8.6;
    	$movie->save();

    	return $movie->id;
    	*/
    	/*
    	$movies = Movie::where("duration",">", 120)
    	->orWhere("imdb", ">", 7.6)
    	->get();

    	foreach($movies as $movie){
    		dd($movie);
    	}
    	*/

		/*
    	$lalaland = Movie::where("name", "La La Land")->first();
    	$lalaland->imdb = 8.7;
    	$lalaland->save();
    	*/
    	/*
    	$lalaland = Movie::where("name", "La La Land")->firstOrFail();
    	dd($lalaland);
    	*/