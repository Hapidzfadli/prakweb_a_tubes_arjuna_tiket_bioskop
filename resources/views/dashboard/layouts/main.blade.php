<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container-admin">
        @include('dashboard.partials.navbar')
        <div class="main active">
            <div class="topbar sticky-top bg-white">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <label for="">
                        <input id="searchbar" type="text" placeholder="Search here..">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                    <div class="list-nav position-absolute w-100 d-none">
                        <ul class="list-unstyled bg-white rounded p-3">
                            @foreach ($listnav as $navtitle)
                                <li class="rounded">
                                    <a href="{{$navtitle['link']}}" class="text-decoration-none">
                                        <span class="icon"><ion-icon name={{$navtitle['icon']}}></ion-icon></span>
                                        <span class="title">{{$navtitle['title']}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="user p-2">
                    <div class="name px-2">
                        <p class="m-0 p-0">{{$auth->name}}</p>
                        <p  class="m-0 p-0">{{$auth->email}}</p>
                    </div>
                    <div class="img">
                        <img src="{{$auth->image}}" alt="">
                    </div>
                </div>
            </div>
            @yield('container')
        </div>
       
    </div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script src="/js/admin.js"></script>
</body>
</html>