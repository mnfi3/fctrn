@php use App\Models\Moadian\Customer; @endphp
@extends('layouts.dashboard')
@section('title', 'ویرایش اطلاعات مشتری')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">ویرایش اطلاعات مشتری
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">برای ویرایش اطلاعات مشتری از طریق فرم زیر اقدام نمایید.</small>
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
                                <h4 class="text-danger-900 fw-bolder">توجه!</h4>
                                <div class="fs-6 text-gray-700 pe-7">شماره/شناسه ملی/مدنی/اتباع برای اشخاص حقوقی ۱۱ رقم و برای اشخاص حقیقی ۱۰ رقم می باشد.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                <!--begin::Basic info-->
                    <!--begin::Form-->
                    <form method="POST" action="{{route('customer.update')}}" id="kt_account_profile_details_form" class="form" enctype="multipart/form-data">
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">اطلاعات مشتری</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <input type="text" name="id" value="{{$customer->id}}" hidden>
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                            @csrf
                            <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        {{--                                        <div class="col-md-12 fv-row">--}}
                                        {{--                                            <label class="fw-bolder fs-6 fw-bold mb-2">وضعیت مشتری فعال است؟</label>--}}
                                        {{--                                            <label class=" fs-6 fw-bolder text-end">--}}
                                        {{--                                                بله--}}
                                        {{--                                            </label>--}}
                                        {{--                                            <input class="form-check-input" type="radio" name="is_active" value="1" checked>--}}
                                        {{--                                            <span class="mx-3"></span>--}}
                                        {{--                                            <label class=" fs-6 fw-bolder">--}}
                                        {{--                                                خیر--}}
                                        {{--                                            </label>--}}
                                        {{--                                            <input class="form-check-input" type="radio" name="is_active" value="0">--}}
                                        {{--                                        </div>--}}
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder required fs-6 fw-bold mb-2">نام شرکت/ خریدار</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="نام شرکت یا فرد خریدار را وارد نمایید..." name="name" value="{{$customer->name}}" required>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder required fs-6 fw-bold mb-2">شماره اقتصادی</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="کد اقتصادی شرکت یا فرد خریدار را وارد نمایید..." name="economic_code" value="{{$customer->economic_code}}" required>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <label class="fw-bolder required fs-6 fw-bold mb-2">شماره/شناسه ملی/مدنی/اتباع</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="شماره/شناسه ملی/مدنی/اتباع را وارد نمایید..." name="national_code" value="{{$customer->national_code}}" required>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder required fs-6 fw-bold mb-2">نوع شخص</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="نوع شخصیت خریدار را مشخص کنید..." name="type" required>
                                                <option value="{{Customer::TYPE_INDIVIDUAL}}" @if($customer->type == Customer::TYPE_INDIVIDUAL) selected @endif>حقیقی</option>
                                                <option value="{{Customer::TYPE_LEGAL}}" @if($customer->type == Customer::TYPE_LEGAL) selected @endif>حقوقی</option>
                                                <option value="{{Customer::TYPE_PARTICIPATION}}" @if($customer->type == Customer::TYPE_PARTICIPATION) selected @endif>مشارکت مدنی</option>
                                                <option value="{{Customer::TYPE_FOREIGN}}" @if($customer->type == Customer::TYPE_FOREIGN) selected @endif>اتباع غیر ایرانی</option>
                                                <option value="{{Customer::TYPE_CONSUMER}}" @if($customer->type == Customer::TYPE_CONSUMER) selected @endif>مصرف کننده نهایی</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->

                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder required fs-6 fw-bold mb-2">کدپستی</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="کد پستی را وارد نمایید..." name="postal_code" value="{{$customer->postal_code}}" required>
                                        </div>
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder  fs-6 fw-bold mb-2">شماره ثبت</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="شماره ثبت شرکت را وارد نمایید..." name="insert_number" value="{{$customer->insert_number}}" >
                                        </div>

                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">پست الکترونیک</label>
                                            <input type="email" class="form-control form-control-solid" placeholder="آدرس ایمیل را وارد نمایید..." name="email" value="{{$customer->email}}">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">فکس</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="فکس را وارد نمایید..." name="phone" value="{{$customer->fax}}">
                                        </div>
                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">تلفن</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="شماره تلفن را وارد نمایید..." name="phone" value="{{$customer->phone}}">
                                        </div>

                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">استان</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="لطفا نام استان خود را انتخاب نمایید" name="state">
                                                <option value="{{$customer->state}}">{{$customer->state}}</option>
                                                <option value="تهران">تهران</option>
                                                <option value="گیلان">گیلان</option>
                                                <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                                                <option value="خوزستان">خوزستان</option>
                                                <option value="فارس">فارس</option>
                                                <option value="اصفهان">اصفهان</option>
                                                <option value="خراسان رضوی">خراسان رضوی</option>
                                                <option value="قزوین">قزوین</option>
                                                <option value="سمنان">سمنان</option>
                                                <option value="قم">قم</option>
                                                <option value="مرکزی">مرکزی</option>
                                                <option value="زنجان">زنجان</option>
                                                <option value="مازندران">مازندران</option>
                                                <option value="گلستان">گلستان</option>
                                                <option value="اردبیل">اردبیل</option>
                                                <option value="آذربایجان غربی">آذربایجان غربی</option>
                                                <option value="همدان">همدان</option>
                                                <option value="کردستان">کردستان</option>
                                                <option value="کرمانشاه">کرمانشاه</option>
                                                <option value="لرستان">لرستان</option>
                                                <option value="بوشهر">بوشهر</option>
                                                <option value="کرمان">کرمان</option>
                                                <option value="هرمزگان">هرمزگان</option>
                                                <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
                                                <option value="یزد">یزد</option>
                                                <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                                                <option value="ایلام">ایلام</option>
                                                <option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
                                                <option value="خراسان شمالی">خراسان شمالی</option>
                                                <option value="خراسان جنوبی">خراسان جنوبی</option>
                                                <option value="البرز">البرز</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">شهرستان</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="لطفا نام شهر خود را وارد نمایید..." name="city" value="{{$customer->city}}">
                                        </div>

                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row">
                                            <label class="fw-bolder fs-6 fw-bold mb-2">آدرس</label>
                                            <textarea class="form-control form-control-solid" placeholder="آدرس را وارد نمایید..." name="address" rows="5">{{$customer->address}}</textarea>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Basic info-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره تغییرات</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->



@endsection
