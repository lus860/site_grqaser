@extends('../layouts.user')

@section('content')

    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage"
                         style="transform: translate3d(-2280px, 0px, 0px); transition: all 0s ease 0s; width: 7980px;">
                        @foreach($books as $book)
                            <div class="owl-item" style="width: 1140px;">
                                <div class="hero__items set-bg" data-setbg="{{url($book->image)}}"
                                     style="background-image: url({{url($book->image)}});">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="hero__text">
                                                <div class="label">{{$book->categoryName($book->category_id)}}</div>
                                                <h2>{{$book->full_name}}</h2>
                                                <p>{{$book->getShortText($book->description)}}</p>
                                                <a href="{{ route('book',$book->id)}}"><span>{{ __('app.watch_now') }}</span> <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

{{--                        <div class="owl-item cloned animated owl-animated-out fadeOut"--}}
{{--                             style="width: 1140px; left: 1140px;">--}}
{{--                            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg"--}}
{{--                                 style="background-image: url(&quot;img/hero/hero-1.jpg&quot;);">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="hero__text">--}}
{{--                                            <div class="label">Adventure</div>--}}
{{--                                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>--}}
{{--                                            <p>After 30 days of travel across the world...</p>--}}
{{--                                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item animated owl-animated-in fadeIn active" style="width: 1140px;">--}}
{{--                            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg"--}}
{{--                                 style="background-image: url(&quot;img/hero/hero-1.jpg&quot;);">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="hero__text">--}}
{{--                                            <div class="label">Adventure</div>--}}
{{--                                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>--}}
{{--                                            <p>After 30 days of travel across the world...</p>--}}
{{--                                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 1140px;">--}}
{{--                            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg"--}}
{{--                                 style="background-image: url(&quot;img/hero/hero-1.jpg&quot;);">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="hero__text">--}}
{{--                                            <div class="label">Adventure</div>--}}
{{--                                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>--}}
{{--                                            <p>After 30 days of travel across the world...</p>--}}
{{--                                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item animated owl-animated-in fadeIn" style="width: 1140px;">--}}
{{--                            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg"--}}
{{--                                 style="background-image: url(&quot;img/hero/hero-1.jpg&quot;);">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="hero__text">--}}
{{--                                            <div class="label">Adventure</div>--}}
{{--                                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>--}}
{{--                                            <p>After 30 days of travel across the world...</p>--}}
{{--                                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item cloned" style="width: 1140px;">--}}
{{--                            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg"--}}
{{--                                 style="background-image: url(&quot;img/hero/hero-1.jpg&quot;);">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="hero__text">--}}
{{--                                            <div class="label">Adventure</div>--}}
{{--                                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>--}}
{{--                                            <p>After 30 days of travel across the world...</p>--}}
{{--                                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item cloned" style="width: 1140px;">--}}
{{--                            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg"--}}
{{--                                 style="background-image: url(&quot;img/hero/hero-1.jpg&quot;);">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="hero__text">--}}
{{--                                            <div class="label">Adventure</div>--}}
{{--                                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>--}}
{{--                                            <p>After 30 days of travel across the world...</p>--}}
{{--                                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
{{--                <div class="owl-nav">--}}
{{--                    <button type="button" role="presentation" class="owl-prev"><span class="arrow_carrot-left"></span>--}}
{{--                    </button>--}}
{{--                    <button type="button" role="presentation" class="owl-next"><span class="arrow_carrot-right"></span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="owl-dots">--}}
{{--                    <button role="button" class="owl-dot active"><span></span></button>--}}
{{--                    <button role="button" class="owl-dot"><span></span></button>--}}
{{--                    <button role="button" class="owl-dot"><span></span></button>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>{{ __('app.top_rated') }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('user_books')}}" class="primary-btn">{{ __('app.view_all') }} <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($rated_books as $book)
                                @if ($loop->index == 6)
                                    @break
                                @endif
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{url($book->image)}}" style="background-image: url({{url($book->image)}});">
                                        <div class="ep">{{$book->categoryName($book->category_id)}}</div>
                                        <div class="comment"><i class="fas fa-star-half-alt"></i> {{$book->rating}}</div>
                                        <div class="view"><i class="fa fa-eye"></i>{{$book->download_count}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            @foreach($book->authors as $author)
                                                <li><a href="{{ route('author',$author->id)}}">{{$author->full_name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <h5><a href="{{ route('book',$book->id)}}">{{$book->full_name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>{{ __('app.latest_uploads') }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('user_books')}}" class="primary-btn">{{ __('app.view_all') }} <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($books as $book)
                                @if ($loop->index == 6)
                                    @break
                                @endif
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{url($book->image)}}" style="background-image: url({{url($book->image)}});">
                                        <div class="ep">{{$book->categoryName($book->category_id)}}</div>
                                        <div class="comment"><i class="fas fa-star-half-alt"></i> {{$book->rating}}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{$book->download_count}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            @foreach($book->authors as $author)
                                                <li><a href="{{ route('author',$author->id)}}">{{$author->full_name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <h5><a href="{{ route('book',$book->id)}}">{{$book->full_name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>{{ __('app.authors') }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('user_authors',app()->getLocale())}}" class="primary-btn">{{ __('app.view_all') }} <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($authors as $author)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{url($author->image)}}" style="background-image: url({{url($author->image)}});">
                                        <div class="ep">{{$author->was_born}}-{{$author->died}}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{$author->views}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            @foreach($author->books as $book)
                                                <li><a href="{{ route('book',$book->id)}}">{{$book->full_name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <h5><a href="{{ route('biography',$author->id)}}">{{$author->full_name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title mr-2">
                                <h5 style="font-size: 14px!important;">{{ __('app.most_downloaded') }}</h5>
                            </div>
                            <ul class="filter__controls">
                                <li data-filter=".week"><a href="{{ route('index_time', 'week')}}">{{ __('app.week') }}</a></li>
                                <li data-filter=".month"><a href="{{ route('index_time', 'month')}}">{{ __('app.month') }}</a></li>
                                <li data-filter=".years"><a href="{{ route('index_time', 'years')}}">{{ __('app.years') }}</a></li>
                            </ul>
                            <div class="filter__gallery" id="MixItUp79DC7A">
                                @foreach($most_downloaded as $book)
                                <div class="product__sidebar__view__item set-bg mix day years" data-setbg="{{url($book->image)}}" style="background-image: url({{url($book->image)}});">
                                    <div class="ep">{{$book->categoryName($book->category_id)}}</div>
                                    <div class="view"><i class="fa fa-eye"></i> {{$book->download_count}}</div>
                                    <h5><a href="#">{{$book->full_name}}</a></h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
