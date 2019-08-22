<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" type="text/css">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        #home-search {
            font-size: 1.3rem;
            border-radius: 10rem;
            padding: 1.8rem 1rem;
        }

        .input-group-append {
            margin-left: -48px;
        }

        #click {
            border-radius: 0px 50px 50px 0px;
            z-index: 111;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/admin') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                <svg id="ae9a0706-d2c6-4063-905e-123e81e16a38" style="max-width:100px;" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 139.04 153.63"><defs><style>.ee274e71-3c40-4498-abbd-362208878724{fill:#f8b916;}.f668f8f8-fc0d-48d2-aef6-4ab6167e8f97{fill:#393628;}</style></defs><title>Untitled-1</title><path class="ee274e71-3c40-4498-abbd-362208878724" d="M796.18,725.12c0,10.77.08,19.31,0,27.84-.11,8.72-3.88,15.63-11.34,20Q761.54,786.8,738,800.07a21.93,21.93,0,0,1-22.51,0Q691.89,786.8,668.6,773c-7.45-4.42-11.32-11.29-11.36-20q-.13-26.64,0-53.29c0-8.71,3.92-15.6,11.38-20q23.28-13.79,46.86-27.06a21.93,21.93,0,0,1,22.5,0q23.56,13.29,46.85,27.07a21.44,21.44,0,0,1,10.88,17.12C796.74,707,795.67,717.2,796.18,725.12Zm-5.61,1.56h0V700.49q0-11-9.45-16.46-22.27-12.88-44.56-25.75c-6.62-3.83-13.16-3.79-19.77.05-14.84,8.61-29.71,17.15-44.55,25.75a17.65,17.65,0,0,0-9.38,16.2c0,17.37,0,34.73,0,52.1,0,7.35,3.16,12.72,9.44,16.36q22.28,12.88,44.55,25.75c6.62,3.84,13.16,3.85,19.78,0q22.26-12.91,44.55-25.76c6.31-3.65,9.46-9.16,9.45-16.46Z" transform="translate(-657.17 -649.55)"/><path class="f668f8f8-fc0d-48d2-aef6-4ab6167e8f97" d="M790.57,726.68v25.61c0,7.3-3.14,12.81-9.45,16.46q-22.26,12.9-44.55,25.76c-6.62,3.83-13.16,3.82-19.78,0q-22.24-12.91-44.55-25.75c-6.28-3.64-9.47-9-9.44-16.36.07-17.37,0-34.73,0-52.1a17.65,17.65,0,0,1,9.38-16.2c14.84-8.6,29.71-17.14,44.55-25.75,6.61-3.84,13.15-3.88,19.77-.05Q758.8,671.18,781.1,684q9.46,5.47,9.45,16.46v26.19Zm-75.09-20.92c-6-2.49-11.87-4-18-3.5-7.47.62-13.67,3.56-16.82,10.86-3.78,8.76,1.45,18.39,11.68,21.39,8.71,2.56,16.65.15,24.12-4.4,5.06-3.07,9.46-7,14-10.72,4.26-3.48,8.53-6.95,13.59-9.22,5.26-2.37,10.68-3.36,16.28-1.33,5.1,1.85,8.33,6.13,8.05,10.46-.3,4.52-4.32,8.85-9.44,10-6.93,1.54-13.42.59-19.16-3.81-1.61-1.23-3-1.51-4.29.14s-.38,3.19,1,4.28c2.44,1.89,3.33,4.51,3.75,7.36,1.48,10.15-3.09,17.55-10.66,23.7-2.13,1.72-3.78,2-5.81.06-1.75-1.64-5.38-3.14-4.82-4.91.72-2.29,4.29-2.56,7-2.66,2-.08,3.63-.86,3.47-3.07s-1.89-2.77-3.88-2.59a20.66,20.66,0,0,0-8.95,2.65c-.54.32-1.25,1.14-1.8.49a9.18,9.18,0,0,1-1.71-4.62c-.24-1.44.82-1.84,1.76-2.35a24,24,0,0,1,11.29-2.83c2,0,3.35-.89,3.3-2.91s-1.59-2.73-3.5-2.67a29,29,0,0,0-15.1,4.24c-3.78,2.38-4.21,3.35-3.23,7.8,2.19,10,9.25,16,17.64,20.88a3.4,3.4,0,0,0,3.36-.2,31.32,31.32,0,0,0,17.22-31.79c-.23-1.79.13-2,1.77-1.64a23.2,23.2,0,0,0,17.94-2.5c9.6-5.7,11.35-17,3.64-24.44a20.13,20.13,0,0,0-13.23-5.66c-8.25-.51-15.41,2.52-21.86,7.28-5.13,3.77-10,7.93-15,11.87-4.19,3.29-8.6,6.21-13.8,7.65-5.76,1.6-11.31,1.36-16.22-2.45-4.75-3.68-5.33-9.33-1.6-14a12.8,12.8,0,0,1,8.3-4.46c7.19-1.17,13.78.87,20.08,4.16,3.64,1.9,5.27.93,5.33-3.24,0-2.06.05-4.12,0-6.18-.05-2.82.83-5,3.75-5.93s5.24.17,7,3.28c.89,1.57,2,2.44,3.81,1.65a2.55,2.55,0,0,0,1.36-3.7,5,5,0,0,1,.36-5.92c.84-1.22.34-2.49-.76-3.38s-2.82-1-3.41.12c-1.46,2.9-3.62,2.56-6.09,2.09a5.7,5.7,0,0,0-2.9.19c-1.57.56-2.54.29-3.34-1.24-.9-1.7-2.37-2.46-4.14-1.26s-1.48,2.77-.52,4.4c.47.81,1.47,1.66.91,2.64C715.51,698.83,715.47,702.13,715.48,705.76Z" transform="translate(-657.17 -649.55)"/><path class="ee274e71-3c40-4498-abbd-362208878724" d="M715.48,705.76c0-3.63,0-6.93,1.75-9.94.56-1-.44-1.83-.91-2.64-1-1.63-1.24-3.21.52-4.4s3.24-.44,4.14,1.26c.8,1.53,1.77,1.8,3.34,1.24a5.7,5.7,0,0,1,2.9-.19c2.47.47,4.63.81,6.09-2.09.59-1.17,2.26-1,3.41-.12s1.6,2.16.76,3.38a5,5,0,0,0-.36,5.92,2.55,2.55,0,0,1-1.36,3.7c-1.8.79-2.92-.08-3.81-1.65-1.77-3.11-4.05-4.17-7-3.28s-3.8,3.11-3.75,5.93c0,2.06,0,4.12,0,6.18-.06,4.17-1.69,5.14-5.33,3.24-6.3-3.29-12.89-5.33-20.08-4.16a12.8,12.8,0,0,0-8.3,4.46c-3.73,4.65-3.15,10.3,1.6,14,4.91,3.81,10.46,4,16.22,2.45,5.2-1.44,9.61-4.36,13.8-7.65,5-3.94,9.86-8.1,15-11.87,6.45-4.76,13.61-7.79,21.86-7.28a20.13,20.13,0,0,1,13.23,5.66c7.71,7.46,6,18.74-3.64,24.44a23.2,23.2,0,0,1-17.94,2.5c-1.64-.39-2-.15-1.77,1.64a31.32,31.32,0,0,1-17.22,31.79,3.4,3.4,0,0,1-3.36.2c-8.39-4.84-15.45-10.83-17.64-20.88-1-4.45-.55-5.42,3.23-7.8a29,29,0,0,1,15.1-4.24c1.91-.06,3.45.6,3.5,2.67s-1.34,2.88-3.3,2.91A24,24,0,0,0,714.84,744c-.94.51-2,.91-1.76,2.35a9.18,9.18,0,0,0,1.71,4.62c.55.65,1.26-.17,1.8-.49a20.66,20.66,0,0,1,8.95-2.65c2-.18,3.72.39,3.88,2.59s-1.44,3-3.47,3.07c-2.7.1-6.27.37-7,2.66-.56,1.77,3.07,3.27,4.82,4.91,2,1.9,3.68,1.66,5.81-.06,7.57-6.15,12.14-13.55,10.66-23.7-.42-2.85-1.31-5.47-3.75-7.36-1.41-1.09-2.3-2.6-1-4.28s2.68-1.37,4.29-.14c5.74,4.4,12.23,5.35,19.16,3.81,5.12-1.13,9.14-5.46,9.44-10,.28-4.33-3-8.61-8.05-10.46-5.6-2-11-1-16.28,1.33-5.06,2.27-9.33,5.74-13.59,9.22-4.55,3.73-9,7.65-14,10.72-7.47,4.55-15.41,7-24.12,4.4-10.23-3-15.46-12.63-11.68-21.39,3.15-7.3,9.35-10.24,16.82-10.86C703.61,701.74,709.49,703.27,715.48,705.76Z" transform="translate(-657.17 -649.55)"/></svg>

                tnafos
            </div>

            <div class="content">
                <div class="col-md-12">
                    <div class="form-group">
                        <form action="{{route('search')}}" method="get">
                            {{-- @csrf --}}
                            <div class="input-group">
                                <input type="text" class="form-control form-control-user" id="home-search"
                                    placeholder="Search for..." aria-label="Search" name="query">
                                <div class="input-group-append">
                                    <button class="btn btn-warning" id="click" type="submit">
                                        <i class="fas fa-search fa-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="links">
                <a href="https://laravel.com/docs">Categoryies</a>
                <a href="https://laracasts.com">Products</a>
                <a href="https://laravel-news.com">Services</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
            <div class="position-absolute fixed-bottom bg-warning">
                <br>
                <h3 class="text-gray-100">B2B products and services serach engine</h3>
            </div>

        </div>

    </div>

    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>


</html>
