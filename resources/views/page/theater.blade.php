@extends('layouts.main')

@section('container')

<div class="row mt-3">
  <div class="col-4">
    <div class="input-group mb-3">
      <label for="cities" class="input-group-prepend">
        <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-geo-alt"></i></span>
      </label>
      <select id="cities" name="city" class="form-select" aria-label="Default select example">
          <option value="{{ $city['name'] }}" id="{{ $city['id'] }}"> {{ $city['name'] }}</option>
          @foreach ($cities as $cityy)
          @if ($city['id'] == $cityy['id'])
              <option value="{{$cityy['name']}}" id="{{$cityy['id']}}"> {{$cityy['name']}}</option>
          @endif
              <option value="{{$cityy['name']}}" id="{{$cityy['id']}}"> {{$cityy['name']}}</option>
          @endforeach
      </select>
    </div>
  </div>
  <div class="col-4">
    <div class="input-group mb-3 primary">
      <label for="type" class="input-group-prepend">
        <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-columns-gap"></i></span>
      </label>
      <select id="type" name="type" class="form-select" aria-label="Default select example">
        <option>Pilih Type</option>
        <option selected id="XXI" value="XXI">XXI</option>
        <option id="premiere" value="premiere">premiere</option>
        <option id="imax" value="imax">imax</option>
      </select>
    </div>
  </div>
  <div class="col-4">
    <div class="input-group mb-3">
      <label for="theater" class="input-group-prepend">
        <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-person-workspace"></i></span>
      </label>
      <select id="theater" name="theater" class="form-select" aria-label="Default select example">
          <option>Pilih Theaters</option>
          @foreach ($theaters['XXI'] as $theater)

          @if ($theater['id'] == 'BDGCIWL') {
            <option selected id="{{ $theater['id'] }}" >{{ $theater['name'] }}</option>
          }   

          @endif
            <option id="{{ $theater['id'] }}" >{{ $theater['name'] }}</option>
          @endforeach
      </select>
  </div>
  </div>
</div>

<div id="postmovie">
  <div class='row pt-3'>

    @foreach ($posts as $post)
      <div class='col col-sm-2 col-md-4 col-lg-3 mb-4 mt-4'>
        <a href='/movie/{{ $post['movie']['id'] }}' class='text-decoration-none text-black'>
            <div class='card mx-auto' style='height: 95%'>
            <img src='{{ $post['movie']['bannerUrl'] }}' alt=''>
                <div class='card-body'>
                <h6 class='card-title text-center '>{{ $post['movie']['title'] }}</h6>
                </div>
            </div>
        </a>
      </div>
    @endforeach
  </div> 
</div>

<script>
  
  $(document).ready(function(){
      $('#cities').on('change', function(){
          var $option = $(this).find('option:selected');
          var $city_id = $option.attr("id");
          $.ajax({
              type: "POST",
              url: "{{ route('order.cities') }}",
              data : {cityid: $city_id, _token: '{{csrf_token()}}'},
              success: function(data) {
                  console.log(data);
                  $('#type').empty();
                  
                  $.each(data, function(index, value){
                      $('#type').append("<option id="+value+" value="+value+">"+value+"</option>");
                  })
              },
              error: function (data, textStatus, errorThrown) {
                  console.log(data);
              },
          })
      }).trigger('change');
      $('#type').change(function() {
          var option = $(this).find('option:selected');
          var value = option.val();
          var id = $('#cities').find('option:selected').attr('id');

          $.ajax({
              type: "POST",
              url: "{{ route('order.theaters') }}",
              data: { type: value, city_id: id, _token: '{{csrf_token()}}' },
              success: function (data) {
                  $('#theater').empty();
                  $('#theater').append("<option>Theater</option>")
                  $.each(data, function(index, value){
                      var nama = value.name;
                      $('#theater').append("<option id="+value.id+" >"+value.name+"</option>");
                      $("#"+value.id).attr('value', value.name);
                  })
              },
              error: function (data, textStatus, errorThrown) {
                  console.log(data);
              },
          });
      });
      $('#theater').change(function(){
          var option = $(this).find('option:selected');
          var theater_id = option.attr("id");

          $.ajax({
              type: 'POST',
              url: "{{route('order.schedules')}}",
              data: {theater: theater_id, _token: '{{csrf_token()}}'},
              success: function(data){
                  $('#postmovie .row').empty();
                  $.each(data.schedules, function(index, value){
                      $('#postmovie .row').append("<div class='col col-sm-2 col-md-4 col-lg-3 mb-4 mt-4'><a href='#' class='text-decoration-none text-black'><div class='card mx-auto' style='height: 95%'><img src="+value.movie.bannerUrl+" alt=''><div class='card-body'><h6 class='card-title text-center '>"+value.movie.title+"</h6></div></div></a></div>")
                  })
              },
              error: function (data, textStatus, errorThrown) {
                  console.log(data);
              },
          })
      });

      $("#movie").bind("keypress click", function(){
          var value = $(this).val().toLowerCase();
          $('#list-movie li').filter(function(){
              $(this).toggle($(this).find('span').text().toLowerCase().indexOf(value) > -1)
          })
          $('.dropdown').removeClass( "invisible" );
          
      });

      $(document).on("click", ".opt-movie" , function() {
          var textMovie = $(this).find('span').text();
          $('#movie').val($(this).find('span').text())
          $(".label-tiket").text(textMovie);
          var theater = $('#theater').find('option:selected').attr('id');
          var movie = $(this).attr('id')
          $('input[name=id_movie]').val(movie)

          $.ajax({
              type: "POST",
              url: "{{ route('order.schedules.details') }}",
              data: { theater_id: theater, movie_id: movie, _token: '{{csrf_token()}}' },
              success: function (data) {
                  var dateDta = data.playTime[0].date;
                  var strDate = dateDta.split('2022').join('2022 ')
                  var word = strDate.split(' ')

                  $("#list-date").empty();

                  $.each(word, function(index, value){
                      if(index != word.length) {
                          $("#list-date").append("<li class='list-item-sc'>"+value+"</li>")
                      }
                  })
                  $('input[name=date]').val(word[0])
                  var txtdefault = $(".text-date p");
                  txtdefault.text(word[0]);
              },
              error: function (data, textStatus, errorThrown) {
                  console.log(data);
              },
          });
          
          $('.dropdown').addClass( "invisible" );
      });
  }); 
</script>

@endsection
