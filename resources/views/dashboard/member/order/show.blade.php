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
            <h5>Tagihan</h5>
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
                        <th>Payment_id</th>
                        <th>Movie</th>
                        <th>Total_price</th>
                        <th>Transaction_time</th>
                        <th>Transaction_status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>
                                <p class="text-muted mb-0">12323</p>
                            </td>
                            <td>
                                <p class="text-muted mb-0">CEK TOKO SEBELAH 2</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">40000</p>
                            </td>
                            <td>
                                <p class="text-muted mb-0">2022-12-19</p>
                            </td>
                            <td>
                                <p class="text-muted mb-0">Pending</p>
                            </td>
                            <td>
                            <div class="col-lg-6">
                                <a href="/dashboard/member/orders/" class="badge badge-edit text-white bg-primary rounded-pill d-inline">
                                    Bayar
                                </a>
                            </div>
                            </td>
                        </tr>
                    
                </tbody>
            </table>    
        </div> 
    </div>
</div>

@endsection