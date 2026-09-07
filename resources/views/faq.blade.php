@extends('layouts.landing')
@section('title', 'سوالات متداول')
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid mb-10" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::FAQ card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-15">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-lg-row">
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-lg-275px mb-10 me-lg-20">
                            {{--
                            <!--begin::Catigories-->
                            <div class="mb-15">
                                <h4 class="text-black mb-7">دسته بندی</h4>
                                <!--begin::Menu-->
                                <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-bold">
                                    <!--begin::Item-->
                                    @foreach($HFAQs as $HFAQ)
                                        <div class="menu-item mb-1">
                                            <!--begin::Link-->
                                            <a href="#" class="menu-link py-3">{{$HFAQ->title}}</a>
                                            <!--end::Link-->
                                        </div>
                                    @endforeach
                                    <!--end::Item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                --}}
                            <!--end::Catigories-->
                            <!--begin::Search blog-->
                            <div class="mb-16">
                                <h4 class="text-black mb-7">جستجو</h4>
                                <!--begin::Input group-->
                                <div class="position-relative">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
															</svg>
														</span>
                                    <!--end::Svg Icon-->
                                    <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="جستجو" />
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Search blog-->
                            <!--begin::Catigories-->
                            <div class="mb-16">
                                <h4 class="text-black mb-7">دسته بندی</h4>
                                <!--begin::Item-->
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <!--begin::Text-->
                                    <a href="#" class="text-gray-700 text-hover-primary pe-2">آموزش</a>
                                    <!--end::Text-->
                                    <!--begin::Number-->
                                    <div class="m-0">{{count($LatestPostTutorial)}}</div>
                                    <!--end::Number-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <!--begin::Text-->
                                    <a href="#" class="text-gray-700 text-hover-primary pe-2">اخبار</a>
                                    <!--end::Text-->
                                    <!--begin::Number-->
                                    <div class="m-0">{{count($LatestPostNew)}}</div>
                                    <!--end::Number-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <!--begin::Text-->
                                    <a href="#" class="text-gray-700 text-hover-primary pe-2">بروزرسانی</a>
                                    <!--end::Text-->
                                    <!--begin::Number-->
                                    <div class="m-0">{{count($LatestPostUpdate)}}</div>
                                    <!--end::Number-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <!--begin::Text-->
                                    <a href="#" class="text-gray-700 text-hover-primary pe-2">بلاگ</a>
                                    <!--end::Text-->
                                    <!--begin::Number-->
                                    <div class="m-0">{{count($LatestPostBlog)}}</div>
                                    <!--end::Number-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Catigories-->
                            <!--begin::Recent posts-->
                            <div class="m-0">
                                <h4 class="text-black mb-7">پست‌های اخیر</h4>
                                <!--begin::Item-->
                                @foreach($Posts as $post)
                                    <div class="d-flex flex-stack mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by3 me-4">
                                            @if(!is_null($post->media))
                                            <div class="symbol-label" style="background-image: url({{asset('images/posts/'.$post->media->url)}})"></div>
                                            @endif
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="m-0">
                                            <a href="{{route('blog.show',$post->slug)}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$post->title}}</a>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                            @endforeach
                            <!--end::Item-->
                            </div>
                            <!--end::Recent posts-->
                        </div>
                        <!--end::Sidebar-->
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid">
                            <!--begin::Extended content-->
                            <div class="mb-13">
                                <!--begin::Content-->
                                <div class="mb-15">
                                    <!--begin::Title-->
                                    <h4 class="fs-2x text-gray-800 w-bolder mb-6">سوالات متداول</h4>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <p class="fw-bold fs-4 text-gray-800 mb-2">
                                        در این بخش، سوالات پرتکرار کاربران و مؤدیان مالیاتی را با دسته بندی های مربوطه جمع آوری کرده ایم تا در کمترین زمان ممکن به جواب سوالات خود برسید. در صورت نیاز به اطلاعات بیشتر می توانید از طریق فرم
                                        <span class="fw-bolder"><a href="{{route('index')}}#contactus">«تماس با ما»</a></span>
                                         و یا از طریق «ارسال تیکت» در پنل کاربری خود، با ما در ارتباط باشید.
                                    </p>
                                    <!--end::Text-->
                                </div>
                                <!--end::Content-->
                                @foreach($HFAQs as $HFAQ)
                                    @php
                                    $FAQS = \App\Models\FAQ::where('header_id',$HFAQ->id)->get();
                                    @endphp
                                    <!--begin::Item-->
                                    <div class="mb-15">
                                        <!--begin::Title-->
                                        <h3 class="text-gray-800 w-bolder mb-4">{{$HFAQ->title}}</h3>
                                        <!--end::Title-->
                                        <!--begin::Accordion-->
                                        @foreach($FAQS as $FAQ)
                                        <!--begin::Section-->
                                        <div class="m-0">
                                            <!--begin::Heading-->
                                            <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_1">
                                                <!--begin::Icon-->
                                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                    <!--end::Svg Icon-->
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                    <span class="svg-icon toggle-off svg-icon-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{!! $FAQ->question !!}</h4>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Body-->
                                            <div id="kt_job_8_1" class="collapse show fs-6 ms-1">
                                                <!--begin::Text-->
                                                <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">{!! $FAQ->answer !!}</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed"></div>
                                            <!--end::Separator-->
                                        </div>
                                        <!--end::Section-->
                                        @endforeach
                                        <!--end::Accordion-->
                                    </div>
                                    <!--end::Item-->
                                @endforeach
                                {{ $HFAQs->render() }}
                            </div>
                            <!--end::Extended content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                    <!--begin::Card-->
                    <div class="card mb-4 bg-light text-center">
                        <!--begin::Body-->
                        <div class="card-body py-12">
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('dash-assets/media/svg/brand-logos/github.svg')}}" class="h-20px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('dash-assets/media/svg/brand-logos/twitter.svg')}}" class="h-20px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('dash-assets/media/svg/brand-logos/instagram-2-1.svg')}}" class="h-20px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('dash-assets/media/svg/brand-logos/youtube-3.svg')}}" class="h-20px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::FAQ card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
