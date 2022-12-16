
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ $title }}</title>
    <style>
      body {
      background-color: #0c111b;
      font-family: 'Poppins', sans-serif;
    }

    .card {
      width: 350px;
      background-color: #121926;
    }

    .card:hover {
    box-shadow: rgba(226, 226, 230, 0.2) 0px 7px 29px 0px;
}

    </style>
  </head>
  <body>
    <div class="container vh-100">
      <div class="row justify-content-center h-100">
        @if (session()->has('success'))
        
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          
        @endif

        @if (session()->has('loginError'))
        
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          
        @endif
        <div class="card my-auto">
          <div class="card-header text-center text-white">
            <h2>Halaman Login</h2>
            <hr class="text-white">
          </div>
          <div class="card-body">
            <form action="/login" method="post" class="text-white">
              @csrf
              <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus required value="{{ old('email') }}" placeholder="name@example.com">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control" name="password" id="password" required placeholder="Password" required>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                <label class="custom-control-label" for="remember">Remember Me</label>
              </div>
              <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                <hr>
              <button type="submit" class="btn btn-light w-100" name="submit">Login with Google</button>
            </form>
          </div>
          <p class="text-center text-white" style="font-size: 14px;">Belum memiliki akun? <a href="/register" style="text-decoration: none;">Register Sekarang!</a></p>
          <div class="card-footer text-center text-white">
            <small>&copy; 2022 Arjuna</small>
          </div>
        </div>
      </div>
    </div>
    <!-- login -->
  
  
  </body>
  </html>

  