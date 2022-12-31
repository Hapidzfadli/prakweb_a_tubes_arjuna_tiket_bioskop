@extends('dashboard.layouts.main')

@section('container')
<div class="details mt-2 row px-4 gap-3 position-relative">
    @if (session()->has('messege'))
          <div style="left: 50%;
          transform: translateX(-50%); z-index: 100 !important; position: absolute;" class="w-50 top-0 z-30 alert alert-success alert-dismissible fade show" role="alert">
            {{ session('messege') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
        @endif
        <div class="recentOrders col-12 p-3">
            <div class="cardHeader d-flex justify-content-between">
                <h5>Sales</h5>
                <div class="search" style="width: 200px; height: 40px; padding-bottom: 8px;">
                    <label for="" style="height: 100%;">
                        <input style="height: 100%" id="search" type="text" placeholder="Search..">
                        <ion-icon style="height: 100%" name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>
            <div class="table-order overflow-auto">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Invoice</th>
                            <th>Movie</th>
                            <th>Price</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="/{{$sale->user->image}}" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{$sale->user->name}}</p>
                                        <p class="text-muted mb-0">{{$sale->user->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">#{{$sale->order_id}}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{$sale->movie}}</p>
                                <p class="text-muted mb-0">{{$sale->theater}}</p>
                            </td>    
                            <td>
                                <p class="fw-normal mb-1">{{number_format($sale->total_price, 0, '.', '.');}}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{$sale->payment->payment_type}}</p>
                            </td>
                            <td>
                                <span class="badge bg-success rounded-pill d-inline">
                                    {{$sale->payment->transaction_status}}
                                </span>
                            </td>
                            <td>
                                <div class="row w-100">
                                    <div class="col-lg-6">
                                        <a href="/dashboard/tiket/{{$sale->order_id}}" class="badge badge-edit text-white bg-warning rounded-pill d-inline">
                                            tiket
                                        </a>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="/dashboard/sales/{{{$sale->order_id}}}/" class="badge badge-edit text-white bg-primary rounded-pill d-inline">
                                            view
                                        </a>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>   
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex mt-2 justify-content-end">
                    {!! $sales->links() !!}
                </div>
            </div>
        </div>
</div>
@endsection