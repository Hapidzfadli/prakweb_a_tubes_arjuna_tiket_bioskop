<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $listnavitem = [
            [
                'title' => 'Dashboard',
                'icon' => 'home-outline',
                'link' => '/dashboard'
            ],
            [
                'title' => 'Customers',
                'icon' => 'people-outline',
                'link' => '/dashboard/customers'
            ],
            [
                'title' => 'Orders',
                'icon' => 'chatbubble-outline',
                'link' => '/dashboard/orders'
            ],
            [
                'title' => 'Sales',
                'icon' => 'cart-outline',
                'link' => '/dashboard/sales'
            ],
            [
                'title' => 'Setting',
                'icon' => 'settings-outline',
                'link' => '/dashboard/setting'
            ],
            [
                'title' => 'Password',
                'icon' => 'lock-closed-outline',
                'link' => '/dashboard/password'

            ],
            [
                'title' => 'Sign Out',
                'icon' => 'log-out',
                'link' => '/dashboard/logout'
            ],
        ];

        $orders = Dashboard::getRecentOrder();
        $users = User::latest('created_at')->get();
        $earning = Dashboard::getEarning();
        $sales = Dashboard::getSales();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'listnav' => $listnavitem,
            'orders' => $orders,
            'users' => $users,
            'earning' => $earning,
            'sales' => $sales,
        ]);
    }
}
