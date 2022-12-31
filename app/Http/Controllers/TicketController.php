<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Movie;
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
        if ($auth->is_admin) {
            $listnavitem = Dashboard::getNav();
            return view('dashboard.admin.ticket.index', [
                'title' => 'Dashboard',
                'listnav' => $listnavitem,
                'tiket' => $tiket,
                'auth' => $auth,
            ]);
        } else {
            $listnavitem = Dashboard::getNavUser();
            return view('dashboard.member.tiket.index', [
                'title' => 'Dashboard',
                'listnav' => $listnavitem,
                'auth' => $auth,
                'tiket' => $tiket,
            ]);
        }
    }
}
