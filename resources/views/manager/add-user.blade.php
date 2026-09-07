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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">ثبت کاربر جدید
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">برای ثبت کاربر جدید از طریق فرم زیر اقدام نمایید.</small>
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
                    <!--begin::Basic info-->
                    <form action="{{route('user.insert')}}" id="form" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="address_required" value="0">

                    <fieldset class="px-0">
                        <section id="checkout-address" class="list-view product-checkout">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="cTitle"> نام :</label>
                                                    <input type="text" id="cTitle"  class="form-control form-control-solid required" required name="first_name" placeholder="نام را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="familt"> نام خانوادگی :</label>
                                                    <input type="text" id="family"  class="form-control form-control-solid required" required name="last_name" placeholder="نام خانوادگی را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="code"> کد ملی :</label>
                                                    <input type="text" id="code"  class="form-control form-control-solid required" required name="national_code" placeholder="کد ملی را وارد نمایید" >
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="mobile"> شماره موبایل :</label>
                                                    <input type="text" id="mobile"  class="form-control form-control-solid required" required name="mobile" placeholder="شماره موبایل را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="email"> ایمیل :</label>
                                                    <input type="email" id="email"  class="form-control required form-control-solid " required name="email" placeholder="ایمیل را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="referral_id"> کد معرف :</label>
                                                    <input type="number" id="email"  class="form-control  form-control-solid "  name="referral_id" placeholder="کد معرف را در صورت وجود وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12 ">
                                                <div class="form-group ">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="contractType">نقش :</label>
                                                    <select class="form-select form-select-solid" id="contractType" name="role_id">
                                                        @foreach($roles as $role)
                                                            @if($role->name == \App\Models\Role::ADMIN)
                                                                @continue
                                                            @endif
                                                            <option value="{{$role->id}}">{{$role->persian_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-6">
                                        <button type="submit" class="btn btn-primary login-btn text-white place-order"><i class="fa fa-user"></i> ثبت کاربر</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </fieldset>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
