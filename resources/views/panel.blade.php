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
                    <li class="nav-item active dropdown" style="font-family: IRANSans;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            پنل کاربری -  {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="text-align: right;direction: rtl" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                خارج شدن
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
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

<div class="container">
    <div class="col-lg-12" style="margin-top: 50px;font-family: IRANSans;direction: rtl;text-align: right;">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2">
                <ul class="nav nav-tabs" style="font-family: IRANSans;">
                    @can('admin')
                        <li class="nav-item active">
                            <a href="" data-target="#users" data-toggle="tab" class="nav-link" style="text-decoration: none">کاربران</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#writers" data-toggle="tab" class="nav-link" style="text-decoration: none">نویسندگان</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#translators" data-toggle="tab" class="nav-link" style="text-decoration: none">مترجمان</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#publishers" data-toggle="tab" class="nav-link" style="text-decoration: none">انتشارات</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#books" data-toggle="tab" class="nav-link" style="text-decoration: none">کتاب ها</a>
                        </li>
                    @endcan
                </ul>
                @can('admin')
                    <div class="col-lg-12">
                        <div class="tab-content py-4">

                            <div class="tab-pane active" id="users">
                                <div class="col-md-12">
                                    <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> مدیریت کاربران</h5>
                                    <table class="table table-sm table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">شناسه</th>
                                            <th scope="col">نام کاربری</th>
                                            <th scope="col">ایمیل</th>
                                            <th scope="col">نقش</th>
                                            <th scope="col">ویرایش</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        {{ $role->title }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                        <button class="btn btn-sm btn-link text-uppercase">ویرایش</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="writers">
                                <div class="col-md-12">
                                    <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>مدیریت نویسندگان</h5>
                                    <a href="{{route('writers.create')}}"><button type="submit" class="btn btn-primary" style="margin-bottom: 10px">افزودن</button></a>
                                    <table class="table table-sm table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">شناسه</th>
                                            <th scope="col">نام</th>
                                            <th scope="col">ملیت</th>
                                            <th scope="col">ویرایش</th>
                                            <th scope="col">پاک کردن</th>
                                        </tr>
                                        </thead>
                                        @foreach($writers as $writer)
                                            <tbody>

                                            <tr>
                                                <td>{{$writer->id}}</td>
                                                <td>{{$writer->name}}</td>
                                                <td>{{$writer->nationality}}</td>
                                                <td>
                                                    <a href="{{ route('writers.edit', $writer->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                        <button class="btn btn-sm btn-link text-uppercase">ویرایش</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form class="inline-block" action="{{route('writers.destroy', $writer->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="پاک کردن">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="translators">
                                <div class="col-md-12">
                                    <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>مدیریت مترجمان</h5>
                                    <a href="{{route('translators.create')}}"><button type="submit" class="btn btn-primary" style="margin-bottom: 10px">افزودن</button></a>
                                    <table class="table table-sm table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">شناسه</th>
                                            <th scope="col">نام</th>
                                            <th scope="col">ویرایش</th>
                                            <th scope="col">پاک کردن</th>
                                        </tr>
                                        </thead>
                                        @foreach($translators as $translator)
                                            <tbody>

                                            <tr>
                                                <td>{{$translator->id}}</td>
                                                <td>{{$translator->name}}</td>
                                                <td>
                                                    <a href="{{ route('translators.edit', $translator->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                        <button class="btn btn-sm btn-link text-uppercase">ویرایش</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form class="inline-block" action="{{route('translators.destroy', $translator->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="پاک کردن">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="publishers">
                                <div class="col-md-12">
                                    <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>مدیریت انتشارات</h5>
                                    <a href="{{route('publishers.create')}}"><button type="submit" class="btn btn-primary" style="margin-bottom: 10px">افزودن</button></a>
                                    <table class="table table-sm table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">شناسه</th>
                                            <th scope="col">نام</th>
                                            <th scope="col">ویرایش</th>
                                            <th scope="col">پاک کردن</th>
                                        </tr>
                                        </thead>
                                        @foreach($publishers as $publisher)
                                            <tbody>

                                            <tr>
                                                <td>{{$publisher->id}}</td>
                                                <td>{{$publisher->name}}</td>
                                                <td>
                                                    <a href="{{ route('publishers.edit', $publisher->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                        <button class="btn btn-sm btn-link text-uppercase">ویرایش</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form class="inline-block" action="{{route('publishers.destroy', $publisher->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="پاک کردن">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="books">
                                <div class="col-md-12">
                                    <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>مدیریت کتاب ها</h5>
                                    <a href="{{route('books.create')}}"><button type="submit" class="btn btn-primary" style="margin-bottom: 10px">افزودن</button></a>
                                    <table class="table table-sm table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">شناسه</th>
                                            <th scope="col">نام</th>
                                            <th scope="col">جلد</th>
                                            <th scope="col">زبان</th>
                                            <th scope="col">نویسنده</th>
                                            <th scope="col">مترجم</th>
                                            <th scope="col">انتشارات</th>
                                            <th scope="col">ویرایش</th>
                                            <th scope="col">پاک کردن</th>
                                        </tr>
                                        </thead>
                                        @foreach($books as $book)
                                            <tbody>
                                            <tr>
                                                <td>{{$book->id}}</td>
                                                <td>{{$book->name}}</td>
                                                <td>{{$book->volume}}</td>
                                                <td>{{$book->language}}</td>
                                                <td>{{$book->writer()->name}}</td>
                                                <td>{{$book->translator()->name}}</td>
                                                <td>{{$book->publisher()->name}}</td>
                                                <td>
                                                    <a href="{{ route('books.edit', $book->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                        <button class="btn btn-sm btn-link text-uppercase">ویرایش</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form class="inline-block" action="{{route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="پاک کردن">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                @endcan

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
