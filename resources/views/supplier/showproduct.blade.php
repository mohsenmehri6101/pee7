@extends('supplier.layouts.master')

@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        جدول نمایش کالا ها
                    </h3>
                </div>
            </div>

            <div class="m-portlet__head-tools">
                <a href="#"class="btn btn-accent m-btn m-btn--icon  m-btn--pill">
						<span>
							<i class="la la-cart-plus"></i>
							<span>ارسال کالای جدید</span>
						</span>
                </a>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-10 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>وضعیت:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select selectpicker"
                                                id="m_form_status">
                                            <option value="">همه</option>
                                            <option value="1">در انتظار</option>
                                            <option value="2">تحویل داده شده</option>
                                            <option value="3">لغو شده</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label class="m-label m-label--single">نوع:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select selectpicker"
                                                id="m_form_type">
                                            <option value="">همه</option>
                                            <option value="1">آنلاین</option>
                                            <option value="2">خرده فروشی</option>
                                            <option value="3">مستقیم</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid"
                                           placeholder="جستجو..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
									<span><i class="la la-search"></i></span>
								</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 order-1 order-xl-2 m--align-right">
                        <a href="html-table.html#"
                           class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-search"></i>
							<span>جستجو</span>
						</span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>

                </div>
            </div>
            <!--end: Search Form -->



            <table class="table table-bordered table-striped" id="html_table" width="100%">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>شناسه</th>
                    <th>عنوان کالا</th>
                    <th>برند کالا</th>
                    <th>مقدار</th>
                    <th>واحد کالا</th>
                    <th>قیمت هر واحد</th>
                    <th>استان محل تحویل</th>
                    <th>شهر محل تحویل</th>
                    <th>توضیحات تکمیلی</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>

                <tbody>

                <tr style="">
                    <td>1</td>
                    <td>شناسه1</td>
                    <td>عنوان1</td>
                    <td>برند1</td>
                    <td>مقدار1</td>
                    <td>واحد1</td>
                    <td>قیمت1</td>
                    <td>استان1</td>
                    <td>شهر1</td>
                    <td>توضیحات1</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-accent m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="ویرایش">
                            <i class="la la-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="حذف">
                            <i class="la la-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr style="">
                    <td>2</td>
                    <td>شناسه2</td>
                    <td>عنوان2</td>
                    <td>برند2</td>
                    <td>مقدار2</td>
                    <td>واحد2</td>
                    <td>قیمت2</td>
                    <td>استان2</td>
                    <td>شهر2</td>
                    <td>توضیحات2</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-accent m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="ویرایش">
                            <i class="la la-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="حذف">
                            <i class="la la-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr style="">
                    <td>3</td>
                    <td>شناسه3</td>
                    <td>عنوان3</td>
                    <td>برند3</td>
                    <td>مقدار3</td>
                    <td>واحد3</td>
                    <td>قیمت3</td>
                    <td>استان3</td>
                    <td>شهر3</td>
                    <td>توضیحات3</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-accent m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="ویرایش">
                            <i class="la la-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="حذف">
                            <i class="la la-trash"></i>
                        </button>
                    </td>
                </tr>

                </tbody>

            </table>

        </div>
    </div>

@endsection

@section('sub_header')
    مشاهده و مدیریت کالاها
@endsection

@section('title')
    مشاهده و مدیریت کالاها
@endsection


@section('end_script')
    <!-- pirvate-script-file for this page  -->
@endsection


@section('head_css')
    <!-- pirvate-css-file for this page  -->
@endsection