@extends('home.pages.layouts.master')

@section('content')

    <div class="container bg-light pt-5 pb-5 px-3 rounded">
        <h2>{{ $note->title }}</h2>
        <div class="d-inline-flex">
            <div class="p-2">
                <span class="fa fa-user"></span>
                <span class="item_head">گردآوری و تالیف  : </span>
                <span class="item_section">{{ $note->user->name }}</span>
            </div>
            <div class="p-2">
                <span class="fa fa-clock-o"></span>
                <span class="item_head">تاریخ انتشار  : </span>
                <span class="item_section">{{ $note->user->name }}</span>
            </div>
        </div>
        <hr>
        @if($note->image)
            <div class="row mb-4">
                <div class="col">
                    <a target="_blank" href="{{ url('images/'.$note->image) }}">
                        <img src="{{ url('images/'.$note->image) }}" style="max-width:450px !important;" alt="">
                    </a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="text text-justify">
                    {!! $note->text !!}
                </div>
            </div>
        </div>
        @if($note->images)
            <div class="text-center    p-3 border">
                <div class="row">
                    @foreach($note->images as $image)
                        <div class="col col-xs-12 mb-3">
                            <div class="thumbnail">
                                <a target="_blank" class="my-4" href="{{ url('images/'.$image) }}">
                                    <img class="rounded border img-fluid"   src="{{ url('images/'.$image) }}" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection