@extends('dashboard.layouts.main')

@section('container')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="search">
            <label for="">
                <input type="text" placeholder="Search here..">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>
        <div class="user">
            <img src="/img/user.png" alt="">
        </div>
    </div>

    <div class="card-statistic p-4">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">1,000</h2>
                        <div class="name-stats">Daily views</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">300</h2>
                        <div class="name-stats">Sales</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">100</h2>
                        <div class="name-stats">Users</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">5,000,00</h2>
                        <div class="name-stats">Earning</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- order details list --}}
    <div class="details row px-4 gap-2">
        <div class="recentOrders col-8 p-3 rounded">
            <div class="cardHeader d-flex justify-content-between">
                <h5>Recent Orders</h5>
                <a href="#" class="badge badge-primary bg-primary h-50">View All</a>
            </div>
            <div class="table-order">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Movie</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{$order->user->image}}" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{$order->user->name}}</p>
                                        <p class="text-muted mb-0">{{$order->user->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{$order->movie}}</p>
                                <p class="text-muted mb-0">{{$order->theater}}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{number_format($order->total_price, 0, '.', '.');}}</p>
                            </td>
                            <td>
                                @if ($order->payment != null)
                                    @if ($order->payment->transaction_status == "settlement")
                                        <span class="badge bg-success rounded-pill d-inline">
                                            {{$order->payment->transaction_status}}
                                        </span>
                                    @elseif($order->payment->transaction_status == "pending")
                                        <span class="badge bg-warning rounded-pill d-inline">
                                            {{$order->payment->transaction_status}}
                                        </span>
                                    @elseif($order->payment->transaction_status == "return")
                                    <span class="badge bg-primary rounded-pill d-inline">
                                        {{$order->payment->transaction_status}}
                                    </span>
                                    @elseif($order->payment->transaction_status == "cencel")
                                    <span class="badge bg-danger rounded-pill d-inline">
                                        {{$order->payment->transaction_status}}
                                    </span>
                                    @else
                                    <span class="badge bg-danger rounded-pill d-inline">
                                        {{$order->payment->transaction_status}}
                                    </span>
                                    @endif
                                
                                @else
                                <span class="badge bg-danger rounded-pill d-inline">
                                    cencel 
                                </span>
                                @endif
                            </td>
                        </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection