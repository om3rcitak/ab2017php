<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //protected $fillable = ["name", "description", "imdb", "duration", "publish"];

    public function reviews()
    {
    	return $this->hasMany('\App\Review');
    }
}
