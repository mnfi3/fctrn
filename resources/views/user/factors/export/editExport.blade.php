@extends('layouts.dashboard')
@section('title', 'ویرایش فاکتور صادرات')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">ویرایش فاکتور
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                    {{--                        <small class="text-muted fs-7 fw-bold my-1 ms-1">برای ویرا فاکتورهای فروش و صادر شده از طریق فرم زیر اقدام نمایید.</small>--}}
                    <!--end::Description--></h1>
                    <!--end::Title-->
                </div>
                <div class="card-title m-0 align-left">
                    <a class="btn btn-primary badge align-items-end" href="{{route('invoice.create')}}" target="_blank">+ ثبت فاکتور جدید</a>
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                @if(\Illuminate\Support\Facades\Session::get('success'))
                    <!--begin::Notice-->
                        <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-success me-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
                                                                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black" />
                                                                </svg>
                                                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <h4 class="text-danger-900 fw-bolder">تایید!</h4>
                                    <div class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif

                @if(\Illuminate\Support\Facades\Session::get('fail'))
                    <!--begin::Notice-->
                        <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <h4 class="text-danger-900 fw-bolder">خطا!</h4>
                                    <div class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('fail')}}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif


                @if(hasInvoiceVerifyError($invoice->verify_response))
                    <!--begin::Notice-->
                        <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                    </svg>
                                </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <!--begin::Actions-->
                                    برای مشاهده لیست خطاها بر روی کلید مربوطه کلیک نمایید.
                                    <br/>
                                    <a  class="btn btn-danger badge mt-2" data-bs-toggle="modal" data-bs-target="#ShowErrors">مشاهده خطاها</a>
                                    <!--end::Actions-->
                                    <!--begin::Modal - New Target-->
                                    <div class="modal fade" id="ShowErrors" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-800px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content rounded">
                                                <!--begin::Modal header-->
                                                <div class="modal-header pb-0 border-0 justify-content-end">
                                                    <!--begin::Close-->
                                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--begin::Modal header-->
                                                <!--begin::Modal body-->
                                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                    <!--begin:Form-->
                                                    <!--begin::Heading-->
                                                    <div class="mb-6 text-center">
                                                        <!--begin::Title-->
                                                        <h1 class="mb-3">لیست خطاهای دریافتی از سازمان امور مالیاتی</h1>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Heading-->
                                                    <div class="row gy-5 g-xl-8 align-items-start d-flex">
                                                        <div class="col-xl-12 px-7 py-3">
                                                            <span class="p-2 fs-6 fw-bold">    مؤدی گرامی! جهت ثبت صورتحساب لطفا با توجه به خطاهای زیر اقدام به رفع موارد مطرح شده نموده و مجدد کلید ثبت را فشار دهید.</span>
                                                            </span>
                                                            <div class="mt-4 d-flex justify-content-start bg-light-danger border-1 border-dashed border-danger rounded px-7 py-3">
                                                                <ul>
                                                                    @php $v_errors = getInvoiceVerifyErrors($invoice->verify_response) @endphp
                                                                    @foreach($v_errors as $v_error)
                                                                        <li>{{$v_error}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--end:Form-->
                                                </div>
                                                <!--end::Modal body-->
                                            </div>
                                            <!--end::Modal content-->
                                        </div>
                                        <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - New Target-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <script type="text/javascript">
                            $(window).on('load', function() {
                                $('#ShowErrors').modal('show');
                            });
                        </script>

                @endif


                <!--begin::Basic info-->
                    <!--begin::Form-->
                    <form method="POST" action="{{route('invoice.update')}}" id="kt_account_profile_details_form" class="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$invoice->id}}">

                        @error('errors')
                        <div class=" flex-column align-items-between my-1 p-0">
                            <h6 class=" m-auto alert alert-danger">{{ $message }}</h6>
                        </div>
                        @enderror


                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_moadi_details" aria-expanded="true" aria-controls="kt_account_moadi_details">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">مودی</h3>
                                            <span class="ms-2 rotate-180">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--begin::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_moadi_details" class="collapse show">
                                        <div class="card-body border-top p-9">
                                            <!--begin::Input group-->
                                            <div class="row g-9">
                                                <div class="col-md-12 fv-row">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2">مودی را انتخاب کنید</label>
                                                    <select class="form-select form-select-solid  border-1 border border-gray-300" data-control="select2" data-placeholder="مؤدی مورد نظر را مشخص کنید..." name="taxpayer_id" required>
                                                        @foreach($taxpayers as $taxpayer)
                                                            <option value="{{$taxpayer->id}}" @if($taxpayer->id == $invoice->taxpayer_id) selected @endif >{{$taxpayer->name.'-'.$taxpayer->username}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                </div>
                                <!--end::Basic info-->
                            </div>
                        </div>
                        <!--end::Basic info-->
                        <!--begin::Basic info Invoice-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">جزئیات صورت حساب</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نوع</label>
                                            <select class="form-select form-select-solid  border-1 border border-gray-300" data-control="select2" data-placeholder="نوع مشمولیت" name="inty" id="inty" onchange="intyStatement()" required>
                                                <option value="1" @if($invoice->inty == 1) selected @endif >نوع اول(همراه با اطلاعات خریدار)</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">الگو</label>
                                            <select class="form-select form-select-solid  border-1 border border-gray-300" data-control="select2" data-placeholder="الگوی فروش" name="inp" id="inp" onchange="OlgoChange()" required>
                                                <option value="4" @if($invoice->inp == 7) selected @endif >صادرات</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شماره کوتاژ اظهارنامه گمرکی</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره پروانه گمرکی را وارد نمایید." name="cdcn" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">تاریخ کوتاژ اظهارنامه گمرکی</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" data-jdp placeholder="1401/01/01" name="cdcd" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">کد گمرک محل اظهار فروشنده</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="کد گمرک محل اظهار فروشنده را وارد نمایید." name="scc" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">کد شعبه فروشنده</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="کد شعبه فروشنده را وارد نمایید." name="sbc" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row"  id="number">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شماره فاکتور</label>
                                            <input type="text" class="form-control form-control-solid  border-1 border border-gray-300" placeholder="شماره فاکتور را وارد نمایید." name="number" value="{{$invoice->number}}" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">تاریخ صدور</label>
                                            <input type="text" class="form-control form-control-solid  border-1 border border-gray-300" placeholder="1401/01/01" data-jdp name="indatim" value="{{toPersianDate(date('Y-m-d', $invoice->indatim/1000))}}" required>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">موضوع صورتحساب</label>
                                            <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="موضوع صورتحساب" name="ins" id="InvoiceSubject" required onchange="CheckSubjectRequirements()">
                                                <option value="1" @if($invoice->ins == 1) selected @endif >اصلی</option>
                                                <option value="2" @if($invoice->ins == 2) selected @endif >اصلاحی</option>
                                                <option value="3" @if($invoice->ins == 3) selected @endif >ابطالی</option>
                                                <option value="4" @if($invoice->ins == 4) selected @endif >برگشت از فروش</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row @if($invoice->ins == 1) d-none @endif" id="IrTaxId">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">شماره منحصر به فرد مالیاتی مرجع </label>
                                            <input type="text" class="form-control form-control-solid  border-1 border border-gray-300" placeholder="شماره منحصر به فرد مالیاتی مرجع" name="irtaxid" value="{{$invoice->irtaxid}}">
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Basic info Invoice-->
                        <!--begin::Product-->
                        <div class="card" id="methodGold">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">افزودن کالا/خدمات</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Card title-->
                                    <div class="card-title mb-4">
                                        <h5 class="fw-bolder m-0">کالا/خدمات</h5>
                                    </div>
                                    <!--end::Card title-->
                                    <div class="dropdown-divider pb-2"></div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-4">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">کالا</label>
                                            <a class="fs-6 fw-bold mb-2 fw-bolder cursor-pointer" href="{{route('product.index')}}" target="_blank">افزودن کالا (کلیک کنید!)</a>
                                            <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="نوع کالا/خدمت" name="sstid" id="sstidG" onchange="SetVatRate()">
                                                <option value="">کالا مدنظر را انتخاب نمایید...</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->taxTpStoPartCode}}" data-vatG="{{$product->vat}}">{{$product->descriptionOfId.'-'.$product->taxTpStoPartCode}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شرح کالا/خدمت</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="شرح کالا/خدمت را وارد نمایید" name="Sharh"  id="SharhG">
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Card title-->
                                    <div class="card-title mb-4 pt-4">
                                        <h5 class="fw-bolder m-0">اطلاعات  نوع ارز</h5>
                                    </div>
                                    <!--end::Card title-->
                                    <div class="dropdown-divider pb-2"></div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-4">
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">نوع ارز</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="نوع ارز" name="cut" id="cut" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">نرخ براری ارز با ریال</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="نرخ براری ارز با ریال" name="exr" id="exr" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Card title-->
                                    <div class="card-title mb-4 pt-4">
                                        <h5 class="fw-bolder m-0">اطلاعات  اندازه گیری</h5>
                                    </div>
                                    <!--end::Card title-->
                                    <div class="dropdown-divider pb-2"></div>
                                    <!--begin::Input group-->
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">واحد اندازه گیری</label>
                                            <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="واحد اندازه گیری" name="Unit" id="UnitG">
                                                <option value="">الگوی فروش را مشخص کنید...</option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->UnitCode}}">{{$unit->Unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">تعداد/مقدار
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="منظور از این فیلد تعداد اقلام
هر کالا/خدمت در اظهارنامه گمرکی است!" aria-label="منظور از این فیلد تعداد اقلام
هر کالا/خدمت در اظهارنامه گمرکی است!"></i>
                                            </label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="تعداد/مقدار" name="Count"  id="Count" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">وزن خالص(kg)
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="وزن خالص برای خدمات صفر است!" aria-label="وزن خالص برای خدمات صفر است!"></i>
                                            </label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="تعداد/مقدار" name="nw"  id="nw">
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Card title-->
                                    <div class="card-title mb-4 pt-4">
                                        <h5 class="fw-bolder m-0">اطلاعات مبلغ</h5>
                                    </div>
                                    <!--end::Card title-->
                                    <div class="dropdown-divider pb-2"></div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-4">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ واحد(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="مبلغ واحد" name="UnitAmount" id="UnitAmount" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">ارزش ریالی کالا</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="مبلغ مالیات بر ارزش افزوده" name="ssrv" id="ssrv" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">ارزش ارزی کالا</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="نرخ مالیات بر ارزش افزوده" name="sscv"   id="sscv" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نرخ مالیات بر ارزش افزوده(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ مالیات بر ارزش افزوده" name="VatRate" id="VatRate" value="0" readonly>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ مالیات بر ارزش افزوده(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ مالیات بر ارزش افزوده" name="VatAmount" id="VatAmountG" value="0" readonly>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Card title-->
                                    <div class="card-title mb-4 pt-4">
                                        <h5 class="fw-bolder m-0">اطلاعات تکمیلی</h5>
                                    </div>
                                    <!--end::Card title-->
                                    <!--end::Card title-->
                                    <div class="dropdown-divider pb-2"></div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-4">
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">نرخ سایر مالیات و عوارض(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="odr" id="odr" onkeyup="CalculatePercantageETC()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">مبلغ سایر مالیات و عوارض</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="odam" id="odam" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">موضوع سایر مالیات و عوارض</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="موضوع سایر مالیات و عوارض را وارد کنید" name="odt" id="odt">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">نرخ سایر وجوه قانونی(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="olr" id="olr" onkeyup="CalculatePercantageETC()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">مبلغ سایر وجوه قانونی</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="olam" id="olam" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">موضوع سایر وجوه قانونی</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="موضوع سایر وجوه قانونی را وارد کنید" name="olt" id="olt">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شناسه یکتای قرارداد حق العمل کاری</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="شناسه یکتای قرارداد حق العمل کاری" name="bsrn" id="bsrn">
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Card title-->
                                    <div class="card-title mb-4 pt-4">
                                        <h5 class="fw-bolder m-0">مجموع مبلغ</h5>
                                    </div>
                                    <!--end::Card title-->
                                    <!--end::Card title-->
                                    <div class="dropdown-divider pb-2"></div>
                                    <!--begin::Input group-->
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ کل کالا/خدمت(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ کل کالا/خدمت" name="bill" id="billG" readonly>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>

                                <!--end::Card body-->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function(){
                                        // Add new element
                                        $(".add").click(function(){
                                            // Finding total number of elements added
                                            var total_element = $(".element").length;
                                            // last <div> with element class id
                                            var lastidd = $(".element:last").attr("id");
                                            var split_idd = lastidd.split("_");
                                            var nextindexx = Number(split_idd[1]) + 1;
                                            const collection0 = document.getElementById("sstidG");
                                            const collection1 = document.getElementById("SharhG");

                                            const collection2 = document.getElementById("cut");
                                            const collection3 = document.getElementById("exr");
                                            const collection4 = document.getElementById("UnitG");
                                            const collection5 = document.getElementById("Count");
                                            const collection6 = document.getElementById("nw");
                                            const collection7 = document.getElementById("UnitAmount");

                                            const collection8 = document.getElementById("ssrv");
                                            const collection9 = document.getElementById("sscv");
                                            const collection10 = document.getElementById("VatRate");
                                            const collection11 = document.getElementById("VatAmountG");
                                            const collection12 = document.getElementById("odr");
                                            const collection13 = document.getElementById("odam");
                                            const collection14 = document.getElementById("odt");
                                            const collection15 = document.getElementById("olr");
                                            const collection16 = document.getElementById("olam");
                                            const collection17 = document.getElementById("olt");
                                            const collection18 = document.getElementById("billG");

                                            const collection19 = document.getElementById("bsrn");

                                            document.getElementById("tbillG").value = Number(removeComma("tbillG")) + Number(removeComma("billG"));
                                            document.getElementById("tonw").value = Number(removeComma("tonw")) + Number(removeComma("nw"));
                                            document.getElementById("torv").value = Number(removeComma("torv")) + Number(removeComma("ssrv"));
                                            document.getElementById("tocv").value = Number(removeComma("tocv")) + Number(removeComma("sscv"));
                                            document.getElementById("todam").value = Number(removeComma("todam")) + Number(removeComma("odam")) + Number(removeComma("olam"));


                                            divider("tbillG");
                                            divider("tonw");
                                            divider("torv");
                                            divider("tocv");
                                            divider("todam");

                                            // Adding new div container after last occurance of element class
                                            $(".element:last").after("<tr class='text-center element' id='div_"+ nextindexx +"'></tr>");
                                            // Adding element to <div>
                                            $("#div_" + nextindexx).append('<td><a class="remove" id="remove_' + nextindexx + '" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="حذف"><i class="bi bi-trash-fill text-danger fs-4"></i></a></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D0['+nextindexx+']" id="D0['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D1['+nextindexx+']" id="D1['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D2['+nextindexx+']" id="D2['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D3['+nextindexx+']" id="D3['+nextindexx+']"  readonly/></td>' +
                                                '<td class="d-none"><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D4['+nextindexx+']" id="D4['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D5['+nextindexx+']" id="D5['+nextindexx+']"  onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D6['+nextindexx+']" id="D6['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D7['+nextindexx+']" id="D7['+nextindexx+']"   onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D8['+nextindexx+']" id="D8['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D9['+nextindexx+']" id="D9['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D10['+nextindexx+']" id="D10['+nextindexx+']" readonly/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D11['+nextindexx+']" id="D11['+nextindexx+']" readonly/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D12['+nextindexx+']" id="D12['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D13['+nextindexx+']" id="D13['+nextindexx+']"  onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D14['+nextindexx+']" id="D14['+nextindexx+']" readonly/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D15['+nextindexx+']" id="D15['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D16['+nextindexx+']" id="D16['+nextindexx+']"  onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D17['+nextindexx+']" id="D17['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D18['+nextindexx+']" id="D18['+nextindexx+']"  readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D19['+nextindexx+']" id="D19['+nextindexx+']" /></td>' +
                                                '<td><a class="remove" id="remove_' + nextindexx + '" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="حذف"><i class="bi bi-trash-fill text-danger fs-4"></i></a></td>');

                                            document.getElementById('D0['+nextindexx+']').value = collection0.value;
                                            document.getElementById('D1['+nextindexx+']').value = collection1.value;
                                            document.getElementById('D2['+nextindexx+']').value = collection2.value;
                                            document.getElementById('D3['+nextindexx+']').value = collection3.value;
                                            document.getElementById('D4['+nextindexx+']').value = collection4.value;
                                            document.getElementById('D5['+nextindexx+']').value = collection5.value;
                                            document.getElementById('D6['+nextindexx+']').value = collection6.value;
                                            document.getElementById('D7['+nextindexx+']').value = collection7.value;
                                            document.getElementById('D8['+nextindexx+']').value = collection8.value;
                                            document.getElementById('D9['+nextindexx+']').value = collection9.value;
                                            document.getElementById('D10['+nextindexx+']').value = collection10.value;
                                            document.getElementById('D11['+nextindexx+']').value = collection11.value;
                                            document.getElementById('D12['+nextindexx+']').value = collection12.value;
                                            document.getElementById('D13['+nextindexx+']').value = collection13.value;
                                            document.getElementById('D14['+nextindexx+']').value = collection14.value;
                                            document.getElementById('D15['+nextindexx+']').value = collection15.value;
                                            document.getElementById('D16['+nextindexx+']').value = collection16.value;
                                            document.getElementById('D17['+nextindexx+']').value = collection17.value;
                                            document.getElementById('D18['+nextindexx+']').value = collection18.value;
                                            document.getElementById('D19['+nextindexx+']').value = collection19.value;

                                            //reset
                                            document.getElementById('sstidG').value = null;
                                            document.getElementById('select2-sstidG-container').innerText = null;
                                            document.getElementById('SharhG').value = null;
                                            document.getElementById('UnitG').value = null;
                                            document.getElementById('select2-UnitG-container').innerText = null;
                                            document.getElementById('cut').value = null;
                                            document.getElementById('exr').value = 0;
                                            document.getElementById('odr').value = 0;
                                            document.getElementById('odam').value = 0;
                                            document.getElementById('nw').value = 0;
                                            document.getElementById('ssrv').value = 0;
                                            document.getElementById('sscv').value = 0;
                                            document.getElementById('odt').value = null;
                                            document.getElementById('olr').value = 0;
                                            document.getElementById('olam').value = 0;
                                            document.getElementById('olt').value = null;
                                            document.getElementById('Count').value = 0;
                                            document.getElementById('UnitAmount').value = 0;
                                            document.getElementById('billG').value = 0;
                                            document.getElementById('bsrn').value = null;

                                        });
                                        // Remove element
                                        $('.contain').on('click','.remove',function(){
                                            var idd = this.id;
                                            var split_idd = idd.split("_");
                                            var deleteindexx = split_idd[1];
                                            // Remove <div> with id
                                            $("#div_" + deleteindexx).remove();

                                            //recalculate
                                            var total_element = $(".element").length;
                                            var lastidd = $(".element:last").attr("id");
                                            var split_idd = lastidd.split("_");
                                            let ntotal = 0;
                                            let ntonw = 0;
                                            let ntorv = 0;
                                            let ntocv = 0;
                                            let SumOdamOlam = 0;
                                            for (let ii = 1; ii <= Number(split_idd[1]); ii++) {
                                                document.querySelectorAll('#contain tbody tr').forEach(row => {
                                                    var TotalInput = row.querySelector('input[name="D18[' + ii + ']"');
                                                    var TedadTotalInput = row.querySelector('input[name="D5[' + ii + ']"');
                                                    var FeeTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                                                    var UnitAmountInput = row.querySelector('input[name="D8[' + ii + ']"');

                                                    var tOdam = row.querySelector('input[name="D13[' + ii + ']"');
                                                    var tOlam = row.querySelector('input[name="D16[' + ii + ']"');

                                                    var tonw = row.querySelector('input[name="D6[' + ii + ']"');
                                                    var torv = row.querySelector('input[name="D8[' + ii + ']"');
                                                    var tocv = row.querySelector('input[name="D9[' + ii + ']"');

                                                    if (TotalInput) {
                                                        var UnitAmount = parseFloat(TotalInput.value.replace(/,/g, '')) || 0;
                                                        ntotal += UnitAmount;
                                                    }
                                                    if (tonw) {
                                                        var vazneKol = parseFloat(tonw.value.replace(/,/g, '')) || 0;
                                                        ntonw += vazneKol;
                                                    }
                                                    if (torv) {
                                                        var ArzeshRialKol = parseFloat(torv.value.replace(/,/g, '')) || 0;
                                                        ntorv += ArzeshRialKol;
                                                    }
                                                    if (tocv) {
                                                        var ArzeshDollarKol = parseFloat(tocv.value.replace(/,/g, '')) || 0;
                                                        ntocv += ArzeshDollarKol;
                                                    }

                                                    if (tOdam && tOlam) {
                                                        var tOdamTotal = parseFloat(tOdam.value.replace(/,/g, '')) || 0;
                                                        var tOlamTotal = parseFloat(tOlam.value.replace(/,/g, '')) || 0;
                                                        var OdamOlamtotal = tOdamTotal + tOlamTotal;
                                                        SumOdamOlam += OdamOlamtotal;
                                                    }

                                                });
                                            }
                                            document.getElementById("tbillG").value = ntotal;
                                            document.getElementById("tonw").value = ntonw;
                                            document.getElementById("torv").value = ntorv;
                                            document.getElementById("tocv").value = ntocv;
                                            document.getElementById("todam").value = SumOdamOlam;

                                            divider("tbillG");
                                            divider("tonw");
                                            divider("tocv");
                                            divider("torv");
                                            divider("todam");
                                        });
                                    });
                                </script>
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end px-8 mb-4">
                                    <a class="btn btn-primary add badge" id="kt_account_profile_details_submit">افزودن +</a>
                                </div>
                                <!--end::Actions-->
                                <div class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3 mb-6">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="contain">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="fw-bolder text-center">
                                                <th>عملیات</th>
                                                <th class="min-w-150px">شرح</th>
                                                <th class="min-w-150px">نوع ارز</th>
                                                <th class="min-w-150px">نرخ براری ارز با ریال</th>
                                                <th class="min-w-100px">تعداد/مقدار</th>
                                                <th class="min-w-100px">وزن خالص(kg)</th>
                                                <th class="min-w-150px">مبلغ واحد(ریال)</th>
                                                <th class="min-w-150px">ارزش ریالی کالا</th>
                                                <th class="min-w-150px">ارزش ارزی کالا</th>
                                                <th class="min-w-150px">مبلغ سایر مالیات و عوارض</th>
                                                <th class="min-w-150px">مبلغ سایر وجوه قانونی</th>
                                                <th class="min-w-150px">مبلغ کل(ریال)</th>
                                                <th class="min-w-150px">شناسه یکتای قرارداد حق العمل کاری</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="contain">
                                            <tr class='text-center element' id='div_1'></tr>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach($invoice->items as $item)
                                                <tr class='text-center element' id='div_{{$i+1}}'>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D0[{{$i+1}}]" id="D0[{{$i+1}}]" value="{{$item->sstid}}" readonly/></td>
                                                    <td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D1[{{$i+1}}]" id="D1[{{$i+1}}]" value="{{$item->sstt}}"/></td>
                                                    <td><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D2[{{$i+1}}]" id="D2[{{$i+1}}]"  value="{{$item->cut}}"/></td>
                                                    <td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D3[{{$i+1}}]" id="D3[{{$i+1}}]" value="{{$item->exr}}" /></td>
                                                    <td class="d-none"><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D4[{{$i+1}}]" id="D4[{{$i+1}}]"  value="{{$item->mu}}" /></td>
                                                    <td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D5[{{$i+1}}]" id="D5[{{$i+1}}]" value="{{$item->am}}"   onkeyup="calculateTotal({{$i+1}})"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D6[{{$i+1}}]" id="D6[{{$i+1}}]" onkeyup="calculateTotal({{$i+1}})"  value="{{$item->nw}}"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D7[{{$i+1}}]" id="D7[{{$i+1}}]"   onkeyup="calculateTotal({{$i+1}})" value="{{$item->fee}}"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D8[{{$i+1}}]" id="D8[{{$i+1}}]" readonly value="{{$item->ssrv}}" onkeyup="calculateTotal({{$i+1}})"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D9[{{$i+1}}]" id="D9[{{$i+1}}]" value="{{$item->sscv}}"   onkeyup="calculateTotal({{$i+1}})" /></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D10[{{$i+1}}]" id="D10[{{$i+1}}]" value="{{$item->vra}}" readonly/></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D11[{{$i+1}}]" id="D11[{{$i+1}}]" value="{{$item->vam}}" readonly/></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D12[{{$i+1}}]" value="{{$item->odr}}" id="D12[{{$i+1}}]" readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D13[{{$i+1}}]" id="D13[{{$i+1}}]" value="{{$item->odam}}"  onkeyup="calculateTotal({{$i+1}})"/></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D14[{{$i+1}}]" id="D14[{{$i+1}}]" value="{{$item->odt}}" readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D15[{{$i+1}}]" id="D15[{{$i+1}}]" value="{{$item->olr}}" readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D16[{{$i+1}}]" id="D16[{{$i+1}}]" value="{{$item->olam}}" onkeyup="calculateTotal({{$i+1}})"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D17[{{$i+1}}]" id="D17[{{$i+1}}]" value="{{$item->olt}}" readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D18[{{$i+1}}]" id="D18[{{$i+1}}]" value="{{$item->tsstam}}" readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D19[{{$i+1}}]" id="D19[{{$i+1}}]" value="{{$item->bsrn}}"/></td>
                                                    <td><a class="remove" id="remove_{{$i+1}}"><i class="bi bi-trash-fill text-danger fs-4"></i></a></td>
                                                </tr>
                                                @php
                                                    $i = $i+1;
                                                @endphp
                                            @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Product-->
                        <!--end::Card body-->
                        <!--end::Basic info Invoice-->
                        <!--begin::Total Sum Invoice Info-->
                        <div class="card" id="methodGoldSum">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_Factor_details" aria-expanded="true" aria-controls="kt_account_Factor_details">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">مجموع صورتحساب</h3>
                                    <span class="ms-2 rotate-180">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                                    </svg>
                                                </span>
                                        <!--end::Svg Icon-->
                                            </span>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_Factor_details" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-0">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع مالیات بر ارزش افزوده</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tvam" required readonly id="tvamG" value="0">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع سایر مالیات، عوارض و وجوه قانونی</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="todam" required readonly id="todam" value="{{number_format($invoice->todam)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع وزن خالص</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tonw" required readonly id="tonw" value="{{number_format($invoice->tonw)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع ارزش ریالی</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="torv" required readonly id="torv" value="{{number_format($invoice->torv)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع ارزش ارزی</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tocv" required readonly id="tocv" value="{{number_format($invoice->tocv)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع صورتحساب</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tbill" required readonly id="tbillG" value="{{number_format($invoice->tbill)}}">
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Actions-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">

                                    <a  class="btn btn-primary badge" data-bs-toggle="modal" data-bs-target="#submitFactorGold">ویرایش</a>
                                </div>
                                <!--end::Actions-->
                                <!--begin::Modal - New Target-->
                                <div class="modal" id="submitFactorGold" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-800px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content rounded">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 justify-content-end">
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                            </svg>
                                                        </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--begin::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                <!--begin:Form-->
                                                <!--begin::Heading-->
                                                <div class="mb-6 text-center">
                                                    <!--begin::Title-->
                                                    <h1 class="mb-3">ثبت صورتحساب</h1>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <div class="row gy-5 g-xl-8 align-items-start d-flex">
                                                    <div class="col-xl-12 rounded border-gray-700 border-1 border-gray-300 border-dashed border-gray-400 px-7 py-3">
                                                        <span class="p-2 fs-6 fw-bold">    مؤدی گرامی! جهت ثبت صورتحساب به صورت «موقت و پیش نویس» بر روی گزینه «ثبت موقت» و در صورت اطمینان از اطلاعات ثبت شده و تمایل به ارسال مستقیم صورتحساب به سازمان امور مالیاتی، بر روی گزینه «ثبت نهایی و ارسال» کلیک نمایید.</span>
                                                        </span>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-primary m-1">ثبت موقت</button>
                                                            <button type="submit"  name="is_send" value="1" class="btn btn-success m-1">ثبت نهایی و ارسال</button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--end:Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - New Target-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Total Sum Invoice Info-->
                    </form>
                    <script>
                        function calculateTotal(i) {
                            var product = document.getElementById('inp').value;

                            document.querySelectorAll('#contain tbody tr').forEach(row => {
                                var UnitAmountInput = row.querySelector('input[name="D7[' + i + ']"');
                                var TedadInput = row.querySelector('input[name="D5[' + i + ']"');
                                var TotalInput = row.querySelector('input[name="D8[' + i + ']"');

                                if (UnitAmountInput && TedadInput) {
                                    var UnitAmount = parseFloat(UnitAmountInput.value.replace(/,/g, '')) || 0;
                                    var Tedad = parseFloat(TedadInput.value.replace(/,/g, '')) || 0;
                                    var rowTotal = Tedad * UnitAmount;
                                    // Update the row's total cell value
                                    var rowTotalInput = row.querySelector('input[name="D18[' + i + ']"');

                                    var odam = row.querySelector('input[name="D13[' + i + ']"');
                                    var olam = row.querySelector('input[name="D16[' + i + ']"');

                                    //var odamValue = parseFloat(odam.value.replace(/,/g, '')) || 0;
                                    //var olamValue = parseFloat(olam.value.replace(/,/g, '')) || 0;

                                    if (TotalInput) {
                                        TotalInput.value = rowTotal;
                                    }

                                    if (rowTotalInput) {
                                        rowTotalInput.value = Tedad * UnitAmount + parseFloat(odam.value.replace(/,/g, '')) + parseFloat(olam.value.replace(/,/g, ''));
                                    }
                                }
                                divider('D3[' + i + ']');
                                divider('D4[' + i + ']');
                                divider('D5[' + i + ']');
                                divider('D6[' + i + ']');
                                divider('D7[' + i + ']');
                                divider('D8[' + i + ']');
                                divider('D9[' + i + ']');
                                divider('D13[' + i + ']');
                                divider('D16[' + i + ']');
                                divider('D18[' + i + ']');
                            });


                            var total_element = $(".element").length;
                            var lastidd = $(".element:last").attr("id");
                            var split_idd = lastidd.split("_");
                            let ntotal = 0;
                            let ntonw = 0;
                            let ntorv = 0;
                            let ntocv = 0;
                            let SumOdamOlam = 0;
                            for (let ii = 1; ii <= Number(split_idd[1]); ii++) {
                                document.querySelectorAll('#contain tbody tr').forEach(row => {
                                    var TotalInput = row.querySelector('input[name="D18[' + ii + ']"');
                                    var TedadTotalInput = row.querySelector('input[name="D5[' + ii + ']"');
                                    var FeeTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                                    var UnitAmountInput = row.querySelector('input[name="D8[' + ii + ']"');

                                    var tOdam = row.querySelector('input[name="D13[' + ii + ']"');
                                    var tOlam = row.querySelector('input[name="D16[' + ii + ']"');

                                    var tonw = row.querySelector('input[name="D6[' + ii + ']"');
                                    var torv = row.querySelector('input[name="D8[' + ii + ']"');
                                    var tocv = row.querySelector('input[name="D9[' + ii + ']"');

                                    if (TotalInput) {
                                        var UnitAmount = parseFloat(TotalInput.value.replace(/,/g, '')) || 0;
                                        ntotal += UnitAmount;
                                    }
                                    if (tonw) {
                                        var vazneKol = parseFloat(tonw.value.replace(/,/g, '')) || 0;
                                        ntonw += vazneKol;
                                    }
                                    if (torv) {
                                        var ArzeshRialKol = parseFloat(torv.value.replace(/,/g, '')) || 0;
                                        ntorv += ArzeshRialKol;
                                    }
                                    if (tocv) {
                                        var ArzeshDollarKol = parseFloat(tocv.value.replace(/,/g, '')) || 0;
                                        ntocv += ArzeshDollarKol;
                                    }

                                    if (tOdam && tOlam) {
                                        var tOdamTotal = parseFloat(tOdam.value.replace(/,/g, '')) || 0;
                                        var tOlamTotal = parseFloat(tOlam.value.replace(/,/g, '')) || 0;
                                        var OdamOlamtotal = tOdamTotal + tOlamTotal;
                                        SumOdamOlam += OdamOlamtotal;
                                    }

                                });
                            }
                            document.getElementById("tbillG").value = ntotal;
                            document.getElementById("tonw").value = ntonw;
                            document.getElementById("torv").value = ntorv;
                            document.getElementById("tocv").value = ntocv;
                            document.getElementById("todam").value = SumOdamOlam;

                            divider("tbillG");
                            divider("tonw");
                            divider("tocv");
                            divider("torv");
                            divider("todam");
                        }
                    </script>
                    <script>
                        function divider(inputElement) {
                            var inputValue = document.getElementById(inputElement).value;
                            document.getElementById(inputElement).value = inputValue.replace(/[^\d.]/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                        function removeComma(inputElement) {
                            return document.getElementById(inputElement).value.replace(/,/g, '');
                        }
                        function SetVatRate() {
                            var product = document.getElementById('inp').value;
                            var select = document.getElementById('sstidG');
                            var vatRateInputG = document.getElementById('VatRateG');
                            var selectedOption = select.options[select.selectedIndex];
                            var vatRate = selectedOption.getAttribute('data-vatG');
                            vatRateInputG.value = vatRate;
                        }
                        function CheckSubjectRequirements() {
                            var product = document.getElementById('InvoiceSubject').value;
                            if(product != '1'){
                                document.getElementById('number').classList.add('d-none');
                                document.getElementById('IrTaxId').classList.remove('d-none');
                            }
                            else{
                                document.getElementById('IrTaxId').classList.add('d-none');
                                document.getElementById('number').classList.remove('d-none');
                            }
                        }
                        var type = document.getElementById('inty').value;
                        if(type != '1'){
                            document.getElementById('insp').classList.add('d-none');
                            document.getElementById('cap').classList.add('d-none');
                        }
                        else{
                            document.getElementById('insp').classList.remove('d-none');
                            document.getElementById('cap').classList.remove('d-none');
                        }
                        function intyStatement() {
                            var type = document.getElementById('inty').value;
                            if(type != '1'){
                                document.getElementById('insp').classList.add('d-none');
                                document.getElementById('cap').classList.add('d-none');
                            }
                            else{
                                document.getElementById('insp').classList.remove('d-none');
                                document.getElementById('cap').classList.remove('d-none');
                            }
                        }
                        function CalculatePercantageETC() {
                            // Call the divider function from within another function
                            var product = document.getElementById('inp').value;
                            var UnitAmount =  document.getElementById("UnitAmount").value.replace(/,/g, '');
                            var Tedad = document.getElementById("Count").value.replace(/,/g, '');
                            var AmountBeforeDiscount = document.getElementById("ssrv").value.replace(/,/g, '');
                            //
                            var odr = document.getElementById("odr").value.replace(/,/g, '');
                            var odam = document.getElementById("odam").value.replace(/,/g, '');
                            var olr = document.getElementById("olr").value.replace(/,/g, '');
                            var olam = document.getElementById("olam").value.replace(/,/g, '');

                            odam = document.getElementById("odam").value = Math.floor(((+AmountBeforeDiscount)*(+odr/100)));
                            olam = document.getElementById("olam").value = Math.floor(((+AmountBeforeDiscount)*(+olr/100)));

                            document.getElementById("billG").value = +UnitAmount + +odam + +olam;
                            document.getElementById("UnitAmount").value = +AmountBeforeDiscount / +Tedad;

                            divider("UnitAmount");
                            divider("billG");
                            divider("odam");
                            divider("olam");
                        }
                        function CalculateFactor() {
                            // Call the divider function from within another function
                            var product = document.getElementById('inp').value;
                            var UnitAmount =  document.getElementById("UnitAmount").value.replace(/,/g, '');
                            var Tedad = document.getElementById("Count").value.replace(/,/g, '');
                            var AmountBeforeDiscount = document.getElementById("ssrv").value.replace(/,/g, '');

                            var odam = document.getElementById("odam").value.replace(/,/g, '');
                            var olam = document.getElementById("olam").value.replace(/,/g, '');

                            if (odam) {
                                resultOdr = (+odam / (+AmountBeforeDiscount)) * 100;
                                document.getElementById("odr").value = resultOdr.toFixed(4);
                            }
                            if (olam) {
                                resultOlr = (+olam / (+AmountBeforeDiscount)) * 100;
                                document.getElementById("olr").value = resultOlr.toFixed(4);
                            }

                            document.getElementById("billG").value = +UnitAmount + +odam + +olam;
                            document.getElementById("UnitAmount").value = +AmountBeforeDiscount / +Tedad;



                            divider("UnitAmount");
                            divider("billG");
                            divider("odam");
                            divider("olam");
                        }
                    </script>
                    <script>
                        window.onload = function () {

                            var total_element = $(".element").length;
                            var lastidd = $(".element:last").attr("id");
                            var split_idd = lastidd.split("_");
                            let ntotal = 0;
                            let ntonw = 0;
                            let ntorv = 0;
                            let ntocv = 0;
                            let SumOdamOlam = 0;
                            for (let ii = 1; ii <= Number(split_idd[1]); ii++) {
                                document.querySelectorAll('#contain tbody tr').forEach(row => {
                                    var TotalInput = row.querySelector('input[name="D18[' + ii + ']"');
                                    var TedadTotalInput = row.querySelector('input[name="D5[' + ii + ']"');
                                    var FeeTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                                    var UnitAmountInput = row.querySelector('input[name="D8[' + ii + ']"');

                                    var tOdam = row.querySelector('input[name="D13[' + ii + ']"');
                                    var tOlam = row.querySelector('input[name="D16[' + ii + ']"');

                                    var tonw = row.querySelector('input[name="D6[' + ii + ']"');
                                    var torv = row.querySelector('input[name="D8[' + ii + ']"');
                                    var tocv = row.querySelector('input[name="D9[' + ii + ']"');

                                    if (TotalInput) {
                                        var UnitAmount = parseFloat(TotalInput.value.replace(/,/g, '')) || 0;
                                        ntotal += UnitAmount;
                                    }
                                    if (tonw) {
                                        var vazneKol = parseFloat(tonw.value.replace(/,/g, '')) || 0;
                                        ntonw += vazneKol;
                                    }
                                    if (torv) {
                                        var ArzeshRialKol = parseFloat(torv.value.replace(/,/g, '')) || 0;
                                        ntorv += ArzeshRialKol;
                                    }
                                    if (tocv) {
                                        var ArzeshDollarKol = parseFloat(tocv.value.replace(/,/g, '')) || 0;
                                        ntocv += ArzeshDollarKol;
                                    }

                                    if (tOdam && tOlam) {
                                        var tOdamTotal = parseFloat(tOdam.value.replace(/,/g, '')) || 0;
                                        var tOlamTotal = parseFloat(tOlam.value.replace(/,/g, '')) || 0;
                                        var OdamOlamtotal = tOdamTotal + tOlamTotal;
                                        SumOdamOlam += OdamOlamtotal;
                                    }

                                });
                            }
                            document.getElementById("tbillG").value = ntotal;
                            document.getElementById("tonw").value = ntonw;
                            document.getElementById("torv").value = ntorv;
                            document.getElementById("tocv").value = ntocv;
                            document.getElementById("todam").value = SumOdamOlam;

                            divider("tbillG");
                            divider("tonw");
                            divider("tocv");
                            divider("torv");
                            divider("todam");
                        }
                    </script>
                    <script>
                        $(document).ready(function() {
                            $('.number-divider').keyup(function(event) {
                                if (event.which >= 37 && event.which <= 40) return;
                                $(this).val(toEnglishNumber($(this).val()))
                                $(this).val(function(index, value) {
                                    return value
                                        .replace(/[^\d.]/g, "")
                                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                                });
                            });
                            function toEnglishNumber(strNum) {
                                var pn = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
                                var en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
                                var an = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
                                var cache = strNum;
                                for (var i = 0; i < 10; i++) {
                                    var regex_fa = new RegExp(pn[i], 'g');
                                    var regex_ar = new RegExp(an[i], 'g');
                                    cache = cache.replace(regex_fa, en[i]);
                                    cache = cache.replace(regex_ar, en[i]);
                                }
                                return cache;
                            }

                        });

                    </script>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->



@endsection
