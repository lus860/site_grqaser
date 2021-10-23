@extends('admin/layouts.app')

@section('content')
    <h2>{{ __('category.edit_category') }}</h2>
    <form method="post" action="{{ route('update_category', $category->id) }}" id="form1" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>{{ __('category.name') }}</h4>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @foreach ($languages as $language)
                            <li class="@if($language->iso == 'hy') active @endif"><a href= "#{{$language->iso}}-category-name" data-toggle="tab" @if($language->iso == 'hy') aria-expanded="true" @else aria-expanded="false"  @endif>{{$language->title}}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($category->getTranslationsArray() as $key=>$val)
                            <div class="tab-pane @if($key == 'hy') active @endif" id="{{$key}}-category-name">
                                <div class="form-group">
                                    <input type="text" name="{{$key}}-category-name"  class="form-control"  placeholder="{{ __('category.name') }}" value="{{$val['category_name']}}" @error($key.'-category-name') style="border:2px solid red" @enderror >
                                    @error($key.'-category-name')
                                    <span class="" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h4>SEO</h4>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @foreach ($languages as $language)
                            <li class="@if($language->iso == 'hy') active @endif"><a href= "#seo-{{$language->iso}}-title" data-toggle="tab" @if($language->iso == 'hy') aria-expanded="true" @else aria-expanded="false"  @endif>{{$language->title}}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($category->getTranslationsArray() as $key=>$val)
                            <div class="tab-pane @if($key == 'hy') active @endif" id="seo-{{$key}}-title">
                                <div class="form-group">
                                    <label for="">{{ __('category.seo_title') }}</label>
                                    <input type="text" name="{{$key}}-seo-title" class="form-control" placeholder="{{ __('category.seo_title') }}" value="{{$val['seo_title']}}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('category.seo_key') }}</label>
                                    <input type="text" name="{{$key}}-seo-key" class="form-control" placeholder="{{ __('category.seo_key') }}" value="{{$val['seo_key']}}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('category.seo_description') }}</label>
                                    <textarea class="textarea" name="{{$key}}-seo-description" placeholder="{{ __('category.seo_description') }}" style="width: 100%;min-height:175px;font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;resize: vertical!important;">{{$val['seo_description']}}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 save-btn-fixed"><button  type="submit"> </button></div>
    </form>

@endsection
@push('css')
    <style>
        .save-btn-fixed>button {
            display: block;
            position: fixed;
            z-index: 100;
            border: none;
            outline: none !important;
            bottom: 20px;
            right: 30px;
            width: 60px;
            height: 60px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            -webkit-appearance: none;
            overflow: hidden;
            background-color: #32bd32;
            -webkit-box-shadow: 0 0 5px 0 rgba(0,0,0,.7);
            -moz-box-shadow: 0 0 5px 0 rgba(0,0,0,.7);
            box-shadow: 0 0 5px 0 rgba(0,0,0,.7);
            color: #fff;
            font-size: 0;
            line-height: 0;
            cursor: pointer;
            opacity: .7;
            text-align: center;
            -webkit-transition: opacity .3s ease;
            -moz-transition: opacity .3s ease;
            -o-transition: opacity .3s ease;
            transition: opacity .3s ease;
            filter: blur(0);
        }
        .save-btn-fixed>button:before {
            font-family: "Font Awesome 5 Free";
            font-weight: 400;
            content: "\f0c7";
            display: inline-block;
            font-size: 28px;}

    </style>
@endpush
@push('js')

@endpush


