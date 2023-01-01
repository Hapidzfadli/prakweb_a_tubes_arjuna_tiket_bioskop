@extends('dashboard.layouts.main')

@section('container')
<div class="details row px-4 gap-3 position-relative mt-2">
        <div class="recentOrders col-lg-3  p-1" style="min-height: calc(100vh - 70px);">
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
                            <p class="date-tiket m-0">@foreach (App\Models\Seat::where('order_id', '=', $tiket->order_id)->get() as $seat)
                                  
                                {{ $seat->no_seat }}
                              @endforeach</p>
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
        
        <div class="col" style="min-height: calc(100vh - 70px);">
            <div class="movie-detail px-4 row" style="min-height: 100%">
                <div class="detail-img col-lg-3 py-1 mt-3">
                    <img src="{{ $movie['bannerUrl'] }}" alt="" class="rounded w-100">
                </div>
                <div class="col mt-3">
                    <div class="detail row">
                        <div class="col-lg-12 title-detail">
                            <a href=""></a><h2>{{ $movie['title'] }}</h2>
                        </div>
            
                        <div class="col-lg-12">
                            <div class="genre">
                                <span class="bg-grey">Genre</span>
                                
                                @foreach ($movie['genre'] as $genre)
                                    {{ $genre }}
                                    @if (!$loop->last)
                                        ,
                                    @endif                        
                                @endforeach
                            </div>
                        </div>
            
                        <div class="col-lg-12 mt-2">
                            <div class="rating inline">
                                <span>{{ $movie['rating'] }}</span>
                                <span class="mx-2">|</span>
            
                                <span class="duration">{{ $movie['duration'] }}</span>
                                <span class="mx-2">|</span>
            
                                <span>
                                    <a class="trailer bg-gray text-decoration-none" href="{{ $movie['trailerUrl'] }}">
                                        Play Trailer
                                    </a>
                                </span>
                            </div>
                        </div>
            
                        <div class="col-lg-12 mt-2">
                            <div class="deskripsi">
                                {{ $movie['description'] }}
                            </div>
                        </div>
            
                        <hr class="my-3">
            
                        
                        <div class="col-lg-6 mb-2">
                            <div class="cast">
                                <h5>Cast</h5>
                                @foreach ($movie['cast'] as $cast)
                                    {{ $cast }}
                                    @if (!$loop->last)
                                        ,
                                    @endif                        
                                @endforeach
                            </div>
                        </div>
            
                        
                        <div class="col-lg-6 mb-2">
                            <div class="producer">
                                <h5>Producer</h5>
                                @foreach ($movie['producer'] as $producer)
                                    {{ $producer }}
                                    @if (!$loop->last)
                                        ,
                                    @endif                        
                                @endforeach
                            </div>
                        </div>
            
                        
                        <div class="col-lg-6 my-2">
                            <div class="writer">
                                <h5>Writer</h5>
                                @foreach ($movie['writer'] as $writer)
                                    {{ $writer }}
                                    @if (!$loop->last)
                                        ,
                                    @endif                        
                                @endforeach
                            </div>
                        </div>
            
                        
                        <div class="col-lg-6 my-2">
                            <div class="director">
                                <h5>Director</h5>
                                @foreach ($movie['director'] as $director)
                                    {{ $director }}
                                    @if (!$loop->last)
                                        ,
                                    @endif                        
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection