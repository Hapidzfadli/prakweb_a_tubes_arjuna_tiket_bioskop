<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark ">
  <div class="container">
    <a class="navbar-brand" href="#">
      <h3>Arjuna 21</h3>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="lg-collap collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' :  ''}}" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "upcoming") ? 'active' :  ''}}" aria-current="page" href="#">Upcoming</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "theaters") ? 'active' :  ''}}" aria-current="page" href="#">Theaters</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "playing") ? 'active' :  ''}}" aria-current="page" href="#">Playing</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "schedules") ? 'active' :  ''}}" aria-current="page" href="#">Schedules</a>
        </li>
      </ul>
      <form action="" class="d-flex" method="get">
        <input class="keyword form-control me-2" type="text" placeholder="search movie, theater ..." aria-label="Search" size="20" name="keyword" autocomplete="off">
        <button class="tombol-cari btn btn-outline-primary" type="submit" name="cari"><i class="fa fa-search"></i></button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-lg-50">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "login") ? 'active' :  ''}} fs-5" aria-current="page" href="#"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- akhir -->