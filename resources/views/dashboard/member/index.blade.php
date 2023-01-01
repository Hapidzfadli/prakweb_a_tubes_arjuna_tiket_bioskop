@extends('dashboard.layouts.main')

@section('container')

{{-- statistic pembelian --}}
<div class="card-statistic p-4">
    <div class="row">
        <div class="col-6">
            <a href="/dashboard/member/orders" class="text-decoration-none">
                <div class="row" style="cursor: pointer !important">
                    <div class="col-8">
                        <h2 class="number-stats">{{count($orders)}}</h2>
                        <div class="name-stats">Orders</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6">
            <a href="/dashboard/member/tiket" class="text-decoration-none">
                <div class="row" style="cursor: pointer !important">
                    <div class="col-8">
                        <h2 class="number-stats">{{count($tickets)}}</h2>
                        <div class="name-stats">Tiket</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="ticket-outline"></ion-icon>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

{{-- order details list --}}
<div class="details row px-4 gap-3">
    <div class="recentOrders col-lg-8 col-md-12 p-3 rounded">
        <div class="cardHeader d-flex justify-content-between">
            <h5>Recent Orders</h5>
            <a href="/dashboard/member/orders" class="badge badge-primary bg-primary h-50">View All</a>
        </div>
        <div class="table-order overflow-auto">
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
                    @foreach ($orders->take(6) as $order)
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
                            <span class="badge bg-info rounded-pill d-inline">
                                inProgres 
                            </span>
                            @endif
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- riwayat tiket --}}
    <div class="recentCustomer col p-3">
        <div class="cardHeader d-flex justify-content-between">
            <h5>Riwayat Tiket</h5>
            <a href="/dashboard/member/tiket" class="badge badge-primary bg-primary h-50">View All</a>
        </div>
        <div class="table-customer">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Tiket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{App\Models\Movie::getDetails($ticket->id_movie)['bannerUrl'] }}" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{$ticket->movie}}</p>
                                        <p class="text-muted mb-0">#{{$ticket->order_id}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div> 
    </div>
</div>

@endsection