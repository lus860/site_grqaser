<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/user/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/user/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/user/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/user/css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/user/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/user/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/user/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/user/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function($){

            $("#search-input").on("input",function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = {
                    search: $('#search-input').val(),
                };
                var type = "GET";
                var ajaxurl = "{{ route('search') }}";
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    success: function (data) {
                        console.log(data)
                        $('#search').html(data)
                    },
                    error: function (data) {
                        console.log(data);
                    }

                })
            });
            $(document).on('click', '.dropdown-menu', function (e) {
                e.stopPropagation();
            });


            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');
        });
    </script>
    <style>
       .list:hover {
            background-color: #d4d4d4;
        }
       a{
           text-decoration: none!important;
       }

       .sub-menu {
           left: 100%;
           position: absolute;
           top: 0;
           visibility: hidden;
           margin-top: -1px;
       }

       .dropdown li:hover .sub-menu {
           visibility: visible!important;
           background-color: #f4f4f4;
       }

       .sub-menu:before {
           border-bottom: 7px solid transparent;
           border-left: none;
           border-right: 7px solid rgba(0, 0, 0, 0.2);
           border-top: 7px solid transparent;
           left: -7px;
           top: 10px;
       }

       .sub-menu:after {
           border-top: 6px solid transparent;
           border-left: none;
           border-right: 6px solid #fff;
           border-bottom: 6px solid transparent;
           left: 10px;
           top: 11px;
           left: -6px;
       }
       .image-parent {
           max-width: 40px;
       }
    </style>
</head>
<body style="background: #0b0c2a;!important;">
 <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="header__logo">
                            <a href="">
                                <img src="{{url('user/img/logo1.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__nav">
                            <nav class="header__menu mobile-menu">
                                <ul>
                                    <li class="active"><a href="">{{ __('app.homepage') }}</a></li>
                                    <li><a href="{{ route('user_authors')}}"> {{ __('app.authors') }}<span class="arrow_carrot-down"></span></a>
                                        <ul class="dropdown">
                                            @foreach(\App\Models\Author::getAll() as $author)
                                            <li class="list"><a href="{{ route('author',$author->id)}}">{{$author->full_name}} <i class="fas fa-caret-right"></i></a>

                                                <ul class="sub-menu">
                                                    <li class="list"><a href="{{ route('biography',$author->id)}}">{{ __('app.biography') }}</a></li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="" style="pointer-events: none;"> {{ __('app.categories') }}<span class="arrow_carrot-down"></span></a>
                                        <ul class="dropdown">
                                            @foreach(\App\Models\Category::getAll() as $category)
                                            <li class="list"><a href="{{ route('category',$category->id)}}">{{$category->category_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__right">
                            <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div style="background-color: #343a40;">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
                                <div class="collapse navbar-collapse" id="navbarToggler">
                                    <ul class="navbar-nav ml-auto">
                                        @php $locale = App::getLocale(); @endphp
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" v-pre>
                                                @foreach(\App\Models\Language::getAll() as $language)
                                                    @if($language->iso == $locale)
                                                        <img src="{{asset('user/img/flag/'.$language->iso.'.png')}}" style="width: 27px!important;"> {{$language->title}}
                                                    @endif
                                                @endforeach
                                                <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="right:-16px">
                                                @foreach(\App\Models\Language::getAll() as $language)
                                                <a class="dropdown-item" href="{{ url(Localization::getUrlWithLocale($language->iso)) }}"><img style="width:27px!important;" src="{{asset('user/img/flag/'.$language->iso.'.png')}}">{{$language->title}}</a>
                                                @endforeach

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                    </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap">

                </div>

            </div>
        </header>

            @yield('content')
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href=""><img src="images/logo1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="">Homepage</a></li>
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center w-50 mx-auto">
            <div class="search-close-switch"><i class="icon_close "></i></div>
            <form class="search-model-form w-100" method="post" action="{{ route('search') }}">
                @csrf
                <input type="text" id="search-input" placeholder="{{ __('app.search') }}" name="search" style="font-size: 20px;" class="w-100">
                <div id="search">


                </div>
{{--                <div class="">--}}
{{--                    <button type="submit" class="btn btn-success"></button>--}}
{{--                </div>--}}
            </form>

        </div>
    </div>

<script src="{{url('/user/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('/user/js/bootstrap.min.js')}}"></script>
<script src="{{url('/user/js/player.js')}}"></script>
<script src="{{url('/user/js/jquery.nice-select.min.js')}}"></script>
<script src="{{url('/user/js/mixitup.min.js')}}"></script>
<script src="{{url('/user/js/jquery.slicknav.js')}}"></script>
 <script src="{{url('/user/js/owl.carousel.min.js')}}"></script>
<script src="{{url('/user/js/main.js')}}"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
