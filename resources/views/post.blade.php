@extends('layouts.landing')
@section('title', $Post->title)
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid mb-10" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Post card-->
            <div class="card p-4">
                <!--begin::Body-->
                <div class="card-body pb-lg-0">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-15">
                            <!--begin::Post content-->
                            <div class="mb-17">
                                <!--begin::Wrapper-->
                                <div class="mb-8">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap mb-6">
                                        <!--begin::Item-->
                                        <div class="me-9 my-1">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <span class="fw-bolder text-gray-800">تاریخ بروزرسانی: {{toPersianDate($Post->created_at)}}</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="me-9 my-1">
                                            <!--begin::Icon-->
                                            <!--SVG file not found: icons/duotune/finance/fin006.svgFolder.svg-->
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <span class="fw-bolder text-gray-800">دسته بندی: {{$Post->category}}</span>
                                            <!--begin::Label-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Title-->
                                    <a href="#" class="text-dark text-hover-primary fs-2 fw-bolder">{{$Post->title}}
                                        <span class="fw-bolder text-gray-800 fs-5 ps-1"> ({{$Post->readtime}} دقیقه زمان مطالعه) </span></a>
                                    <!--end::Title-->
                                    <!--begin::Container-->
                                    <div class="overlay mt-8">
                                        <!--begin::Image-->
                                        @if(!is_null($Post->media))
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url({{asset('images/posts/'.$Post->media->url)}})"></div>
                                        @endif
                                        <!--end::Image-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Description-->
                                <div class="fs-5 fw-bold text-gray-800">
                                    {!! $Post->content !!}
                                </div>
                                <!--end::Description-->
                                <!--begin::Block-->
                                <div class="d-flex align-items-center border-1 border-dashed border-gray-500 card-rounded p-5 p-lg-10 mb-14">
                                    <!--begin::Section-->
                                    <div class="text-center flex-shrink-0 me-7 me-lg-13">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-70px symbol-circle mb-2">
                                            <img src="{{asset('dash-assets/media/avatars/300-9.jpg')}}" class="" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="mb-0">
                                            <a href="#" class="text-gray-700 fw-bolder text-hover-primary">فاکتورین</a>
                                            <span class="text-gray-700 fs-7 fw-bold d-block mt-1">تیم تولید محتوا</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Text-->
                                    <div class="mb-0 fs-6">
                                        <div class="text-gray-700 fw-bold lh-lg mb-2">
                                            تیم تولید محتوای «فاکتورین» متشکل از متخصصین حوزه‌های حسابداری، امور مالیاتی، کارشناسان دیجیتال مارکتینگ و ...
                                            می‌باشد که با بررسی نیازمندی‌های کاربران و جمع آوری و تهیه جدیدترین اطلاعات مربوط به مباحث مالیاتی،
                                            در یک روند در حال توسعه و پیشرفت، سعی بر آن دارد که تمامی نیازهای مشتریان و کاربران خود را پوشش دهد.
                                        </div>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Block-->
                                <!--begin::Icons-->
                                <div class="d-flex flex-center">
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
                                <!--end::Icons-->
                            </div>
                            <!--end::Post content-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
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
                                            @if(!is_null($Post->media))
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
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Post card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
