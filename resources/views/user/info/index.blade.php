@extends('layouts.dashboard')

@section('title', 'پیشخوان')

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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">اطلاعات حساب کاربر
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">برای ویرایش اطلاعات مربوط به «ورود به حساب کاربری» از فرم زیر اقدام نمایید.</small>
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
                @if(Session::has('fail_doublecate_email'))
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
                                    <div class="fs-6 text-gray-700 pe-7">{{session('fail_doublecate_email') }}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif
                @if(Session::has('success_update_email'))
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
                                    <div class="fs-6 text-gray-700 pe-7">{{session('success_update_email') }}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif
                @if(Session::has('fail_wrong_password'))
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
                                    <div class="fs-6 text-gray-700 pe-7">{{session('fail_wrong_password') }}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif

                @if(Session::has('fail_check_currentpassword'))
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
                                    <div class="fs-6 text-gray-700 pe-7">{{session('fail_check_currentpassword') }}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif
                @if(Session::has('success_update_password'))
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
                                    <div class="fs-6 text-gray-700 pe-7">{{session('success_update_password') }}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif
                @if(Session::has('fail_check_confirmpassword'))
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
                                    <div class="fs-6 text-gray-700 pe-7">{{session('fail_check_confirmpassword') }}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                @endif
                <!--begin::Sign-in Method-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">ویرایش اطلاعات ورود به حساب کاربری</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Email Address-->
                            <div class="d-flex flex-wrap align-items-center">
                                <!--begin::Label-->
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bolder mb-1">نام و نام خانوادگی</div>
                                    <div class="fw-bold text-gray-600">{{$user->first_name}} {{$user->last_name}}</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form id="kt_signin_change_email" class="form" novalidate="novalidate" action="{{route('user.info.update')}}" method="POST">
                                        @csrf
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">نام</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="first_name" value="{{$user->first_name}}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">نام خانوادگی</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="last_name" value="{{$user->last_name}}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">کدملی</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="national_code" value="{{$user->national_code}}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3"> ایمیل</label>
                                                    <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="{{$user->email}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary me-2 px-6">بروزرسانی</button>
                                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">لغو</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">ویرایش اطلاعات</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Email Address-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--end::Separator-->
                            <!--begin::Password-->
                            <div class="d-flex flex-wrap align-items-center mb-10">
                                <!--begin::Label-->
                                <div id="kt_signin_password">
                                    <div class="fs-6 fw-bolder mb-1">رمز عبور</div>
                                    <div class="fw-bold text-gray-600">************</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form action="{{route('user.info.update-password')}}" method="post">
                                        @csrf
                                        <div class="row mb-1">
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">رمز عبور فعلی</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="current_password" id="currentpassword" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">رمز عبور جدید</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="new_password" id="newpassword" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">تایید رمز عبور جدید</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirm_password" id="confirmpassword" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text mb-5">رمز عبور باید حداقل ۸ کاراکتر باشد.(برای امنیت بیشتر، در انتخاب رمز عبور از ترکیب حروف کوچک و بزرگ، اعداد و علائم خاص همچون @$* و غیره استفاده نمایید.</div>
                                        <div class="d-flex">
                                            <button id="" type="submit" class="btn btn-primary me-2 px-6">بروزرسانی</button>
                                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">لغو</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">ویرایش رمز عبور</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Password-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Sign-in Method-->
            </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

