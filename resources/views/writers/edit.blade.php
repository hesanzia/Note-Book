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
    <link rel="icon" href="{{asset('assets/img/favicon.ico')}}">
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
                <form action="{{route('search')}}" method="get">
                    <div class="input-group input-navbar">
                        <input type="search" class="form-control" placeholder="جستجو کنید" aria-label="Search" aria-describedby="icon-addon1" name="search" id="search">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                        </div>
                    </div>
                </form>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>

<div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/background1.jpg); font-family: IRANSans">
    <div class="hero-section">
        <div class="container text-center wow zoomIn">
            <span class="subhead">آنلاین کتاب بخوانیم</span>
            <h1 class="display-4">دفترچه</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12" style="margin-bottom: 50px;margin-top: 50px;font-family: IRANSans;direction: rtl;text-align: right">
        <div class="container">
            <form method="post" action="{{ route('writers.update',$writer->id) }}">
                @csrf
                @method('put')
                <div class="">
                    <div class="form-group">
                        <label for="name">نام نویسنده</label>
                        <input type="text" name="name" id="name" class="form-control"/>
                        @error('name')
                        <p class="text-sm text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nationality">ملیت</label>
                        <input type="text" name="nationality" id="nationality" class="form-control"/>
                        @error('nationality')
                        <p class="text-sm text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات</label>
                        <textarea name="description" id="description" rows="4" class="form-control"></textarea>
                        @error('description')
                        <p class="text-sm text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="profile">آپلود عکس پروفایل</label>
                        <input type="file" name="profile" id="profile" class="form-control-file"/>
                        @error('profile')
                        <p class="text-sm text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 5px"> ویرایش </button></a>
                </div>
            </form>
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
