@extends('layouts.main')

@section('slider')
    @include('partials.slider')
@endsection


@section('container')
     <!-- card -->
  <div class="container">
    <div class="containere">
        <div class="row pt-3">
          <?php foreach ($posts as $p) : ?>
            <div class="col col-sm-2 col-md-4 col-lg-3 mb-4 mt-4">
              <div class="card mx-auto">
                <img src="<?= $p["bannerUrl"]; ?>" alt="">
                <div class="card-body">
                  <h6 class="card-title text-center"><?= $p["title"] ?></h6>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
  </div>
@endsection

