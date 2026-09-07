@extends('layouts.auth')
@section('title', 'بازیابی رمز عبور')
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
            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">رمز عبور خود را فراموش کرده اید؟</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">آدرس ایمیل ثبت نامی خود را وارد نمایید.</div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-gray-900 fs-6">ایمیل</label>
                    <input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="button" class="btn btn-lg btn-primary fw-bolder me-4">
                        ثبت
                    </button>
                    <a href="{{route('Landing.index')}}" class="btn btn-lg btn-light-danger fw-bolder">خروج</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
@endsection

