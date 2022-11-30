<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected static $urlApi = "http://146.190.198.36:3000/";

    public static function getMovie()
    {
        $datamovies = Http::get(self::$urlApi . "playing");
        $datamovies = $datamovies->json();
        return collect($datamovies);
    }

    public static function getDetails($id)
    {
        $movies = self::getMovie();

        $id = $movies->firstWhere('id', $id);
        $id = $id['id'];
        $movie = Http::get(self::$urlApi . "movies/$id");
        $movie = $movie->json();
        return collect($movie);
    }
}
