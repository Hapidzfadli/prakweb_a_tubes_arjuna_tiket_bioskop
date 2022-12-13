<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class OrderAjaxController extends Controller
{
    public function cities(Request $request)
    {
        $type = Movie::getTheaters($request->cityid)->keys(0);
        return $type;
    }

    public function theaters(Request $request)
    {
        $theaters = Movie::getTheaters($request->city_id)[$request->type];
        return $theaters;
    }

    public function schedules(Request $request)
    {
        $schedules = Movie::getSchedules($request->theater);
        return $schedules;
    }

    public function schedulesDetails(Request $request)
    {
        $schedules = Movie::getSchedulesDetail($request->theater_id, $request->movie_id);
        return $schedules;
    }
}
