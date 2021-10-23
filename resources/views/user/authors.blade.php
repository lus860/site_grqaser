@extends('../layouts.user')

@section('content')

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('index')}}"><i class="fa fa-home"></i> {{ __('app.home') }}</a>
                        <a href=""> {{ __('app.'.Request::route()->getName()) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>{{ __('app.all_authors') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($authors as $author)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{url($author->image)}}">
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

                    @if($authors->total() > $authors->count())
                        <div class="product__pagination">
                            @if($authors->onFirstPage())
                                <a href="" style="cursor: no-drop;pointer-events: none;"><i class="fa fa-angle-double-left"></i></a>
                            @else
                                <a href="{{$authors->previousPageUrl()}}"><i class="fa fa-angle-double-left"></i></a>
                            @endif
                            @foreach($authors->getUrlRange(1, $authors->lastPage()) as $pag => $url)
                                @if($pag == $authors->currentPage())
                                    <a href="{{$url}}" class="current-page">{{$pag}}</a>
                                @else
                                    <a href="{{$url}}">{{$pag}}</a>
                                @endif
                            @endforeach
                            @if($authors->hasMorePages())
                                <a href="{{$authors->nextPageUrl()}}"><i class="fa fa-angle-double-right"></i></a>
                            @else
                                <a href="" class="disabled" style="pointer-events: none;cursor: no-drop;"><i class="fa fa-angle-double-right"></i></a>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
