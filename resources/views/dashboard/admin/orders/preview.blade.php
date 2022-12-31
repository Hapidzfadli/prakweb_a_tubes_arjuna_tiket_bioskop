<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="icon" type="image/x-icon" href="/img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="details row px-4 gap-3 position-relative mt-2">
        @if (session()->has('messege'))
              <div style="left: 50%;
              transform: translateX(-50%); z-index: 100 !important; position: absolute;" class="w-50 top-0 z-30 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('messege') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> 
            @endif
            <div class="recentOrders col-12 p-3" style="min-height: calc(100vh - 60px);">
                <div class="cardHeader row">
                    <div class="d-flex align-items-center col-12 col-lg-8 col-md-8">
                        <img src="/img/logo.jpg" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                        <div class="ms-3">
                            <p class="fw-bold mb-0">Arjuna21</p>
                            <p class="text-muted mb-0">billing@mail.arjuna-mc.site</p>
                        </div>
                    </div>
                    <p class="text-muted mb-0 col mt-2">Jl. Gegerkalong Tengah No.6F, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153</p>
                </div>
    
                <div class="d-flex row invoice mt-3 justify-content-between purple-gradient color-block z-depth-1">
                    <div class="col-lg-4 col-12 p-3">
                        <p class="fw-bolder mb-0">Invoice Number</p>
                        <p class="fw-normal mb-0">{{$detail->order_id}}</p>
                        <p class="fw-normal mb-0">Issued Date: <span class="fw-bolder">{{$detail->created_at->format('d M, Y')}}</span></p>
                        <p class="fw-normal mb-0">Due Date: <span class="fw-bolder">{{date('d M, Y', strtotime("+1 day", strtotime($detail->created_at)))}}</span></p>
                    </div>
                    <div class="col-lg-4 col-12 p-3">
                        <p class="fw-bolder mb-0">Billed to</p>
                        <p class="fw-normal mb-0">{{$detail->user->name}}</p>
                        <p class="fw-normal mb-0">{{$detail->user->address}}</p>
                    </div>
                    
                </div>
                <div class="item-detail mt-3">
                    <p class="fw-bold mb-0">Item Detail</p>
                    <div class="table-order overflow-auto mt-2">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>Invoice</th>
                                    <th>Movie</th>
                                    <th>Date Time</th>
                                    <th>Price</th>
                                    <th>Tickets</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="fw-normal mb-1">#{{$detail->order_id}}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{$detail->movie}}</p>
                                        <p class="text-muted mb-0">{{$detail->theater}}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{$detail->date}}</p>
                                        <p class="text-muted mb-0">{{$detail->time}}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">RP. {{number_format($price, 0, '.', '.');}}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{$detail->jml_tiket}} Tickets</p>
                                    </td>
                                </tr>   
                            </tbody>
                        </table>
        
                    </div>
                </div>
                <div class="total-amount row mt-4">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bolder mb-0">Sub Total</p>
                            </div>
                            <div class="col-6">
                                <p class="fw-normal mb-0">RP. {{number_format($price, 0, '.', '.');}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bolder mb-0">PPN</p>
                            </div>
                            <div class="col-6">
                                <p class="fw-normal mb-0">RP. {{number_format($ppn, 0, '.', '.');}}</p>
                            </div>
                        </div>
                        <hr style="color: rgb(179, 176, 176)">
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bolder mb-0">Total Amount</p>
                            </div>
                            <div class="col-6">
                                <p class="fw-normal mb-0">RP. {{number_format($detail->total_price, 0, '.', '.');}}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-2 col-md-4">
                        <a href="" class="text-decoration-none">
                            <p class="py-2 px-3 my-1 btn-info btn text-center w-100" style="color: white; border-radius: 20px; cursor: pointer;">Download</p>
                        </a>
                    </div>
                </div>
            </div>
    </div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script src="/js/admin.js"></script>
</body>
</html>