@extends('layouts.dashboard')

@section('title', 'خطای 404')

@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Sign-in Method-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">صفحه مورد نظر پیدا نشد</h3>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_signin_method" class="collapse show">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Email Address-->
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="text-info"> :(
                                                <span class="mx-2 text-dark">کاربر گرامی!</span>
                                            </h1>
                                            <div class="fs-3 fw-bold mx-8">
                                                صفحه مورد نظر پیدا نشد.
                                            </div>
                                        </div>
                                        <div class="col-12 my-8">
                                            <!--begin::Item-->
                                            <div class="d-flex justify-content-center w3-container w3-center w3-animate-left ">
                                                <img class="mySlides card-rounded shadow mw-100" src="{{asset('dash-assets/media/product-demos/demo5.png')}}" class="card-rounded shadow mw-100" alt="" />
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-primary mx-4" href="{{route('index')}}">صفحه اصلی</a>
                                                <a class="btn btn-primary mx-4" href="{{route('dashboard')}}"> پیشخوان</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!--end::Email Address-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Sign-in Method-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

