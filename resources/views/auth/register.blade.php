<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Laracamp</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('laracamp/css/bootstrap.min.css') }}">

    <!-- Custome MyCss -->
    <link rel="stylesheet" href="{{ asset('laracamp/mycss/style.css') }}">

  </head>
  <body class="body-auth">

    <div class="row m-0 h-100 content">
        

        <div class="col p-0 d-flex justify-content-center align-items-center content-left">
            <img src="{{ asset('laracamp/images/ill_login_new.png') }}" class="img-fluid">
        </div>

        
        <div class="col p-0 content-right">

            <div class="authentication">
                <a href="/">
                    <img src="{{ asset('laracamp/images/logo.png') }}" alt="Brand Logo" class="img-fluid">
                </a>
                <h2 class="start">Start Today</h2>
                <!-- <p class="desc-start">Because tomorrow become never</p> -->

                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="mb-3 inputan">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp">
                        @error('name')
                        <div id="name" class="form-text error invalid-feedback" role="alert">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 inputan">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" aria-describedby="emailHelp">
                        @error('username')
                        <div id="username" class="form-text error invalid-feedback" role="alert">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 inputan">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                        @error('email')
                        <div id="emailHelp" class="form-text error invalid-feedback" role="alert">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 inputan">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
                        @error('password')
                        <div id="password" class="form-text error invalid-feedback" role="alert">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 inputan">
                        <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword2" name="password_confirmation">
                        @error('password_confirmation')
                        <div id="password_confirmation" class="form-text error invalid-feedback" role="alert">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <div class="text-center mt-3" style="margin-bottom: 100px;">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
                

            </div>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('laracamp/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>