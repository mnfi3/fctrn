@extends('layouts.dashboard')
@section('title', 'ثبت فاکتور-فروش ارزی')
@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">ثبت فاکتور
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">برای ثبت فاکتورهای فروش و صادر شده از طریق فرم زیر اقدام نمایید.</small>
                        <!--end::Description--></h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <div class="card-title m-0 align-left">
                    <a class="btn btn-primary badge align-items-end" href="{{route('customer.create')}}" target="_blank">+ ثبت مشتری جدید</a>
                </div>
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
                <!--begin::Basic info-->
                    <!--begin::Form-->
                    <form method="POST" action="{{route('invoice.insert')}}" id="kt_account_profile_details_form" class="form" enctype="multipart/form-data">
                        @csrf
                        @error('errors')
                        <div class=" flex-column align-items-between my-1 p-0">
                            <h6 class=" m-auto alert alert-danger">{{ $message }}</h6>
                        </div>
                    @enderror
                    <!--start::Basic info-->
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">مؤدی(فروشنده)</h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--begin::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_moadi_details">
                                        <div class="card-body border-top p-9">
                                            <!--begin::Input group-->
                                            <div class="row g-9">
                                                <div class="col-md-12 fv-row">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2">مودی را انتخاب کنید</label>
                                                    <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="مؤدی مورد نظر را مشخص کنید..." name="taxpayer_id" required>
                                                        <option value=""></option>
                                                        @foreach($taxpayers as $taxpayer)
                                                            <option value="{{$taxpayer->id}}">{{$taxpayer->name.'-'.$taxpayer->username}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <div class="col-md-6">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">خریدار</h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--begin::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_moshtari_details">
                                        <!--begin::Card body-->
                                        <div class="card-body border-top p-9">
                                            <!--begin::Input group-->
                                            <div class="row g-9">
                                                <div class="col-md-12 fv-row">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2">مشتری را انتخاب کنید</label>
                                                    <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder=" خریدار را مشخص کنید..." name="customer_id" required >
                                                        <option value=""></option>
                                                        @foreach($customers as $customer)
                                                            <option value="{{$customer->id}}">{{$customer->name.'-'.$customer->national_code}}</option>
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
                            </div>
                        </div>
                        <!--end::Basic info-->
                        <!--begin::Basic info Invoice-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">اطلاعات صورتحساب</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نوع</label>
                                            <input type="text" value="1" name="inty" id="inty">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">الگو</label>
                                            <input type="text" value="2" name="inp" id="inp">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row d-none">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">روش تسویه</label>
                                            <input type="text" value="1" name="setm" id="setm">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">موضوع صورتحساب</label>
                                            <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="موضوع صورتحساب" name="ins" id="InvoiceSubject" required onchange="CheckSubjectRequirements()">
                                                <option value="1">اصلی</option>
                                                <option value="2">اصلاحی</option>
                                                <option value="3">ابطالی</option>
                                                <option value="4">برگشت از فروش</option>
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
                                        <div class="col-md-2 fv-row" id="number">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شماره فاکتور</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300"  placeholder="شماره داخلی فاکتور را وارد نمایید." name="number" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">تاریخ صدور</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" data-jdp placeholder="1401/01/01" name="indatim" required>
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-md-2 fv-row">
                                            <label class="fs-6 fw-bold mb-2 fw-bolder">شماره گذرنامه خریدار</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره گذرنامه خریدار را وارد نمایید." name="bpn" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شماره پروانه گمرکی فروشنده</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="شماره پروانه گمرکی را وارد نمایید." name="scln" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">کد گمرک محل اظهار فروشنده</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="کد گمرک محل اظهار فروشنده را وارد نمایید." name="scc" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row" id="crn">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شناسه یکتای ثبت قرارداد فروشنده</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="شناسه یکتای ثبت قرارداد" name="crn" >
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row d-none" id="IrTaxId">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">شماره منحصر به فرد مالیاتی مرجع </label>
                                            <input type="text" class="form-control form-control-solid  border-1 border border-gray-300" placeholder="شماره منحصر به فرد مالیاتی مرجع" name="irtaxid">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">مالیات موضوع ماده 17</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مالیات موضوع ماده 17 را وارد کنید." name="tax17" >
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
                        <div class="card" id="methodNormal">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">کالا/خدمات</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">کالا/خدمت</label>
                                            <a class="fs-6 fw-bold mb-2 fw-bolder cursor-pointer" href="{{route('product.index')}}" target="_blank">افزودن کالا/خدمت (کلیک کنید!)</a>
                                            <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="نوع کالا/خدمت" name="sstid" id="sstid" onchange="SetVatRate()">
                                                <option value="">کالا/خدمت مدنظر را انتخاب نمایید...</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->taxTpStoPartCode}}" data-vat="{{$product->vat}}">{{$product->descriptionOfId.'-'.$product->taxTpStoPartCode}}{{$product->vat}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fs-6 fw-bold mb-2 fw-bolder">شرح کالا</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="شرح کالا را وارد نمایید" name="Sharh"  id="Sharh">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">میزان ارز</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="میزان ارز" name="cfee" id="cfee" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نوع ارز</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="نوع ارز" name="cut" id="cut" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نرخ براری ارز با ریال</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="نرخ براری ارز با ریال" name="exr" id="exr" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">تفاوت نرخ خرید و فروش ارز /کارمزد</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="تفاوت نرخ خرید و فروش ارز /کارمزد" name="pspd" id="pspd" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ قبل از تخفیف(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ قبل از تخفیف" name="AmountBeforeDiscount" id="AmountBeforeDiscount" readonly>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ تخفیف(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="تخفیف" name="Discount" id="Discount" value="0" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fs-6 fw-bold mb-2 fw-bolder"> مبلغ بعد از تخفیف(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ بعد از تخفیف" name="AmountAfterDiscount" id="AmountAfterDiscount" readonly>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">نرخ مالیات بر ارزش افزوده(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="نرخ مالیات بر ارزش افزوده" name="VatRate" value="9"  id="VatRate" readonly>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ مالیات بر ارزش افزوده(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ مالیات بر ارزش افزوده" name="VatAmount" id="VatAmount" readonly>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row g-9 mt-3">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">نرخ سایر مالیات و عوارض(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="odr" id="odr" onkeyup="CalculatePercantageETC()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">مبلغ سایر مالیات و عوارض(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="odam" id="odam" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">موضوع سایر مالیات و عوارض</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="موضوع سایر مالیات و عوارض را وارد کنید" name="odt" id="odt">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">نرخ سایر وجوه قانونی(درصد)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="olr" id="olr" onkeyup="CalculatePercantageETC()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">مبلغ سایر وجوه قانونی(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="olam" id="olam" onkeyup="CalculateFactor()">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">موضوع سایر وجوه قانونی</label>
                                            <input type="text" class="form-control form-control-solid border-1 border border-gray-300" placeholder="موضوع سایر وجوه قانونی را وارد کنید" name="olt" id="olt">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="required fs-6 fw-bold mb-2 fw-bolder">مبلغ کل کالا/خدمت(ریال)</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="مبلغ کل کالا/خدمت" name="bill" id="bill" readonly>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class=" fs-6 fw-bold mb-2 fw-bolder">شناسه یکتای قرارداد حق العمل کاری</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300" placeholder="شناسه یکتای قرارداد حق العمل کاری" name="bsrn" id="bsrn">
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                </div>

                                <!--end::Card body-->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function(){

                                        // Add new element
                                        $(".addd").click(function(){

                                            // Finding total number of elements added
                                            var total_element = $(".elementz").length;

                                            // last <div> with element class id
                                            var lastidd = $(".elementz:last").attr("id");
                                            var split_idd = lastidd.split("_");
                                            var nextindexx = Number(split_idd[1]) + 1;
                                            const collection0 = document.getElementById("sstid");
                                            const collection1 = document.getElementById("Sharh");
                                            const collection2 = document.getElementById("cfee");
                                            const collection3 = document.getElementById("cut");
                                            const collection4 = document.getElementById("exr");
                                            const collection5 = document.getElementById("pspd");
                                            const collection6 = document.getElementById("AmountBeforeDiscount");
                                            const collection7 = document.getElementById("Discount");
                                            const collection8 = document.getElementById("AmountAfterDiscount");
                                            const collection9 = document.getElementById("VatRate");
                                            const collection10 = document.getElementById("VatAmount");
                                            const collection11 = document.getElementById("odr");
                                            const collection12 = document.getElementById("odam");
                                            const collection13 = document.getElementById("odt");
                                            const collection14 = document.getElementById("olr");
                                            const collection15 = document.getElementById("olam");
                                            const collection16 = document.getElementById("olt");
                                            const collection17 = document.getElementById("bill");
                                            const collection18 = document.getElementById("bsrn");


                                            document.getElementById("tbill").value = Number(removeComma("tbill")) + Number(removeComma("bill"));
                                            document.getElementById("tvam").value = Number(removeComma("tvam")) + Number(removeComma("VatAmount"));
                                            document.getElementById("tdis").value = Number(removeComma("tdis")) + Number(removeComma("Discount"));
                                            document.getElementById("tprdis").value = Number(removeComma("tprdis")) + Number(removeComma("AmountBeforeDiscount"));
                                            document.getElementById("tadis").value = Number(removeComma("tadis")) + Number(removeComma("AmountAfterDiscount"));
                                            document.getElementById("todam").value = Number(removeComma("todam")) + Number(removeComma("odam")) + Number(removeComma("olam"));
                                            divider("tbill");
                                            divider("tvam");
                                            divider("tdis");
                                            divider("tprdis");
                                            divider("tadis");
                                            divider("todam");
                                            // Adding new div container after last occurance of element class
                                            $(".elementz:last").after("<tr class='text-center elementz' id='divz_"+ nextindexx +"'></tr>");
                                            // Adding element to <div>
                                            $("#divz_" + nextindexx).append('<td><a class="remove" id="remove_' + nextindexx + '" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="حذف"><i class="bi bi-trash-fill text-danger fs-4"></i></a></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D0['+nextindexx+']" id="D0['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="form-control form-control-solid border-1 border border-gray-300" name="D1['+nextindexx+']" id="D1['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D2['+nextindexx+']" id="D2['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D3['+nextindexx+']" id="D3['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D4['+nextindexx+']" id="D4['+nextindexx+']"   onkeyup="calculateTotal('+nextindexx+')" required/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D5['+nextindexx+']" id="D5['+nextindexx+']"  /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D6['+nextindexx+']" id="D6['+nextindexx+']" readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D7['+nextindexx+']" id="D7['+nextindexx+']"    onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D8['+nextindexx+']" id="D8['+nextindexx+']"  readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D9['+nextindexx+']" id="D9['+nextindexx+']"  readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D10['+nextindexx+']" id="D10['+nextindexx+']" readonly/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D11['+nextindexx+']" id="D11['+nextindexx+']" /></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D12['+nextindexx+']" id="D12['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D13['+nextindexx+']" id="D13['+nextindexx+']""/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D14['+nextindexx+']" id="D14['+nextindexx+']""/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D15['+nextindexx+']" id="D15['+nextindexx+']" onkeyup="calculateTotal('+nextindexx+')"/></td>' +
                                                '<td class="d-none"><input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" name="D16['+nextindexx+']" id="D16['+nextindexx+']"/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D17['+nextindexx+']" id="D17['+nextindexx+']"  readonly/></td>' +
                                                '<td><input type="text" class="  form-control form-control-solid border-1 border border-gray-300" name="D18['+nextindexx+']" id="D18['+nextindexx+']"/></td>' +
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

                                            //reset
                                            document.getElementById('sstid').value = null;
                                            document.getElementById('select2-sstid-container').innerText = null;
                                            document.getElementById('Sharh').value = null;
                                            document.getElementById('cfee').value = null;
                                            document.getElementById('exr').value = null;
                                            document.getElementById('cut').value = null;
                                            document.getElementById('pspd').value = null;
                                            document.getElementById('Discount').value = 0;
                                            document.getElementById('AmountAfterDiscount').value = 0;
                                            document.getElementById('VatRate').value = 0;
                                            document.getElementById('VatAmount').value = 0;
                                            document.getElementById('odr').value = 0;
                                            document.getElementById('odam').value = 0;
                                            document.getElementById('odt').value = null;
                                            document.getElementById('olr').value = 0;
                                            document.getElementById('olam').value = 0;
                                            document.getElementById('olt').value = null;
                                            document.getElementById('bill').value = 0;
                                            document.getElementById('bsrn').value = null;

                                        });
                                        // Remove element
                                        $('.containn').on('click','.remove',function(){
                                            var idd = this.id;
                                            var split_idd = idd.split("_");
                                            var deleteindexx = split_idd[1];
                                            // Remove <div> with id
                                            $("#divz_" + deleteindexx).remove();

                                            //recalculate
                                            var total_element = $(".elementz").length;
                                            var lastidd = $(".elementz:last").attr("id");
                                            var split_idd = lastidd.split("_");
                                            var rowTotal1 = 0;
                                            let vattotal = 0;
                                            let discounttotal = 0;
                                            let tprdis = 0;
                                            let todam = 0;
                                            let ntotal = 0;
                                            for(let ii=1;ii<=Number(split_idd[1]);ii++){
                                                document.querySelectorAll('#containn tbody tr').forEach(row => {
                                                    var UnitAmountInput = row.querySelector('input[name="D17[' + ii + ']"');
                                                    var VatAmountTotalInput = row.querySelector('input[name="D10[' + ii + ']"');
                                                    var DiscountTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                                                    var TedadTotalInput = row.querySelector('input[name="D2[' + ii + ']"');
                                                    var FeeTotalInput = row.querySelector('input[name="D4[' + ii + ']"');
                                                    var TOtherVatsTotal = row.querySelector('input[name="D12[' + ii + ']"');
                                                    var TOtherTaxsTotal = row.querySelector('input[name="D15[' + ii + ']"');
                                                    var VatRate = row.querySelector('input[name="D9[' + i + ']"');
                                                    if (UnitAmountInput) {
                                                        var UnitAmount = parseFloat(UnitAmountInput.value.replace(/,/g, '')) || 0;
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
                                                    if (TOtherVatsTotal && TOtherTaxsTotal) {
                                                        var TOtherVatsTotal = parseFloat(TOtherVatsTotal.value.replace(/,/g, '')) || 0;
                                                        var TOtherTaxsTotal = parseFloat(TOtherTaxsTotal.value.replace(/,/g, '')) || 0;
                                                        var todamtotal = TOtherTaxsTotal + TOtherVatsTotal;
                                                        todam += todamtotal;
                                                    }

                                                });
                                            }
                                            document.getElementById("tbill").value = ntotal;
                                            document.getElementById("tvam").value = vattotal;
                                            document.getElementById("tdis").value = discounttotal;
                                            document.getElementById("tprdis").value = tprdis;
                                            document.getElementById("tadis").value = tprdis - discounttotal;
                                            document.getElementById("todam").value = todam;

                                            divider("tbill");
                                            divider("tvam");
                                            divider("tdis");
                                            divider("tprdis");
                                            divider("tadis");
                                            divider("todam");
                                        });
                                    });
                                </script>
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end px-8 mb-4">
                                    <a class="btn btn-primary addd badge" id="kt_account_profile_details_submit">افزودن +</a>
                                </div>
                                <!--end::Actions-->
                                <div class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3 mb-6">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="containn">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="fw-bolder text-center">
                                                <th>عملیات</th>
                                                <th class="min-w-150px">شرح</th>
                                                <th class="min-w-100px">میزان ارز</th>
                                                <th class="min-w-100px">نوع ارز</th>
                                                <th class="min-w-150px">نرخ برابری ارز با ریال</th>
                                                <th class="min-w-150px">تفاوت نرخ خرید و فروش ارز /کارمزد</th>
                                                <th class="min-w-150px">مبلغ قبل از تخفیف(ریال)</th>
                                                <th class="min-w-150px">تخفیف(ریال)</th>
                                                <th class="min-w-150px">مبلغ بعد از تخفیف(ریال)</th>
                                                <th class="min-w-50px">نرخ مالیات بر ارزش افزوده(درصد)</th>
                                                <th class="min-w-150px">مالیات بر ارزش افزوده(ریال)</th>
                                                <th class="min-w-150px">سایر وجوه قانونی(ریال)</th>
                                                <th class="min-w-150px">سایر مالیات و عوارض(ریال)</th>
                                                <th class="min-w-150px">مبلغ کل(ریال)</th>
                                                <th class="min-w-150px">شناسه یکتای قرارداد حق العمل کار</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="containn">
                                            <tr class='elementz' id='divz_1'></tr>
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
                        <!--begin::Total Sum Invoice Info-->
                        <div class="card" id="methodNormalSum">
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
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع مبلغ قبل از کسر تخفیف</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tprdis" required readonly id="tprdis">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع تخفیفات</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider"  placeholder="0" name="tdis" required readonly id="tdis">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع مبلغ پس از کسر تخفیف</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tadis" required readonly id="tadis">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع مالیات بر ارزش افزوده</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tvam" required readonly id="tvam">
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع سایر مالیات، عوارض و وجوه قانونی</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="todam" required readonly id="todam">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2 required">مجموع صورتحساب</label>
                                            <input type="text" class="  form-control form-control-solid border-1 border border-gray-300 number-divider" placeholder="0" name="tbill" required readonly id="tbill">
                                        </div>
                                        <!--end::Col-->
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
                            <div id="kt_PardaxtInfo" class="collapse">
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

                                <a  class="btn btn-primary badge" data-bs-toggle="modal" data-bs-target="#submitFactorGold">ثبت</a>
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
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <script>
        function calculateTotal(i) {
            document.querySelectorAll('#containn tbody tr').forEach(row => {
                var UnitAmountInput = row.querySelector('input[name="D4[' + i + ']"');
                var TedadInput = row.querySelector('input[name="D2[' + i + ']"');
                var DiscountInput = row.querySelector('input[name="D7[' + i + ']"');

                if (UnitAmountInput && TedadInput) {
                    var UnitAmount = parseFloat(UnitAmountInput.value.replace(/,/g, '')) || 0;
                    var Tedad = parseFloat(TedadInput.value.replace(/,/g, '')) || 0;
                    var Discount = parseFloat(DiscountInput.value.replace(/,/g, '')) || 0;
                    var rowTotal = Tedad * UnitAmount;
                    // Update the row's total cell value
                    var rowTotalInput = row.querySelector('input[name="D17[' + i + ']"');
                    var AmountAfterDiscountInput = row.querySelector('input[name="D8[' + i + ']"');
                    var AmountBeforerDiscountInput = row.querySelector('input[name="D6[' + i + ']"');
                    var VatAmount = row.querySelector('input[name="D10[' + i + ']"');
                    var TOtherVats = row.querySelector('input[name="D12[' + i + ']"');
                    var TOtherTaxs = row.querySelector('input[name="D15[' + i + ']"');
                    var VatRate = row.querySelector('input[name="D9[' + i + ']"');

                    if (AmountAfterDiscountInput) {
                        AmountAfterDiscountInput.value = rowTotal - Discount;
                    }
                    if (AmountBeforerDiscountInput) {
                        AmountBeforerDiscountInput.value = rowTotal;
                    }

                    if (VatAmount) {
                        VatAmount.value = Math.floor((rowTotal - Discount) * (parseFloat(VatRate.value.replace(/,/g, ''))/100));
                    }
                    var VatAmount = Math.floor((rowTotal - Discount) * (parseFloat(VatRate.value.replace(/,/g, ''))/100));
                    if (rowTotalInput) {
                        rowTotalInput.value = parseFloat(rowTotal - Discount + VatAmount + parseFloat(TOtherVats.value.replace(/,/g, '')) + parseFloat(TOtherTaxs.value.replace(/,/g, '')));
                    }
                }
                divider('D2[' + i + ']');
                //divider('D3[' + i + ']');
                divider('D4[' + i + ']');
                //divider('D5[' + i + ']');
                divider('D6[' + i + ']');
                divider('D7[' + i + ']');
                divider('D8[' + i + ']');
                //divider('D9[' + i + ']');
                divider('D10[' + i + ']');
                divider('D12[' + i + ']');
                divider('D15[' + i + ']');
                divider('D17[' + i + ']');
            });


            var total_element = $(".elementz").length;
            var lastidd = $(".elementz:last").attr("id");
            var split_idd = lastidd.split("_");
            var rowTotal1 = 0;
            let vattotal = 0;
            let discounttotal = 0;
            let tprdis = 0;
            let todam = 0;
            let ntotal = 0;
            for (let ii = 1; ii <= Number(split_idd[1]); ii++) {
                document.querySelectorAll('#containn tbody tr').forEach(row => {
                    var UnitAmountInput = row.querySelector('input[name="D17[' + ii + ']"');
                    var VatAmountTotalInput = row.querySelector('input[name="D10[' + ii + ']"');
                    var DiscountTotalInput = row.querySelector('input[name="D7[' + ii + ']"');
                    var TedadTotalInput = row.querySelector('input[name="D2[' + ii + ']"');
                    var FeeTotalInput = row.querySelector('input[name="D4[' + ii + ']"');
                    var TOtherVatsTotal = row.querySelector('input[name="D12[' + ii + ']"');
                    var TOtherTaxsTotal = row.querySelector('input[name="D15[' + ii + ']"');
                    var VatRate = row.querySelector('input[name="D9[' + i + ']"');
                    if (UnitAmountInput) {
                        var UnitAmount = parseFloat(UnitAmountInput.value.replace(/,/g, '')) || 0;
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
                    if (TOtherVatsTotal && TOtherTaxsTotal) {
                        var TOtherVatsTotal = parseFloat(TOtherVatsTotal.value.replace(/,/g, '')) || 0;
                        var TOtherTaxsTotal = parseFloat(TOtherTaxsTotal.value.replace(/,/g, '')) || 0;
                        var todamtotal = TOtherTaxsTotal + TOtherVatsTotal;
                        todam += todamtotal;
                    }

                });
            }
            document.getElementById("tbill").value = ntotal;
            document.getElementById("tvam").value = vattotal;
            document.getElementById("tdis").value = discounttotal;
            document.getElementById("tprdis").value = tprdis;
            document.getElementById("tadis").value = tprdis - discounttotal;
            document.getElementById("todam").value = todam;

            divider("tbill");
            divider("tvam");
            divider("tdis");
            divider("tprdis");
            divider("tadis");
            divider("todam");
        }
    </script>
    <script>
        document.getElementById("tbill").value = 0;
        document.getElementById("tvam").value = 0;
        document.getElementById("tdis").value = 0;
        document.getElementById("tprdis").value = 0;
        document.getElementById("tadis").value = 0;
        document.getElementById("todam").value = 0;
        function divider(inputElement) {
            var inputValue = document.getElementById(inputElement).value;
            document.getElementById(inputElement).value = inputValue.replace(/[^\d.]/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        function removeComma(inputElement) {
            return document.getElementById(inputElement).value.replace(/,/g, '');
        }
        function SetVatRate() {
            var select = document.getElementById('sstid');
            var vatRateInput = document.getElementById('VatRate');
            var selectedOption = select.options[select.selectedIndex];
            var vatRate = selectedOption.getAttribute('data-vat');
            vatRateInput.value = vatRate;
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
        function CalculateFactor() {
            // Call the divider function from within another function
            var exr =  document.getElementById("exr").value.replace(/,/g, '');
            var VatRate =  document.getElementById("VatRate").value.replace(/,/g, '');
            var cfee = document.getElementById("cfee").value.replace(/,/g, '');
            document.getElementById("AmountBeforeDiscount").value = +exr * +cfee;
            var Discount = document.getElementById("Discount").value.replace(/,/g, '');
            document.getElementById("AmountAfterDiscount").value = (+exr * +cfee) - +Discount;
            document.getElementById("VatAmount").value =  Math.floor(((+exr * +cfee) - +Discount)*(VatRate/100));
            var VatAmount = Math.floor(((+exr * +cfee) - +Discount)*(VatRate/100));

            var odr = document.getElementById("odr").value.replace(/,/g, '');
            var odam = document.getElementById("odam").value.replace(/,/g, '');
            var olr = document.getElementById("olr").value.replace(/,/g, '');
            var olam = document.getElementById("olam").value.replace(/,/g, '');
            //
            if (odam && (cfee != 0 && exr != null)) {
                resultOdr = (+odam / (+exr * +cfee)) * 100;
                document.getElementById("odr").value = resultOdr.toFixed(4);
            }
            if (olam &&  (cfee != 0 && exr != null)) {
                resultOlr = (+olam / (+exr * +cfee)) * 100;
                document.getElementById("olr").value = resultOlr.toFixed(4);
            }


            document.getElementById("bill").value = (+exr * +cfee) - +Discount + +VatAmount + +odam + +olam;
            divider("AmountBeforeDiscount");
            divider("AmountAfterDiscount");
            divider("VatAmount");
            divider("odam");
            divider("olam");
            divider("bill");
        }
        function CalculatePercantageETC() {
            var exr =  document.getElementById("exr").value.replace(/,/g, '');
            var VatRate =  document.getElementById("VatRate").value.replace(/,/g, '');
            var cfee = document.getElementById("cfee").value.replace(/,/g, '');
            document.getElementById("AmountBeforeDiscount").value = +exr * +cfee;
            var Discount = document.getElementById("Discount").value.replace(/,/g, '');
            document.getElementById("AmountAfterDiscount").value = (+exr * +cfee) - +Discount;
            document.getElementById("VatAmount").value =  Math.floor(((+exr * +cfee) - +Discount)*(VatRate/100));
            var VatAmount = Math.floor(((+exr * +cfee) - +Discount)*(VatRate/100));
            //
            var odr = document.getElementById("odr").value.replace(/,/g, '');
            var odam = document.getElementById("odam").value.replace(/,/g, '');
            var olr = document.getElementById("olr").value.replace(/,/g, '');
            var olam = document.getElementById("olam").value.replace(/,/g, '');
            if (cfee != null && exr != null){
                odam = document.getElementById("odam").value = Math.floor(((+exr * +cfee)*(+odr/100)));
                olam = document.getElementById("olam").value = Math.floor(((+exr * +cfee)*(+olr/100)));
            }


            document.getElementById("bill").value = (+exr * +cfee) - +Discount + +VatAmount + +olam + +odam;
            divider("AmountBeforeDiscount");
            divider("AmountAfterDiscount");
            divider("VatAmount");
            divider("odam");
            divider("olam");
            divider("bill");
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
    <script>
        function OlgoChange() {
            var product = document.getElementById('inp').value;
            if(product == '4'){
                document.getElementById('crn').classList.remove('d-none');
            }
            else{
                document.getElementById('crn').classList.add('d-none');
            }
        }
    </script>
@endsection
