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
        $movie = Http::get(self::$urlApi . "movies/$id");
        $movie = $movie->json();
        return collect($movie);
    }

    public static function getUpcoming()
    {
        $upcoming = Http::get(self::$urlApi . "upcoming");
        $upcoming = $upcoming->json();
        return collect($upcoming);
    }

    public static function getCities()
    {
        $cities = Http::get(self::$urlApi . "cities");
        $cities = $cities->json();
        return collect($cities);
    }

    public static function getTheaters($city_id)
    {
        $theater = Http::get(self::$urlApi . "theaters?city_id=$city_id");
        $theater = $theater->json();
        return collect($theater);
    }

    public static function getSchedules($theater)
    {
        $schedules = Http::get(self::$urlApi . "schedules/$theater");
        $schedules = $schedules->json();
        return collect($schedules);
    }

    public static function getSchedulesDetail($theater, $id)
    {
        $schedules = Http::get(self::$urlApi . "schedules/$theater/$id");
        $schedules = $schedules->json();
        return collect($schedules);
    }
}
