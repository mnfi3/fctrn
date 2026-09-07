@extends('layouts.dashboard')

@section('title', 'اطلاعات پنل پیامکی')

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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">تنظیمات پنل پیامک
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">لطفا پنل فعال پیامک خود را انتخاب کرده و اطلاعات آن را وارد کنید.</small>
                        <!--end::Description--></h1>
                    <!--end::Title-->
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
            <form action="{{route('setting.sms.update')}}" id="form" method="post" class="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="address_required" value="0">

                <fieldset class="px-0">
                    <section id="checkout-address" class="list-view product-checkout">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body ">

                                    <div class="row mb-5 bg-gray-300 p-10">


                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> پنل پیامکی :</label>
                                                <select class="form-select form-select-solid" name="sms_company" required>
                                                    <option value="{{\App\Models\Setting::KEY_SMS_IR}}"
                                                    @if($sms_company == \App\Models\Setting::KEY_SMS_IR) selected @endif>
                                                        sms.ir
                                                    </option>

                                                    <option value="{{\App\Models\Setting::KEY_SMS_FARAZ}}"
                                                            @if($sms_company == \App\Models\Setting::KEY_SMS_FARAZ) selected @endif>
                                                            farazsms
                                                    </option>

                                                    <option value="{{\App\Models\Setting::KEY_SMS_KAVENEGAR}}"
                                                            @if($sms_company == \App\Models\Setting::KEY_SMS_KAVENEGAR) selected @endif>
                                                        kavenegar
                                                    </option>

                                                    <option value="{{\App\Models\Setting::KEY_SMS_SOROSH}}"
                                                            @if($sms_company == \App\Models\Setting::KEY_SMS_SOROSH) selected @endif>
                                                        sorosh
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="row mb-5">
                                        <h3>  اطلاعات sms.ir(این داده ها را برای این شرکت در env نیز وارد کنید)</h3>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> api_key :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_ir_api_key}}" class="form-control form-control-solid "  name="sms_ir_api_key" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> secret_key :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_ir_secret_key}}" class="form-control form-control-solid "  name="sms_ir_secret_key" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> line_number :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_ir_line_number}}" class="form-control form-control-solid "  name="sms_ir_line_number" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> template_number :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_ir_template_number}}" class="form-control form-control-solid "  name="sms_ir_template_number" placeholder="" >
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="row mb-5">

                                        <h3>اطلاعات farazsms</h3>


                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> faraz_username :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_faraz_username}}" class="form-control form-control-solid "  name="sms_faraz_username" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> faraz_password :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_faraz_password}}" class="form-control form-control-solid "  name="sms_faraz_password" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> faraz_from_number :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_faraz_from_number}}" class="form-control form-control-solid "  name="sms_faraz_from_number" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> faraz_pattern_code :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_faraz_pattern_code}}" class="form-control form-control-solid "  name="sms_faraz_pattern_code" placeholder="" >
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="row mb-5">

                                        <h3>اطلاعات kavenegar</h3>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> kave_negar_api_key :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_kavenegar_api_key}}" class="form-control form-control-solid "  name="sms_kavenegar_api_key" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> kave_negar_sender :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_kavenegar_sender}}" class="form-control form-control-solid "  name="sms_kavenegar_sender" placeholder="" >
                                            </div>
                                        </div>




                                    </div>
                                    <hr>
                                    <div class="row mb-5">

                                        <div class="col-md-6 col-sm-12">
                                            <h3>اطلاعات sorosh</h3>
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> sorosh_api_key :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_sorosh_api_key}}" class="form-control form-control-solid "  name="sms_sorosh_api_key" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> sorosh_line_number :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_sorosh_line_number}}" class="form-control form-control-solid "  name="sms_sorosh_line_number" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> sorosh_username :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_sorosh_username}}" class="form-control form-control-solid "  name="sms_sorosh_username" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2" for="name"> sorosh_password :</label>
                                                <input style="direction: ltr" type="text" id="name" value="{{$sms_sorosh_password}}" class="form-control form-control-solid "  name="sms_sorosh_password" placeholder="" >
                                            </div>
                                        </div>



                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary login-btn text-white  place-order">ثبت</button>
                                </div>
                            </div>
                        </div>
                    </section>

                </fieldset>
            </form>

        </div>
    </div>
</div>

@endsection

