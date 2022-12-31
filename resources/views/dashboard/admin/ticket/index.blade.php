@extends('dashboard.layouts.main')

@section('container')
<div class="details row px-4 gap-3 position-relative mt-2">
        <div class="recentOrders col-lg-4 p-lg-5 p-md-4 p-3" style="min-height: calc(100vh - 70px);">
            <div class="detail-tiket">
                <div class="p-4">
                    <p class="title-movie mb-2">Movie : {{$tiket->movie}}</p>
                    <div class="row">
                        <div class="col-6 mt-4">
                            <p class="title-date m-0" style="color: rgb(209, 204, 204)">Date</p>
                            <p class="date-tiket m-0">{{$tiket->date}}</p>
                        </div>
                        <div class="col-6 mt-4">
                            <p class="title-date m-0" style="color: rgb(209, 204, 204)">Seat</p>
                            <p class="date-tiket m-0">A1, A2</p>
                        </div>
                        <div class="col-6 mt-4">
                            <p class="title-date m-0" style="color: rgb(209, 204, 204)">Theater</p>
                            <p class="date-tiket m-0">{{$tiket->theater}}</p>
                        </div>
                        <div class="col-6 mt-4">
                            <p class="title-date m-0" style="color: rgb(209, 204, 204)">Order</p>
                            <p class="date-tiket m-0">{{$tiket->order_id}}</p>
                        </div>
                        <div class="col-6 mt-4">
                            <p class="title-date m-0" style="color: rgb(209, 204, 204)">City</p>
                            <p class="date-tiket m-0">{{$tiket->city}}</p>
                        </div>
                        <div class="col-6 mt-4">
                            <p class="title-date m-0" style="color: rgb(209, 204, 204)">Type</p>
                            <p class="date-tiket m-0">{{$tiket->type}}</p>
                        </div>
                    </div>
                    <hr class="mt-4" style="border: 3px dashed white">
                    <div class="d-flex justify-content-center">
                        {!! QrCode::size(230)->generate('RemoteStack') !!}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col" style="min-height: calc(100vh - 60px);">
        </div>
</div>
@endsection