
@extends('layouts.landing')
@section('title', 'سامانه مودیان - فاکتورین - نرم افزار واسط ارسال صورتحساب الکترونیکی')
@section('header')

    <!--begin::Landing hero-->
    <section class="fx-hero">
        <div class="fx-hero-inner">
            <div>
                <div class="fx-kicker"><span class="fx-dot"></span> سامانه واسط ارسال صورتحساب الکترونیکی</div>
                <h1>ارسال صورتحساب به سامانه مودیان، <span>ساده و مطمئن</span></h1>
                <p>فاکتورین ابزار شما برای مدیریت و ارسال صورتحساب‌های الکترونیکی است؛ با یک پنل، چندین مؤدی را مدیریت کنید و فرآیند ارسال را ساده‌تر پیش ببرید.</p>
                <div class="fx-actions">
                    <a href="{{ route('register') }}" class="btn fx-btn fx-btn-primary">ثبت نام رایگان</a>
                    <a href="#how-it-works" class="btn fx-btn fx-btn-ghost">چطور کار می‌کند؟</a>
                </div>
                <div class="fx-trust">کسب‌وکار خود را سریع‌تر راه‌اندازی کنید</div>
                <div class="fx-logos">
                    <a href="https://www.intamedia.ir/" target="_blank"><img src="{{asset('dash-assets/media/comps/tax.png')}}" alt="سازمان امور مالیاتی کشور"></a>
                    <a href="https://azerbaijansh.irannsr.org/fa/page/107861-%D9%85%D8%B4%D8%A7%D9%87%D8%AF%D9%87-%D8%A7%D8%B9%D8%B6%D8%A7.html?ctp_id=1086&id=53066" target="_blank"><img src="{{asset('dash-assets/media/comps/nasr.png')}}" alt="سازمان نظام صنفی رایانه ای کشور"></a>
                    <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=7617103&Code=dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj"><img referrerpolicy="origin" src="https://trustseal.enamad.ir/logo.aspx?id=7617103&Code=dxrnbqmVDSw7Nmluc8nNki8bTkgXBQYj" alt="نماد تجارت الکترونیک"></a>
                    <a href="https://irsherkat.ssaa.ir/Design/SearchCompanyPublicInfo.aspx" target="_blank"><img src="{{asset('dash-assets/media/comps/sabt.png')}}" alt="اداره کل ثبت شرکت ها و موسسات"></a>
                </div>
            </div>
            <div class="fx-dashboard">
                <div class="fx-window">
                    <div class="fx-window-top"><i></i><i></i><i></i></div>
                    <div class="fx-window-body">
                        <div class="fx-mini-title">داشبورد فاکتورین</div>
                        <div class="fx-mini-value">مدیریت صورتحساب‌ها</div>
                        <div class="fx-mini-grid">
                            <div class="fx-mini-card"><small>وضعیت ارسال</small><strong>فعال</strong><div class="fx-progress"><span></span></div></div>
                            <div class="fx-mini-card"><small>مدیریت مؤدی</small><strong>چندگانه</strong><div class="fx-progress"><span></span></div></div>
                            <div class="fx-mini-card"><small>ثبت با Excel</small><strong>دارد</strong></div>
                            <div class="fx-mini-card"><small>پشتیبانی</small><strong>در دسترس</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end::Landing hero-->
