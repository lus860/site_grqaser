@extends('../layouts.user')

@section('content')

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('index')}}"><i class="fa fa-home"></i> {{ __('app.home') }}</a>
                        <a href="">{{ __('app.'.Request::route()->getName()) }}</a>
                        <span>{{ $author->full_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-6">
                        <div class="section-title">
                            <h4>{{$author->full_name}}</h4>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{url($author->image)}}">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$author->full_name}}</h3>
                                <span>{{$author->getBooksName()}}</span>
                            </div>
                            <p>
                                {!! $author->biography !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
