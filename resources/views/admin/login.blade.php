<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rooah! Guild - Axie Infinity Scholarship</title>
    <link rel="icon" type="image/x-icon" href="img/rooah-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap"
        rel="stylesheet">

    <!--Styles--->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!--Toastr--->
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

</head>

<body>
    <div class="header">
        <img class="mx-auto d-block logo" src="{{ asset('img/logo_rooah.png') }}" alt="">
        <h1 class="text-center rooah-heading">ROOAH! GUILD</h1>
        <p class="text-center axie-heading">Admin Login</p>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card shadow-sm p-5 login-box">
                        <form action="{{ route('login.admin') }}" method="POST">
                            @csrf
                            <input type="text" name="key" class="form-control mb-4" placeholder="Enter Security Key">
                            @error('key')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                            <button class="btn btn-primary d-block mx-auto" type="submit">Unlock</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <p class="text-center">Developed by <a href="https://rooah.com">Rooah!</a> with ❤</p>
        <p class="text-center">© Rooah! LLC, 2021</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}")
    </script>
    @endif

    {{-- toastr error --}}
    @if (Session::has('error'))
    <script>
        toastr.error("{!! Session::get('error') !!}")
    </script>
    @endif

    {{-- loop through errors and display on toastr --}}
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error("{!! $error !!}")
    </script>
    @endforeach
    </div>
    @endif


</body>

</html>