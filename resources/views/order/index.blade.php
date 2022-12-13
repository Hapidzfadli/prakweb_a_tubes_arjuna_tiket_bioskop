@extends('layouts.main')

@section('container')
    <div class="p-4 " style="min-height: 100vh">
        <div class="order row py-3 px-1 rounded">
            <div class="col-lg-8">
                <form action="/pay" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="cities" class="input-group-prepend">
                          <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-geo-alt"></i></span>
                        </label>
                        <select id="cities" name="cities" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Kota</option>
                            @foreach ($cities as $city)
                                <option value="{{$city['name']}}" id="{{$city['id']}}"> {{$city['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label for="type" class="input-group-prepend">
                          <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-columns-gap"></i></span>
                        </label>
                        <select id="type" name="type" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Type</option>
                            
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label for="theater" class="input-group-prepend">
                          <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-person-workspace"></i></span>
                        </label>
                        <select id="theater" name="theater" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Theaters</option>
                        </select>
                    </div>
                    <hr>
                    <div class="input-group mb-3 position-relative" style="z-index: 100">
                        <label for="movie" class="input-group-prepend">
                          <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-film"></i></span>
                        </label>
                        <input type="search" id="movie" class="form-control" hint="off"  autocomplete="off" name="movie"  placeholder="Cari film.." required />
                        <div class="dropdown mt-2 invisible w-100">
                            <ul id="list-movie" class="p-2 w-100 bg-white rounded text-black list-unstyled position-absolute">
                            </ul>
                        </div>
                    </div>
                    <div class="input-grup mb-3">
                        <div id="schedules" class="row">
                            <div id="jadwal" class="col position-relative">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="rounded"><i class="bi bi-calendar-event"></i></span>
                                    </div>
                                    <div class="col position-absolute text-date" style="left: 29px">
                                        <p>00-00</p>
                                    </div>
                                </div>
                                
                                
                                <div class="dropdwn-sc invisible position-absolute top-0">
                                    <ul id="list-date" class="position-absolute rounded">
                                        <li class='list-item-sc'>00-00</li>
                                    </ul>
                                </div>
                            </div>
                            <div id="time-sl" class="col position-relative">
                                <div class="row">
                                    <div class="col-2"><span class="rounded"><i class="bi bi-alarm"></i></span></div>
                                    <div class="col">
                                        <select id="time" style="padding: 2px 4px;" name="time" class="form-select" aria-label="Default select example">
                                            <option selected>12:30</option>
                                            <option>13:00</option>
                                            <option>15:40</option>
                                            <option>16:10</option>
                                            <option>16:40</option>
                                            <option>19:10</option>
                                            <option>20:20</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div id="seat " class="col">
                                <span class="rounded"><i class="bi bi-grid"></i></span>
                                A32
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="rounded"><i class="bi bi-cash-coin"></i></span>
                                    </div>
                                    <div id="price" class="col">
                                        <p>35.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="date" name="date" type="hidden" value="">
                    <input id="seat" name="seat" type="hidden" value="A38">
                    <input id="price" name="price" type="hidden" value="35.000">

                    <button class="btn btn-dark" type="submit">submit</button>
                </form>
            </div>
            <div class="col-lg-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut ullam eius quos? Beatae molestias magni vel quo nam minima placeat sequi exercitationem, quibusdam itaque consequuntur qui quos neque non error.</div>
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
                        $('#type').append("<option>Type</option>")
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
                        $('#list-movie').empty();
                        $.each(data.schedules, function(index, value){
                            $('#list-movie').append("<li id="+value.movie.id+" class='opt-movie'><img src="+value.movie.bannerUrl+" alt='' width='30px' class='mr-3'><span class='my-auto'>"+value.movie.title+"</span></li>")
                        })
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(data);
                    },
                })
            });

            $('#time').change(function(){
                var option = $(this).find('option:selected');
                var text = option.text();
                var price = $("#price p");
                switch (text) {
                    case "12:30":
                        price.text("35.000")
                        $('input[name=price]').val("35.000");
                        break;
                    case "13:00":
                        price.text("35.000")
                        $('input[name=price]').val("35.000");
                        break;
                    case "15:40":
                        price.text("35.000")
                        $('input[name=price]').val("35.000");
                        break;
                    case "16:10":
                        price.text("40.000")
                        $('input[name=price]').val("40.000");
                        break;
                    case "16:40":
                        price.text("40.000")
                        $('input[name=price]').val("40.000");
                        break;
                    case "19:10":
                        price.text("45.000")
                        $('input[name=price]').val("45.000");
                        break;
                    case "20:20":
                        price.text("45.000")
                        $('input[name=price]').val("45.000");
                        break;
                    default:
                        price.text("35.000");
                        $('input[name=price]').val("35.000");
                }
            });
    
            $("#movie").bind("keypress click", function(){
                var value = $(this).val().toLowerCase();
                $('#list-movie li').filter(function(){
                    $(this).toggle($(this).find('span').text().toLowerCase().indexOf(value) > -1)
                })
                $('.dropdown').removeClass( "invisible" );
                
            });
            $("#jadwal span").on('click', function() {
                var txtdefault = $(".text-date p");
                var dropdown = $('.dropdwn-sc');
                var lifirst = $("#list-date li").first().text()

                if(dropdown.hasClass("invisible")) {
                    txtdefault.text("")
                } else {
                    txtdefault.text(lifirst)
                }
                $('.dropdwn-sc').toggleClass( "invisible" );
                
            })
            $("#time span").on('click', function(){
                $('.dropdwn-time').toggleClass( "invisible" );
            })
            $(document).on('click', ".list-item-sc", function(){
                var txtdefault = $(".text-date p");
                txtdefault.text($(this).text());

                $('input[name=date]').val($(this).text());
                
                $('.dropdwn-sc').addClass( "invisible" );
            });
            
    
            $(document).on("click", ".opt-movie" , function() {
                $('#movie').val($(this).find('span').text())
                var theater = $('#theater').find('option:selected').attr('id');
                var movie = $(this).attr('id')
    
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