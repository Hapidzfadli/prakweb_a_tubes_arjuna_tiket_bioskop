@extends('layouts.main')
@section('container')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
    <div class="p-4 " style="min-height: 100vh">
        <div class="order row py-3 px-1 rounded">
            <div class="col-lg-8" style="margin-bottom: 30px">
				<div class="row">
					<div class="col-3">
						<div class="img-movie">
							<img src="{{$movie['bannerUrl']}}" alt="" width="100%">
						</div>
					</div>
					<div class="col">
						<div class="title-movie">
							<h4 style="margin: 0;">{{$movie['title']}}</h4>
							<p style="color: rgba(128, 128, 128, 0.738);margin: 0;">#{{$tiket->order_id}}</p>
							<hr class="my-1">
							<p style="font-size: 0.8rem">{{substr_replace($movie['description'], "...", 150);}}</p>
						</div>
						<div class="grid" style="font-size: 0.9rem">
							
							<div class="location">
								<span><i class="bi bi-geo-alt"></i></span>
								<span class="mx-1">{{$tiket->cities}}, {{$tiket->theater}}</span>
							</div>
							<div class="total-tiket">
								<span><i class="bi bi-ticket-detailed"></i></span>
								<span class="mx-1">{{$tiket['jumlah-tiket']}} Tiket</span>
							</div>
							<div class="date">
								<span><i class="bi bi-calendar-check"></i></span>
								<span class="mx-1">{{$tiket['date']}}</span>
							</div>
							<div class="time">
								<span><i class="bi bi-alarm"></i></span>
								<span class="mx-1">{{$tiket['time']}}</span>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="col-lg-4">
                <div class="total">
                    <h4>Tiket</h4>
                    <div class="row">
                        <div class="col-9">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tiket-movie" value="" id="tiket-movie" checked>
                                <label class="form-check-label" style="font-size: 0.9rem"  for="tiket-movie">
                                  <span class="label-tiket">{{$tiket->movie}}</span> | <span class="jml-tiket">{{$tiket['jumlah-tiket']}}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col price-t">
                            <p>{{number_format($tiket['total-price'], 0, '.', '.');}}</p>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="row mt-2">
                        <div class="col-9">
                            <p>Total</p>
                        </div>
                        <div class="col">
                            <p class="price-total">{{number_format($tiket['total-price'], 0, '.', '.');}}</p>
                        </div>
                    </div>

                </div>
                <div class="col-12" style="display: grid">
                    <button id="btn-bayar" type="button" class="btn btn-secondary w-100 rounded mx-auto">Bayar</button>
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
	<script type="text/javascript">
		var payButton = document.getElementById('btn-bayar');
		payButton.addEventListener('click', function () {
		  snap.pay('{{$snap}}');
		});
	  </script>

@endsection