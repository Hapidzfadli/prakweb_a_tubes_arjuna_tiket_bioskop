@extends('layouts.main')

@section('container')
<!-- card -->

<div class="upcoming rounded py-2 px-3 justify-content-center d-flex mt-5 border-bottom">
    <h4>Upcoming</h4>
</div>

{{-- <h1 class="upcoming mt-5" style="text-align: center">Upcoming</h1> --}}
<div class="row cardindex pt-3">
    @foreach ($posts as $p)
    <div class="col col-sm-2 col-md-4 col-lg-3 mb-4 mt-4">
    <a href="#" class="text-decoration-none text-black">
        <div class="card mx-auto" style="height: 95%">
        <img src="<?= $p["bannerUrl"]; ?>" alt="">
            <div class="card-body">
            <h6 class="card-title text-center "><?= $p["title"] ?></h6>
            </div>
        </div>
    </a>
</div> 
@endforeach     
</div>
@endsection