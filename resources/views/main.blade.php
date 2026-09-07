
@extends('layouts.landing')
@section('title', 'سامانه مودیان - فاکتورین - نرم افزار واسط ارسال صورتحساب الکترونیکی')
@section('header')
    <style>
        @keyframes blink {
            0% { opacity: 1; }
            10% { opacity: 0; }
            100% { opacity: 1; }
        }

        .blinking-text {
            font-size: 24px;
            color: red;
            animation: blink 2s infinite;
        }
    </style>
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <!--begin::Heading-->
        <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
            <!--begin::Title-->
            <div class="h1 text-white lh-base fw-bolder fs-2x fs-lg-3x">اتصال به سامانه مودیان مالیاتی</div>
                <br />
                <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x"><span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">«فاکتورین-سامانه واسط مالیاتی»</span>
							</span></h1>
                <br/>
                <div class="h1 text-white lh-base fw-bolder fs-2x fs-lg-3x mb-5">استفاده آسان، بدون قطعی، بهترین پشتیبانی</div>
            <!--end::Title-->
            <div class="mb-15">
                <a class="text-warning lh-base fw-bolder fs-3x fs-lg-3x blinking-text" href="https://factorfive.com/blog/%D8%B5%D9%81%D8%B1_%D8%AA%D8%A7_%D8%B5%D8%AF_%D8%A7%D8%B1%D8%B3%D8%A7%D9%84_%D8%B5%D9%88%D8%B1%D8%AA%D8%AD%D8%B3%D8%A7%D8%A8_%D8%A8%D9%87_%D8%B3%D8%A7%D9%85%D8%A7%D9%86%D9%87_%D9%85%D9%88%D8%AF%DB%8C%D8%A7%D9%86">آموزش صفر تا صد ارسال صورتحساب به سامانه مؤدیان (کلیک کنید!)</a>
            </div>
            <!--begin::Action-->
            <a href="{{ route('register') }}" class="btn btn-primary">ثبت نام رایگان</a>
            <!--end::Action-->
        </div>
        <!--end::Heading-->
        <div class="d-flex flex-center flex-wrap position-relative px-5">
            <!--begin::Client-->
            <div class="d-flex flex-center m-1 m-md-1" data-bs-toggle="tooltip" title="" data-bs-original-title="سازمان امور مالیاتی کشور">
                <a href="https://www.intamedia.ir/" target="_blank">
                    <img class="bg-hover-opacity-50 rounded mh-70px mh-lg-80px"   src="{{asset('dash-assets/media/comps/tax.png')}}"
                         alt="سازمان امور مالیاتی کشور" style="border-width:0px;">
                </a>
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-1" data-bs-toggle="tooltip" title="" data-bs-original-title="سازمان نظام صنفی رایانه ای کشور">
                <a href="https://azerbaijansh.irannsr.org/fa/page/107861-%D9%85%D8%B4%D8%A7%D9%87%D8%AF%D9%87-%D8%A7%D8%B9%D8%B6%D8%A7.html?ctp_id=1086&id=53066" target="_blank">
                    <img class="bg-hover-opacity-50 rounded mh-70px mh-lg-80px p-2"   src="{{asset('dash-assets/media/comps/nasr.png')}}"
                         alt="سازمان نظام صنفی رایانه ای کشور" style="border-width:0px;">
                </a>
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-1" data-bs-toggle="tooltip" title="" data-bs-original-title="نماد تجارت الکترونیک (شناسنامه کسب و کار)">


                <a referrerpolicy='origin' target='_blank' href='https://trustseal.enamad.ir/?id=7617103&Code=dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj'>
                    <img  class="bg-hover-opacity-50 rounded mh-70px mh-lg-80px" referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=7617103&Code=dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj' alt='' style='cursor:pointer' code='dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj'>
{{--                                    <img class="bg-hover-opacity-50 rounded mh-70px mh-lg-80px" alt="نماد تجارت الکترونیک"  src="{{asset('dash-assets/media/comps/enamad.png')}}" style="border-width:0px;">--}}
                </a>
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-1" data-bs-toggle="tooltip" title="" data-bs-original-title="اداره کل ثبت شرکت ها و موسسات">
                <a href="https://irsherkat.ssaa.ir/Design/SearchCompanyPublicInfo.aspx" target="_blank">
                    <img class="bg-hover-opacity-50 rounded mh-70px mh-lg-80px" alt="اداره کل ثبت شرکت ها و موسسات"  src="{{asset('dash-assets/media/comps/sabt.png')}}"
                         style="border-width:0px;">
                </a>
            </div>
            <!--end::Client-->
            <!--begin::Client-->
{{--            <div class="d-flex flex-center m-3 m-md-1" data-bs-toggle="tooltip" title="" data-bs-original-title="پارک علم و فناوری">--}}
{{--                <a href="https://www.eastp.ir/fa/established-units/establishment-in-growth-center" target="_blank">--}}
{{--                    <img class="bg-hover-opacity-50 rounded mh-70px mh-lg-80px p-4" alt="پارک علم و فناوری استان آذربایجان شرقی"  src="{{asset('dash-assets/media/comps/park.png')}}"--}}
{{--                         style="border-width:0px;">--}}
{{--                </a>--}}
{{--            </div>--}}
            <!--end::Client-->
        </div>
    </div>
    <!--end::Landing hero-->
