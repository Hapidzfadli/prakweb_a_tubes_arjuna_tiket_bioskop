@extends('dashboard.layouts.main')

@section('container')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="search">
            <label for="">
                <input type="text" placeholder="Search here..">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>
        <div class="user">
            <img src="/img/user.png" alt="">
        </div>
    </div>

    <div class="card-statistic p-4">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">1,000</h2>
                        <div class="name-stats">Daily views</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">300</h2>
                        <div class="name-stats">Sales</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">100</h2>
                        <div class="name-stats">Users</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="number-stats">5,000,00</h2>
                        <div class="name-stats">Earning</div>
                    </div>
                    <div class="col-4 icon-stats">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection