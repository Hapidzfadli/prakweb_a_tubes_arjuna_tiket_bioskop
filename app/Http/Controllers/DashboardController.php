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
        $listnavitem = Dashboard::getNav();
        $orders = Dashboard::getRecentOrder();
        $users = User::latest('created_at')->get();
        $earning = Dashboard::getEarning();
        $sales = Dashboard::getSales();
        $auth = auth()->user();
        $ordersMember = $orders->where('user_id', '=', $auth->id);

        if ($auth->is_admin) {
            return view('dashboard.admin.index', [
                'title' => 'Dashboard',
                'listnav' => $listnavitem,
                'orders' => $orders,
                'users' => $users,
                'earning' => $earning,
                'sales' => $sales,
                'auth' => $auth,
            ]);
        } else {
            return view('dashboard.member.index', [
                'title' => 'Dashboard',
                'listnav' => $listnavitem,
                'auth' => $auth,
                'orders' => $ordersMember,
            ]);
        }
    }
}
