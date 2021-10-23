@extends('admin/layouts.app')

@section('content')
    <form method="post" action="{{ route('admin-panel.store_pages') }}" id="form1">
        @csrf
    <div class="row">
    <div class="col-12 col-lg-6">
        <h4>Название</h4>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @foreach ($languages as $language)
                    <li class="@if($language->iso == 'hy') active @endif"><a href= "#{{$language->iso}}-title" data-toggle="tab" @if($language->iso == 'hy') aria-expanded="true" @else aria-expanded="false"  @endif>{{$language->title}}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach ($languages as $language)
                    <div class="tab-pane @if($language->iso == 'hy') active @endif" id="{{$language->iso}}-title">
                        <div class="form-group">
                            <input type="text" name="{{$language->iso}}-title"  class="form-control"  placeholder="Название"  @error($language->iso.'-title') style="border:2px solid red" @enderror >
                            @error($language->iso.'-title')
                            <span class="" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
        <h4>Описание</h4>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @foreach ($languages as $language)
                    <li class="@if($language->iso == 'hy') active @endif"><a href= "#{{$language->iso}}-description" data-toggle="tab" @if($language->iso == 'hy') aria-expanded="true" @else aria-expanded="false"  @endif>{{$language->title}}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach ($languages as $language)
                    <div class="tab-pane @if($language->iso == 'hy') active @endif" id="{{$language->iso}}-description">
                        <div class="form-group">
                            <textarea class="textarea" name="{{$language->iso}}-description" placeholder="Описание" style="width: 100%;min-height:187px;font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;resize: vertical;@error($language->iso.'-description') border:2px solid red" @enderror"></textarea>
                            @error($language->iso.'-description')
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

    </div>
        <div class="col-12 col-lg-6">
            <h4>SEO</h4>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    @foreach ($languages as $language)
                        <li class="@if($language->iso == 'hy') active @endif"><a href= "#seo-{{$language->iso}}-title" data-toggle="tab" @if($language->iso == 'hy') aria-expanded="true" @else aria-expanded="false"  @endif>{{$language->title}}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($languages as $language)
                        <div class="tab-pane @if($language->iso == 'hy') active @endif" id="seo-{{$language->iso}}-title">
                            <div class="form-group">
                                <label for="">Название</label>
                                <input type="text" name="seo-title[{!! $language->iso !!}]" class="form-control" placeholder="Название">
                            </div>
                            <div class="form-group">
                                <label for="">Ключевые слова</label>
                                <input type="text" name="seo-key[{!! $language->iso !!}]" class="form-control" placeholder="Ключевые слова">
                            </div>
                            <div class="form-group">
                                <label for="">Описание</label>
                                <textarea class="textarea" name="seo-description[{!! $language->iso !!}]" placeholder="Описание" style="width: 100%;min-height:175px;font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;resize: vertical!important;"></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-lg-12" style="min-height: 400px">
            <h4>Контент</h4>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    @foreach ($languages as $language)
                        <li class="@if($language->iso == 'hy') active @endif"><a href="#{{$language->iso}}-content" data-toggle="tab"
                                        @if($language->iso == 'hy') aria-expanded="true"
                                        @else aria-expanded="false" @endif>{{$language->title}}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($languages as $language)
                        <div class="tab-pane @if($language->iso == 'hy') active @endif" id="{{$language->iso}}-content">
                            <section class="content">
                                <div class="box box-info">
                                    <div class="box-body pad" @error($language->iso.'-content') style="border:2px solid red" @enderror>
                                        <textarea id="editor-{{$language->iso}}" name="{{$language->iso}}-content" rows="10" cols="80" ></textarea>
                                    </div>
                                    @error($language->iso.'-content')
                                    <span class="" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <h4>Изоброжение (1440 X 305)</h4>
                <div class="form-group">
                    <div>
                        <div class="input-group">
                            <label class="input-group-btn">
            <span class="btn btn-primary">
                Выбрать <input type="file" id="pdf-file" name="file" style="display: none;">
            </span>
                            </label>
                            <input type="text" class="form-control" id="pdf-name" placeholder="Выберите изоброжение..."
                                   readonly @error('file') style="border:2px solid red" @enderror>
                            @error('file')

                        </div>
                        <span class="" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="nav-tabs-custom" style="padding-bottom: 13.33333px">
                    <div class="form-group">
                        <label class="label-checkbox">
                            <input type="checkbox" name="show_in_header" class="option-input checkbox" checked/>
                            Показать в меню
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-checkbox">
                            <input type="checkbox" name="show_in_footer" class="option-input checkbox" checked/>
                            Показать на footer
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-checkbox">
                            <input type="checkbox" name="active" class="option-input checkbox" checked/>
                            Активно
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 save-btn-fixed"><button  type="submit"> </button></div>
    </form>

@endsection
@push('css')
    <style>
    .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 13.33333px;
        right: 0;
        bottom: 0;
        left: 0;
        height: 40px;
        width: 40px;
        transition: all 0.15s ease-out 0s;
        background: #cbd1d8;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
    }
    .label-checkbox{
        position: relative;
        right: 0;
        top: 0;
        left: 20px;
    }
    .option-input:hover {
        background: #9faab7;
    }
    .option-input:checked {
        background: #56ba3e;
    }
    .option-input:checked::before {
        height: 40px;
        width: 40px;
        position: absolute;
        content: '✔';
        display: inline-block;
        font-size: 26.66667px;
        text-align: center;
        line-height: 40px;
    }
    .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #40e0d0;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
    }

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


