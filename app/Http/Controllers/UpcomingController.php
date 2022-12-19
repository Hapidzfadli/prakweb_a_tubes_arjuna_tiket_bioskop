<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class UpcomingController extends Controller
{
    //
    public function index()
    {
        $upcoming = Movie::getUpcoming();
        return view ('page.upcoming', [
            'title' => 'Upcoming', 
            'active' => 'upcoming',
            'posts' => $upcoming
        ]);
    } 
}