@endsection
@section('content')

    <!--begin::How It Works Section-->
    <section class="fx-section" id="how-it-works">
        <div class="fx-container">
            <div class="fx-head">
                <div class="fx-eyebrow">شروع کار در چند مرحله</div>
                <h2>صورتحساب الکترونیکی را ساده‌تر مدیریت کنید</h2>
                <p>از ساخت حساب تا ارسال صورتحساب، مسیر کار در فاکتورین روشن و مرحله‌به‌مرحله است.</p>
            </div>
            <div class="fx-steps">
                <div class="fx-step"><div class="fx-step-num">۱</div><img src="{{asset('dash-assets/media/illustrations/sketchy-1/2.png')}}" alt="ثبت نام"><h3>ثبت نام رایگان</h3><p>حساب کاربری خود را سریع، رایگان و آسان ایجاد کنید.</p></div>
                <div class="fx-step"><div class="fx-step-num">۲</div><img src="{{asset('dash-assets/media/illustrations/sketchy-1/4.png')}}" alt="اطلاعات مودی"><h3>تکمیل اطلاعات مؤدی</h3><p>اطلاعات لازم مانند شناسه یکتا و کلید خصوصی را در پنل ثبت کنید.</p></div>
                <div class="fx-step"><div class="fx-step-num">۳</div><img src="{{asset('dash-assets/media/illustrations/sketchy-1/15.png')}}" alt="ارسال صورتحساب"><h3>ثبت و ارسال صورتحساب</h3><p>صورتحساب‌های خود را از طریق پنل ثبت و برای سامانه مودیان ارسال کنید.</p></div>
                <div class="fx-step"><div class="fx-step-num">۴</div><img src="{{asset('dash-assets/media/illustrations/sketchy-1/5.png')}}" alt="شارژ حساب"><h3>انتخاب پلن مناسب</h3><p>با توجه به نیاز خود پلن یا شارژ مناسب را انتخاب و استفاده را ادامه دهید.</p></div>
            </div>
        </div>
    </section>
    <!--end::How It Works Section-->
    <!--begin::Statistics Section-->
    <section class="fx-stats-wrap">
        <div class="fx-container">
            <div class="fx-head" style="margin-bottom:40px"><div class="fx-eyebrow" style="color:#a99aff">اعتماد و استفاده</div><h2 style="color:#fff">فاکتورین کنار کسب‌وکار شماست</h2><p style="color:rgba(255,255,255,.65)">خلاصه‌ای از عملکرد سامانه را در یک نگاه ببینید.</p></div>
            <div class="fx-stats">
                <div class="fx-stat"><div class="fx-stat-icon">✓</div><div class="value" data-kt-countup="true" data-kt-countup-value="146" data-kt-countup-suffix="+">0</div><div class="label">تعداد مشتریان</div></div>
                <div class="fx-stat"><div class="fx-stat-icon">↗</div><div class="value" data-kt-countup="true" data-kt-countup-value="457" data-kt-countup-suffix="+">0</div><div class="label">صورتحساب ثبت شده رایگان</div></div>
                <div class="fx-stat"><div class="fx-stat-icon">▣</div><div class="value" data-kt-countup="true" data-kt-countup-value="4" data-kt-countup-suffix="+ هزار">0</div><div class="label">کل صورتحساب‌های ثبت و ارسال شده</div></div>
            </div>
        </div>
    </section>
    <!--end::Statistics Section-->
    <!--begin::Projects Section-->
    <section class="fx-section" style="padding-top:75px">
        <div class="fx-container">
            <div class="fx-head">
                <div class="fx-eyebrow">دانش و اخبار مالیاتی</div><h2>آخرین آموزش‌ها و اخبار</h2>
                <p>راهنماها و مطالب کاربردی فاکتورین برای اینکه ارسال صورتحساب را بهتر و سریع‌تر انجام دهید.</p>
            </div>
            <div class="fx-posts">
                @foreach($LatestPost1 as $Post)
                    <article class="fx-post-card">
                        @if(!is_null($Post->media))
                            <a href="{{route('blog.show',$Post->slug)}}"><div class="fx-post-img" style="background-image:url({{asset('images/posts/'.$Post->media->url)}})"></div></a>
                        @endif
                        <div class="fx-post-body">
                            <div class="mb-3">
                                @if($Post->category == 'آموزش') <span class="badge badge-light-primary">آموزش</span>
                                @elseif($Post->category == 'اخبار') <span class="badge badge-light-warning">اخبار</span>
                                @elseif($Post->category == 'بلاگ') <span class="badge badge-light-info">بلاگ</span>
                                @elseif($Post->category == 'بروزرسانی') <span class="badge badge-light-danger">بروزرسانی</span>
                                @else <span class="badge badge-light-success">{{$Post->category}}</span> @endif
                            </div>
                            <h3><a href="{{route('blog.show',$Post->slug)}}" class="text-dark">{{$Post->title}}</a></h3><p>{{$Post->preview}}</p>
                            <div class="fx-post-footer"><span class="fx-read">مطالعه مطلب</span><a href="{{route('blog.show',$Post->slug)}}" class="btn btn-sm btn-primary">ادامه مطلب</a></div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="fx-posts mt-8">
                @foreach($LatestPost2 as $Post)
                    <article class="fx-post-card">
                        @if(!is_null($Post->media))
                            <a href="{{route('blog.show',$Post->slug)}}"><div class="fx-post-img" style="background-image:url({{asset('images/posts/'.$Post->media->url)}})"></div></a>
                        @endif
                        <div class="fx-post-body">
                            <div class="mb-3">
                                @if($Post->category == 'آموزش') <span class="badge badge-light-primary">آموزش</span>
                                @elseif($Post->category == 'اخبار') <span class="badge badge-light-warning">اخبار</span>
                                @elseif($Post->category == 'بلاگ') <span class="badge badge-light-info">بلاگ</span>
                                @elseif($Post->category == 'بروزرسانی') <span class="badge badge-light-danger">بروزرسانی</span>
                                @else <span class="badge badge-light-success">{{$Post->category}}</span> @endif
                            </div>
                            <h3><a href="{{route('blog.show',$Post->slug)}}" class="text-dark">{{$Post->title}}</a></h3><p>{{$Post->preview}}</p>
                            <div class="fx-post-footer"><span class="fx-read">مطالعه مطلب</span><a href="{{route('blog.show',$Post->slug)}}" class="btn btn-sm btn-primary">ادامه مطلب</a></div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
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

    <a href="{{ route('register') }}" class="fx-float">ثبت نام رایگان در فاکتورین</a>
@endsection
