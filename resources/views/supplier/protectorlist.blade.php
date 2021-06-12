@extends('supplier.layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="m-portlet m-portlet--border-bottom-brand">
                <div class="m-portlet__body ">
                    <div class="m-card-profile">

                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <img src="{{ url('img/user4.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="m-card-profile__details">
											<span class="m-card-profile__name">
											محسن برومند
											</span>
                            <div class="row">
                                <div class="col-8">
                                    <div class="m--space-5"></div>
                                    <div class="progress m-progress--sm" style="height: 10px">
                                        <div class="progress-bar m--bg-primary" role="progressbar" style="width: 23%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                                <div class="col-4">
<span>
                                                    تعداد : 12
                                                </span>
                                </div>

                            </div>

                        </div>

                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">بخش</span>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                <span class="m-nav__link-text">مشاهده و ویرایش اطلاعات</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-graphic-2"></i>
                                <span class="m-nav__link-text">ریز کارکرد</span>
                            </a>
                        </li>

                    </ul>

                    <div class="m-portlet__body-separator">

                    </div>
                    <div style="text-align: center">
                        <button class="btn btn-block btn-danger m-btn--air">
                            حذف
                        </button>

                        5-protector_list.html
                    </div>
                    <div class="m-widget1 m-widget1--paddingless">
                        <!--
                                                            <div class="m-widget1__item">
                                                                <div class="row m-row&#45;&#45;no-padding align-items-center">
                                                                    <div class="col">
                                                                        <h3 class="m-widget1__title">عضویت ویژه</h3>
                                                                        <span class="m-widget1__desc">یک ساله</span>
                                                                    </div>
                                                                    <div class="col m&#45;&#45;align-right">
                                                                        <span class="m-widget1__number m&#45;&#45;font-brand">+$17,800</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                        -->

                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@section('sub_header')
    نمایش و مدیریت پشتیبان ها
@endsection

@section('title')
    نمایش پشتیبان ها
@endsection


@section('end_script')
    <!-- pirvate-script-file for this page  -->
@endsection


@section('head_css')
    <!-- pirvate-css-file for this page  -->
@endsection