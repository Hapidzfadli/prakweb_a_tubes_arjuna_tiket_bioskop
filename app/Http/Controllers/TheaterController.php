<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class TheaterController extends Controller
{
    public function index()
    {
        $city_id = 2;
        $cities = Movie::getCities();
        $city = Movie::getCitiesId($city_id);
        $theater = Movie::getTheaters($city_id);
        $schedules = Movie::getSchedules($theater["XXI"][2]['id']);
        $infotheater = $schedules['theater'];
        $posts = $schedules['schedules'];

        return view('page.theater', [
            'title' => 'theater',
            'active' => 'theaters',
            'theaters' => $theater,
            'cities' => $cities,
            'infotheater' => $infotheater,
            'posts' => $posts,
            'city' => $city,
        ]);
    }
}
