@extends('dashboard.layouts.main')

@section('container')
<div class="details row px-4 gap-3 position-relative mt-2">
    @if (session()->has('messege'))
          <div style="left: 50%;
          transform: translateX(-50%); z-index: 100 !important; position: absolute;" class="w-50 top-0 z-30 alert alert-success alert-dismissible fade show" role="alert">
            {{ session('messege') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
        @endif
        <div class="recentOrders col-lg-8 p-3" style="min-height: calc(100vh - 60px);">
            <div class="cardHeader row">
                <div class="d-flex align-items-center col-12 col-lg-8 col-md-8">
                    <img src="/img/logo.jpg" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                    <div class="ms-3">
                        <p class="fw-bold mb-0">Arjuna21</p>
                        <p class="text-muted mb-0">billing@mail.arjuna-mc.site</p>
                    </div>
                </div>
                <p class="text-muted mb-0 col mt-2">Jl. Gegerkalong Tengah No.6F, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153</p>
            </div>

            <div class="d-flex row invoice mt-3 justify-content-between purple-gradient color-block z-depth-1">
                <div class="col-lg-4 col-12 p-3">
                    <p class="fw-bolder mb-0">Invoice Number</p>
                    <p class="fw-normal mb-0">{{$detail->order_id}}</p>
                    <p class="fw-normal mb-0">Issued Date: <span class="fw-bolder">{{$detail->created_at->format('d M, Y')}}</span></p>
                    <p class="fw-normal mb-0">Due Date: <span class="fw-bolder">{{date('d M, Y', strtotime("+1 day", strtotime($detail->created_at)))}}</span></p>
                </div>
                <div class="col-lg-4 col-12 p-3">
                    <p class="fw-bolder mb-0">Billed to</p>
                    <p class="fw-normal mb-0">{{$detail->user->name}}</p>
                    <p class="fw-normal mb-0">{{$detail->user->address}}</p>
                </div>
                
            </div>
            <div class="item-detail mt-3">
                <p class="fw-bold mb-0">Item Detail</p>
                <div class="table-order overflow-auto mt-2">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Invoice</th>
                                <th>Movie</th>
                                <th>Date Time</th>
                                <th>Price</th>
                                <th>Tickets</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="fw-normal mb-1">#{{$detail->order_id}}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$detail->movie}}</p>
                                    <p class="text-muted mb-0">{{$detail->theater}}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$detail->date}}</p>
                                    <p class="text-muted mb-0">{{$detail->time}}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">RP. {{number_format($price, 0, '.', '.');}}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$detail->jml_tiket}} Tickets</p>
                                </td>
                            </tr>   
                        </tbody>
                    </table>
    
                </div>
            </div>
            <div class="total-amount row mt-4">
                <div class="col-lg-8"></div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <p class="fw-bolder mb-0">Sub Total</p>
                        </div>
                        <div class="col-6">
                            <p class="fw-normal mb-0">RP. {{number_format($price, 0, '.', '.');}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="fw-bolder mb-0">PPN</p>
                        </div>
                        <div class="col-6">
                            <p class="fw-normal mb-0">RP. {{number_format($ppn, 0, '.', '.');}}</p>
                        </div>
                    </div>
                    <hr style="color: rgb(179, 176, 176)">
                    <div class="row">
                        <div class="col-6">
                            <p class="fw-bolder mb-0">Total Amount</p>
                        </div>
                        <div class="col-6">
                            <p class="fw-normal mb-0">RP. {{number_format($detail->total_price, 0, '.', '.');}}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        <div class="col" style="min-height: calc(100vh - 60px);">
            <div class="row gap-3">
                <div class="col-12 customer-details p-3">
                    <p class="title">Customer Details</p>
                    <div class="d-flex align-items-center">
                        <img src="/{{$detail->user->image}}" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                        <div class="ms-3">
                            <p class="fw-bold mb-0">{{$detail->user->name}}</p>
                            <p class="text-muted mb-0">{{$detail->user->email}}</p>
                        </div>
                    </div>
                    <hr>
                    <p class="address text-muted">{{$detail->user->address}}</p>
                    <div class="view d-flex justify-content-center">
                        <a href="/dashboard/customers/{{$detail->user->id}}/edit" class="text-decoration-none w-100">
                            <button class="btn btn-info w-100 py-2" style="color: #ffffff;">View Customer</button>
                        </a>
                    </div>
                    
                </div>
                <div class="col-12 customer-details p-3">
                    <p class="title">Amount <span class="text-muted">(IDR)</span></p>
                    <h4 class="price mb-4">RP. {{number_format($detail->total_price, 0, '.', '.');}}</h4>
                    <span class="py-2 px-3 my-1" style="background: #ffdfe0; color: #be7a7c; border-radius: 20px;">Due on {{date('d M, Y', strtotime("+1 day", strtotime($detail->updated_at)));}}</span>
                    <hr style="color: rgb(179, 176, 176)">
                    <div class="row">
                        <div class="col">
                            <a href="" class="text-decoration-none">
                                <p class="py-2 px-3 my-1 btn-info btn text-center w-100" style="color: white; border-radius: 20px; cursor: pointer;">Preview</p>
                            </a>
                            
                        </div>
                        <div class="col">
                            <a href="" class="text-decoration-none">
                                <p class="py-2 px-3 my-1 btn-info btn text-center w-100" style="color: white; border-radius: 20px; cursor: pointer;">Download</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection