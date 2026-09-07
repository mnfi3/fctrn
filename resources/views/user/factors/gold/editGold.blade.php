@extends('layouts.dashboard')
@section('title', 'ویرایش فاکتور طلا، جواهر و پلاتین')
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
                                <div class="col-md-6">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_moshtari_details" aria-expanded="true" aria-controls="kt_account_moshtari_details">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">مشتری</h3>
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
                                    <div id="kt_account_moshtari_details" class="collapse">
                                        <!--begin::Card body-->
                                        <div class="card-body border-top p-9">
                                            <!--begin::Input group-->
                                            <div class="row g-9">
                                                <div class="col-md-12 fv-row">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2">مشتری را انتخاب کنید</label>
                                                    <select class="form-select form-select-solid  border-1 border border-gray-300" data-control="select2" data-placeholder=" خریدار را مشخص کنید..." name="customer_id">
                                                        @foreach($customers as $customer)
                                                            <option value="{{$customer->id}}" @if($customer->id == $invoice->customer_id) selected @endif >{{$customer->name.'-'.$customer->national_code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Content-->
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
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نوع</label>
                                            <select class="form-select form-select-solid  border-1 border border-gray-300" data-control="select2" data-placeholder="نوع مشمولیت" name="inty" id="inty" onchange="intyStatement()" required>
                                                <option value="1" @if($invoice->inty == 1) selected @endif >نوع اول(همراه با اطلاعات خریدار)</option>
                                                <option value="2" @if($invoice->inty == 2) selected @endif >نوع دوم(بدون اطلاعات خریدار)</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">الگو</label>
                                            <select class="form-select form-select-solid  border-1 border border-gray-300" data-control="select2" data-placeholder="الگوی فروش" name="inp" id="inp" onchange="OlgoChange()" required>
                                                <option value="3" @if($invoice->inp == 3) selected @endif >صورت حساب طلا، جواهر، پلاتین</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">روش تسویه</label>
                                            <select class="form-select form-select-solid  border-1 border border-gray-300" data-control="select2" data-placeholder="روش تسویه" name="setm" required>
                                                <option value="1" @if($invoice->setm == 1) selected @endif >نقد</option>
                                                <option value="2" @if($invoice->setm == 2) selected @endif >نسیه</option>
                                                <option value="3" @if($invoice->setm == 3) selected @endif >نقد/ نسیه</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">مبلغ نسیه<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="فقط در صورتی که روش تسویه را نقد/نسیه وارد کرده باشید این مورد را وارد کنید!" aria-label="فقط در صورتی که روش تسویه را نقد/نسیه وارد کرده باشید این مورد را وارد کنید!"></i></label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="insp" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
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
                                        <div class="col-md-2 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">کد شعبه فروشنده</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="کد شعبه فروشنده را وارد نمایید." name="sbc" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">کد شعبه خریدار</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="کد شعبه خریدار را وارد نمایید." name="bbc" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row"  id="number">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شماره فاکتور</label>
                                            <input type="text" class="form-control form-control-solid  border-1 border border-gray-300" placeholder="شماره فاکتور را وارد نمایید." name="number" value="{{$invoice->number}}" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">تاریخ صدور</label>
                                            <input type="text" class="form-control form-control-solid  border-1 border border-gray-300" placeholder="1401/01/01" data-jdp name="indatim" value="{{toPersianDate(date('Y-m-d', $invoice->indatim/1000))}}" required>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">مالیات موضوع ماده 17</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مالیات موضوع ماده 17 را وارد کنید." name="tax17" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row d-none" id="crn">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شناسه یکتای ثبت قرارداد فروشنده</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="شناسه یکتای ثبت قرارداد" name="crn"  value="{{$invoice->crn}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row @if($invoice->ins == 1) d-none @endif" id="IrTaxId">
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
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">میزان ارز</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="میزان ارز" name="cfee" id="cfee" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
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
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مقدار</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="تعداد/مقدار" name="Count"  id="Count" onkeyup="CalculateFactor()">
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
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ قبل از تخفیف(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ قبل از تخفیف" name="AmountBeforeDiscount" id="AmountBeforeDisCount" readonly>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ تخفیف(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="تخفیف" name="Discount" id="DisCount" value="0" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">اجرت ساخت(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="اجرت ساخت(درصد)" name="ConstructionWages" id="ConstructionWagesP" value="0" onkeyup="CalculatePercantage()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">اجرت ساخت(ریال)</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="اجرت ساخت(ریال)" name="ConstructionWages" id="ConstructionWages" value="0" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fw-bold mb-2 fw-bolder">سود فروشنده(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="سود فروشنده(درصد)" name="SellerProfit" id="SellerProfitP" value="0" onkeyup="CalculatePercantage()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fw-bold mb-2 fw-bolder">سود فروشنده(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="سود فروشنده(ریال)" name="SellerProfit" id="SellerProfit" value="0" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">حق العمل(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="حق العمل(درصد)" name="BrokerageP" id="BrokerageP" value="0" onkeyup="CalculatePercantage()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">حق العمل(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="حق العمل(ریال)" name="Brokerage" id="Brokerage" value="0" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-6 fw-bold mb-2 fw-bolder"> مبلغ بعد از تخفیف(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ بعد از تخفیف" name="AmountAfterDiscount" id="AmountAfterDisCount" readonly>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نرخ مالیات بر ارزش افزوده(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="نرخ مالیات بر ارزش افزوده" name="VatRate" value="9"  id="VatRate" readonly>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ مالیات بر ارزش افزوده(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ مالیات بر ارزش افزوده" name="VatAmount" id="VatAmountG" readonly>
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
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">عیار</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="عیار" name="cui" id="cui" value="0">
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
                                            const collection2 = document.getElementById("cfee");
                                            const collection3 = document.getElementById("cut");
                                            const collection4 = document.getElementById("exr");
                                            const collection5 = document.getElementById("UnitG");
                                            const collection6 = document.getElementById("Count");
                                            const collection7 = document.getElementById("UnitAmount");
                                            const collection8 = document.getElementById("AmountBeforeDisCount");
                                            const collection9 = document.getElementById("ConstructionWages");
                                            const collection10 = document.getElementById("SellerProfit");
                                            const collection11 = document.getElementById("Brokerage");
                                            const collection12 = document.getElementById("DisCount");
                                            const collection13 = document.getElementById("AmountAfterDisCount");
                                            const collection14 = document.getElementById("VatRate");
                                            const collection15 = document.getElementById("VatAmountG");
                                            const collection16 = document.getElementById("odr");
                                            const collection17 = document.getElementById("odam");
                                            const collection18 = document.getElementById("odt");
                                            const collection19 = document.getElementById("olr");
                                            const collection20 = document.getElementById("olam");
                                            const collection21 = document.getElementById("olt");
                                            const collection22 = document.getElementById("billG");
                                            const collection23 = document.getElementById("cui");
                                            const collection24 = document.getElementById("bsrn");

                                            document.getElementById("tbillG").value = Number(removeComma("tbillG")) + Number(removeComma("billG"));
                                            document.getElementById("tvamG").value = Number(removeComma("tvamG")) + Number(removeComma("VatAmountG"));
                                            document.getElementById("tdisG").value = Number(removeComma("tdisG")) + Number(removeComma("DisCount"));
                                            document.getElementById("tprdisG").value = Number(removeComma("tprdisG")) + Number(removeComma("AmountBeforeDisCount"));
                                            document.getElementById("tadisG").value = Number(removeComma("tadisG")) + Number(removeComma("AmountAfterDisCount"));
                                            document.getElementById("todam").value = Number(removeComma("todam")) + Number(removeComma("odam")) + Number(removeComma("olam"));

                                            document.getElementById("tConstructionWages").value = Number(removeComma("tConstructionWages")) + Number(removeComma("ConstructionWages"));
                                            document.getElementById("tSellerProfit").value = Number(removeComma("tSellerProfit")) + Number(removeComma("SellerProfit"));
                                            document.getElementById("tBrokerage").value = Number(removeComma("tBrokerage")) + Number(removeComma("Brokerage"));

                                            divider("tbillG");
                                            divider("tvamG");
                                            divider("tdisG");
                                            divider("tprdisG");
                                            divider("tadisG");
                                            divider("todam");

                                            divider("tConstructionWages");
                                            divider("tSellerProfit");
                                            divider("tBrokerage");

                                            // Adding new div container after last occurance of element class
                                            $(".element:last").after("<tr class='text-center element' id='div_"+ nextindexx +"'></tr>");
                                            // Adding element to <div>
                                            $("#div_" + nextindexx).append('<td><a class="remove" id="remove_' + nextindexx + '" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="حذف"><i class="bi bi-trash-fill text-danger fs-4"></i></a></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D0['+nextindexx+']" id="D0['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D1['+nextindexx+']" id="D1['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D2['+nextindexx+']" id="D2['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D3['+nextindexx+']" id="D3['+nextindexx+']"  readonly/></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D4['+nextindexx+']" id="D4['+nextindexx+']"  /></td>' +
                                                '<td class="d-none"><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D5['+nextindexx+']" id="D5['+nextindexx+']"  readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D6['+nextindexx+']" id="D6['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D7['+nextindexx+']" id="D7['+nextindexx+']"   onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D8['+nextindexx+']" id="D8['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D9['+nextindexx+']" id="D9['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D10['+nextindexx+']" id="D10['+nextindexx+']"   onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D11['+nextindexx+']" id="D11['+nextindexx+']"   onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D12['+nextindexx+']" id="D12['+nextindexx+']"   onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D13['+nextindexx+']" id="D13['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D14['+nextindexx+']" id="D14['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D15['+nextindexx+']" id="D15['+nextindexx+']" readonly/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D16['+nextindexx+']" id="D16['+nextindexx+']" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D17['+nextindexx+']" id="D17['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D18['+nextindexx+']" id="D18['+nextindexx+']""/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D19['+nextindexx+']" id="D19['+nextindexx+']""/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D20['+nextindexx+']" id="D20['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D21['+nextindexx+']" id="D21['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D22['+nextindexx+']" id="D22['+nextindexx+']"  readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D23['+nextindexx+']" id="D23['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D24['+nextindexx+']" id="D24['+nextindexx+']" /></td>' +
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
                                            document.getElementById('D20['+nextindexx+']').value = collection20.value;
                                            document.getElementById('D21['+nextindexx+']').value = collection21.value;
                                            document.getElementById('D22['+nextindexx+']').value = collection22.value;
                                            document.getElementById('D23['+nextindexx+']').value = collection23.value;
                                            document.getElementById('D24['+nextindexx+']').value = collection24.value;

                                            //reset
                                            document.getElementById('sstidG').value = null;
                                            document.getElementById('select2-sstidG-container').innerText = null;
                                            document.getElementById('SharhG').value = null;
                                            document.getElementById('UnitG').value = null;
                                            document.getElementById('select2-UnitG-container').innerText = null;
                                            document.getElementById('cfee').value = 0;
                                            document.getElementById('cut').value = null;
                                            document.getElementById('exr').value = 0;
                                            document.getElementById('odr').value = 0;
                                            document.getElementById('odam').value = 0;
                                            document.getElementById('odt').value = null;
                                            document.getElementById('olr').value = 0;
                                            document.getElementById('olam').value = 0;
                                            document.getElementById('olt').value = null;
                                            document.getElementById('Count').value = 0;
                                            document.getElementById('UnitAmount').value = 0;
                                            document.getElementById('AmountBeforeDisCount').value = 0;
                                            document.getElementById('DisCount').value = 0;
                                            document.getElementById('AmountAfterDisCount').value = 0;
                                            document.getElementById('VatRate').value = 0;
                                            document.getElementById('VatAmountG').value = 0;
                                            document.getElementById('ConstructionWages').value = 0;
                                            document.getElementById('ConstructionWagesP').value = 0;
                                            document.getElementById('SellerProfit').value = 0;
                                            document.getElementById('SellerProfitP').value = 0;
                                            document.getElementById('Brokerage').value = 0;
                                            document.getElementById('BrokerageP').value = 0;
                                            document.getElementById('billG').value = 0;
                                            document.getElementById('cui').value = 0;
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
                                            var rowTotal1 = 0;
                                            let vattotal = 0;
                                            let discounttotal = 0;
                                            let tprdis = 0;
                                            let SumConstructionWagess = 0;
                                            let SumSellerProfits = 0;
                                            let SumBrokerages = 0;
                                            let ntotal = 0;
                                            let SumOdamOlam = 0;
                                            for (let ii = 1; ii <= Number(split_idd[1]); ii++) {
                                                document.querySelectorAll('#contain tbody tr').forEach(row => {
                                                    var TotalInput = row.querySelector('input[name="D22[' + ii + ']"');
                                                    var VatAmountTotalInput = row.querySelector('input[name="D15[' + ii + ']"');
                                                    var DiscountTotalInput = row.querySelector('input[name="D12[' + ii + ']"');
                                                    var TedadTotalInput = row.querySelector('input[name="D6[' + ii + ']"');
                                                    var FeeTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                                                    var tConstructionWages = row.querySelector('input[name="D9[' + ii + ']"');
                                                    var tSellerProfit = row.querySelector('input[name="D10[' + ii + ']"');
                                                    var tBrokerage = row.querySelector('input[name="D11[' + ii + ']"');
                                                    var tOdam = row.querySelector('input[name="D17[' + ii + ']"');
                                                    var tOlam = row.querySelector('input[name="D20[' + ii + ']"');
                                                    if (TotalInput) {
                                                        var UnitAmount = parseFloat(TotalInput.value.replace(/,/g, '')) || 0;
                                                        var rowTotal = UnitAmount;
                                                        ntotal += rowTotal;
                                                    }
                                                    if (VatAmountTotalInput) {
                                                        var VatAmountTotal = parseFloat(VatAmountTotalInput.value.replace(/,/g, '')) || 0;
                                                        var vtotal = VatAmountTotal;
                                                        vattotal += vtotal;
                                                    }
                                                    if (DiscountTotalInput) {
                                                        var DiscountTotal = parseFloat(DiscountTotalInput.value.replace(/,/g, '')) || 0;
                                                        var dtotal = DiscountTotal;
                                                        discounttotal += dtotal;
                                                    }
                                                    if (TedadTotalInput && FeeTotalInput) {
                                                        var UnitAmountTotal = parseFloat(FeeTotalInput.value.replace(/,/g, '')) || 0;
                                                        var TedadTotal = parseFloat(TedadTotalInput.value.replace(/,/g, '')) || 0;
                                                        var tprdistotal = UnitAmountTotal * TedadTotal;
                                                        tprdis += tprdistotal;
                                                    }
                                                    if (tConstructionWages) {
                                                        var TotalConstructionWages = parseFloat(tConstructionWages.value.replace(/,/g, '')) || 0;
                                                        var SumConstructionWages = TotalConstructionWages;
                                                        SumConstructionWagess += TotalConstructionWages;
                                                    }
                                                    if (tSellerProfit) {
                                                        var TotalSellerProfit = parseFloat(tSellerProfit.value.replace(/,/g, '')) || 0;
                                                        var SumSellerProfit = TotalSellerProfit;
                                                        SumSellerProfits += TotalSellerProfit;
                                                    }
                                                    if (tBrokerage) {
                                                        var TotalBrokerage = parseFloat(tBrokerage.value.replace(/,/g, '')) || 0;
                                                        var SumBrokerage = TotalBrokerage;
                                                        SumBrokerages += TotalBrokerage;
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
                                            document.getElementById("tvamG").value = vattotal;
                                            document.getElementById("tdisG").value = discounttotal;
                                            document.getElementById("tprdisG").value = tprdis;
                                            document.getElementById("tadisG").value = tprdis + SumConstructionWagess + SumSellerProfits + SumBrokerages - discounttotal;
                                            document.getElementById("tConstructionWages").value = SumConstructionWagess;
                                            document.getElementById("tSellerProfit").value = SumSellerProfits;
                                            document.getElementById("tBrokerage").value = SumBrokerages;
                                            document.getElementById("todam").value = SumOdamOlam;

                                            divider("tbillG");
                                            divider("tvamG");
                                            divider("tdisG");
                                            divider("tprdisG");
                                            divider("tadisG");
                                            divider("tConstructionWages");
                                            divider("tSellerProfit");
                                            divider("tBrokerage");
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
                                                <th class="min-w-150px">میزان ارز</th>
                                                <th class="min-w-150px">نوع ارز</th>
                                                <th class="min-w-150px">نرخ براری ارز با ریال</th>
                                                <th class="min-w-100px">تعداد/مقدار</th>
                                                <th class="min-w-150px">مبلغ واحد(ریال)</th>
                                                <th class="min-w-150px">مبلغ قبل از تخفیف(ریال)</th>
                                                <th class="min-w-150px">اجرت ساخت(ریال)</th>
                                                <th class="min-w-150px">سود فروشنده(ریال)</th>
                                                <th class="min-w-150px">حق العمل(ریال)</th>
                                                <th class="min-w-150px">تخفیف(ریال)</th>
                                                <th class="min-w-150px">مبلغ بعد از تخفیف(ریال)</th>
                                                <th class="min-w-100px">نرخ مالیات بر ارزش افزوده(درصد)</th>
                                                <th class="min-w-150px">مالیات بر ارزش افزوده(ریال)</th>
                                                <th class="min-w-150px">مبلغ سایر مالیات و عوارض</th>
                                                <th class="min-w-150px">مبلغ سایر وجوه قانونی</th>
                                                <th class="min-w-150px">مبلغ کل(ریال)</th>
                                                <th class="min-w-100px">عیار</th>
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
                                                    <td><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D2[{{$i+1}}]" id="D2[{{$i+1}}]"  value="{{$item->cfee}}"/></td>
                                                    <td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D3[{{$i+1}}]" id="D3[{{$i+1}}]" value="{{$item->cut}}" readonly/></td>
                                                    <td><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="D4[{{$i+1}}]" id="D4[{{$i+1}}]"  value="{{$item->exr}}" /></td>
                                                    <td class="d-none"><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D5[{{$i+1}}]" id="D5[{{$i+1}}]" value="{{$item->mu}}"  readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D6[{{$i+1}}]" id="D6[{{$i+1}}]" onkeyup="calculateTotal({{$i+1}})"  value="{{$item->am}}"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D7[{{$i+1}}]" id="D7[{{$i+1}}]"   onkeyup="calculateTotal({{$i+1}})" value="{{$item->fee}}"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D8[{{$i+1}}]" id="D8[{{$i+1}}]" readonly value="{{$item->prdis}}"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D9[{{$i+1}}]" id="D9[{{$i+1}}]" value="{{$item->consfee}}" onkeyup="calculateTotal({{$i+1}})"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D10[{{$i+1}}]" id="D10[{{$i+1}}]" value="{{$item->spro}}"   onkeyup="calculateTotal({{$i+1}})" /></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D11[{{$i+1}}]" id="D11[{{$i+1}}]" value="{{$item->bros}}"   onkeyup="calculateTotal({{$i+1}})" /></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D12[{{$i+1}}]" id="D12[{{$i+1}}]" value="{{$item->dis}}"   onkeyup="calculateTotal({{$i+1}})" /></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D13[{{$i+1}}]" id="D13[{{$i+1}}]" value="{{$item->adis}}" readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D14[{{$i+1}}]" id="D14[{{$i+1}}]" value="{{$item->vra}}" readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D15[{{$i+1}}]" value="{{$item->vam}}" id="D15[{{$i+1}}]" readonly/></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D16[{{$i+1}}]" id="D16[{{$i+1}}]" value="{{$item->odr}}" /></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D17[{{$i+1}}]" id="D17[{{$i+1}}]" value="{{$item->odam}}" onkeyup="calculateTotal({{$i+1}})"/></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D18[{{$i+1}}]" id="D18[{{$i+1}}]" value="{{$item->odt}}"/></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D19[{{$i+1}}]" id="D19[{{$i+1}}]" value="{{$item->olr}}"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D20[{{$i+1}}]" id="D20[{{$i+1}}]" onkeyup="calculateTotal({{$i+1}})" value="{{$item->olam}}"/></td>
                                                    <td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D21[{{$i+1}}]" id="D21[{{$i+1}}]" value="{{$item->olt}}" onkeyup="calculateTotal({{$i+1}})"/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D22[{{$i+1}}]" id="D22[{{$i+1}}]"value="{{$item->tsstam}}"  readonly/></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D23[{{$i+1}}]" id="D23[{{$i+1}}]"value="{{$item->cui}}"  /></td>
                                                    <td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D24[{{$i+1}}]" id="D24[{{$i+1}}]"value="{{$item->bsrn}}" /></td>
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
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع مبلغ قبل از کسر تخفیف</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tprdis" required readonly id="tprdisG" value="{{number_format($invoice->tprdis)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع اجرت ساخت(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tConstructionWages" required readonly id="tConstructionWages" value="{{number_format($invoice->tConstructionWages)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع سود فروشنده(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tSellerProfit" required readonly id="tSellerProfit" value="{{number_format($invoice->tSellerProfit)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع حق العمل(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tBrokerage" required readonly id="tBrokerage" value="{{number_format($invoice->tBrokerage)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع تخفیفات</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider"  placeholder="0" name="tdis" required readonly id="tdisG" value="{{number_format($invoice->tdis)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع مبلغ پس از کسر تخفیف</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tadis" required readonly id="tadisG" value="{{number_format($invoice->tadis)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع مالیات بر ارزش افزوده</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tvam" required readonly id="tvamG" value="{{number_format($invoice->tvam)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع سایر مالیات، عوارض و وجوه قانونی</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="todam" required readonly id="todam" value="{{number_format($invoice->todam)}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع صورتحساب</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tbill" required readonly id="tbillG" value="{{number_format($invoice->tbill)}}">
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Total Sum Invoice Info-->
                        <!--begin::Total Sum Invoice Info-->
                        <div class="card" id="PardaxtInfo">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_PardaxtInfo" aria-expanded="true" aria-controls="kt_PardaxtInfo">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">اطلاعات پرداخت</h3>
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
                            <div id="kt_PardaxtInfo" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-0">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">روش پرداخت</label>
                                            <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" name="pmt" id="pmt">
                                                <option value="">انتخاب کنید</option>
                                                <option value="1">چک</option>
                                                <option value="2">تهاتر</option>
                                                <option value="3">وجه نقد</option>
                                                <option value="4">POS</option>
                                                <option value="5">درگاه پرداخت اینترنتی</option>
                                                <option value="6">کارت به کارت</option>
                                                <option value="7">انتقال به حساب</option>
                                                <option value="8">سایر</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">تاریخ پرداخت</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" data-jdp placeholder="1401/01/01" name="pdt" id="pdt">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">مبلغ پرداختی</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="pv" id="pv">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">شماره کارت پرداخت کننده صورتحساب</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره کارت پرداخت کننده را وارد کنید" name="pcn" id="pcn">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">شماره ملی/کد فراگیر پرداخت کننده</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300"  placeholder="شماره ملی/کد فراگیر پرداخت کننده را وارد کنید" name="pid" id="pid">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">شماره پذیرنده فروشگاهی</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره پذیرنده فروشگاهی وارد کنید" name="acn" id="acn">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">شماره پایانه</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره پایانه را وارد کنید" name="trmn" id="trmn">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">شماره پیگیری/مرجع</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره پیگیری را وارد کنید" name="trn" id="trn">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">شماره سوئیچ پرداخت</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره سوئیچ پرداخت را وارد کنید" name="iinn" id="iinn">
                                        </div>
                                        <!--begin::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <script>
                                        $(document).ready(function(){
                                            // Add new element
                                            $(".addPardaxt").click(function(){
                                                // Finding total number of elements added
                                                var total_element = $(".elementPardaxt").length;
                                                // last <div> with element class id
                                                var lastid = $(".elementPardaxt:last").attr("id");
                                                var split_id = lastid.split("_");
                                                var nextindex = Number(split_id[1]) + 1;
                                                const collection1 = document.getElementById("pmt");
                                                const collection2 = document.getElementById("pdt");
                                                const collection3 = document.getElementById("pv");
                                                const collection4 = document.getElementById("pcn");
                                                const collection5 = document.getElementById("pid");
                                                const collection6 = document.getElementById("acn");
                                                const collection7 = document.getElementById("trmn");
                                                const collection8 = document.getElementById("trn");
                                                const collection9 = document.getElementById("iinn");


                                                // Adding new div container after last occurance of element class
                                                $(".elementPardaxt:last").after("<tr class='text-center elementPardaxt' id='divP_"+ nextindex +"'></tr>");
                                                // Adding element to <div>
                                                $("#divP_" + nextindex).append('<td><a class="removeP" id="removeP_' + nextindex + '" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="حذف"><i class="bi bi-trash-fill text-danger fs-4"></i></a></td>' +
                                                    '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="DP1['+nextindex+']" id="DP1['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300"  data-jdp  name="DP2['+nextindex+']" id="DP2['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300 number-divider" name="DP3['+nextindex+']" id="DP3['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="DP4['+nextindex+']" id="DP4['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="DP5['+nextindex+']" id="DP5['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="DP6['+nextindex+']" id="DP6['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="DP7['+nextindex+']" id="DP7['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="DP8['+nextindex+']" id="DP8['+nextindex+']"/></td>' +
                                                    '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="DP9['+nextindex+']" id="DP9['+nextindex+']"/></td>' +
                                                    '<td><a class="removeP" id="removeP_' + nextindex + '" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="حذف"><i class="bi bi-trash-fill text-danger fs-4"></i></a></td>');

                                                document.getElementById('DP1['+nextindex+']').value = collection1.value;
                                                document.getElementById('DP2['+nextindex+']').value = collection2.value;
                                                document.getElementById('DP3['+nextindex+']').value = collection3.value;
                                                document.getElementById('DP4['+nextindex+']').value = collection4.value;
                                                document.getElementById('DP5['+nextindex+']').value = collection5.value;
                                                document.getElementById('DP6['+nextindex+']').value = collection6.value;
                                                document.getElementById('DP7['+nextindex+']').value = collection7.value;
                                                document.getElementById('DP8['+nextindex+']').value = collection8.value;
                                                document.getElementById('DP9['+nextindex+']').value = collection9.value;

                                                //reset
                                                document.getElementById('pmt').value = null;
                                                document.getElementById('select2-pmt-container').innerText = null;
                                                document.getElementById('pdt').value = null;
                                                document.getElementById('pv').value = 0;
                                                document.getElementById('pcn').value = null;
                                                document.getElementById('pid').value = null;
                                                document.getElementById('acn').value = null;
                                                document.getElementById('trmn').value = null;
                                                document.getElementById('trn').value = null;
                                                document.getElementById('iinn').value = null;

                                            });
                                            // Remove element
                                            $('.containPardaxt').on('click','.removeP',function(){
                                                var id = this.id;
                                                var split_id = id.split("_");
                                                var deleteindex = split_id[1];
                                                // Remove <div> with id
                                                $("#divP_" + deleteindex).remove();
                                            });
                                        });
                                    </script>
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end px-8 mb-4 mt-4">
                                        <a class="btn btn-primary addPardaxt badge" id="kt_account_profile_details_submit">افزودن +</a>
                                    </div>
                                    <!--end::Actions-->
                                    <!--begin::tabel-->
                                    <div class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3 mb-6">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="containPardaxt">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fw-bolder text-center">
                                                    <th>عملیات</th>
                                                    <th class="min-w-150px">روش پرداخت</th>
                                                    <th class="min-w-150px">تاریخ پرداخت</th>
                                                    <th class="min-w-150px">مبلغ پرداختی</th>
                                                    <th class="min-w-150px">شماره کارت پرداخت کننده</th>
                                                    <th class="min-w-100px">شماره ملی/کد فراگیر پرداخت کننده</th>
                                                    <th class="min-w-150px">شماره پذیرنده فروشگاهی</th>
                                                    <th class="min-w-150px">شماره پایانه</th>
                                                    <th class="min-w-150px">شماره پیگیری</th>
                                                    <th class="min-w-150px">شماره سوئیچ پرداخت</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody class="containPardaxt">
                                                <tr class="elementPardaxt" id="divP_"></tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::tabel-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Content-->
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
                        <!--end::Total Sum Invoice Info-->
                    </form>
                    <script>
                        function calculateTotal(i) {
                            var product = document.getElementById('inp').value;

                            document.querySelectorAll('#contain tbody tr').forEach(row => {
                                var UnitAmountInput = row.querySelector('input[name="D7[' + i + ']"');
                                var TedadInput = row.querySelector('input[name="D6[' + i + ']"');
                                var DiscountInput = row.querySelector('input[name="D12[' + i + ']"');

                                if (UnitAmountInput && TedadInput) {
                                    var UnitAmount = parseFloat(UnitAmountInput.value.replace(/,/g, '')) || 0;
                                    var Tedad = parseFloat(TedadInput.value.replace(/,/g, '')) || 0;
                                    var Discount = parseFloat(DiscountInput.value.replace(/,/g, '')) || 0;
                                    var rowTotal = Tedad * UnitAmount;
                                    // Update the row's total cell value
                                    var rowTotalInput = row.querySelector('input[name="D22[' + i + ']"');
                                    var AmountAfterDiscountInput = row.querySelector('input[name="D13[' + i + ']"');
                                    var AmountBeforerDiscountInput = row.querySelector('input[name="D8[' + i + ']"');
                                    var VatAmount = row.querySelector('input[name="D15[' + i + ']"');
                                    var ConstructionWages = row.querySelector('input[name="D9[' + i + ']"');
                                    var SellerProfit = row.querySelector('input[name="D10[' + i + ']"');
                                    var Brokerage = row.querySelector('input[name="D11[' + i + ']"');
                                    var VatRate = row.querySelector('input[name="D14[' + i + ']"');

                                    var odam = row.querySelector('input[name="D17[' + i + ']"');
                                    var olam = row.querySelector('input[name="D20[' + i + ']"');

                                    var ConstructionWagesValue = parseFloat(ConstructionWages.value.replace(/,/g, '')) || 0;
                                    var SellerProfitValue = parseFloat(SellerProfit.value.replace(/,/g, '')) || 0;
                                    var BrokerageValue = parseFloat(Brokerage.value.replace(/,/g, '')) || 0;

                                    //var odamValue = parseFloat(odam.value.replace(/,/g, '')) || 0;
                                    //var olamValue = parseFloat(olam.value.replace(/,/g, '')) || 0;

                                    if (AmountAfterDiscountInput) {
                                        AmountAfterDiscountInput.value = rowTotal + ConstructionWagesValue + SellerProfitValue + BrokerageValue - Discount;
                                    }
                                    if (AmountBeforerDiscountInput) {
                                        AmountBeforerDiscountInput.value = rowTotal;
                                    }


                                    if (VatAmount) {
                                        VatAmount.value = Math.floor(((rowTotal - Discount) * (parseFloat(VatRate.value.replace(/,/g, ''))/100)) + ((parseFloat(ConstructionWages.value.replace(/,/g, '')) + parseFloat(SellerProfit.value.replace(/,/g, '')) + parseFloat(Brokerage.value.replace(/,/g, '')))*0.09));
                                    }
                                    var VatAmountValue = Math.floor(((rowTotal - Discount) * (parseFloat(VatRate.value.replace(/,/g, ''))/100)) + ((parseFloat(ConstructionWages.value.replace(/,/g, '')) + parseFloat(SellerProfit.value.replace(/,/g, '')) + parseFloat(Brokerage.value.replace(/,/g, '')))*0.09));
                                    if (rowTotalInput) {
                                        rowTotalInput.value = rowTotal - Discount + VatAmountValue + parseFloat(ConstructionWages.value.replace(/,/g, '')) + parseFloat(SellerProfit.value.replace(/,/g, '')) + parseFloat(Brokerage.value.replace(/,/g, '')) + parseFloat(odam.value.replace(/,/g, '')) + parseFloat(olam.value.replace(/,/g, ''));
                                    }
                                }
                                divider('D7[' + i + ']');
                                divider('D6[' + i + ']');
                                divider('D12[' + i + ']');
                                divider('D22[' + i + ']');
                                divider('D13[' + i + ']');
                                divider('D8[' + i + ']');
                                divider('D15[' + i + ']');
                                divider('D9[' + i + ']');
                                divider('D10[' + i + ']');
                                divider('D11[' + i + ']');
                                divider('D14[' + i + ']');
                                divider('D17[' + i + ']');
                                divider('D20[' + i + ']');
                            });


                            var total_element = $(".element").length;
                            var lastidd = $(".element:last").attr("id");
                            var split_idd = lastidd.split("_");
                            var rowTotal1 = 0;
                            let vattotal = 0;
                            let discounttotal = 0;
                            let tprdis = 0;
                            let SumConstructionWagess = 0;
                            let SumSellerProfits = 0;
                            let SumBrokerages = 0;
                            let ntotal = 0;
                            let SumOdamOlam = 0;
                            for (let ii = 1; ii <= Number(split_idd[1]); ii++) {
                                document.querySelectorAll('#contain tbody tr').forEach(row => {
                                    var TotalInput = row.querySelector('input[name="D22[' + ii + ']"');
                                    var VatAmountTotalInput = row.querySelector('input[name="D15[' + ii + ']"');
                                    var DiscountTotalInput = row.querySelector('input[name="D12[' + ii + ']"');
                                    var TedadTotalInput = row.querySelector('input[name="D6[' + ii + ']"');
                                    var FeeTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                                    var tConstructionWages = row.querySelector('input[name="D9[' + ii + ']"');
                                    var tSellerProfit = row.querySelector('input[name="D10[' + ii + ']"');
                                    var tBrokerage = row.querySelector('input[name="D11[' + ii + ']"');
                                    var tOdam = row.querySelector('input[name="D17[' + ii + ']"');
                                    var tOlam = row.querySelector('input[name="D20[' + ii + ']"');
                                    if (TotalInput) {
                                        var UnitAmount = parseFloat(TotalInput.value.replace(/,/g, '')) || 0;
                                        var rowTotal = UnitAmount;
                                        ntotal += rowTotal;
                                    }
                                    if (VatAmountTotalInput) {
                                        var VatAmountTotal = parseFloat(VatAmountTotalInput.value.replace(/,/g, '')) || 0;
                                        var vtotal = VatAmountTotal;
                                        vattotal += vtotal;
                                    }
                                    if (DiscountTotalInput) {
                                        var DiscountTotal = parseFloat(DiscountTotalInput.value.replace(/,/g, '')) || 0;
                                        var dtotal = DiscountTotal;
                                        discounttotal += dtotal;
                                    }
                                    if (TedadTotalInput && FeeTotalInput) {
                                        var UnitAmountTotal = parseFloat(FeeTotalInput.value.replace(/,/g, '')) || 0;
                                        var TedadTotal = parseFloat(TedadTotalInput.value.replace(/,/g, '')) || 0;
                                        var tprdistotal = UnitAmountTotal * TedadTotal;
                                        tprdis += tprdistotal;
                                    }
                                    if (tConstructionWages) {
                                        var TotalConstructionWages = parseFloat(tConstructionWages.value.replace(/,/g, '')) || 0;
                                        var SumConstructionWages = TotalConstructionWages;
                                        SumConstructionWagess += TotalConstructionWages;
                                    }
                                    if (tSellerProfit) {
                                        var TotalSellerProfit = parseFloat(tSellerProfit.value.replace(/,/g, '')) || 0;
                                        var SumSellerProfit = TotalSellerProfit;
                                        SumSellerProfits += TotalSellerProfit;
                                    }
                                    if (tBrokerage) {
                                        var TotalBrokerage = parseFloat(tBrokerage.value.replace(/,/g, '')) || 0;
                                        var SumBrokerage = TotalBrokerage;
                                        SumBrokerages += TotalBrokerage;
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
                            document.getElementById("tvamG").value = vattotal;
                            document.getElementById("tdisG").value = discounttotal;
                            document.getElementById("tprdisG").value = tprdis;
                            document.getElementById("tadisG").value = tprdis + SumConstructionWagess + SumSellerProfits + SumBrokerages - discounttotal;
                            document.getElementById("tConstructionWages").value = SumConstructionWagess;
                            document.getElementById("tSellerProfit").value = SumSellerProfits;
                            document.getElementById("tBrokerage").value = SumBrokerages;
                            document.getElementById("todam").value = SumOdamOlam;

                            divider("tbillG");
                            divider("tvamG");
                            divider("tdisG");
                            divider("tprdisG");
                            divider("tadisG");
                            divider("tConstructionWages");
                            divider("tSellerProfit");
                            divider("tBrokerage");
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
                        function CalculatePercantage() {
                            // Call the divider function from within another function
                            var product = document.getElementById('inp').value;
                            var UnitAmount =  document.getElementById("UnitAmount").value.replace(/,/g, '');
                            var VatRate =  document.getElementById("VatRate").value.replace(/,/g, '');
                            var Tedad = document.getElementById("Count").value.replace(/,/g, '');
                            var ConstructionWages = document.getElementById("ConstructionWages").value.replace(/,/g, '');
                            var ConstructionWagesP = document.getElementById("ConstructionWagesP").value.replace(/,/g, '');
                            var SellerProfit = document.getElementById("SellerProfit").value.replace(/,/g, '');
                            var SellerProfitP = document.getElementById("SellerProfitP").value.replace(/,/g, '');
                            var Brokerage = document.getElementById("Brokerage").value.replace(/,/g, '');
                            var BrokerageP = document.getElementById("BrokerageP").value.replace(/,/g, '');
                            //
                            var odr = document.getElementById("odr").value.replace(/,/g, '');
                            var odam = document.getElementById("odam").value.replace(/,/g, '');
                            var olr = document.getElementById("olr").value.replace(/,/g, '');
                            var olam = document.getElementById("olam").value.replace(/,/g, '');
                            var AmountBeforeDiscount = document.getElementById("AmountBeforeDisCount").value = +UnitAmount * +Tedad;
                            var Discount = document.getElementById("DisCount").value.replace(/,/g, '');

                            ConstructionWages = document.getElementById("ConstructionWages").value = (+ConstructionWagesP * (+UnitAmount * +Tedad) ) / 100;
                            SellerProfit = document.getElementById("SellerProfit").value = (+SellerProfitP * (+UnitAmount * +Tedad) ) / 100;
                            Brokerage = document.getElementById("Brokerage").value = (+BrokerageP * (+UnitAmount * +Tedad) ) / 100;
                            //
                            odam = document.getElementById("odam").value = Math.floor(((+ConstructionWages + +SellerProfit + +Brokerage)*(+odr/100)));
                            olam = document.getElementById("olam").value = Math.floor(((+ConstructionWages + +SellerProfit + +Brokerage)*(+olr/100)));

                            document.getElementById("AmountAfterDisCount").value = (+UnitAmount * +Tedad) + +ConstructionWages + +SellerProfit + +Brokerage - +Discount;

                            var VatAmount = document.getElementById("VatAmountG").value =  Math.floor((((+UnitAmount * +Tedad)- +Discount)*(VatRate/100)) + ((+ConstructionWages + +SellerProfit + +Brokerage)*0.09));
                            document.getElementById("billG").value = (+UnitAmount * +Tedad) - +Discount + +VatAmount + +ConstructionWages + +SellerProfit + +Brokerage + +odam + +olam;
                            divider("AmountBeforeDisCount");
                            divider("AmountAfterDisCount");
                            divider("VatAmountG");
                            divider("ConstructionWages");
                            divider("SellerProfit");
                            divider("Brokerage");
                            divider("billG");
                            divider("odam");
                            divider("olam");
                        }
                        function CalculatePercantageETC() {
                            // Call the divider function from within another function
                            var product = document.getElementById('inp').value;
                            var UnitAmount =  document.getElementById("UnitAmount").value.replace(/,/g, '');
                            var VatRate =  document.getElementById("VatRate").value.replace(/,/g, '');
                            var Tedad = document.getElementById("Count").value.replace(/,/g, '');
                            var ConstructionWages = document.getElementById("ConstructionWages").value.replace(/,/g, '');
                            var ConstructionWagesP = document.getElementById("ConstructionWagesP").value.replace(/,/g, '');
                            var SellerProfit = document.getElementById("SellerProfit").value.replace(/,/g, '');
                            var SellerProfitP = document.getElementById("SellerProfitP").value.replace(/,/g, '');
                            var Brokerage = document.getElementById("Brokerage").value.replace(/,/g, '');
                            var BrokerageP = document.getElementById("BrokerageP").value.replace(/,/g, '');
                            //
                            var odr = document.getElementById("odr").value.replace(/,/g, '');
                            var odam = document.getElementById("odam").value.replace(/,/g, '');
                            var olr = document.getElementById("olr").value.replace(/,/g, '');
                            var olam = document.getElementById("olam").value.replace(/,/g, '');
                            var AmountBeforeDiscount = document.getElementById("AmountBeforeDisCount").value = +UnitAmount * +Tedad;
                            var Discount = document.getElementById("DisCount").value.replace(/,/g, '');

                            //ConstructionWages = document.getElementById("ConstructionWages").value = (+ConstructionWagesP * (+UnitAmount * +Tedad) ) / 100;
                            //SellerProfit = document.getElementById("SellerProfit").value = (+SellerProfitP * (+UnitAmount * +Tedad) ) / 100;
                            //Brokerage = document.getElementById("Brokerage").value = (+BrokerageP * (+UnitAmount * +Tedad) ) / 100;
                            //
                            odam = document.getElementById("odam").value = Math.floor(((+ConstructionWages + +SellerProfit + +Brokerage)*(+odr/100)));
                            olam = document.getElementById("olam").value = Math.floor(((+ConstructionWages + +SellerProfit + +Brokerage)*(+olr/100)));

                            document.getElementById("AmountAfterDisCount").value = (+UnitAmount * +Tedad) + +ConstructionWages + +SellerProfit + +Brokerage - +Discount;

                            var VatAmount = document.getElementById("VatAmountG").value =  Math.floor((((+UnitAmount * +Tedad)- +Discount)*(VatRate/100)) + ((+ConstructionWages + +SellerProfit + +Brokerage)*0.09));
                            document.getElementById("billG").value = (+UnitAmount * +Tedad) - +Discount + +VatAmount + +ConstructionWages + +SellerProfit + +Brokerage + +odam + +olam;
                            divider("AmountBeforeDisCount");
                            divider("AmountAfterDisCount");
                            divider("VatAmountG");
                            divider("ConstructionWages");
                            divider("SellerProfit");
                            divider("Brokerage");
                            divider("odam");
                            divider("olam");
                            divider("billG");
                        }
                        function CalculateFactor() {
                            // Call the divider function from within another function
                            var product = document.getElementById('inp').value;
                            var UnitAmount =  document.getElementById("UnitAmount").value.replace(/,/g, '');
                            var VatRate =  document.getElementById("VatRate").value.replace(/,/g, '');
                            var Tedad = document.getElementById("Count").value.replace(/,/g, '');
                            var ConstructionWages = document.getElementById("ConstructionWages").value.replace(/,/g, '');
                            var ConstructionWagesP = document.getElementById("ConstructionWagesP").value.replace(/,/g, '');
                            var SellerProfit = document.getElementById("SellerProfit").value.replace(/,/g, '');
                            var SellerProfitP = document.getElementById("SellerProfitP").value.replace(/,/g, '');
                            var Brokerage = document.getElementById("Brokerage").value.replace(/,/g, '');
                            var BrokerageP = document.getElementById("BrokerageP").value.replace(/,/g, '');
                            var AmountBeforeDiscount = document.getElementById("AmountBeforeDisCount").value = +UnitAmount * +Tedad;
                            var Discount = document.getElementById("DisCount").value.replace(/,/g, '');

                            if (UnitAmount && Tedad) {
                                document.getElementById("ConstructionWagesP").value = 0;
                                document.getElementById("SellerProfitP").value = 0;
                                document.getElementById("BrokerageP").value = 0;
                                result = (+ConstructionWages / (+UnitAmount * +Tedad)) * 100;
                                document.getElementById("ConstructionWagesP").value = result.toFixed(4);
                                result1 = (+SellerProfit / (+UnitAmount * +Tedad)) * 100;
                                document.getElementById("SellerProfitP").value = result1.toFixed(4);
                                result2 = (+Brokerage / (+UnitAmount * +Tedad)) * 100;
                                document.getElementById("BrokerageP").value = result2.toFixed(4);
                            }
                            var odam = document.getElementById("odam").value.replace(/,/g, '');
                            var olam = document.getElementById("olam").value.replace(/,/g, '');

                            if (odam) {
                                resultOdr = (+odam / (+ConstructionWages + +SellerProfit + +Brokerage)) * 100;
                                document.getElementById("odr").value = resultOdr.toFixed(4);
                            }
                            if (olam) {
                                resultOlr = (+olam / (+ConstructionWages + +SellerProfit + +Brokerage)) * 100;
                                document.getElementById("olr").value = resultOlr.toFixed(4);
                            }

                            document.getElementById("AmountAfterDisCount").value = (+UnitAmount * +Tedad) + +ConstructionWages + +SellerProfit + +Brokerage - +Discount;

                            var VatAmount = document.getElementById("VatAmountG").value =  Math.floor((((+UnitAmount * +Tedad)- +Discount)*(VatRate/100)) + ((+ConstructionWages + +SellerProfit + +Brokerage)*0.09));
                            document.getElementById("billG").value = (+UnitAmount * +Tedad) - +Discount + +VatAmount + +ConstructionWages + +SellerProfit + +Brokerage + +odam + +olam;
                            divider("AmountBeforeDisCount");
                            divider("AmountAfterDisCount");
                            divider("VatAmountG");
                            divider("ConstructionWages");
                            divider("SellerProfit");
                            divider("Brokerage");
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
                            var rowTotal1 = 0;
                            let vattotal = 0;
                            let discounttotal = 0;
                            let tprdis = 0;
                            let SumConstructionWagess = 0;
                            let SumSellerProfits = 0;
                            let SumBrokerages = 0;
                            let ntotal = 0;
                            let SumOdamOlam = 0;
                            for (let ii = 1; ii <= Number(split_idd[1]); ii++) {
                                document.querySelectorAll('#contain tbody tr').forEach(row => {
                                    var TotalInput = row.querySelector('input[name="D22[' + ii + ']"');
                                    var VatAmountTotalInput = row.querySelector('input[name="D15[' + ii + ']"');
                                    var DiscountTotalInput = row.querySelector('input[name="D12[' + ii + ']"');
                                    var TedadTotalInput = row.querySelector('input[name="D6[' + ii + ']"');
                                    var FeeTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                                    var tConstructionWages = row.querySelector('input[name="D9[' + ii + ']"');
                                    var tSellerProfit = row.querySelector('input[name="D10[' + ii + ']"');
                                    var tBrokerage = row.querySelector('input[name="D11[' + ii + ']"');
                                    var tOdam = row.querySelector('input[name="D17[' + ii + ']"');
                                    var tOlam = row.querySelector('input[name="D20[' + ii + ']"');
                                    if (TotalInput) {
                                        var UnitAmount = parseFloat(TotalInput.value.replace(/,/g, '')) || 0;
                                        var rowTotal = UnitAmount;
                                        ntotal += rowTotal;
                                    }
                                    if (VatAmountTotalInput) {
                                        var VatAmountTotal = parseFloat(VatAmountTotalInput.value.replace(/,/g, '')) || 0;
                                        var vtotal = VatAmountTotal;
                                        vattotal += vtotal;
                                    }
                                    if (DiscountTotalInput) {
                                        var DiscountTotal = parseFloat(DiscountTotalInput.value.replace(/,/g, '')) || 0;
                                        var dtotal = DiscountTotal;
                                        discounttotal += dtotal;
                                    }
                                    if (TedadTotalInput && FeeTotalInput) {
                                        var UnitAmountTotal = parseFloat(FeeTotalInput.value.replace(/,/g, '')) || 0;
                                        var TedadTotal = parseFloat(TedadTotalInput.value.replace(/,/g, '')) || 0;
                                        var tprdistotal = UnitAmountTotal * TedadTotal;
                                        tprdis += tprdistotal;
                                    }
                                    if (tConstructionWages) {
                                        var TotalConstructionWages = parseFloat(tConstructionWages.value.replace(/,/g, '')) || 0;
                                        var SumConstructionWages = TotalConstructionWages;
                                        SumConstructionWagess += TotalConstructionWages;
                                    }
                                    if (tSellerProfit) {
                                        var TotalSellerProfit = parseFloat(tSellerProfit.value.replace(/,/g, '')) || 0;
                                        var SumSellerProfit = TotalSellerProfit;
                                        SumSellerProfits += TotalSellerProfit;
                                    }
                                    if (tBrokerage) {
                                        var TotalBrokerage = parseFloat(tBrokerage.value.replace(/,/g, '')) || 0;
                                        var SumBrokerage = TotalBrokerage;
                                        SumBrokerages += TotalBrokerage;
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
                            document.getElementById("tvamG").value = vattotal;
                            document.getElementById("tdisG").value = discounttotal;
                            document.getElementById("tprdisG").value = tprdis;
                            document.getElementById("tadisG").value = tprdis + SumConstructionWagess + SumSellerProfits + SumBrokerages - discounttotal;
                            document.getElementById("tConstructionWages").value = SumConstructionWagess;
                            document.getElementById("tSellerProfit").value = SumSellerProfits;
                            document.getElementById("tBrokerage").value = SumBrokerages;
                            document.getElementById("todam").value = SumOdamOlam;

                            divider("tbillG");
                            divider("tvamG");
                            divider("tdisG");
                            divider("tprdisG");
                            divider("tadisG");
                            divider("tConstructionWages");
                            divider("tSellerProfit");
                            divider("tBrokerage");
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
