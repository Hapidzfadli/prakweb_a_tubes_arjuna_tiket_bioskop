<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = $request->keyword;
        $posts = Movie::getMovie()->filter(function ($item) use ($title) {
            return false !== stristr($item['title'], $title);
        });
        return view('page.search', [
            "title" => "Arjuna 21",
            'posts' => $posts,
            "active" => 'search'
        ]);
    }
}
