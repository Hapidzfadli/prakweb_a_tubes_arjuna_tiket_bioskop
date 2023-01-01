<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\User;
use Illuminate\Http\Request;


class TicketController extends Controller
{
    public function index($id)
    {
        $auth = auth()->user();
        $orders = Dashboard::getRecentOrder();
        $tiket = $orders->where('order_id', '=', $id)->first();

        $movie = Movie::getDetails($tiket->id_movie);
        $listnavitem = Dashboard::getNav();
        return view('dashboard.admin.ticket.index', [
            'title' => 'Dashboard',
            'listnav' => $listnavitem,
            'tiket' => $tiket,
            'auth' => $auth,
            'movie' => $movie,
        ]);
    }
}
