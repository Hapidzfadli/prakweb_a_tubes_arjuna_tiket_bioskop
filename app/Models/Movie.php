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
        $status_code = $datamovies->status();
        if ($status_code == 200) {
            $datamovies = $datamovies->json();
            return collect($datamovies);
        }
    }

    public static function getDetails($id)
    {
        $movie = Http::get(self::$urlApi . "movies/$id");
        $status_code = $movie->status();
        if ($status_code == 200) {
            $movie = $movie->json();
            return collect($movie);
        }
    }

    public static function getUpcoming()
    {
        $upcoming = Http::get(self::$urlApi . "upcoming");
        $status_code = $upcoming->status();
        if ($status_code == 200) {
            $upcoming = $upcoming->json();
            return collect($upcoming);
        }
    }

    public static function getCities()
    {
        $cities = Http::get(self::$urlApi . "cities");
        $status_code = $cities->status();
        if ($status_code == 200) {
            $cities = $cities->json();
            return collect($cities);
        }
    }

    public static function getCitiesId($city_id)
    {
        $cities = Http::get(self::$urlApi . "cities/" . $city_id);
        $status_code = $cities->status();
        if ($status_code == 200) {
            $cities = $cities->json();
            return collect($cities);
        }
    }

    public static function getTheaters($city_id)
    {
        $theater = Http::get(self::$urlApi . "theaters?city_id=$city_id");
        $status_code = $theater->status();
        if ($status_code == 200) {
            $theater = $theater->json();
            return collect($theater);
        }
    }

    public static function getSchedules($theater)
    {
        $schedules = Http::get(self::$urlApi . "schedules/$theater");
        $status_code = $schedules->status();
        if ($status_code == 200) {
            $schedules = $schedules->json();
            return collect($schedules);
        }
    }

    public static function getSchedulesDetail($theater, $id)
    {
        $schedules = Http::get(self::$urlApi . "schedules/$theater/$id");
        $status_code = $schedules->status();
        if ($status_code == 200) {
            $schedules = $schedules->json();
            return collect($schedules);
        }
    }
}
