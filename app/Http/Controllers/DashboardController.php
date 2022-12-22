<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $listnavitem = [
            [
                'title' => 'Dashboard',
                'icon' => 'home-outline',
            ],
            [
                'title' => 'Customers',
                'icon' => 'people-outline',
            ],
            [
                'title' => 'Messege',
                'icon' => 'chatbubble-outline',
            ],
            [
                'title' => 'Help',
                'icon' => 'help-outline',
            ],
            [
                'title' => 'Setting',
                'icon' => 'settings-outline',
            ],
            [
                'title' => 'Password',
                'icon' => 'lock-closed-outline',
            ],
            [
                'title' => 'Sign Out',
                'icon' => 'log-out',
            ],
        ];

        $orders = Dashboard::getRecentOrder();
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'listnav' => $listnavitem,
            'orders' => $orders,
        ]);
    }
}
