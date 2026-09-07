
    <!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('dash-assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('dash-assets/css/font.dash.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dash-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet')}}" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="shortcut icon" href="{{ asset('dash-assets/media/logos/CompLogo.png')}}" />
    <!--begin::Fonts-->
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />--}}
    <link rel="stylesheet" href="{{asset('dash-assets/fonts/poppins-v24-latin-regular.woff2')}}" />
    <!--end::Fonts-->
    <link type="text/css" rel="stylesheet" href="{{asset('dash-assets/css/jalalidatepicker.min.css')}}" />

    <style>
        .dt-button{
            display: flex !important;
            justify-content: end !important;
        }

    </style>


</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"@if(optional( \Illuminate\Support\Facades\Route::current())->getName() == 'invoice.index' || optional(\Illuminate\Support\Facades\Route::current())->getName() == 'invoice.index-draft' ) data-kt-aside-minimize="on"@endif>
<!--begin::Main-->
<?php
use App\Models\Moadian\Invoice;
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$user_id = Auth::user()->id;
?>
<!--begin::Root-->
<div class="d-flex flex-column flex-root">

    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <!--begin::Brand-->
            <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                <!--begin::Logo-->
                <a href="{{url('/')}}">
                    <img alt="Logo" src="{{ asset('dash-assets/media/logos/CompLogo.png') }}" class="h-100px logo" />
                </a>
                <!--end::Logo-->
                <!--begin::Aside toggler-->
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize" >
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                    <span class="svg-icon svg-icon-1 rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                                        <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                                    </svg>
                                </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside toggler-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside menu-->
            <div class="aside-menu flex-column-fluid">
                <!--begin::Aside Menu-->
                <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-title fw-bolder-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                        <div class="menu-item here show menu-accordion">
                            <a class="menu-link" href="{{route('dashboard')}}">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                <span class="menu-title fw-bolder">پیشخوان</span>
                            </a>
                        </div>
                        @if(hasSpecialPermission(\App\Models\SpecialPermission::VIEW_ADMIN_DASHBOARD))
                            <div class="menu-item">
                                <div class="menu-content pt-8 pb-2">
                                    <span class="menu-section text-muted text-uppercase fs-6">بخش مدیریت</span>
                                </div>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(handleItemEnableActive('setting.sms') || handleItemEnableActive('file-manager.index'))  hover show @endif">
                                <span class="menu-link ">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title fw-bolder">تنظیمات و دسترسی ها</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item menu-accordion">
                                        <a class="menu-link {{handleItemEnableActive('setting.sms')}}" href="{{route('setting.sms')}}">
                                             <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                            <span class="menu-title fw-bolder">تنظیمات پنل sms</span>
                                        </a>
                                    </div>
                                    <div class="menu-item menu-accordion">
                                        <a class="menu-link {{handleItemEnableActive('file-manager.index')}}"  href="{{route('file-manager.index')}}">
                                             <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                            <span class="menu-title fw-bolder">مدیریت فایل ها</span>
                                        </a>
                                    </div>
                                    <div class="menu-item menu-accordion">
                                        <a class="menu-link " target="_blank" href="{{url('visitlog')}}">
                                             <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                            <span class="menu-title fw-bolder">مشاهده درخواست ها</span>
                                        </a>
                                    </div>
                                    <div class="menu-item menu-accordion">
                                        <a class="menu-link " target="_blank" href="{{url('log-viewer')}}">
                                             <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                            <span class="menu-title fw-bolder">مشاهده لاگ ها</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-item">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('role.create') || handleItemEnableActive('role.index') || handleItemEnableActive('special-permission.index')) hover show @endif">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title fw-bolder">مدیریت نقش ها</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">

                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('role.create')}}" href="{{route('role.create')}}">
                                                 <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">تعریف نقش جدید</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('role.index')}}" href="{{route('role.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">لیست نقش ها</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('special-permission.index')}}" href="{{route('special-permission.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">دسترسی های اختصاصی</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="menu-item">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('user.create') || handleItemEnableActive('user.index') ) hover show @endif">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title fw-bolder">مدیریت کاربران</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('user.create')}}" href="{{route('user.create')}}">
                                                 <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">ثبت کاربر جدید</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('user.index')}}" href="{{route('user.index')}}">
                                                 <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">لیست کاربران</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="menu-item">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('discount.create') || handleItemEnableActive('discount.index')) hover show @endif">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title fw-bolder">مدیریت تخفیف</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('discount.create')}}" href="{{route('discount.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">ثبت کد تخفیف</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('discount.index')}}" href="{{route('discount.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">لیست کدهای تخفیف</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-item">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(handleItemEnableActive('infinite-package.index') || handleItemEnableActive('public-package.index'))  hover show @endif">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title fw-bolder">مدیریت بسته</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('infinite-package.index')}}" href="{{route('infinite-package.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">بسته های نامحدود</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('public-package.index')}}" href="{{route('public-package.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">بسته های اعتباری</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="menu-item">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(handleItemEnableActive('FAQ.create') || handleItemEnableActive('HFAQ.createH') || handleItemEnableActive('HFAQ.indexH'))  hover show @endif">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title fw-bolder">سوالات متداول</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('FAQ.create')}}" href="{{route('FAQ.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">ثبت سوال جدید</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('HFAQ.createH')}}" href="{{route('HFAQ.createH')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">ثبت دسته بندی جدید</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('HFAQ.indexH')}}" href="{{route('HFAQ.indexH')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">لیست سوالات ثبت شده</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-item">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(handleItemEnableActive('AdminContactUs.index')) hover show @endif">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title fw-bolder">تماس با ما</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('AdminContactUs.index')}}" href="{{route('AdminContactUs.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">لیست پیام ها</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('posts.create') || handleItemEnableActive('posts.index')) hover show @endif">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title fw-bolder">بلاگ</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('posts.create')}}" href="{{route('posts.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">ایجاد پست جدید</span>
                                            </a>
                                        </div>
                                        <div class="menu-item menu-accordion">
                                            <a class="menu-link {{handleItemEnableActive('posts.index')}}" href="{{route('posts.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title fw-bolder">لیست پست ها</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted fs-6 fw-bolder">پشتیبانی</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{handleItemEnableActive('UserTickets.createTicket')}}" href="{{route('UserTickets.createTicket')}}">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"></path>
													<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"></path>
													<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">ارسال پیام</span>
                            </a>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('UserTickets.TicketsOngoingIndex') || handleItemEnableActive('UserTickets.TickeClosedIndex')) hover show @endif">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title fw-bolder">درخواست&zwnj;های پشتیبانی </span>
                                    @php
                                        if( hasRole(\App\Models\Role::ADMIN) ){
                                            $Tickets_Ongoing = \App\Models\Ticket::whereIn('status',['پاسخ کاربر','در جریان'])->get();
                                        }
                                        else{
                                            $Tickets_Ongoing = \App\Models\Ticket::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->where('status','پاسخ پشتیبان')->get();
                                        }
                                    @endphp
                                    @if(count($Tickets_Ongoing) != 0)
                                        <span class="badge badge-light-danger badge-circle fw-bolder fs-7"><span class="pulse-ring"></span>{{count($Tickets_Ongoing)}}</span>
                                    @endif
                                    <span class="menu-arrow"></span>
                                </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item menu-accordion">
                                    <a class="menu-link {{handleItemEnableActive('UserTickets.TicketsOngoingIndex')}}" href="{{route('UserTickets.TicketsOngoingIndex')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">در جریان</span>
                                        @if(count($Tickets_Ongoing) != 0)
                                            <span class="badge badge-light-danger badge-circle fw-bolder fs-7"><span class="pulse-ring"></span>{{count($Tickets_Ongoing)}}</span>
                                        @endif
                                    </a>
                                </div>
                                <div class="menu-item menu-accordion">
                                    <a class="menu-link {{handleItemEnableActive('UserTickets.TickeClosedIndex')}}" href="{{route('UserTickets.TickeClosedIndex')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">بسته شده</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-6">تعاریف اولیه</span>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('taxpayer.create') || handleItemEnableActive('taxpayer.index')) hover show @endif">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                            <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title fw-bolder">مؤدیان</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link {{handleItemEnableActive('taxpayer.create')}}" href="{{route('taxpayer.create')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">ثبت مؤدی جدید</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{handleItemEnableActive('taxpayer.index')}}" href="{{route('taxpayer.index')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">لیست مؤدیان</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('customer.create') || handleItemEnableActive('customer.index')) hover show @endif">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/User-folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title fw-bolder">مشتریان</span>
                                    <span class="menu-arrow"></span>
                                </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item menu-accordion">
                                    <a class="menu-link {{handleItemEnableActive('customer.create')}}" href="{{route('customer.create')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">ثبت مشتری جدید</span>
                                    </a>
                                </div>
                                <div class="menu-item menu-accordion">
                                    <a class="menu-link {{handleItemEnableActive('customer.index')}}" href="{{route('customer.index')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">لیست مشتریان</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('product.create') || handleItemEnableActive('product.index')) hover show @endif">
                                <span class="menu-link ">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title fw-bolder">شناسه‌های کالا/خدمت</span>
                                    <span class="menu-arrow"></span>
                                </span>
                            <div class="menu-sub menu-sub-accordion ">
                                <div class="menu-item menu-accordion">
                                    <a class="menu-link {{handleItemEnableActive('product.create')}}" href="{{route('product.create')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">ثبت شناسه کالا/خدمت جدید</span>
                                    </a>
                                </div>
                                <div class="menu-item menu-accordion">
                                    <a class="menu-link {{handleItemEnableActive('product.index')}}" href="{{route('product.index')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">لیست شناسه‌های کالا/خدمت</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted fs-6 fw-bolder">صورتحساب</span>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(handleItemEnableActive('invoice.create') || handleItemEnableActive('invoice-gold.create')) hover show @endif">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
                                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                            <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title fw-bolder">ثبت صورتحساب</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link {{handleItemEnableActive('invoice.create')}}" href="{{route('invoice.create')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">صورتحساب فروش(عادی)</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{handleItemEnableActive('invoice-gold.create')}}" href="{{route('invoice-gold.create')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title fw-bolder">صورتحساب طلا، جواهر و پلاتین</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        {{--                            <div class="menu-item">--}}
                        {{--                                <a class="menu-link" href="">--}}
                        {{--										<span class="menu-icon">--}}
                        {{--                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->--}}
                        {{--                                            <span class="svg-icon svg-icon-2">--}}
                        {{--												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
                        {{--													<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>--}}
                        {{--													<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>--}}
                        {{--												</svg>--}}
                        {{--											</span>--}}
                        {{--                                            <!--end::Svg Icon-->--}}
                        {{--                                        </span>--}}
                        {{--                                    <span class="menu-title fw-bolder">فاکتورهای پیش نویس&zwnj;</span>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}

                        <div class="menu-item">
                            <a class="menu-link {{handleItemEnableActive('invoice.index-draft')}}" href="{{route('invoice.index-draft').'?'.urlencode('statuses[]').'='.Invoice::STATUS_DRAFT}}">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
													<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder"> صورتحساب های پیش نویس&zwnj;</span>
                            </a>
                        </div>


                        <div class="menu-item">
                            <a class="menu-link {{handleItemEnableActive('invoice.index')}}" href="{{route('invoice.index')}}">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
													<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">لیست همه صورتحساب ها&zwnj;</span>
                            </a>
                        </div>


                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted fs-6 fw-bolder">خرید و پرداخت ها</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{handleItemEnableActive('payment.pricing')}}" href="{{route('payment.pricing')}}">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"></path>
													<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"></path>
													<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">خرید بسته جدید</span>
                            </a>
                            <a class="menu-link {{handleItemEnableActive('payment.index')}}" href="{{route('payment.index')}}">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"></path>
													<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"></path>
													<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">لیست پرداخت ها</span>
                            </a>
                        </div>


                        <div class="menu-item ">
                            <div class="menu-content pt-8 pb-0">
                                <span class="menu-section text-muted fs-6 fw-bolder">تنظیمات حساب کاربری</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{handleItemEnableActive('user.referral.index')}}" href="{{route('user.referral.index')}}">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"></path>
                                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                <span class="menu-title fw-bolder ">معرفی های من</span>
                            </a>


                            <a class="menu-link {{handleItemEnableActive('user.info.edit')}}" href="{{route('user.info.edit')}}">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"></path>
                                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                <span class="menu-title fw-bolder ">ویرایش اطلاعات حساب</span>
                            </a>


                        </div>
                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted fs-6 fw-bolder">دسترسی سریع</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('csr.index')}}" target="_blank">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"></path>
													<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"></path>
													<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">تولید آنلاین CSR</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="https://my.tax.gov.ir/" target="_blank">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"></path>
													<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"></path>
													<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">سامانه امور مالیاتی</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="https://www.evat.ir/" target="_blank">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="currentColor"></path>
													<path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="currentColor"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">سامانه ارزش افزوده</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="http://ttms.tax.gov.ir/" target="_blank">
										<span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                            <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="currentColor"></path>
													<path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="currentColor"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                        </span>
                                <span class="menu-title fw-bolder">سامانه صورت معاملات فصلی</span>
                            </a>
                        </div>

                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" style="" class="header align-items-stretch">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Aside mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                            </svg>
                                        </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Aside mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="https://karposhe.com" class="d-lg-none">
                            <img alt="Logo" src="{{ asset('dash-assets/media/logos/CompLogo.png') }}" class="h-30px logo" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                        <!--begin::Navbar-->
                        <div class="d-flex align-items-stretch" id="kt_header_nav">
                            <div class="d-flex justify-content-start pt-4 pb-4">
                                @php $invoice_count = $user->publicPackages()->sum('remain_count'); @endphp
                                <div>
                                    <a class="btn btn-warning text-dark fw-bold ml-4"> <b> اعتبار باقیمانده: </b><u>{{$invoice_count}}</u>  صورتحساب </a>
                                </div>
                                @php $infinite_package_count = $user->infinitePackages()->where('to_date', '>=', date('Y-m-d'))->count(); @endphp
                                <div class="mx-4">
                                    <a class="btn btn-warning text-dark fw-bold" style="margin-left: 1px;margin-right: 1px"> <b> تعداد بسته های نامحدود: </b><u>{{$infinite_package_count}}</u>  بسته </a>
                                </div>
                            </div>
                        </div>
                        <!--end::Navbar-->
                        <div class="d-flex align-items-stretch align-content-end ms-1 ms-lg-20">
                            <div class="d-flex align-items-center ms-1 ms-lg-20">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bolder">
                                    <div class="fs-3 text-success pe-7">کد معرف:
                                        {{generateUserBarcode($user_id)}}
                                        <input type="text" value="{{generateUserBarcode($user_id)}}" id="myInput" class="d-none" >
                                        <a class="la la-copy p-2" onclick="CopyClipboard()"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Toolbar wrapper-->
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <!--begin::User menu-->
                            <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <span class="badge badge-light-danger p-4 fw-bolder">A</span>
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-10px me-5">
                                                <span class="badge badge-light-danger">A</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bolder d-flex align-items-center fs-5">{{ getFullName($user, false)}}</div>
                                                <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ $user->mobile }}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                        <a href="#" class="menu-link px-5">
                                            <span class="menu-title fw-bolder"> درخواست‌های پشتیبانی</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link px-5">در جریان</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link px-5">بسته شده</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{route('user.info.edit')}}" class="menu-link px-5">ویرایش اطلاعات حساب</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a class="menu-link px-5" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('خروج') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>


                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::body-->
        @yield('content')
        <!--end::body-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                    </svg>
                </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src={{asset('dash-assets/plugins/global/plugins.bundle.js')}}></script>
<script src={{asset('dash-assets/js/scripts.bundle.js')}}></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src={{asset('dash-assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}></script>
<script src={{asset('dash-assets/plugins/custom/datatables/datatables.bundle.js')}}></script>
<script src={{asset('dash-assets/plugins/custom/prismjs/prismjs.bundle.js')}}></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src={{asset('dash-assets/js/widgets.bundle.js')}}></script>
<script src={{asset('dash-assets/js/custom/widgets.js')}}></script>
<script src={{asset('dash-assets/js/custom/apps/chat/chat.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/upgrade-plan.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/create-app.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/users-search.js')}}></script>
<!--end::Page Custom Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src={{asset('dash-assets/js/custom/account/settings/signin-methods.js')}}></script>
<script src={{asset('dash-assets/js/custom/apps/support-center/tickets/create.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/create-app.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/offer-a-deal/type.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/offer-a-deal/details.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/offer-a-deal/finance.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/offer-a-deal/complete.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/offer-a-deal/main.js')}}></script>
<script src={{asset('dash-assets/js/custom/utilities/modals/create-campaign.js')}}></script>
<script src="{{asset('dash-assets/js/jalalidatepicker.min.js')}}"></script>
<script src="{{asset('dash-assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('dash-assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script src={{asset('dash-assets/js/custom/documentation/editors/tinymce/plugins.js')}}></script>
<script>
    tinymce.init({
        selector: "#kt_docs_tinymce_hidden",
        menubar: true,
        toolbar: [
            "undo redo | cut copy paste | selectall | bold italic underline strikethrough | superscript subscript | alignleft aligncenter alignright alignjustify",
            "fontselect fontsizeselect formatselect styleselect | forecolor backcolor | outdent indent | bullist numlist checklist | link unlink anchor | image media table",
            "blockquote | emoticons charmap hr pagebreak | searchreplace | code codesample | preview print save | fullscreen | insertdatetime | visualblocks visualchars",
            "template help | restoredraft | table tabledelete | inserttable | tableprops | tablecellprops | mergecells | splitcells"
        ],
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media",
            "table emoticons template paste help codesample save",
            "nonbreaking directionality textpattern"
        ],
        autosave_ask_before_unload: true,
        insertdatetime_formats: ["%Y-%m-%d", "%H:%M:%S", "%I:%M:%S %p", "%A, %B %d, %Y"]
    });
    tinymce.init({
        selector: "#kt_docs_tinymce_hidden1",
        menubar: true,
        toolbar: [
            "undo redo | cut copy paste | selectall | bold italic underline strikethrough | superscript subscript | alignleft aligncenter alignright alignjustify",
            "fontselect fontsizeselect formatselect styleselect | forecolor backcolor | outdent indent | bullist numlist checklist | link unlink anchor | image media table",
            "blockquote | emoticons charmap hr pagebreak | searchreplace | code codesample | preview print save | fullscreen | insertdatetime | visualblocks visualchars",
            "template help | restoredraft | table tabledelete | inserttable | tableprops | tablecellprops | mergecells | splitcells"
        ],
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media",
            "table emoticons template paste help codesample save",
            "nonbreaking directionality textpattern"
        ],
        autosave_ask_before_unload: true,
        insertdatetime_formats: ["%Y-%m-%d", "%H:%M:%S", "%I:%M:%S %p", "%A, %B %d, %Y"]
    });
</script>
<!--end::Page Custom Javascript-->

<script>
    jalaliDatepicker.startWatch({
        minDate: "attr",
        maxDate: "attr"
    });
    /* Below is a js demo | you don't need to use */
    setTimeout(function(){
        var elm=document.getElementsByTagName("input")[0];
        elm.focus();
        jalaliDatepicker.hide();
        jalaliDatepicker.show(elm);
    }, 1000);
</script>

<script>
    var e, t, a, o = document.querySelectorAll(".Gozareshat-chart1"),
        s = KTUtil.getCssVariableValue("--bs-gray-500"),
        r = KTUtil.getCssVariableValue("--bs-gray-200"),
        i = KTUtil.getCssVariableValue("--bs-gray-300");
    [].slice.call(o).map((function(o) {
        e = o.getAttribute("data-kt-color"), t = parseInt(KTUtil.css(o, "height")), a = KTUtil.getCssVariableValue("--bs-" + e), new ApexCharts(o, {
            series: [{
                name: "تعداد",
                <?php
                    $draft = $user->invoices()->where('status', '=', Invoice::STATUS_DRAFT)->count();
                    $success = $user->invoices()->where('status', '=', Invoice::STATUS_VERIFY_SUCCESS)->orWhere('status', '=', Invoice::STATUS_SENT_SUCCESS)->count();
                    $fail = $user->invoices()->where('status', '=', Invoice::STATUS_VERIFY_FAIL)->orWhere('status', '=', Invoice::STATUS_SENT_FAIL)->count();
                    ?>
                data: [{{$draft}}, {{$success}}, {{$fail}}]
            }],
            chart: {
                fontFamily: "inherit",
                type: "bar",
                height: t,
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: ["50%"],
                    borderRadius: 4
                }
            },
            legend: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 2,
                colors: ["transparent"]
            },
            xaxis: {
                categories: [ "خطا", "ارسال موفق", "پیش نویس"],
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                labels: {
                    style: {
                        colors: s,
                        fontSize: "12px"
                    }
                }
            },
            yaxis: {
                y: 0,
                offsetX: 0,
                offsetY: 0,
                labels: {
                    style: {
                        colors: s,
                        fontSize: "12px"
                    }
                }
            },
            fill: {
                type: "solid"
            },
            states: {
                normal: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: !1,
                    filter: {
                        type: "none",
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: "12px"
                },
                y: {
                    formatter: function(e) {
                        return e + "عدد"
                    }
                }
            },
            colors: [a, i],
            grid: {
                padding: {
                    top: 10
                },
                borderColor: r,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: !0
                    }
                }
            }
        }).render()
    }))

</script>
<script>

    var e, t, a, o = document.querySelectorAll(".Gozareshat-chart2"),
        s = KTUtil.getCssVariableValue("--bs-gray-500"),
        r = KTUtil.getCssVariableValue("--bs-gray-200"),
        i = KTUtil.getCssVariableValue("--bs-gray-300");
    x = KTUtil.getCssVariableValue("--bs-info");
    success = KTUtil.getCssVariableValue("--bs-success");

    [].slice.call(o).map((function(o) {
        e = o.getAttribute("data-kt-color"), t = parseInt(KTUtil.css(o, "height")), a = KTUtil.getCssVariableValue("--bs-" + e), new ApexCharts(o, {
            series: [{
                <?php
                    $result = getLastMonthsInvoiceData(6);
                    ?>
                name: "مجموع صورتحساب ها",
                data: [{{implode(',', $result['sum_invoice'])}}]
            }, {
                name: "مجموع ارزش افزوده",
                data: [{{implode(',', $result['sum_tax'])}}]
            }],
            chart: {
                fontFamily: "inherit",
                type: "bar",
                height: t,
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: ["50%"],
                    borderRadius: 4
                }
            },
            legend: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 2,
                colors: ["transparent"]
            },
            xaxis: {
                categories: [@foreach($result['names'] as $name) '{{$name}}', @endforeach],
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                labels: {
                    style: {
                        colors: s,
                        fontSize: "12px"
                    }
                }
            },
            yaxis: {
                y: 0,
                offsetX: 0,
                offsetY: 0,
                labels: {
                    style: {
                        colors: s,
                        fontSize: "12px"
                    }
                }
            },
            fill: {
                type: "solid"
            },
            states: {
                normal: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: "none",
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: "12px",
                },
                y: {
                    formatter: function(e) {
                        return e + "ریال"
                    }
                }
            },
            colors: [a, x],
            grid: {
                padding: {
                    top: 10
                },
                borderColor: r,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: !0
                    }
                }
            }
        }).render()
    }))

</script>
<script>
    function CopyClipboard() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("کد معرف شما کپی شد!");
    }
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
