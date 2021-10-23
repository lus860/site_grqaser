@extends('admin/layouts.app')

@section('content')
        <h2>{{ __('author.add_new_author') }}</h2>
        <form method="post" action="{{ route('store_author') }}" id="form1" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <h4>{{ __('author.name') }}</h4>
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
                            @foreach ($languages as $language)
                                <div class="tab-pane @if($language->iso == 'hy') active @endif"
                                     id="{{$language->iso}}-full-name">
                                    <div class="form-group">
                                        <input type="text" name="{{$language->iso}}-full-name" class="form-control" value="{{ old($language->iso.'-full-name') }}"
                                               placeholder="{{ __('author.name') }}"
                                               @error($language->iso.'-full-name') style="border:2px solid red" @enderror >
                                        @error($language->iso.'-full-name')
                                        <span class="" role="alert" style="color:red">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                        <div class="form-group" style="margin-bottom: 60px!important;">
                            <h4>{{ __('author.image') }} (1440 X 305)</h4>
                                <div class="input-group">
                                    <label class="input-group-btn">
                                   <span class="btn btn-primary">
                                        {{ __('author.select') }} <input type="file" id="pdf-file" name="file" style="display: none;">
                                   </span>
                                    </label>
                                    <input type="text" class="form-control" id="pdf-name"
                                           placeholder="{{ __('author.select_image') }}"
                                           readonly @error('file') style="border:2px solid red" @enderror>
                                </div>
                            @error('file')
                            <span class="" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                     </span>
                            @enderror
                        </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label>{{ __('author.was_born') }}</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="datepicker" name="was_born">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('author.died') }}</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="datepicker1" name="died">
                                </div>
                            </div>
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
                        @foreach ($languages as $language)
                            <div class="tab-pane @if($language->iso == 'hy') active @endif"
                                 id="seo-{{$language->iso}}-title">
                                <div class="form-group">
                                    <label for="">{{ __('author.seo_title') }}</label>
                                    <input type="text" name="{{$language->iso}}-seo-title" class="form-control" value="{{ old($language->iso.'-seo-title') }}"
                                           placeholder="{{ __('author.seo_title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('author.seo_key') }}</label>
                                    <input type="text" name="{{$language->iso}}-seo-key" class="form-control" value="{{ old($language->iso.'-seo-key') }}"
                                           placeholder="{{ __('author.seo_key') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('author.seo_description') }}</label>
                                    <textarea class="text" name="{{$language->iso}}-seo-description"
                                              placeholder="{{ __('author.seo_description') }}"
                                              id="description"
                                              >{{ old($language->iso.'-seo-description') }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>


            <div class="container-fluid">
                <h4>{{ __('author.biography') }}</h4>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @foreach ($languages as $language)
                            <li class="@if($language->iso == 'hy') active @endif"><a
                                    href="#{{$language->iso}}-biography" data-toggle="tab"
                                    @if($language->iso == 'hy') aria-expanded="true"
                                    @else aria-expanded="false" @endif>{{$language->title}}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($languages as $language)
                            <div class="tab-pane @if($language->iso == 'hy') active @endif"
                                 id="{{$language->iso}}-biography">
                                <section class="content">
                                    <div class="box box-info">
                                        <div class="box-body pad"
                                             @error($language->iso.'-biography') style="border:2px solid red" @enderror>
                                                <textarea id="editor-{{$language->iso}}"
                                                          name="{{$language->iso}}-biography" rows="10"
                                                          cols="80">{{ old($language->iso.'-biography') }}</textarea>
                                        </div>
                                        @error($language->iso.'-biography')
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


            <div class="col-12 save-btn-fixed">
                <button type="submit"></button>
            </div>
        </form>

@endsection
@push('css')
    <style>
        #description{
            width: 100%!important;
            min-height:175px!important;
            font-size: 14px!important;
            line-height: 18px;
            border: 1px solid #dddddd!important;
            padding: 10px;
            resize: vertical!important;
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
        .fa-calendar:before {
            content: "\f073"!important;
        }
        .input-group-addon {
            padding: 6px 12px!important;
            font-size: 14px!important;
            font-weight: 400!important;
            line-height: 1!important;
            color: #555!important;
            text-align: center!important;
            background-color: #eee!important;
            border: 1px solid #ccc!important;
            border-radius: 4px!important;
        }
        .input-group .form-control {
            position: relative!important;
            z-index: 2!important;
            float: left!important;
            width: 100%!important;
            margin-bottom: 0!important;
        }


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

            $('#datepicker1').datepicker({
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


