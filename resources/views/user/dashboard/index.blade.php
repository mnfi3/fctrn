@php use App\Models\Moadian\Invoice; @endphp
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">پیشخوان
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">مؤدی گرامی، «{{getFullName(Auth::user(), false)}}» خوش آمدید.</small>
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
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6 mb-4 d-none">
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

                </div>
                <!--end::Notice-->
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xl-12">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card-xl-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 bg-success py-5">
                                <h3 class="card-title fw-bolder text-white">راهنمای مرحله به مرحله فاکتورفایو</h3>
                                <div class="card-toolbar">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                        <!--begin::Content-->
                                        <div class="mb-3 mb-md-0 fw-bolder">
                                            <div class="fs-3 text-white pe-7">کد معرف:
                                                {{generateUserBarcode(Auth::user()->id)}}
                                                <input type="text" value="{{generateUserBarcode(Auth::user()->id)}}" id="myInput" class="d-none">
                                                <a class="bg-secondary rounded la la-copy p-2" onclick="CopyClipboard()"></a>
                                                </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <!--begin::Stats-->
                                <div class="card-p">
                                    <!--begin::Row-->
                                    <div class="row g-0">
                                        <!--begin::Col-->
                                        <div class="col bg-light-success px-2 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-1">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black"/>
                                                                <path opacity="0.3" d="M10.3 15.3L11 14.6L8.70002 12.3C8.30002 11.9 7.7 11.9 7.3 12.3C6.9 12.7 6.9 13.3 7.3 13.7L10.3 16.7C9.9 16.3 9.9 15.7 10.3 15.3Z" fill="black"/>
                                                                <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM11.7 16.7L16.7 11.7C17.1 11.3 17.1 10.7 16.7 10.3C16.3 9.89999 15.7 9.89999 15.3 10.3L11 14.6L8.70001 12.3C8.30001 11.9 7.69999 11.9 7.29999 12.3C6.89999 12.7 6.89999 13.3 7.29999 13.7L10.3 16.7C10.5 16.9 10.8 17 11 17C11.2 17 11.5 16.9 11.7 16.7Z" fill="black"/>
                                                                </svg>
															</span>
                                            <!--end::Svg Icon-->
                                            <a href="{{route('taxpayer.create')}}" class="text-success fw-bolder fs-3 px-1">مرحله ۱) ثبت اطلاعات مودی</a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-primary px-2 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
																	<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
																</svg>
															</span>
                                            <!--end::Svg Icon-->
                                            <a href="{{route('customer.create')}}" class="text-primary fw-bolder fs-3 px-1">مرحله ۲) ثبت اطلاعات مشتریان</a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-danger px-2 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 7H2V11H22V7Z" fill="black"/>
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="black"/>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="{{route('payment.pricing')}}" class="text-danger fw-bolder fs-3 px-1">مرحله ۳) تمدید اشتراک</a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-info px-2 py-8 rounded-2 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-info d-block my-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="{{route('invoice.create')}}" class="text-info fw-bolder fs-3 px-1">مرحله ۴) ثبت فاکتور</a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <!--end::Col-->
                    <div class="col-xl-3">
                        <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">دسترسی سریع</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div class="collapse show">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row g-9 mb-0">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row d-flex justify-content-center">
                                        <a href="{{route('taxpayer.create')}}" class="btn btn-info fs-bold text-light" style="width: 160px">+ ثبت مؤدی جدید</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row d-flex justify-content-center">
                                        <a href="{{route('customer.create')}}" class="btn btn-info fs-bold text-light" style="width: 160px">+ ثبت مشتری</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row d-flex justify-content-center">
                                        <a href="{{route('payment.pricing')}}" class="btn btn-info fs-bold text-light" style="width: 160px">+ خرید بسته جدید</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row d-flex justify-content-center">
                                        <a href="{{route('invoice.create')}}" class="btn btn-info fs-bold text-light" style="width: 160px">+ ثبت صورتحساب</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row d-flex justify-content-center">
                                        <a href="{{route('UserTickets.createTicket')}}" class="btn btn-info fs-bold text-light" style="width: 160px">ارسال تیکت</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row d-flex justify-content-center">
                                        <a href="" class="btn btn-info fs-bold text-light" style="width: 160px">گزارشات</a>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::List Widget 5-->
                        <div class="card card-xl-stretch">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="fw-bolder mb-2 text-dark">فعالیت</span>
                                    <span class="text-muted fw-bold fs-7">{{auth()->user()->invoices()->count()}} فاکتور ثبت شده</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex flex-column flex-center h-200px w-200px h-lg-200px w-lg-200px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url({{asset('dash-assets/media/svg/shapes/abstract-6r.png')}})">
                                        <!--begin::Symbol-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black"/>
                                                                <path opacity="0.3" d="M10.3 15.3L11 14.6L8.70002 12.3C8.30002 11.9 7.7 11.9 7.3 12.3C6.9 12.7 6.9 13.3 7.3 13.7L10.3 16.7C9.9 16.3 9.9 15.7 10.3 15.3Z" fill="black"/>
                                                                <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM11.7 16.7L16.7 11.7C17.1 11.3 17.1 10.7 16.7 10.3C16.3 9.89999 15.7 9.89999 15.3 10.3L11 14.6L8.70001 12.3C8.30001 11.9 7.69999 11.9 7.29999 12.3C6.89999 12.7 6.89999 13.3 7.29999 13.7L10.3 16.7C10.5 16.9 10.8 17 11 17C11.2 17 11.5 16.9 11.7 16.7Z" fill="black"/>
                                                                </svg>
									</span>
                                        <!--end::Svg Icon-->
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="mb-0 text-center">
                                            <!--begin::Value-->
                                            <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                                <div class="min-w-70px counted" data-kt-countup="true" data-kt-countup-value="{{auth()->user()->invoices()->where('sent_at', '!=', null)->count()}}" data-kt-countup-suffix="+">
                                                    {{auth()->user()->invoices()->where('sent_at', '!=', null)->count()}}
                                                </div>
                                            </div>
                                            <!--end::Value-->
                                            <!--begin::Label-->
                                            <span class="text-light fw-bold fs-5 lh-0">صورتحساب ارسالی</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex flex-column flex-center h-200px w-200px h-lg-200px w-lg-200px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url({{asset('dash-assets/media/svg/shapes/abstract-6.svg')}})">
                                        <!--begin::Symbol-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                                </svg>
									</span>
                                        <!--end::Svg Icon-->
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="mb-0 text-center">
                                            <!--begin::Value-->
                                            <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                                <div class="min-w-70px counted" data-kt-countup="true" data-kt-countup-value="{{auth()->user()->invoices()->where('status', '=', Invoice::STATUS_DRAFT)->count()}}" data-kt-countup-suffix="+">
                                                    {{auth()->user()->invoices()->where('status', '=', Invoice::STATUS_DRAFT)->count()}}
                                                </div>
                                            </div>
                                            <!--end::Value-->
                                            <!--begin::Label-->
                                            <span class="text-light  fw-bold fs-5 lh-0">صورتحساب پیش نویس</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end: List Widget 5-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-5">
                        <!--begin::Mixed Widget 10-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                                <!--begin::Hidden-->
                                <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
                                    <div class="me-2">
                                        <span class="fw-bolder text-gray-800 d-block fs-3">گزارشات حساب کاربری</span>
                                        <span class="text-gray-400 fw-bold">تعداد صورتحساب های ثبت شده</span>
                                    </div>
                                    <div class="fw-bolder fs-3 text-primary">{{auth()->user()->invoices()->count()}}</div>
                                </div>
                                <!--end::Hidden-->
                                <!--begin::Chart-->
                                <div class="Gozareshat-chart1" data-kt-color="primary" style="height: 430px"></div>
                                <!--end::Chart-->
                            </div>
                        </div>
                        <!--end::Mixed Widget 10-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-12">
                        <!--begin::Mixed Widget 10-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                                <!--begin::Hidden-->
                                <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
                                    <div class="me-2">
                                        <span class="fw-bolder text-gray-800 d-block fs-3">گزارشات مالی</span>
                                        <span class="text-gray-400 fw-bold">مجموع صورتحساب ها/ارزش افزوده و ...</span>
                                    </div>
                                    <div class="fw-bolder fs-3 text-primary"></div>
                                </div>
                                <!--end::Hidden-->
                                <!--begin::Chart-->
                                <div class="Gozareshat-chart2" data-kt-color="primary" style="height: 430px"></div>
                                <!--end::Chart-->
                            </div>
                        </div>
                        <!--end::Mixed Widget 10-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

            </div>




@endsection




