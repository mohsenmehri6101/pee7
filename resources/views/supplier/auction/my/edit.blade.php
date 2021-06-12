@extends('supplier.layouts.master')

@section('content')
    <div class="row">
        @include('supplier.layouts.erorrs')
        <div class="col-md-12">
            <form action="{{ route('supplier.auction.update',['id'=>$auction->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card card-success card-outline">
                    <div class="card-header bg-light-gradient">
                        <h3 class="card-title">ویرایش : {{$auction->title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="form-group">عنوان</label>
                                    <input class="form-control" name="title" placeholder="عنوان" value="{{ $auction->title }}">
                                </div>
                            </div>
                        </div>

                        @if(\Carbon\Carbon::parse($auction->time)->gt(\Carbon\Carbon::now()))
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>مدت اعتبار</label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-2 text-left">روز :</div>
                            <div class="col-sm-4">
                                <input id="day" name="day" type="number" min="0" max="7" class="form-control" value="{{\Carbon\Carbon::parse($auction->time)->diffInDays()}}">
                            </div>
                            <div class="col-sm-2 text-left">ساعت :</div>
                            <div class="col-sm-4">
                                <input id="hour" name="hour" type="number" min="0" max="23" class="form-control" value="{{\Carbon\Carbon::parse($auction->time)->diffInRealHours() % 24}}">
                            </div>

                        </div>
                        @else
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>مدت اعتبار</label>
                                    <small class="text-danger">(منقضی شده است)</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 text-left">روز :</div>
                                <div class="col-sm-4">
                                    <input id="day" name="day" type="number" min="0" max="7" class="form-control" value="0">
                                </div>
                                <div class="col-sm-2 text-left">ساعت :</div>
                                <div class="col-sm-4">
                                    <input id="hour" name="hour" type="number" min="0" max="23" class="form-control" value="0">
                                </div>

                            </div>
                        @endif
                        <div class="form-group">
                            <label for="description" class="form-group">شرح مزایده </label>
                            <textarea name="description" class="form-group" id="textckeditor">{{ $auction->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-group">ارسال عکس</label>
                            <input id="images" name="images[]" class="form-control" type="file" multiple>
                        </div>

                        <div class="row">
                            @if($auction->images)
                                @foreach($auction->images as $image)
                                    <div class="my2 mx-3">
                                        <input onclick="checkbox_function('{{ str_limit($image,5,'id') }}')" name="bimages[]" value="{{ $image }}" type="checkbox" class="form-control my-1" data-toggle="tooltip" title="حذف عکس زیر">
                                        <a href="{{ url('images/'.$image) }}" target="_blank">
                                            <img id="{{str_limit($image,5,'id')}}"  src="{{ url('images/'.$image) }}" class="rounded" width="60" >
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary"> ارسال</button>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /. box -->
                </div>
            </form>
        </div>
    </div>
@endsection
@section('title')

@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.auction.edit',['id'=>$auction->id]) }}">ویرایش : {{$auction->title}}</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('supplier.auction.index') }}">مزایده های من</a></li>
@endsection

@section('personalize_script')
        <script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                ClassicEditor
                    .create(document.querySelector('#textckeditor'))
                    .then(function (editor) {
                        // The editor instance
                    })
                    .catch(function (error) {
                        console.error(error)
                    })
                // bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5({
                    toolbar: { fa: true }
                })
            })
        </script>
@endsection

@section('personalize_css')
        <style>
        .blinking{
            animation:blinkingText 2.5s infinite;
        }
        @keyframes blinkingText{
            0%{     color: #000;    }
            49%{    color: #000; }
            60%{    color: transparent; }
            99%{    color:transparent;  }
            100%{   color: #000;    }
        }
                </style>
@endsection