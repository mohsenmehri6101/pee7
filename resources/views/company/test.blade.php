@extends('company.layouts.master')
@section('title')
    خلاصه وضعیت
@endsection
@section('content')
    <div class="row">
        <form action="{{ route('agent'}}" method="post" >
            {{ csrf_field() }}
            <input type="text" name="id" placeholder="enter you id ">
            <button class="btn btn-success">ok</button>
        </form>
    </div>
@endsection
@section('personalize_script')
@endsection
@section('personalize_css')
@endsection