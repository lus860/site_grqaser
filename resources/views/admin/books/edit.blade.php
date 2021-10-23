@extends('admin/layouts.app')

@section('content')
    <h2>{{ __('book.edit_book') }}</h2>
    <form method="post" action="{{ route('update_book',$book->id) }}" id="form1" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>{{ __('book.description_name') }}</h4>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @foreach ($languages as $language)
                            <li class="@if($language->iso == 'hy') active @endif"><a
                                    href="#{{$language->iso}}-full-name" data-toggle="tab"
                                    @if($language->iso == 'hy') aria-expanded="true"
                                    @else aria-expanded="false" @endif>{{$language->title}}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($book->getTranslationsArray() as $key=>$val)
                            <div class="tab-pane @if($key == 'hy') active @endif"
                                 id="{{$key}}-full-name">
                                <div class="form-group">
                                    <label for="">{{ __('book.name') }}</label>
                                    <input type="text" name="{{$key}}-full-name" class="form-control" value="{{$val['full_name']}}"
                                           placeholder="{{ __('book.name') }}"
                                           @error($key.'-full-name') style="border:2px solid red" @enderror >
                                    @error($key.'-full-name')
                                    <span class="" role="alert" style="color:red">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('book.description') }}</label>
                                    <textarea class="text" name="{{$key}}-description"
                                              placeholder="{{ __('book.description') }}"
                                              id="description"
                                              @error($key.'-description') style="border: 2px solid red!important;" @enderror
                                              >{{$val['description']}}
                                    </textarea>
                                    @error($key.'-description')
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
                            <li class="@if($language->iso == 'hy') active @endif"><a
                                    href="#seo-{{$language->iso}}-title" data-toggle="tab"
                                    @if($language->iso == 'hy') aria-expanded="true"
                                    @else aria-expanded="false" @endif>{{$language->title}}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($book->getTranslationsArray() as $key=>$val)
                            <div class="tab-pane @if($key == 'hy') active @endif"
                                 id="seo-{{$key}}-title">
                                <div class="form-group">
                                    <label for="">{{ __('book.seo_title') }}</label>
                                    <input type="text" name="{{$key}}-seo-title" class="form-control" value="{{$val['seo_title']}}"
                                           placeholder="{{ __('book.seo_title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('book.seo_key') }}</label>
                                    <input type="text" name="{{$key}}-seo-key" class="form-control" value="{{$val['seo_key']}}"
                                           placeholder="{{ __('book.seo_key') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('book.seo_description') }}</label>
                                    <textarea class="text" name="{{$key}}-seo-description"
                                              placeholder="{{ __('book.seo_description') }}"
                                              style="width: 100%;min-height:175px;font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;resize: vertical!important;">{{$val['seo_description']}}
                                    </textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-0" style="padding: 15px 0px!important;">
            <h4>{{ __('book.content') }}</h4>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    @foreach ($languages as $language)
                        <li class="@if($language->iso == 'hy') active @endif"><a
                                href="#{{$language->iso}}-content" data-toggle="tab"
                                @if($language->iso == 'hy') aria-expanded="true"
                                @else aria-expanded="false" @endif>{{$language->title}}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($book->getTranslationsArray() as $key=>$val)
                    <div class="tab-pane @if($key == 'hy') active @endif"
                             id="{{$key}}-content">
                            <section class="content">
                                <div class="box box-info">
                                    <div class="box-body pad"
                                         @error($key.'-content') style="border:2px solid red" @enderror>
                                                <textarea id="editor-{{$key}}"
                                                          name="{{$key}}-content" rows="10"
                                                          cols="80">{{$val['content']}}</textarea>
                                    </div>
                                    @error($key.'-content')
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

        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <h4>{{ __('book.select_authors') }}</h4>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;" name="authors[]">
                        @foreach($authors as $author)
                            <option value="{{$author->id}}" @if($book->inArray($author->id)) selected @endif>{{$author->full_name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group mt-5">
                    <h4>{{ __('book.select_category') }}</h4>
                    <select class="form-control select2" style="width: 100%;" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->category_id}}" @if($book->category_id == $category->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group mt-5">
                    <h4>{{ __('book.rating') }} (1-10)</h4>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-fw fa-sort-numeric-desc"></i>
                        </div>
                        <input type="number" name="rating" min="1" max="10" class="form-control" value="{{$book->rating}}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <h4>{{ __('book.image') }} (1440 X 305)</h4>
                    <div class="input-group">
                        <label class="input-group-btn">
                                   <span class="btn btn-primary">
                                        {{ __('book.select') }} <input type="file" id="pdf-file" name="file" style="display: none;">
                                   </span>
                        </label>
                        <input type="text" class="form-control" id="pdf-name"
                               placeholder="{{ __('book.select_image') }}"
                               readonly @error('file') style="border:2px solid red" @enderror>
                    </div>
                    @error('file')
                    <span class="" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                     </span>
                    @enderror
                </div>

                <img src="{{$book->image}}" style="width: 140px">
            </div>
        </div>

        <div class="col-12 save-btn-fixed">
            <button type="submit"></button>
        </div>
    </form>

@endsection
@push('css')
    <style>
        #description{
            width: 100%!important;
            min-height:250px!important;
            font-size: 14px!important;
            line-height: 18px;
            border: 1px solid #dddddd!important;
            padding: 10px;resize: vertical!important;
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>
@endpush


