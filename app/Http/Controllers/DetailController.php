<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id) {
        $movie = Movie::getDetails($id);
        return $movie;
    }
}
