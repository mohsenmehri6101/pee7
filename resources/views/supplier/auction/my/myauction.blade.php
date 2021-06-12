@extends('supplier.layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h5 style="margin-bottom: 0">
                        مزایده : {{ $auction->title }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body" >
            <div class="row" style="margin: 0">
                <div class="col-sm-4">
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <h6>
                                تاریخ ایجاد :
                            </h6>

                            <h6>
                                {{verta($auction->created_at)->format('%d %B %Y')}}
                            </h6>
                        </div>
                        <div class="col-sm-12">
                            <hr>
                            <h5>
                                مدت اعتبار
                            </h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>تاریخ اتمام :</h6>
                                    <hr>
                                    <h6>
                                        {{verta($auction->time)->format('%d %B %Y')}}
                                    </h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6>زمان باقیمانده :</h6>
                                    <hr>
                                    <h6 id="demo">
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <hr>
                            <h6>
                                تعداد کالاها : <span> 12 </span>
                            </h6>

                            <h6>
                                 مجموع قیمت کالاها : <span> {{ number_format(165482000)  }} </span>
                            </h6>
                            <h6>
                                 تعداد پیشنهاد ها : <span class=> {{ number_format(1200) }} </span>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div>
                        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
                            <!-- Loading Screen -->
                            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
                            </div>
                            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                                @foreach($auction->images as $image)
                                    <div>
                                        <img data-u="image" src="{{url('images/'.$image)}}" />
                                        <img data-u="thumb" src="{{url('images/'.$image)}}" />
                                    </div>
                                @endforeach
                            </div>
                            <!-- Thumbnail Navigator -->
                            <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
                                <div data-u="slides">
                                    <div data-u="prototype" class="p" style="width:190px;height:90px;">
                                        <div data-u="thumbnailtemplate" class="t"></div>
                                        <svg viewbox="0 0 16000 16000" class="cv">
                                            <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                            <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                            <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Arrow Navigator -->
                            <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                    <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                                    <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                                </svg>
                            </div>
                            <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                    <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                                    <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h6>شرح مزایده :</h6>
                    <div>
                        {!! $auction->description !!}
                    </div>
                </div>
            </div>
            <div>
                @include('supplier.layouts.erorrs')
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th colspan="4" class="text-center">
                                <h5>کالاهای موجود</h5>
                            </th>
                            <th colspan="4" class="text-center">
                                <button data-toggle="modal" data-target="#insert_product" class="btn btn-primary">افزودن کالای جدید</button>
                            </th>
                        </tr>
                        <tr>
                            <th>ردیف</th>
                            <th>کد کالا</th>
                            <th>نام کالا</th>
                            <th>مقدار موجود</th>
                            <th>فایل مشخصات فنی</th>
                            <th>قیمت پایه</th>
                            <th>توضیحات</th>
                            <th>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bauctions as $bauction)
                        <?php $bp = get_bproduct($bauction->bproduct_id,$bproducts) ?>
                        <tr id="bauction_{{$bauction->id}}">
                            <td>#</td>
                            <td>
                                {{ $bp->code }}
                            </td>
                            <td>
                                {{ $bp->name }}
                            </td>
                            <td>{{$bauction->number}}</td>
                            <td><a href="{{url('images/'.$bauction->tech_file)}}">فایل ضمیمه</a></td>
                            <td>
                                {{ get_price($bauction->id) }}
                            </td>
                            <td>
                                {{substr($bauction->description,0,35)}}
                            </td>
                            <td>
                                <a href="{{route('supplier.auction.product.edit',['id'=>$bauction->id])}}" class="btn btn-sm bg-light-gradient border">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button onclick="" class="btn btn-sm bg-light-gradient border">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="insert_product">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" align="center"><b>افزودن کالا</b></h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="auction_form" role="form" action="{{route('supplier.auction.savemyauction')}}" enctype="multipart/form-data">
                        @csrf
                        <input name="auction_id" value="{{$auction->id}}" type="hidden">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="bproduct">کالای مرجع</label>
                                <select name="bproduct" id="bproduct" class="form-control select2"  data-live-search="true">
                                    <option value="">کالای مرجع را انتخاب نمایید</option>
                                    @foreach($bproducts as $bproduct)
                                        <option value="{{$bproduct->id}}">{{$bproduct->name}} - {{$bproduct->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>وضعیت کالا </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fresh" id="fresh1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">کالای نو</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fresh" id="fresh0" value="0">
                                    <label class="form-check-label" for="inlineRadio2">کالای دست دوم</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="m_year">سال ساخت</label>
                                <input type="number" value="1399" class="form-control" name="m_year" id="m_year">
                            </div>
                            <div class="form-group">
                                <label for="number">مقدار کالا</label>
                                <input type="number" value="0" class="form-control" name="number" id="number">
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت پایه</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="250000">

                                <small class="text-danger">
                                    توجه! قیمت را به ریال وارد نمایید.
                                </small>

                            </div>
                            <div class="form-group">
                                <label for="tech_file">فایل مشخصات فنی</label>
                                <input type="file" class="form-control" name="tech_file" id="tech_file">
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description" class="form-control" style="height: 50px;resize: none" >{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>
                            <button type="submit" id="submit_form_btn" class="btn btn-primary">ذخیره تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('title')
    مزایده های من - {{ $auction->title }}
@endsection

@section('page_header')
    <li class="breadcrumb-item">
        <a class="text-info" href="{{ route('supplier.auction.myauction',['id'=>$auction->id]) }}">
            {{$auction->title}}
        </a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-secondary" href="{{ route('supplier.auction.index') }}">
            مزایده های من
        </a>
    </li>
@endsection

@section('personalize_script')
    <script src="<?= url('panel/js/jssor.slider-28.0.0.min.js') ?>" type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
                {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $SpacingX: 5,
                    $SpacingY: 5
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <script type="text/javascript">
        jssor_1_slider_init();
    </script>
    <script>
        var deadline = new Date("{{$auction->time}}").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var t = deadline - now;
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((t % (1000 * 60)) / 1000);
            document.getElementById("demo").innerHTML = days + "d "
                + hours + "h " + minutes + "m " + seconds + "s ";
            if (t < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "منقضی شده است";
            }
        }, 1000);
    </script>
    <script src="{{ url('/plugins/select2/select2.full.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection

@section('personalize_css')
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider arrow skin 106 css*/
        .jssora106 {display:block;position:absolute;cursor:pointer;}
        .jssora106 .c {fill:#fff;opacity:.3;}
        .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
        .jssora106:hover .c {opacity:.5;}
        .jssora106:hover .a {opacity:.8;}
        .jssora106.jssora106dn .c {opacity:.2;}
        .jssora106.jssora106dn .a {opacity:1;}
        .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

        /*jssor slider thumbnail skin 101 css*/
        .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
        .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;}
        .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
        .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
        .jssort101 .p:hover{padding:2px;}
        .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
        .jssort101 .p:hover.pdn{padding:0;}
        .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
        .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
        .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
        .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
        .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
    </style>
    <link rel="stylesheet" href="{{ url('plugins/select2/select2.css') }}">
    <style>
        .select2{
            width: 100% !important;
        }
        .select2-selection{
            height: 36px!important;
        }
    </style>


@endsection

<?php

function get_price($id)
{

    $price = \App\Price::select('price')->where('bproduct_auction_id',$id)->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->latest()->get();
    return $price[0]->price;
}
function get_bproduct($id,$bproducts){
    $code = $bproducts->find($id)->first();
    return $code;
}

?>
