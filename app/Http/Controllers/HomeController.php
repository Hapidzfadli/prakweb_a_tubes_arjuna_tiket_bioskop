<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $posts = Movie::getMovie();
        return view('index', [
            "title" => "Arjuna 21",
            'posts' => $posts,
            "active" => 'home'
        ]);
    }
}
