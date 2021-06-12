@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.users.show',$user->id) }}">{{ $user->name }}</a></li>
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.users.index') }}">کاربران</a></li>
@endsection

@section('title')
    مشاهده کاربر
@endsection

@section('content')
@endsection
