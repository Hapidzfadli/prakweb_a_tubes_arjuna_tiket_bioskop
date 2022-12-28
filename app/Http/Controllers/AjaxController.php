<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;

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
        } elseif ($request->url == '/dashboard/customers') {
            $customer = User::all()->filter(function ($item) use ($title) {
                return false !== stristr($item['username'], $title) || false !== stristr($item['name'], $title) || false !== stristr($item['email'], $title) || false !== stristr($item['no_telphone'], $title) || false !== stristr($item['address'], $title);;
            });
            return $customer;
        }
    }
}
