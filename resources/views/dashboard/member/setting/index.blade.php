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
    
    <div class="recentCustomer col p-3 ">
        <div class="cardHeader d-flex justify-content-between">
            <h5>Edit Profile</h5>
        </div>
        <div class="d-flex justify-content-center my-3 bg-light bg-gradient">
            <div class="avatar p-4">
                <img src="/{{$auth->image}}" class="rounded-circle shadow-4"
                style="width: 150px;" alt="Avatar" />
            </div>
        </div>
        <hr>
        <form action="/dashboard/customers/" enctype="multipart/form-data" method="POST">
            @method('put')
            @csrf
            <div class="row">

                {{-- nama --}}
                <div class="col-lg-6 col-12">
                    <div class="input-group mb-3 position-relative" style="z-index: 100">
                        <label for="name" class="input-group-prepend">
                            <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="person-circle-outline" style="height: 100%; width 100%;"></ion-icon></span>
                        </label>
                        <input type="text" id="name" class="form-control" hint="off"  autocomplete="off" name="name"  placeholder="Name" value="{{ $auth->name }}" required />
                    </div>
                </div>

                {{-- email --}}
                <div class="col-12 col-lg-6 ">
                    <div class="input-group mb-3 position-relative" style="z-index: 100">
                        <label for="email" class="input-group-prepend">
                            <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="mail-outline"></ion-icon></span>
                        </label>
                        <input type="text" id="email" class="form-control" hint="off"  autocomplete="off" name="email" value="{{ $auth->email }}"  placeholder="Email" required />
                    </div>
                </div>

                {{-- username --}}
                <div class="col-12 col-lg-6 ">
                    <div class="input-group mb-3 position-relative" style="z-index: 100">
                        <label for="username" class="input-group-prepend">
                            <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="finger-print-outline"></ion-icon></span>
                        </label>
                        <input type="text" id="username" class="form-control" hint="off"  autocomplete="off" name="username" value="{{ $auth->username }}"  placeholder="Username" required />
                    </div>
                </div>
                
                {{-- no_telepon --}}
                <div class="col-12 col-lg-6 ">
                    <div class="input-group mb-3 position-relative" style="z-index: 100">
                        <label for="no_telphone" class="input-group-prepend">
                            <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="call-outline"></ion-icon></span>
                        </label>
                        <input type="text" id="no_telphone" class="form-control" hint="off"  autocomplete="off" name="no_telphone" value="{{ $auth->no_telphone }}"  placeholder="Phone Number" required />
                    </div>
                </div>

                {{-- alamat --}}
                <div class="col-12 col-lg-6 ">
                    <div class="input-group mb-3 position-relative" style="z-index: 100">
                        <label for="address" class="input-group-prepend">
                            <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="location-outline"></ion-icon></span>
                        </label>
                        <textarea type="text" id="address" class="form-control" hint="off"  autocomplete="off" name="address" value="{{ $auth->address }}"  placeholder="Address" required />{{ $auth->address }}</textarea>
                    </div>
                </div>

                {{-- gambar --}}
                <div class="col-12 col-lg-6 ">
                    <div class="input-group mb-3 position-relative" style="z-index: 100">
                        <label for="image" class="input-group-prepend">
                            <span style="height: 100%; width 100%;" class="input-group-text rounded-0" id="basic-addon1"><ion-icon name="camera-outline"></ion-icon></span>
                        </label>
                        <input type="file" id="image" class="form-control" name="image" />
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end my-2"> 
                <button class="btn px-4" style="background: #E9ECEF;">Save </button>
            </div>
            
        </form>
    </div>
</div>

@endsection