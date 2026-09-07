@extends('layouts.dashboard')
@section('title', 'خرید بسته جدید')
@section('content')
    <script>
        function SetTaxpayerId(){
            var taxpayerValue = document.getElementById("taxpayer").value;
            var elements = document.getElementsByName("taxpayer_id");
            for (var i = 0; i < elements.length; i++) {
                elements[i].value = taxpayerValue;
                console.log(elements[i].value);
            }
        }
    </script>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">انتخاب و خرید بسته</h1>
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
                <!--begin::Pricing card-->
                <div class="card" id="kt_pricing">
                    <!--begin::Card body-->
                    <div class="card-body p-lg-17">
                        <!--begin::Plans-->
                        <div class="d-flex flex-column">
                            <!--begin::Heading-->
                            <!--end::Heading-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row g-9">
                                    <div class="col-md-12 fv-row">
                                        <label class="fw-bolder required fs-6 fw-bold mb-2">مؤدی را انتخاب کنید</label>
                                        <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="مؤدی مورد نظر را مشخص کنید..." name="taxpayer" id="taxpayer" required>
                                            @foreach($taxpayers as $taxpayer)
                                                <option value="{{$taxpayer->id}}">{{$taxpayer->name.'-'.$taxpayer->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Nav group-->
                            <div class="nav nav-tabs nav-group-outline mx-auto mb-10 border-0" data-kt-buttons="true">
                                <a class="btn btn-light-info btn-active btn-active-info px-6 py-3 me-2 active fs-2" data-bs-toggle="tab" href="#menu1">بسته های نامحدود</a>
                                <a class="btn btn-light-info btn-active btn-active-info px-6 py-3 fs-2" data-bs-toggle="tab" href="#menu2">بسته های اعتباری</a>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="menu1" role="tabpanel">
                                    <!--end::Nav group-->
                                    <div class="mb-13 text-center">
                                        <h1 class="fs-2hx fw-bolder mb-5">بسته های نامحدود</h1>
                                        <div class="text-gray-600 fw-bold fs-5">
                                            شما می توانید با خرید هر یک از این بسته ها، تا زمان مشخص شده به تعداد نامحدود، صورتحساب برای آن مؤدی ثبت نمایید.
                                        </div>
                                    </div>
                                    <!--begin::Row-->
                                    <div class="row g-10">
                                        <!--begin::Col-->
                                        @foreach($infinite_packages as $package)

                                            <div class="col-xl-4">
                                                <form method="POST" action="{{route('payment.infinite-package')}}" class="form" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="package_id" value="{{$package->id}}" class="d-none">
                                                    <input type="text" name="taxpayer_id" value="" class="d-none">
                                                    <div class="d-flex h-100 align-items-center">
                                                        <!--begin::Option-->
                                                        <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-100 py-15 px-10 border border-4">
                                                            <!--begin::Heading-->
                                                            <div class="mb-7 text-center">
                                                                <!--begin::Title-->
                                                                <h1 class="text-dark mb-5 fw-boldest">{{$package->name}}</h1>
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
                                                            <button type="submit" class="btn btn-sm btn-primary"  onclick="SetTaxpayerId()">انتخاب و پرداخت</button>
                                                            <!--end::Select-->
                                                        </div>
                                                        <!--end::Option-->
                                                    </div>
                                                </form>
                                            </div>

                                        @endforeach
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <div class="tab-pane fade" id="menu2" role="tabpanel">
                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <h1 class="fs-2hx fw-bolder mb-5">بسته های اعتباری</h1>
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
                                                <form method="POST" action="{{route('payment.public-package')}}" class="form" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="package_id" value="{{$package->id}}" class="d-none">
                                                    <input type="text" name="taxpayer_id" value="" class="d-none">
                                                    <div class="d-flex h-100 align-items-center">
                                                        <!--begin::Option-->
                                                        <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-100 py-15 px-10 border border-4">
                                                            <!--begin::Heading-->
                                                            <div class="mb-7 text-center">
                                                                <!--begin::Title-->
                                                                <h1 class="text-dark mb-5 fw-boldest">{{$package->name}}</h1>
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
                                                            <button type="submit" class="btn btn-sm btn-primary"  onclick="SetTaxpayerId()">انتخاب و پرداخت</button>
                                                            <!--end::Select-->
                                                        </div>
                                                        <!--end::Option-->
                                                    </div>
                                                </form>
                                            </div>

                                    @endforeach
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
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

@endsection