@endsection
@section('content')

    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-10 z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">سازوکار سامانه</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-4 text-gray-700 fw-bolder">با ثبت نام سریع، رایگان و تکمیل اطلاعات مؤدی(ها) در
                    <br />
                    <span class="fs-3" style="background: linear-gradient(to right, #2e2e71 0%, rgb(220,44,44) 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">«فاکتورین-سامانه واسط مالیاتی»</span>
							</span>
                    <br />به آسانی صورتحساب‌های خود را به سازمان امور مالیاتی ارسال نمایید.</div>
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{asset('dash-assets/media/illustrations/sketchy-1/2.png')}}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">1</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">ثبت نام رایگان</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-gray-700">با ثبت نام سریع، رایگان و آسان در
                            <br />
                            <span style="background: linear-gradient(to right, #12CE5D 0%, #2e2e71 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">«فاکتورین-سامانه واسط مالیاتی»</span>
							</span>
                            <br />خود را داشته باشید.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{asset('dash-assets/media/illustrations/sketchy-1/4.png')}}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">تکمیل اطلاعات مؤدی(ها)</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-gray-700">اطلاعات تکمیلی همچون
                            <br />«شناسه یکتا، کلید خصوصی و ...»
                            <br />برای ثبت صورتحساب الزامی می‌باشد.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{asset('dash-assets/media/illustrations/sketchy-1/15.png')}}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">ثبت و ارسال صورتحساب</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-gray-700">با ثبت نام رایگان و تعریف اطلاعات مودی
                            <br />تا سقف تعیین شده
                            <br />صورتحساب رایگان ثبت نمایید.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{asset('dash-assets/media/illustrations/sketchy-1/5.png')}}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">4</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">خرید پلن/شارژ حساب</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-gray-700">از طریق پنل اختصاصی خود
                            <br />برای بهره‌مندی از خدمات «فاکتورین»
                            <br />به آسانی حساب خود را شارژ نمایید.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--begin::Statistics Section-->
    <div class="mt-sm-n1">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -2 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="pb-15 pt-18 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-white fw-bolder mb-5">نگران ارسال صورتحساب‌های خود به سازمان امور مالیاتی نباشید!</h3>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fs-4 text-gray-300 fw-bold">
                        با استفاده از
                        <span class="fs-3" style="background: linear-gradient(to right, #ecae38 0%, rgb(252,4,4) 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">«فاکتورین-سامانه واسط مالیاتی»</span>
							</span>
                        <br /> در زمان و هزینه های خود صرفه جویی نمایید.</div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <!--begin::Statistics-->
                <div class="d-flex flex-center">
                    <!--begin::Items-->
                    <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url({{asset('dash-assets/media/svg/misc/octagon.svg')}})">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
											<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
											<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
											<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
										</svg>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="146" data-kt-countup-suffix="+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-300 fw-bold fs-5 lh-0">تعداد مشتریان</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url({{asset('dash-assets/media/svg/misc/octagon.svg')}}">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z" fill="black" />
											<path opacity="0.3" d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z" fill="black" />
											<path opacity="0.3" d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z" fill="black" />
										</svg>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="457" data-kt-countup-suffix="+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <div class="mt-4 text-center">
                                            <span class="text-gray-300 fw-bold fs-5 lh-0">تعداد صورتحساب ثبت شده
                                                </br>رایگان</span>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url({{asset('dash-assets/media/svg/misc/octagon.svg')}}">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
											<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
											<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
										</svg>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="4" data-kt-countup-suffix="+ هزار">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <div class="mt-4 text-center">
                                            <span class="text-gray-300 fw-bold fs-5 lh-0">تعداد کل صورتحساب
                                                </br>ثبت و ارسال شده</span>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Statistics-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Statistics Section-->
    <!--begin::Projects Section-->
    <div class="mb-lg-n15 position-relative z-index-3">
        <!--begin::Container-->
        <div class="container">
            <style>
                .mySlides {display:none;}
            </style>
            <!--begin::Product slider-->
            <div class="d-flex flex-column container pt-lg-10">
                <!--begin::Slider-->
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <p class="h1 fs-2hx fw-bolder text-dark mb-5" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">آخرین پست‌ها، اخبار و آموزش‌ها</p>
                    <div class="text-gray-800 fw-bold fs-5">در
                        <span class="fs-3" style="background: linear-gradient(to right, #601288 0%, rgb(128,16,16) 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">«فاکتورین-سامانه واسط مالیاتی»</span>
							</span>
                        علاوه بر ارائه خدمات ارسال صورتحساب،
                        <br />سعی بر آن داریم تا آخرین اخبار و آموزش‌های مرتبط با حوزه مالیاتی را برای شما عزیزان فراهم کنیم. </div>
                </div>
                <!--end::Heading-->
                <!--begin::Item-->
                <div class="d-flex justify-content-center w3-container w3-center w3-animate-left ">
                    <!--begin::Row-->
                    <div class="mySlides">
                        <div class="row g-10 ">
                        @foreach($LatestPost1 as $Post)
                            <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Hot sales post-->
                                    <div class="card-xl-stretch me-md-6 rounded  bg-white" style="box-shadow: 0px 0px 20px 0px rgba(95,100,103,0.66);">
                                        <!--begin::Overlay-->
                                        @if(!is_null($Post->media))
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{asset('images/posts/'.$Post->media->url)}}">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url({{asset('images/posts/'.$Post->media->url)}})"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                    @endif
                                    <!--end::Overlay-->
                                        <!--begin::Body-->
                                        <div class="p-5">
                                            <!--begin::Title-->
                                            <a href="{{route('blog.show',$Post->slug)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$Post->title}}</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 dd">{{$Post->preview}}</div>
                                            <!--end::Text-->
                                            <!--begin::Text-->
                                            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                                <!--begin::Label-->
                                                <span class="badge fs-6 fw-bolder text-dark p-1">
                                                            @if($Post->category == 'آموزش')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-primary fw-bolder my-2 fs-7">آموزش</span>
                                                                    <!--end::Label-->
                                                            @elseif($Post->category == 'اخبار')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-warning fw-bolder my-2 fs-7">اخبار</span>
                                                                    <!--end::Label-->
                                                            @elseif($Post->category == 'بلاگ')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-info fw-bolder my-2 fs-7">بلاگ</span>
                                                                    <!--end::Label-->
                                                            @elseif($Post->category == 'بروزرسانی')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-danger fw-bolder my-2 fs-7">بروزرسانی</span>
                                                                    <!--end::Label-->
                                                            @else
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-success fw-bolder my-2 fs-7">{{$Post->category}}</span>
                                                                    <!--end::Label-->
                                                                @endif
                                                </span>
                                                <!--end::Label-->
                                                <!--begin::Action-->
                                                <a href="{{route('blog.show',$Post->slug)}}" class="btn btn-sm btn-primary fw-bolder">ادامه مطلب</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Hot sales post-->
                                </div>
                                <!--end::Col-->
                            @endforeach

                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="d-flex justify-content-center w3-container w3-center w3-animate-left">
                    <!--begin::Row-->
                    <div class="mySlides">
                        <div class="row g-10 ">
                        @foreach($LatestPost2 as $Post)
                            <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Hot sales post-->
                                    <div class="card-xl-stretch me-md-6 rounded bg-white" style="box-shadow: 0px 0px 20px 0px rgba(95,100,103,0.66);">
                                        <!--begin::Overlay-->
                                        @if(!is_null($Post->media))
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{asset('images/posts/'.$Post->media->url)}}">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url({{asset('images/posts/'.$Post->media->url)}})"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                    @endif
                                    <!--end::Overlay-->
                                        <!--begin::Body-->
                                        <div class="p-5">
                                            <!--begin::Title-->
                                            <a href="{{route('blog.show',$Post->slug)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$Post->title}}</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 dd">{{$Post->preview}}</div>
                                            <!--end::Text-->
                                            <!--begin::Text-->
                                            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                                <!--begin::Label-->
                                                <span class="badge fs-6 fw-bolder text-dark p-1">
                                                            @if($Post->category == 'آموزش')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-primary fw-bolder my-2 fs-7">آموزش</span>
                                                                    <!--end::Label-->
                                                            @elseif($Post->category == 'اخبار')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-warning fw-bolder my-2 fs-7">اخبار</span>
                                                                    <!--end::Label-->
                                                            @elseif($Post->category == 'بلاگ')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-info fw-bolder my-2 fs-7">بلاگ</span>
                                                                    <!--end::Label-->
                                                            @elseif($Post->category == 'بروزرسانی')
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-danger fw-bolder my-2 fs-7">بروزرسانی</span>
                                                                    <!--end::Label-->
                                                            @else
                                                                <!--begin::Label-->
                                                                    <span class="badge badge-light-success fw-bolder my-2 fs-7">{{$Post->category}}</span>
                                                                    <!--end::Label-->
                                                                @endif
                                                </span>
                                                <!--end::Label-->
                                                <!--begin::Action-->
                                                <a href="{{route('blog.show',$Post->slug)}}" class="btn btn-sm btn-primary fw-bolder">ادامه مطلب</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Hot sales post-->
                                </div>
                                <!--end::Col-->
                            @endforeach

                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Item-->
            </div>
{{--            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>--}}
            <script src="{{asset('dash-assets/js/jquery3.7.1.min.js')}}"></script>
            <script>
                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    myIndex++;
                    if (myIndex > x.length) {myIndex = 1}
                    x[myIndex-1].style.display = "block";
                    setTimeout(carousel, 3000); // Change image every 2 seconds


                }
            </script>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Projects Section-->
    <!--begin::Pricing Section-->
    <div class="mt-sm-n20">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -2 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <p class="h1 fs-2hx fw-bolder text-white mb-5" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">قیمت گذاری شفاف، تصمیم گیری آسان</p>
                        <div class="text-gray-300 fw-bold fs-5">با استفاده از یک ابزار واحد برای چندین مودی
                            <br />در زمان و هزینه های خود صرفه جویی کنید</div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                   {{-- <div class="text-center" id="kt_pricing">
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <p class="h1 text-dark mb-5 fw-boldest">بسته شارژی</p>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-dark fw-bold mb-5">مناسب برای شرکت های کوچک و نوپا</div>
                                            <!--end::Description-->
                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="fs-3x fw-bolder text-primary">10,0000</span>
                                                <span class="mb-2 text-primary">ریال</span>
                                                <span class="fs-7 fw-bold opacity-50">/ هر فاکتور</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">پشتیبانی ۲۴ساعته در ۷روز هفته</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">امکان ثبت چندین مؤدی در یک پنل کاربری</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">امکان ثبت صورتحساب از طریق فایل excel</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">ثبت صورتحساب تا سقف شارژ شده</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <span class="fw-bold fs-6 text-gray-800">آموزش و مشاوره رایگان</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <p class="h1 text-white mb-5 fw-boldest">بسته پایه</p>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-white opacity-75 fw-bold mb-5">مناسب برای شرکت های در حال توسعه</div>
                                            <!--end::Description-->
                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="fs-3x fw-bolder text-white">50,000,000</span>
                                                <span class="mb-2 text-white">ریال</span>
                                                <span class="fs-7 fw-bold text-white">/ هر سال</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">پشتیبانی ۲۴ساعته در ۷روز هفته</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">امکان ثبت چندین مؤدی در یک پنل کاربری</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">امکان ثبت صورتحساب از طریق فایل excel</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">ثبت صورتحساب تا سقف 1000 عدد</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <span class="fw-bold fs-6 text-gray-800">آموزش و مشاوره رایگان</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <p class="h1 text-dark mb-5 fw-boldest">بسته نامحدود</p>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-dark opacity-75 fw-bold mb-5">مناسب برای شرکت های توسعه یافته،
                                                </br><span>دفاتر حسابرسی و حسابداران</span></div>
                                            <!--end::Description-->
                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="fs-3x fw-bolder text-primary">100,000,000</span>
                                                <span class="mb-2 text-primary">ریال</span>
                                                <span class="fs-7 fw-bold opacity-50">/ هر سال</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">پشتیبانی ۲۴ساعته در ۷روز هفته</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800 text-start pe-3">امکان ثبت چندین مؤدی در یک پنل کاربری</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">امکان ثبت صورتحساب از طریق فایل excel</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <span class="fw-bold fs-6 text-gray-800">ثبت صورتحساب بصورت نامحدود</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <span class="fw-bold fs-6 text-gray-800">آموزش و مشاوره رایگان</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Features-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    --}}
                <!--begin::Pricing card-->
                    <div class="card" id="kt_pricing">
                        <!--begin::Card body-->
                        <div class="card-body p-lg-17">
                            <!--begin::Plans-->
                            <div class="d-flex flex-column">
                                <!--begin::Nav group-->
                                <div class="nav nav-tabs nav-group-outline mx-auto mb-10 border-0" data-kt-buttons="true">
                                    <a class="btn btn-light-info btn-active btn-active-info px-6 py-3 me-2 fs-2" data-bs-toggle="tab" href="#menu1">بسته های نامحدود</a>
                                    <a class="btn btn-light-info btn-active btn-active-info px-6 py-3 fs-2 active" data-bs-toggle="tab" href="#menu2">بسته های اعتباری</a>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade" id="menu1" role="tabpanel">
                                        <!--end::Nav group-->
                                        <div class="mb-13 text-center">
                                            <p class="h1 fs-2hx fw-bolder mb-5">بسته های نامحدود</p>
                                            <div class="text-gray-600 fw-bold fs-5">
                                                شما می توانید با خرید هر یک از این بسته ها، تا زمان مشخص شده به تعداد نامحدود، صورتحساب برای آن مؤدی ثبت نمایید.
                                            </div>
                                        </div>
                                        <!--begin::Row-->
                                        <div class="row g-10">
                                            <!--begin::Col-->
                                            @foreach($infinite_packages as $package)

                                                <div class="col-xl-4">
                                                        <div class="d-flex h-100 align-items-center">
                                                            <!--begin::Option-->
                                                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-100 py-15 px-10 border border-4">
                                                                <!--begin::Heading-->
                                                                <div class="mb-7 text-center">
                                                                    <!--begin::Title-->
                                                                    <p class="h1 text-dark mb-5 fw-boldest">{{$package->name}}</p>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-gray-400 fw-bold mb-5">{{$package->desc}}</div>
                                                                    <!--end::Description-->
                                                                    <!--begin::Price-->
                                                                    <div class="text-center">
                                                                        <span class="mb-2 text-primary">تومان</span>
                                                                        <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="10000" data-kt-plan-price-annual="{{number_format($package->cost/10)}}">{{number_format($package->cost/10)}}</span>
                                                                        <span class="fs-7 fw-bold opacity-50">/
                                                                            <span data-kt-element="period">{{$package->day_count}} روز</span></span>
                                                                    </div>
                                                                    <!--end::Price-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Features-->
                                                                <div class="w-100 mb-10">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">امنیت پیشرفته </span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">پشتیبانی ۲۴ساعته در ۷روز هفته</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">دسترسی کامل به تمامی امکانات</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800">امکان ثبت صورتحساب با excel</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800">چاپ صورتحساب و دریافت فایل PDF</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack">
                                                                        <span class="fw-bold fs-6 text-gray-800">آموزش و مشاوره رایگان</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                </div>
                                                                <!--end::Features-->
                                                                <!--begin::Select-->
                                                                <a  class="btn btn-sm btn-primary"  href="{{route('payment.pricing')}}">خرید</a>
                                                                <!--end::Select-->
                                                            </div>
                                                            <!--end::Option-->
                                                        </div>
                                                </div>

                                        @endforeach
                                        <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <div class="tab-pane fade  show active" id="menu2" role="tabpanel">
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <p class="h1 fs-2hx fw-bolder mb-5">بسته های اعتباری</p>
                                            <div class="text-gray-600 fw-bold fs-5">
                                                با خرید هر یک از این بسته ها، بدون محدودیت زمانی و تا وقتی که شارژ دارید، می توانید صورتحساب ایجاد کنید.
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Row-->
                                        <div class="row g-10">
                                            <!--begin::Col-->

                                            @foreach($public_packages as $package)

                                                <div class="col-xl-4">
                                                        <div class="d-flex h-100 align-items-center">
                                                            <!--begin::Option-->
                                                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-100 py-15 px-10 border border-4">
                                                                <!--begin::Heading-->
                                                                <div class="mb-7 text-center">
                                                                    <!--begin::Title-->
                                                                    <p class="h1 text-dark mb-5 fw-boldest">{{$package->name}}</p>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-gray-400 fw-bold mb-5">{{$package->desc}}</div>
                                                                    <!--end::Description-->
                                                                    <!--begin::Price-->
                                                                    <div class="text-center">
                                                                        <span class="mb-2 text-primary">تومان</span>
                                                                        <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="10000" data-kt-plan-price-annual="{{number_format($package->cost/10)}}">{{number_format($package->cost/10)}}</span>
                                                                        <span class="fs-7 fw-bold opacity-50">/
                                                                            <span data-kt-element="period">{{$package->invoice_count}} صورتحساب</span></span>
                                                                    </div>
                                                                    <!--end::Price-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Features-->
                                                                <div class="w-100 mb-10">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">امنیت پیشرفته </span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">پشتیبانی ۲۴ساعته در ۷روز هفته</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">دسترسی کامل به تمامی امکانات</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800">امکان ثبت صورتحساب با excel</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack mb-5">
                                                                        <span class="fw-bold fs-6 text-gray-800">چاپ صورتحساب و دریافت فایل PDF</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex flex-stack">
                                                                        <span class="fw-bold fs-6 text-gray-800">آموزش و مشاوره رایگان</span>
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                        <!--end::Svg Icon-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                </div>
                                                                <!--end::Features-->
                                                                <!--begin::Select-->
                                                                <a  class="btn btn-sm btn-primary"  href="{{route('payment.pricing')}}">خرید</a>
                                                                <!--end::Select-->
                                                            </div>
                                                            <!--end::Option-->
                                                        </div>
                                                </div>

                                        @endforeach
                                            <div class="col-xl-3">
                                            </div>
                                            <div class="col-xl-6">
                                                    <div class="d-flex h-100 align-items-center">
                                                        <!--begin::Option-->
                                                        <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-100 py-15 px-10 border border-4">
                                                            <!--begin::Heading-->
                                                            <div class="mb-7 text-center">
                                                                <!--begin::Title-->
                                                                <p class="h1 text-dark mb-5 fw-boldest">درخواست بسته شخصی سازی شده</p>
                                                                <!--end::Title-->
                                                                <!--begin::Description-->
                                                                <div class="text-gray-600 fw-bold mb-5">با ما در ارتباط باشید</div>
                                                                <!--end::Description-->
                                                                <!--begin::Description-->
                                                                <div class="fw-bolder mb-5 fs-5">شماره تماس: 04134401128-04134402778</div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Heading-->
                                                            <!--begin::Features-->
                                                            <div class="w-100 mb-10">
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-5">
                                                                    <span class="fw-bold fs-6 text-gray-800 text-start pe-3">امنیت پیشرفته </span>
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-5">
                                                                    <span class="fw-bold fs-6 text-gray-800 text-start pe-3">پشتیبانی ۲۴ساعته در ۷روز هفته</span>
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-5">
                                                                    <span class="fw-bold fs-6 text-gray-800 text-start pe-3">دسترسی کامل به تمامی امکانات</span>
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-5">
                                                                    <span class="fw-bold fs-6 text-gray-800">امکان ثبت صورتحساب با excel</span>
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack mb-5">
                                                                    <span class="fw-bold fs-6 text-gray-800">چاپ صورتحساب و فایل PDF</span>
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Item-->
                                                                <div class="d-flex flex-stack">
                                                                    <span class="fw-bold fs-6 text-gray-800">آموزش و مشاوره رایگان</span>
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
															</svg>
														</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <!--end::Item-->
                                                            </div>
                                                            <!--end::Features-->
                                                            <!--begin::Select-->
                                                            <a href="{{route('UserTickets.createTicket')}}" class="btn btn-primary">ارسال پیام</a>
                                                            <!--end::Select-->
                                                        </div>
                                                        <!--end::Option-->
                                                    </div>

                                            </div>
                                        <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Plans-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Pricing card-->
                    <!--end::Pricing-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <section id="contactus">
        <!--end::Pricing Section-->
        <div class="mt-20 mb-n20 position-relative z-index-2">
            <!--begin::Container-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    <!--begin::Contact-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-17">
                            @if(Session::has('status'))
                                <!--begin::Notice-->
                                <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6 mb-4">
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
                                            <div class="fs-6 text-gray-700 pe-7">{{Session::get('status')}}</div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                            @endif
                            <!--begin::Row-->
                            <div class="row mb-3">
                                <!--begin::Col-->
                                <div class="col-md-6 pe-lg-10">
                                    <!--begin::Form-->
                                    <form action="{{route('index.contactus')}}" class="form mb-15" method="post">
                                        @csrf
                                        <p class="h1 fw-bolder text-dark mb-9">با ما در ارتباط باشید</p>
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold mb-2">نام</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--end::Label-->
                                                <label class="fs-5 fw-bold mb-2">ایمیل</label>
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="email" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold mb-2">عنوان</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="title" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold mb-2">شماره تماس</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="number" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-5 fv-row">

                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-10 fv-row">
                                            <label class="fs-6 fw-bold mb-2">پیام</label>
                                            <textarea class="form-control form-control-solid" rows="6" name="message" placeholder=""></textarea>
                                        </div>

                                        <div class="d-flex flex-column mb-10 fv-row">
                                            <div class="form-group">
                                                <label for="email"> کد امنیتی :</label>
                                                <img alt="برای نمایش صفحه را رفرش کنید" src="{{captcha_src()}}">
                                                <input class="form-control required" type="text" id="captcha" name="captcha" autocomplete="off" required>
                                            </div>
                                        </div>
                                        @error('captcha')
                                        <div class=" flex-column align-items-between my-1 p-0">
                                            <h6 class=" m-auto alert alert-danger">{{ $message }}</h6>
                                        </div>
                                        @enderror


                                        <!--end::Input group-->
                                        <!--begin::Submit-->
                                        <button type="submit" class="btn btn-primary">
                                            <!--begin::Indicator-->
                                            <span class="indicator-label">ارسال</span>
                                            <!--end::Indicator-->
                                        </button>
                                        <!--end::Submit-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 ps-lg-10">
                                    <!--begin::Row-->
                                    <div class="row g-5 mb-5 mb-lg-15 mt-15">
                                        <!--begin::Col-->
                                        <div class="col-sm-12">
                                            <!--begin::Phone-->
                                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
                                                <!--begin::Icon-->
                                                <!--SVG file not found: icons/duotune/finance/fin006.svgPhone.svg-->
                                                <!--end::Icon-->
                                                <!--begin::Subtitle-->
                                                <p class="h1 text-dark fw-bolder my-5">شماره تماس</p>
                                                <!--end::Subtitle-->
                                                <!--begin::Number-->
                                                <div class="text-gray-700 fw-bold fs-2">1128 3440 (041)</div>
                                                <!--begin::Number-->
                                                <div class="text-gray-700 fw-bold fs-2 mt-2">2778 3440 (041)</div>
                                                <!--end::Number-->
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Phone-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-sm-12">
                                            <!--begin::Address-->
                                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                <span class="svg-icon svg-icon-3tx svg-icon-primary">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
														<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
													</svg>
												</span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Subtitle-->
                                                <p class="text-dark fw-bolder my-5 h1">دفتر مرکزی</p>
                                                <!--end::Subtitle-->
                                                <!--begin::Description-->
                                                <div class="text-gray-700 fs-3 fw-bold">ایران، تبریز، نصف راه، خیابان ورزش، پردیس فناوری شهید مدنی، واحد ۱۱۵ (شرکت سبلان پایدار)</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Address-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Contact-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Container-->
        </div>
        <!--begin::Footer Section-->
    </section>

@endsection
