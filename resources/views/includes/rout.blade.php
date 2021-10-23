<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('index')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route(Route::currentRouteName())}}">{{Route::currentRouteName()}}</a>
                    {{--                        <span>{{ $category->category_name }}</span>--}}
                </div>
            </div>
        </div>
    </div>
</div>
