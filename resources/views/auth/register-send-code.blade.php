@extends('layouts.auth')
@section('title', 'ثبت نام-ارسال کد')
@section('content')
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Logo-->
        <a href="{{route('index')}}" class="mb-12">
            <img alt="Logo" src="{{asset('dash-assets/media/logos/CompLogo.png')}}" class="h-100px" />
        </a>
        <!--end::Logo-->
        <!--begin::Wrapper-->
        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" method="post" action="{{route('register.send-code')}}" novalidate="novalidate" id="kt_sign_up_form">

                <div class=" flex-column align-items-between my-1 p-0">
                    @if(\Illuminate\Support\Facades\Session::get('fail'))
                        <h6 class=" m-auto alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('fail')}}</h6>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::get('success'))
                        <h6 class=" m-auto alert alert-success"> {{\Illuminate\Support\Facades\Session::get('success')}}</h6>
                    @endif
                </div>


                @csrf
                <input type="hidden" name="referral_id" value="{{$referral_id}}">

                <!--begin::Heading-->
                <div class="mb-10 text-center">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">ایجاد حساب کاربری</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">قبلا ثبت نام کرده اید؟
                        <a href="{{route('login')}}" class="link-primary fw-bolder">صفحه ورود</a></div>
                    <!--end::Link-->
                </div>
                <!--end::Heading-->




                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">شماره موبایل</label>
                    <input class="form-control form-control-lg form-control-solid" dir="ltr" type="text" placeholder="09XXXXXXXXX" name="mobile" autocomplete="off" required />
                </div>

                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">کد امنیتی</label>
                        <!--end::Label-->
                        <!--begin::Link-->
                        <img alt="برای نمایش صفحه را رفرش کنید" src="{{captcha_src()}}" class="recaptcha text-end">
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid required"  type="text" name="captcha" id="captcha"  required/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                @error('captcha')
                <div class=" flex-column align-items-between my-1 p-0">
                    <h6 class=" m-auto alert alert-danger">{{ $message }}</h6>
                </div>
                @enderror

            <!--begin::Actions-->
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5 fw-bolder">
                    ارسال کد تایید
                </button>
            </div>
            <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->

@endsection
