@extends('layouts.auth')
@section('title', 'ثبت نام')
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
            <form class="form w-100" method="post" action="{{route('register')}}" novalidate="novalidate" id="kt_sign_up_form">

                @csrf
                <input type="hidden" name="mobile" value="<?php try{echo $_GET['mobile'];}catch (Exception $e){} ?>">
                <input type="hidden" name="mobile_token" value="<?php try{echo $_GET['mobile_token'];}catch (Exception $e){} ?>">

                <!--begin::Heading-->
                <div class="mb-10 text-center">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">ایجاد حساب کاربری</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">قبلا ثبت نام کرده اید؟
                        <a href="#" class="link-primary fw-bolder">صفحه ورود</a></div>
                    <!--end::Link-->
                </div>
                <!--end::Heading-->


                <!--begin::Input group-->
                <div class="row fv-row mb-7">
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">نام </label>
                        <input class="form-control form-control-lg form-control-solid required" type="text" placeholder="" name="first_name" value="{{old('first_name')}}" autocomplete="off"  required/>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">نام خانوادگی </label>
                        <input class="form-control form-control-lg form-control-solid required" type="text" placeholder="" name="last_name" value="{{old('last_name')}}" autocomplete="off" required/>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row fv-row mb-7">
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">کدملی </label>
                        <input class="form-control form-control-lg form-control-solid required" type="text" placeholder="" name="national_code" value="{{old('national_code')}}" autocomplete="off" required/>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">ایمیل </label>
                        <input class="form-control form-control-lg form-control-solid required" type="email" placeholder="" name="email" value="{{old('email')}}" autocomplete="off" required/>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6">رمز عبور</label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid required" type="password" placeholder="" name="password" autocomplete="off" required/>
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">رمز عبور انتخابی باید حداقل 8 کاراکتر باشد</div>
                    <!--end::Hint-->
                </div>
                <!--end::Input group=-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <label class="form-label fw-bolder text-dark fs-6">تایید رمز عبور</label>
                    <input class="form-control form-control-lg form-control-solid required" type="password" placeholder="" name="password_confirmation" autocomplete="off" required />
                </div>

                <!--begin::Col-->
                <div class="col-xl-12 mb-4">
                    <label class="form-label fw-bolder text-dark fs-6">کد معرف</label>
                    <?php try{$referral_id =  $_GET['referral_id'];}catch (Exception $e){$referral_id='';} ?>
                    @if(strlen($referral_id) > 2)
                        <input class="form-control form-control-lg form-control-solid" readonly="readonly" type="number" placeholder="" name="referral_id" value="{{$referral_id}}" />
                    @else
                        <input class="form-control form-control-lg form-control-solid" type="number" placeholder="" name="referral_id" value="{{old('referral_id')}}" />
                    @endif
                </div>
                <!--end::Col-->

                <fieldset class="form-label-group position-relative has-icon-left">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email"> کد امنیتی :</label>
                            <img alt="برای نمایش صفحه را رفرش کنید" src="{{captcha_src()}}">
                            <input class="form-control required" type="text" id="captcha" name="captcha" autocomplete="off" required>
                        </div>
                        {{--<div class="form-group">--}}
                        {{--<label for="email"> کد امنیتی :</label>--}}
                        {{--@captcha--}}
                        {{--</div>--}}
                    </div>
                </fieldset>


                <div class="form-group d-flex justify-content-between  align-items-center flex-md-row flex-column">
                    @error('email')
                    <div class=" flex-column align-items-between my-1 p-0">
                        <h6 class=" m-auto alert alert-danger"> {{ $message }}</h6>
                    </div>
                    @enderror
                    @error('mobile')
                    <div class=" flex-column align-items-between my-1 p-0">
                        <h6 class=" m-auto alert alert-danger"> {{ $message }}</h6>
                    </div>
                    @enderror
                    @error('password')
                    <div class=" flex-column align-items-between my-1 p-0">
                        <h6 class=" m-auto alert alert-danger">{{ $message }}</h6>
                    </div>
                    @enderror

                    @error('captcha')
                    <div class=" flex-column align-items-between my-1 p-0">
                        <h6 class=" m-auto alert alert-danger">{{ $message }}</h6>
                    </div>
                    @enderror



                    <div class=" flex-column align-items-betweenp-0">
                        @if(\Illuminate\Support\Facades\Session::get('fail'))
                            <h6 class=" m-auto alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('fail')}}</h6>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::get('success'))
                            <h6 class=" m-auto alert alert-success"> {{\Illuminate\Support\Facades\Session::get('success')}}</h6>
                        @endif
                    </div>

                </div>

                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <label class="form-check form-check-custom form-check-solid form-check-inline">
                        <input class="form-check-input" type="checkbox" name="toc" value="1" />
                        <label class="form-check-label fw-bold text-gray-700 fs-6">موافق
                            <a href="#" class="ms-1 link-primary">شرایط و ضوابط</a> هستم.</label>
                    </label>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary">
                        ثبت نام
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
