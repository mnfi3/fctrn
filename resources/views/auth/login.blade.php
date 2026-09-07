@extends('layouts.auth')
@section('title', 'ورود به پنل کاربری')
@section('content')
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Logo-->
        <a href="{{route('index')}}" class="mb-12">
            <img alt="Logo" src="{{asset('dash-assets/media/logos/CompLogo.png')}}" class="h-100px" />
        </a>
        <!--end::Logo-->
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100"  novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('login')}}">
                <div class=" flex-column align-items-between my-1 p-0">
                    @if(\Illuminate\Support\Facades\Session::get('fail'))
                        <h6 class=" m-auto alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('fail')}}</h6>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::get('success'))
                        <h6 class=" m-auto alert alert-success"> {{\Illuminate\Support\Facades\Session::get('success')}}</h6>
                    @endif
                </div>

                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">ورود به سامانه مؤدیان</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">ثبت نام نکرده اید؟
                        <a href="{{route('register')}}" class="link-primary fw-bolder">ایجاد حساب کاربری</a></div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label fs-6 fw-bolder text-dark">شماره موبایل</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid required" type="text" name="username" autocomplete="off" required/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">رمز عبور</label>
                        <!--end::Label-->
                        <!--begin::Link-->
                        <a href="{{route('reset-password.form')}}" class="link-primary fs-6 fw-bolder">رمز عبور را فراموش کرده اید؟</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid required"  type="password" name="password" autocomplete="off"  required/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
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

                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="submit" class="btn btn-lg btn-primary w-100 mb-5 fw-bolder">
                        ورود به سامانه
                    </button>
{{--                    <div class="text-center text-muted text-uppercase fw-bolder mb-5">یا</div>--}}
{{--                    <!--end::Separator-->--}}
{{--                    <!--begin::Google link-->--}}
{{--                    <a href="#" class="btn btn-flex flex-center btn-light-primary btn-lg w-100 mb-5">--}}
{{--                        ورود با رمز یکبار مصرف--}}
{{--                    </a>--}}
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
@endsection
