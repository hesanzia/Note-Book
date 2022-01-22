<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>دفترچه - صفحه نخست</title>

    <link rel="stylesheet" href="{{asset('assets/css/maicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <link rel="icon" href="assets/img/favicon.ico">
</head>
<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

<header style="font-family: IRANSans">
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="direction: rtl;text-align: right;">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><h2>دفترچه</h2></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">خانه</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('translators.index')}}">مترجمان</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('publishers.index')}}">انتشارات</a>
                    </li>
                    <li class="nav-item active">
                        @if(Auth::guest())
                            <a class="nav-link" href="register">نام نویسی | ورود</a>
                        @else
                            <a class="nav-link" href="{{route('panel')}}"> پنل کاربری - {{ Auth::user()->name }}  </a>
                        @endif
                    </li>
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>

<div class="container" style="margin-top: 5px; margin-bottom: 50px;direction: rtl;font-family: IRANSans">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 100px">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">نام کاربری</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">گذرواژه</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تایید گذرواژه</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-9 offset-md-4" style="margin-right: 40px">
                                <button type="submit" class="btn btn-primary">
                                    نام نویسی
                                </button>
                                <a class="btn" href="{{ route('login') }}">
                                    هم اکنون نام نویسی کرده اید؟
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="page-footer" style="font-family: IRANSans;direction: rtl;text-align: right">
    <div class="container">
        <div class="row px-md-3">
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>دفترچه</h5>
                <ul class="footer-menu" style="">
                    <li><a href="{{route('home')}}">کتاب ها</a></li>
                    <li><a href="{{route('home')}}">نویسندگان</a></li>
                    <li><a href="{{route('translators.index')}}">مترجمان</a></li>
                    <li><a href="{{route('publishers.index')}}">انتشارات</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>تماس با ما</h5>
                <p class="footer-link mt-2">ایران، تهران، پاسداران</p>
                <a href="#" class="footer-link">09107194652</a>
                <a href="#" class="footer-link">amir.eb@gmail.com</a>
            </div>
        </div>
        <hr>
    </div>
</footer>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('assets/js/theme.js')}}"></script>

</body>
</html>
