@extends('../layouts.user')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('index')}}"><i class="fa fa-home"></i>{{ __('app.home') }}</a>
                        <a href="">{{ __('app.'.Request::route()->getName()) }}</a>
                         <span>{{ $author->full_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>{{$author->full_name}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{url($book->image)}}">
                                            <div class="ep"><a href="{{ route('category',$book->category_id)}}">{{$book->categoryName($book->category_id)}}</a></div>
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
                    @if($books->total() > $books->count())
                        <div class="product__pagination">
                            @if($books->onFirstPage())
                                <a href="" style="cursor: no-drop;pointer-events: none;"><i class="fa fa-angle-double-left"></i></a>
                            @else
                                <a href="{{$books->previousPageUrl()}}"><i class="fa fa-angle-double-left"></i></a>
                            @endif
                            @foreach($books->getUrlRange(1, $books->lastPage()) as $pag => $url)
                                @if($pag == $books->currentPage())
                                    <a href="{{$url}}" class="current-page">{{$pag}}</a>
                                @else
                                    <a href="{{$url}}">{{$pag}}</a>
                                @endif
                            @endforeach
                            @if($books->hasMorePages())
                                <a href="{{$books->nextPageUrl()}}"><i class="fa fa-angle-double-right"></i></a>
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
