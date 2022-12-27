<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class AjaxController extends Controller
{
    public function ajaxSearch(Request $request)
    {
        $title = $request->data;
        if ($request->url == '/') {
            $listmovie = Movie::getMovie()->filter(function ($item) use ($title) {
                return false !== stristr($item['title'], $title);
            });
            return $listmovie;
        } elseif ($request->url == '/upcoming') {
            $listmovie = Movie::getUpcoming()->filter(function ($item) use ($title) {
                return false !== stristr($item['title'], $title);
            });
            return $listmovie;
        }
    }
}
