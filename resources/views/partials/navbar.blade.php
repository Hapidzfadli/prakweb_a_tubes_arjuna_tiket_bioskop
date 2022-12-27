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
          <a class="nav-link {{ ($active === "upcoming") ? 'active' :  ''}}" aria-current="page" href="/upcoming">Upcoming</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "theaters") ? 'active' :  ''}}" aria-current="page" href="/theater">Theaters</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "order") ? 'active' :  ''}}" aria-current="page" href="/order">Buy Tiket</a>
        </li>
      </ul>
      </ul>
      <form action="/search" class="d-flex" method="get">
        <input id="searchnav" class="keyword form-control me-2" type="text" placeholder="search movie, theater ..." name="keyword" aria-label="Search" size="20" autocomplete="off">
        <button class="tombol-cari btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-lg-50">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "login") ? 'active' :  ''}} fs-5" aria-current="page" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  $(document).ready(function(){
    $('#searchnav').keyup(function() {
        var value = $(this).val().toLowerCase();
        var currUrl = window.location.pathname;
        $.ajax({
            type: "POST",
            url: "{{route('search')}}",
            data: { data: value, url: currUrl, _token: '{{csrf_token()}}' },
            success: function (data) {
              $('.cardindex').empty()
              if(currUrl == '/') {
                $.each(data, function(index, value){
                $('.cardindex').append("<div class='col col-sm-2 col-md-4 col-lg-3 mb-4 mt-4'><a href='/movie/"+value.id+"' class='text-decoration-none text-black'><div class='card mx-auto'  style='height: 95%'><img src='"+value.bannerUrl+"' alt=''><div class='card-body'><h6 class='card-title text-center'>"+value.title+"</h6></div></div></a></div>");
              });
              } else if( currUrl == '/upcoming' ) {
                $.each(data, function(index, value){
                $('.cardindex').append("<div class='col col-sm-2 col-md-4 col-lg-3 mb-4 mt-4'><a href='#' class='text-decoration-none text-black'><div class='card mx-auto'  style='height: 95%'><img src='"+value.bannerUrl+"' alt=''><div class='card-body'><h6 class='card-title text-center'>"+value.title+"</h6></div></div></a></div>")
              });
              }
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        });
    });
});
</script>
<!-- akhir -->