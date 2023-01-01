@extends('dashboard.layouts.main')

@section('container')

<div class="details row px-4 gap-3 position-relative">
    @if (session()->has('messege'))
        <div style="left: 50%;
        transform: translateX(-50%); z-index: 100 !important; position: absolute;" class="w-50 top-0 z-30 alert alert-success alert-dismissible fade show" role="alert">
            {{ session('messege') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
    @endif
    
    <div class="recentCustomer col p-3 rounded">
        <div class="cardHeader d-flex justify-content-between">
            <h5>Order</h5>
            <div class="search" style="width: 200px; height: 40px; padding-bottom: 8px;">
                <label for="" style="height: 100%;">
                    <input style="height: 100%" id="search" type="text" placeholder="Search..">
                    <ion-icon style="height: 100%" name="search-outline"></ion-icon>
                </label>
            </div>
        </div>

        <div class="table-customer overflow-auto">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Name</th>
                        <th>Invoice</th>
                        <th>Movie</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($orders as $order)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="/{{$auth->image}}" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{$auth->name}}</p>
                                        <p class="text-muted mb-0">{{$auth->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">#{{$order->order_id}}</p>
                            </td>
                            <td>
                                <p class="text-muted mb-0">{{$order->movie}}</p>
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
                            <td>
                                <div class="row w-100">
                                    <div class="col-6">
                                        <a href="/dashboard/member/orders/{{$order->order_id}}" class="badge badge-edit text-white bg-primary rounded-pill d-inline">
                                            views
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="badge badge-edit text-white bg-secondary rounded-pill d-inline">
                                            pay
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    

            <div class="d-flex mt-2 justify-content-end">
                {!! $orders->links() !!}
            </div>
        </div> 
    </div>
</div>
@endsection