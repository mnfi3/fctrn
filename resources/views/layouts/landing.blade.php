
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" lang="fa-IR">
<!--begin::Head-->
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="{{$description}}" />
    <meta name="keywords" content="{{$keywords}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="fa" />
    <meta property="og:type" content="article" />


    <meta name="twitter:image">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link href="{{asset('dash-assets/media/logos/CompLogo.png')}}">
    <link rel="icon" href="{{asset('dash-assets/media/logos/CompLogo.png')}}">
    <link rel="shortcut icon" href="{{asset('dash-assets/media/logos/CompLogo.png')}}">
    <link rel="apple-touch-icon" href="{{asset('dash-assets/media/logos/CompLogo.png')}}">
    <meta name="theme-color" content="#346566">
    <meta name="msapplication-navbutton-color" content="#346566">
    <meta name="apple-mobile-web-app-status-bar-style" content="#346566">



    <meta name="author" content="فاکتورین">
    <meta name="language" content="fa">
    <meta name="document-type" content="Public">
    <meta name="document-rating" content="General">
    <meta name="robots" content="noodp">
    <meta name="resource-type" content="document">
    <meta property="place:location:latitude" content="38.079948">
    <meta property="place:location:longitude" content="46.247943">
    <meta property="business:contact_data:street_address" content="تبریز، نصف راه، خیابان ورزش، ">
    <meta property="business:contact_data:locality" content="تبریز">
    <meta property="business:contact_data:country_name" content="ایران">
    <meta property="business:contact_data:phone_number" content="+98 41 44444444">
    <meta property="business:contact_data:website" content="{{url('/')}}">
    <meta property="business:contact_data:postal_code" content="16656-66666">
    <meta property="business:contact_data:email" content="factorin.ir@gmail.com">
    <meta property="og:title" content="نرم افزار واسط ارسال صورتحساب الکترونیکی فاکتورین">
    <meta property="og:description" content="امکان ارسال انواع صورتحساب الکترونیکی نوع اول و نوع دوم به سامانه مؤدیان در سامانه فاکتورین مهیا می باشد. در واقع فاکتورین، رابط شما با سامانه مؤدیان است. ">
    <link property="og:url" href="{{url('/')}}">
    <meta property="og:site_name" content="نرم افزار واسط ارسال صورتحساب الکترونیکی فاکتورین">
    <meta property="storage:tag" content="اتصال به سامانه مودیان مالیاتی، نرم افزار ارسال صورتحساب به سامانه مودیان، نحوه ارسال صورتحساب در سامانه مودیان، صدور صورتحساب الکترونیکی سامانه مودیان، نحوه کار با سامانه مودیان، ثبت فاکتور رسمی در سامانه مودیان، ">
    <meta property="storage:section" content="factorin software">
    <meta property="og:image" content="https://factorin.com/dash-assets/media/logos/CompLogo.png">
    <meta name="twitter:card" content="Factor5 Tax Factor software">
    <meta name="twitter:description" content="امکان ارسال انواع صورتحساب الکترونیکی نوع اول و نوع دوم به سامانه مودیان در سامانه فاکتورین مهیا می باشد. در واقع فاکتورین، رابط شما با سامانه مودیان است. ">
    <meta name="twitter:title" content="نرم افزار واسط ارسال صورتحساب الکترونیکی فاکتورین">
    <meta property="og:image" content="https://factorin.com/dash-assets/media/logos/CompLogo.png">


    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dash-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/css/font.dash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/new-design.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Fonts-->
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />--}}
    <link rel="stylesheet" href="{{asset('dash-assets/fonts/poppins-v24-latin-regular.woff2')}}" />
    <!--end::Fonts-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Header Section-->
    <div class="mb-0" id="home">
        <!--begin::Wrapper-->
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url({{asset('dash-assets/media/svg/illustrations/landing.svg')}})">
            <!--begin::Header-->
            <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center justify-content-between">
                        <!--begin::Logo-->
                        <div class="d-flex align-items-center flex-equal">
                            <!--begin::Mobile menu toggle-->
                            <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2hx">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
											</svg>
										</span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Mobile menu toggle-->
                            <!--begin::Logo image-->
                            <a href="{{url('/')}}">
                                <img alt="Logo" src="{{asset('dash-assets/media/logos/CompLogo.png')}}" class="logo-default h-100px h-lg-150px" />
                                <img alt="Logo" src="{{asset('dash-assets/media/logos/CompLogo.png')}}" class="logo-sticky h-100px h-lg-150px" />
                            </a>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Logo-->
                        <!--begin::Menu wrapper-->
                        <div class="d-lg-block" id="kt_header_nav_wrapper">
                            <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                <!--begin::Menu-->
                                <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link active py-3 px-4 px-xxl-6" @if (request()->is('/')) href="#kt_body" @else href="{{route('index')}}#kt_body" @endif data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">خانه</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3  px-4 px-xxl-6  @if(request()->routeIs('academy.index')) active @endif "  href="{{route('academy.index')}}"  data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">آموزش</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" @if (request()->is('/')) href="#how-it-works" @else href="{{route('index')}}#how-it-works" @endif data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">سازوکار</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" @if (request()->is('/')) href="#kt_pricing" @else href="{{route('index')}}#kt_pricing" @endif data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">تعرفه ها</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('csr.index')}}" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">تولید کلید ها و csr</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" @if (request()->is('/')) href="#contactus" @else href="{{route('index')}}#contactus" @endif data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">تماس با ما</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('blog.index')}}" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">بلاگ</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('FAQ')}}" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">سوالات متداول</a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Toolbar-->
                        <div class="flex-equal text-end ms-1">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('home') }}" class="btn btn-success">پنل کاربری</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-success">ورود</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-info">ثبت نام</a>
                                    @endif
                                @endauth
                            @endif

                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            @yield('header')
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Header Section-->
    @yield('content')
    <div class="mb-0">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -2 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="landing-dark-bg pt-20">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row py-10 py-lg-20">
                    <!--begin::Col-->
                    <div class="col-lg-5 pe-lg-16 mb-10 mb-lg-0">
                        <!--begin::Block-->
                        <div class="rounded landing-dark-border p-9 mb-10">
                            <!--begin::Title-->
                            <h2 class="text-white">نحوه ثبت نام و ارسال فاکتور به چه صورت است؟</h2>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <span class="fw-normal fs-4 text-gray-400">مشاهده
									<a href="https://factorin.ir/blog/%D8%B5%D9%81%D8%B1_%D8%AA%D8%A7_%D8%B5%D8%AF_%D8%A7%D8%B1%D8%B3%D8%A7%D9%84_%D8%B5%D9%88%D8%B1%D8%AA%D8%AD%D8%B3%D8%A7%D8%A8_%D8%A8%D9%87_%D8%B3%D8%A7%D9%85%D8%A7%D9%86%D9%87_%D9%85%D9%88%D8%AF%DB%8C%D8%A7%D9%86" class="text-white opacity-50 text-hover-primary">راهنمای ثبت نام و ثبت فاکتور</a></span>
                            <!--end::Text-->
                        </div>
                        <!--end::Block-->
                        <!--begin::Block-->
                        <div class="rounded landing-dark-border p-9">
                            <!--begin::Title-->
                            <h2 class="text-white">خدمات پشتیبانی شامل چه مواردی می شود؟</h2>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <span class="fw-normal fs-4 text-gray-400">خدمات پشتیبانی و تعهدات شرکت.
									<a href="" class="text-white opacity-50 text-hover-primary">برای مشاهده کلیک کنید</a></span>
                            <!--end::Text-->
                        </div>
                        <!--end::Block-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-7 ps-lg-16">
                        <!--begin::Navs-->
                        <div class="d-flex justify-content-center">
                            <!--begin::Links-->
                            <div class="d-flex fw-bold flex-column me-10">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bolder text-gray-400 mb-6">درباره سامانه</h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
                                <a href="{{route('FAQ')}}" class="text-white opacity-50 text-hover-primary fs-5 mb-6">سوالات متداول</a>
                                <a href="{{route('rules')}}" class="text-white opacity-50 text-hover-primary fs-5 mb-6">قوانین و مقررات</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">آموزش و راهنمایی</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">آپدیت ها</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                            <!--begin::Links-->
                            <div class="d-flex fw-bold flex-column ms-lg-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bolder text-gray-400 mb-6">ارتباط با ما</h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
                                <a href="#" class="mb-6">
                                    <img src="{{asset('dash-assets/media/svg/brand-logos/twitter.svg')}}" class="h-20px me-2" alt="twitter" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">توئیتر</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="https://www.instagram.com/factorin.tax/profilecard/?igsh=cTFwcDlhczBoY3pp" class="mb-6">
                                    <img src="{{asset('dash-assets/media/svg/brand-logos/instagram-2-1.svg')}}" class="h-20px me-2" alt="instagram" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">اینستاگرام</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="#" class="mb-6">
                                    <img src="{{asset('dash-assets/media/svg/brand-logos/youtube-3.svg')}}" class="h-20px me-2" alt="youtube" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">یوتیوب</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="https://www.aparat.com/factorin.ir" class="mb-6">
                                    <img src="{{asset('dash-assets/media/svg/brand-logos/youtube-3.svg')}}" class="h-20px me-2" alt="aparat" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">آپارات</span>
                                </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                            <!--begin::Links-->
                            <div class="d-flex fw-bold flex-column ms-lg-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bolder text-gray-400 mb-6">مجوزها</h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
{{--                                <a href="" target="_blank" class="mb-6">--}}
{{--                                    <img src="{{asset('dash-assets/media/comps/enamad.png')}}" class="h-20px me-2" alt="Enemad" />--}}
{{--                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">نماد تجارت الکترونیک</span>--}}
{{--                                </a>--}}

                                <a class="mb-6"  referrerpolicy='origin' target='_blank' href='https://trustseal.enamad.ir/?id=7617103&Code=dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj'>
                                    <img  class="h-20px me-2" referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=7617103&Code=dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj' alt='' style='cursor:pointer' code='dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj'>
{{--                                    <img src="{{asset('dash-assets/media/comps/enamad.png')}}" class="h-20px me-2" alt="Enemad" />--}}
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">نماد تجارت الکترونیک</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a target="_blank" href="https://irsherkat.ssaa.ir/Design/SearchCompanyPublicInfo.aspx" class="mb-6">
                                    <img src="{{asset('dash-assets/media/comps/sabt.png')}}" class="h-20px me-2" alt="SabtSherkat" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">اداره کل ثبت شرکت ها</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a target="_blank" href="https://www.eastp.ir/fa/established-units/establishment-in-growth-center" target="_" class="mb-6">
                                    <img src="{{asset('dash-assets/media/comps/park.png')}}" class="h-20px me-2" alt="Park" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">پارک علم و فناوری</span>
                                </a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a target="_blank" href="https://azerbaijansh.irannsr.org/fa/page/107861-%D9%85%D8%B4%D8%A7%D9%87%D8%AF%D9%87-%D8%A7%D8%B9%D8%B6%D8%A7.html?ctp_id=1086&id=53066" class="mb-6">
                                    <img src="{{asset('dash-assets/media/comps/nasr.png')}}" class="h-20px me-2" alt="NezamSenfi" />
                                    <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">سازمان نظام صنفی رایانه ای کشور</span>
                                </a>
                                <!--end::Link-->


                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Navs-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
            <!--begin::Separator-->
            <div class="landing-dark-separator"></div>
            <!--end::Separator-->
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                    <!--begin::Copyright-->
                    <div class="d-flex align-items-center order-2 order-md-1">
                        <!--begin::Logo-->
                        <a href="https://factorin.ir">
                            <img alt="Logo" src="{{asset('dash-assets/media/logos/CompLogo.png')}}" class="h-100px h-md-80px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo image-->
                        <span class="mx-5 fs-6 fw-bold text-gray-300 pt-1" href=""> 2026 .Factorin ©</span>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-300 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link px-2">درباره ما</a>
                        </li>
                        <li class="menu-item mx-5">
                            <a href="{{route('index')}}#contactus" target="_blank" class="menu-link px-2">تماس با ما</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('blog.index')}}" target="_blank" class="menu-link px-2">وبلاگ</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Footer Section-->
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
</div>
<!--end::Root-->
<!--end::Main-->

<script>
    function setEqualHeights(selector) {
        const elements = document.querySelectorAll(selector);
        let maxHeight = 0;

// Reset heights and find the max height
        elements.forEach(el => {
            el.style.height = 'auto';
            maxHeight = Math.max(maxHeight, el.offsetHeight);
        });

// Apply max height to all elements
        elements.forEach(el => el.style.height = maxHeight + 'px');
    }



    window.addEventListener('load', () => setEqualHeights('.dd'));
    window.addEventListener('resize', () => setEqualHeights('.dd'));
</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src={{asset('dash-assets/plugins/global/plugins.bundle.js')}}></script>
<script src={{asset('dash-assets/js/scripts.bundle.js')}}></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src={{asset('dash-assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}></script>
<script src={{asset('dash-assets/plugins/custom/typedjs/typedjs.bundle.js')}}></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src={{asset('dash-assets/js/custom/landing.js')}}></script>
<script src={{asset('dash-assets/js/custom/pages/pricing/general.js')}}></script>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
