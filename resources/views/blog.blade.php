@extends('layouts.landing')
@section('title', 'بلاگ')
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid mb-10" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Home card-->
            <div class="card p-4">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Content-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h3 class="text-dark mb-7">آخرین پست‌ها، اخبار و آموزش‌ها</h3>
                            <!--end::Title-->
                            <!--begin::Filter Dropdown-->
                            <form method="GET" action="{{ route('blog.ctegoricalindex') }}" id="categoryFilterForm">
                                <select name="category" class="form-select form-select-sm" onchange="document.getElementById('categoryFilterForm').submit();">
                                    <option value="" disabled selected>دسته‌بندی را انتخاب کنید</option>
                                    <option value="همه" {{ request('category') == 'همه' ? 'selected' : '' }}>همه</option>
                                    <option value="بلاگ" {{ request('category') == 'بلاگ' ? 'selected' : '' }}>بلاگ</option>
                                    <option value="آموزش" {{ request('category') == 'آموزش' ? 'selected' : '' }}>آموزش</option>
                                    <option value="بروزرسانی" {{ request('category') == 'بروزرسانی' ? 'selected' : '' }}>بروزرسانی</option>
                                </select>
                            </form>
                            <!--end::Filter Dropdown-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9" style="border-bottom-color: rgba(114,114,126,0.66);"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                        @foreach($Posts as $Post)
                            <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Hot sales post-->
                                    <div class="card-xl-stretch me-md-6 rounded" style="box-shadow: 0px 0px 20px 0px rgba(95,100,103,0.66);">
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
                                        <div class="p-5 dd">
                                            <!--begin::Title-->
                                            <a href="{{route('blog.show',$Post->slug)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base dd1">{{$Post->title}}</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 dd2">{{$Post->preview}}</div>
                                            <!--end::Text-->
                                            <!--begin::Text-->
                                            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                                <!--begin::Label-->
                                                <span class="badge fs-6 fw-bolder text-dark p-1">
                                                            @if($Post->category == 'آموزش')
                                                        <span class="badge badge-light-primary fw-bolder my-2 fs-7">آموزش</span>
                                                    @elseif($Post->category == 'اخبار')
                                                        <span class="badge badge-light-warning fw-bolder my-2 fs-7">اخبار</span>
                                                    @elseif($Post->category == 'بلاگ')
                                                        <span class="badge badge-light-info fw-bolder my-2 fs-7">بلاگ</span>
                                                    @elseif($Post->category == 'بروزرسانی')
                                                        <span class="badge badge-light-danger fw-bolder my-2 fs-7">بروزرسانی</span>
                                                    @else
                                                        <span class="badge badge-light-success fw-bolder my-2 fs-7">{{$Post->category}}</span>
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
                            {{ $Posts->render() }}
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Home card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
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
        window.addEventListener('load', () => setEqualHeights('.dd1'));
        window.addEventListener('resize', () => setEqualHeights('.dd1'));
        window.addEventListener('load', () => setEqualHeights('.dd2'));
        window.addEventListener('resize', () => setEqualHeights('.dd2'));
    </script>
@endsection
