@extends('supplier.layouts.master')

@section('content')
    <div class="m-portlet">
        <div class="row">
            <div class="col-lg-4">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                پروفایل شما
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="{{ url('img/user4.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="m-card-profile__details">
											<span class="m-card-profile__name">
											محسن برومند
											</span>
                                <a href="" class="m-card-profile__email m-link">mark.andre@gmail.com</a>
                            </div>
                        </div>
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
                                <span class="m-nav__section-text">بخش</span>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-share"></i>
                                    <span class="m-nav__link-text">مشاهده کالاها</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                    <span class="m-nav__link-text">کالاهای فروخته شده</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-graphic-2"></i>
                                    <span class="m-nav__link-text">مشاهده و مدیریت پشتیبان ها</span>
                                </a>
                            </li>

                        </ul>

                        <div class="m-portlet__body-separator"></div>

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
            <div class="col-lg-8">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    مشاهده و ویرایش پروفایل
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10">
                                <div class="alert alert-danger m-alert " role="alert">
                                    The example form below demonstrates common HTML form elements that
                                    receive updated styles from Bootstrap with additional classes.
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">1. اطلاعات شخصی</h3>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label  class="col-2 col-form-label">
                                    نام
                                </label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="محسن برومند">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label  class="col-2 col-form-label">
                                    نام خانوادگی
                                </label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="محسن برومند">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label  class="col-2 col-form-label">کدملی</label>
                                <div class="col-7">
                                    <input class="form-control m-input" style="text-align: left" type="text" value="123456789">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label  class="col-2 col-form-label">شماره همراه</label>
                                <div class="col-7">
                                    <input class="form-control m-input" style="text-align: left" type="text" value="09153456789">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label  class="col-2 col-form-label">ثابت</label>
                                <div class="col-7">
                                    <input class="form-control m-input" style="text-align: left" type="text" value="09153456789">
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">2. آدرس</h3>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-2">استان </label>
                                <div class="col-7">
                                    <select name=""  class="form-control m-bootstrap-select selectpicker" data-live-search="true">
                                        <option value="">استان 1</option>
                                        <option value="">استان 2</option>
                                        <option value="" selected>استان 3</option>
                                        <option value="">استان 4</option>
                                        <option value="">استان 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-2">شهر </label>
                                <div class="col-7">
                                    <select name=""  class="form-control m-bootstrap-select selectpicker" data-live-search="true">
                                        <option value="">شهر 1</option>
                                        <option value="">شهر 2</option>
                                        <option value="">شهر 3</option>
                                        <option value="">شهر 4</option>
                                        <option value="" selected>شهر 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label  class="col-2 col-form-label">آدرس دقیق</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="تهران">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label
                                        class="col-2 col-form-label">کدپستی</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="45000">
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">3. اطلاعات حقوقی</h3>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label
                                        class="col-2 col-form-label">کد اقتصادی شرکت</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label  class="col-2 col-form-label">نام ثبت شده شرکت </label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label
                                        class="col-2 col-form-label">سال تاسیس</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label
                                        class="col-2 col-form-label">نام تجاری</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label
                                        class="col-2 col-form-label">کد نمایندگی</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label
                                        class="col-2 col-form-label">کد شناسایی ملی حقوقی شرکت ها</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label
                                        class="col-2 col-form-label">شماره ثبت شرکت</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="">
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row" style="text-align: center">

                                    <div class="col-12">
                                        <button type="reset"
                                                class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                            ذخیره
                                        </button>&nbsp;&nbsp;
                                        <button type="reset"
                                                class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                            لغو
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sub_header')
    پروفایل کاربری
@endsection

@section('title')
    مشاهده و ویرایش پروفایل
@endsection


@section('end_script')
    <!-- pirvate-script-file for this page  -->
@endsection


@section('head_css')
    <!-- pirvate-css-file for this page  -->
@endsection