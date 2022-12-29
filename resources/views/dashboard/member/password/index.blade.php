@extends('dashboard.layouts.main')

@section('container')
<div class="details row px-4 gap-3 position-relative" style="min-height: 100vh;">
  @if (session()->has('messege'))
      <div style="left: 50%;
      transform: translateX(-50%); z-index: 100 !important; position: absolute;" class="w-50 top-0 z-30 alert alert-success alert-dismissible fade show" role="alert">
          {{ session('messege') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> 
  @endif
  
  <div class="recentCustomer col p-3 rounded">
      <div class="cardHeader d-flex justify-content-between">
          <h5>Ganti Password</h5>
      </div>
      <form method="POST" action="/dashboard/password/{{ auth()->user()->id }}">
        @method('put')
            @csrf
        <div class="col-lg-6 col-12">
          <div class="input-group mb-3 position-relative" style="z-index: 100">
              <label for="oldpassword" class="input-group-prepend">
                  <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="key-outline" style="height: 100%; width 100%;"></ion-icon></span>
              </label>
              <input type="password" id="oldpassword" class="form-control" hint="off"  autocomplete="off" name="oldpassword"  placeholder="Password Lama" value="" required />
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="input-group mb-3 position-relative" style="z-index: 100">
              <label for="newpassword" class="input-group-prepend">
                  <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="key-outline" style="height: 100%; width 100%;"></ion-icon></span>
              </label>
              <input type="password" id="newpassword" class="form-control" hint="off"  autocomplete="off" name="newpassword"  placeholder="Password Baru" value="" required />
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="input-group mb-3 position-relative" style="z-index: 100">
              <label for="repassword" class="input-group-prepend">
                  <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="key-outline" style="height: 100%; width 100%;"></ion-icon></span>
              </label>
              <input type="password" id="repassword" class="form-control" hint="off"  autocomplete="off" name="repassword"  placeholder="Konfirmasi Password" value="" required />
          </div>
        </div>
        <div class="d-flex justify-content-start my-2"> 
          <button class="btn px-4" style="background: #E9ECEF;">Save </button>
      </div>
      </form>
  </div>
</div>


@endsection