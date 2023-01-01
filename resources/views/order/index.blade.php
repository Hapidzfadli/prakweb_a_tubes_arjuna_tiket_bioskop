@extends('layouts.main')

@section('container')
    <div class="p-4 ordersmovie" style="min-height: 100vh">
        <div class="order row py-3 px-1 rounded">
            <div class="col-lg-8">
                <form action="/pay" method="POST" id="form-bayar">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="cities" class="input-group-prepend">
                          <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-geo-alt"></i></span>
                        </label>
                        <select id="cities" name="city" class="form-select" aria-label="Default select example">
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
                    <div id="schedules" class="row">
                        <div id="jadwal" class="col-lg-3 mt-2 col-6 position-relative">
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
                        <div id="time-sl" class="col-lg-3 mt-2 col-6 position-relative">
                            <div class="row">
                                <div class="col-2"><span class="rounded"><i class="bi bi-alarm"></i></span></div>
                                <div class="col">
                                    <select id="time" style="padding: 2px 4px;" name="time" class="form-select" autocomplete="off" aria-label="Default select example">
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

                        <div class="col-lg-3 mt-2 col-6">
                            <div class="row">
                                <div class="col-2">
                                    <span class="rounded"><i class="bi bi-grid"></i></span>
                                </div>
                                <div id="seat" class="col">
                                    <input type='text' class='text-white seat-i' name='seat[]' style='width: 30px; background-color:transparent; border: none;' value='A0' readonly='readonly'>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 mt-2 col-6">
                            <div class="row">
                                <div class="col-2">
                                    <span class="rounded"><i class="bi bi-cash-coin"></i></span>
                                </div>
                                <div id="price" class="col">
                                    <p>00.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="date" name="date" type="hidden" value="" required>
                    <input id="price" name="price" type="hidden" value="" required>
                    <input type="hidden" name="total_price" value="" required>
                    <input type="hidden" name="id_movie" value="" required>

                    <hr>
                    <div id="jumlah" class="row">
                        
                        <div class="col-6 col-lg-3 mb-3 tiket">
                            <p class="fs-5">Jumlah tiket</p>
                            <span id="kurang" class="rounded">
                                <i class="bi bi-dash-circle"></i>
                            </span>
                            <input type="text" id="jml_tiket" autocomplete="off" name="jml_tiket" style="width: 50px; text-align: center;" class="mx-3" value="0" readonly="readonly">
                            <span id="tambah" class="rounded">
                                <i class="bi bi-plus-circle"></i>
                            </span>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="show-seat">
                                <div class="row">
                                    <div class="col-12 col-lg-3 mt-2">
                                        @php
                                            $ABC = ['A', 'B', 'C', 'D', 'E', 'F'];
                                        @endphp
                                        @for ($i = 0; $i < count($ABC); $i++)
                                           @for ($j = 1; $j <= 4; $j++)
                                                <span>{{$ABC[$i]}}{{$j}}</span>
                                           @endfor
                                        @endfor
                                    </div>
                                    <div class="col-12 col-lg-5 mt-2">
                                        @for ($i = 0; $i < count($ABC); $i++)
                                           @for ($j = 5; $j < 12; $j++)
                                                <span>{{$ABC[$i]}}{{$j}}</span>
                                           @endfor
                                        @endfor
                                    </div>
                                    <div class="col-12 col-lg-3 mt-2">
                                        @for ($i = 0; $i < count($ABC); $i++)
                                           @for ($j = 12; $j < 16; $j++)
                                                <span>{{$ABC[$i]}}{{$j}}</span>
                                           @endfor
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="submitform" class="btn btn-dark invisible" type="submit">submit</button>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="total">
                    <h4>Tambah Tiket</h4>
                    <div class="row">
                        <div class="col-9">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tiket-movie" value="" id="tiket-movie" checked>
                                <label class="form-check-label" style="font-size: 0.9rem"  for="tiket-movie">
                                  <span class="label-tiket">Title</span> | <span class="jml-tiket">0</span>
                                </label>
                            </div>
                        </div>
                        <div class="col price-t">
                            <p>00.00</p>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="row">
                        <p style="color: rgb(228, 220, 220)" >Pajak dan Biaya Tambahan</p>
                        <div class="col-9">
                            <p>PPN 11%</p>
                        </div>
                        <div class="col">
                            <p class="ppn">00.00</p>
                        </div>
                    </div>
                    <hr style="margin: 0">
                    <div class="row mt-2">
                        <div class="col-9">
                            <p>Total</p>
                        </div>
                        <div class="col">
                            <p class="price-total">00.00</p>
                        </div>
                    </div>

                </div>
                <div class="col-12" style="display: grid">
                    <button id="btn-bayar" type="button" class="btn btn-secondary w-100 rounded mx-auto">Lanjutkan</button>
                </div>
                <div class="my-5"></div>
                <div data-v-cbcc5384="" style="" class="col-12">
                    <p data-v-cbcc5384="">Transaksi makin mudah dengan metode pembayaran terlengkap!</p> 
                    <div data-v-cbcc5384="" class="summary-cart metode mt-3">
                        <div data-v-cbcc5384="" class="d-flex mb-3">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/bca.svg" alt="bca" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/mandiri.svg" alt="mandiri" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/bri.svg" alt="bri" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/bni.svg" alt="bni" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/qris.svg" alt="qris" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/gopay.svg" alt="gopay" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/ovo.svg" alt="ovo" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/linkaja.svg" alt="linkaja" class="lazyload m-auto" width="36" height="16">
                        </div> 
                        <div data-v-cbcc5384="" class="d-flex">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/dana.svg" alt="dana" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/shopeepay.svg" alt="shopeepay" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/indomaret.svg" alt="indomaret" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/alfamart.svg" alt="alfamart" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/visa.svg" alt="visa" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/master-card.svg" alt="master-card" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/jcb.svg" alt="jcb" class="lazyload m-auto" width="36" height="16">
                            <img data-v-cbcc5384="" src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/paypal.svg" alt="paypal" class="lazyload m-auto" width="36" height="16">
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0]=parts[0].replace(/\B(?=(\d{3})+(?!\d))/g,".");
        return parts.join(",");
        }

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
                var jml_tiket = $('#jml_tiket');
                var value = parseInt(jml_tiket.val())
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

                var textPrice = price.text().split('.').join('');
                var priceTotal = parseFloat(textPrice) * value;
                
                $(".price-t").text(numberWithCommas(priceTotal)) 
                var ppn = (priceTotal / 100) * 11;
                $('.ppn').text(numberWithCommas(ppn)) 

                var totalBayar = priceTotal + ppn;
                $('.price-total').text(numberWithCommas(totalBayar))
                $('input[name=total_price]').val(totalBayar)
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

            $("#kurang").on('click', function(){
                var jml_tiket = $('#jml_tiket');
                var value = parseInt(jml_tiket.val())
                var classrm = ".id-ch" + jml_tiket.val();
                var seat = $("#seat");
                var price = $("#price p");
                if(value > 0) {
                    value--
                    jml_tiket.val(value)
                    seat.children('input').last().remove()
                    
                    var textPrice = price.text().split('.').join('');
                    var priceTotal = parseFloat(textPrice) * value;
                    
                    $(".price-t").text(numberWithCommas(priceTotal)) 
                    var ppn = (priceTotal / 100) * 11;
                    $('.ppn').text(numberWithCommas(ppn)) 

                    var totalBayar = priceTotal + ppn;
                    $('.price-total').text(numberWithCommas(totalBayar))
                    $('input[name=total_price]').val(totalBayar)
                }
            });

             
            $("#tambah").on('click', function(){
                var jml_tiket = $('#jml_tiket');
                var value = parseInt(jml_tiket.val());
                var price = $("#price p");
                var seat = $("#seat");
                var time = $("#time").find('option:selected').text()

                if(time == "12:30") {
                    price.text("35.000")
                    $('input[name=price]').val("35.000");
                } 
                
                value++
                jml_tiket.val(value)
                $(".jml-tiket").text(value)

                var textPrice = price.text().split('.').join('');

                var priceTotal = parseFloat(textPrice) * value;
                $(".price-t").text(numberWithCommas(priceTotal)) 

                var ppn = (priceTotal / 100) * 11;
                $('.ppn').text(numberWithCommas(ppn)) 

                var totalBayar = priceTotal + ppn;
                $('.price-total').text(numberWithCommas(totalBayar))
                $('input[name=total_price]').val(totalBayar)

                var lengtseat = seat.children('input').length;

                if(lengtseat < jml_tiket.val()) {
                    seat.append("<input type='text' class='text-white' name='seat[]' style='width: 30px; background-color:transparent; border: none;' value='A"+jml_tiket.val()+"' readonly='readonly'>");
                }
            });

            $(".show-seat span").on('click', function(){

                var seat = $("#seat");
                var jml_tiket = $('#jml_tiket').val();
                var lengtseat = seat.children('input').length;
                
                if(lengtseat < jml_tiket) {
                    seat.append("<input type='text' class='text-white' name='seat[]' style='width: 30px; background-color:transparent; border: none;' value='"+$(this).text()+"' readonly='readonly'>")
                } else {
                    seat.children('input').last().val($(this).text());
                }
            })

            $('#btn-bayar').on('click', function(){
                $("#submitform").click()
            })
            $(document).on('click', ".list-item-sc", function(){
                var txtdefault = $(".text-date p");
                txtdefault.text($(this).text());
                $('input[name=date]').val($(this).text());
                $('.dropdwn-sc').addClass( "invisible" );
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