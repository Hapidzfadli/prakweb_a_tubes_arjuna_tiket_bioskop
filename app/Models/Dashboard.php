<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    public static function getRecentOrder()
    {
        $orders = Order::with('user', 'payment')->get();
        return $orders;
    }
}
