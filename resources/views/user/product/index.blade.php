@php use App\Models\Moadian\InvoiceItem; @endphp
@extends('layouts.dashboard')
@section('title', 'شناسه کالا و خدمات')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">لیست شناسه کالا و خدمت
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">لیست شناسه کالا و خدمت </small>
                        <!--end::Description--></h1>
                    <!--end::Title-->

                </div>
                <!--end::Page title-->
                <!--begin::Page Action-->
                <div class="row mt-5 mb-5 text-end">
                    <div class="col d-flex justify-content-end">
                        <a href="{{route('product.create')}}" class="btn btn-primary badge">ثبت و مدیریت شناسه های یکتای من +</a>
                    </div>
                </div>
                <!--end::Page Action-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
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
                                <h4 class="text-danger-900 fw-bolder">کاربر گرامی!</h4>
                                <div class="fs-6 text-gray-700 pe-7">شناسه کالا و خدمت حتما باید در سایت StuffId باشد.</div>
                                <div class="fs-6 text-gray-700 pe-7">اگر شناسه کالا یا خدمت اختصاصی ندارید، از شناسه های عمومی ارائه شده در سایت StuffId استفاده کنید.</div>
                                <div class="fs-6 text-gray-700 pe-7">از شناسه اختصاصی دیگر شرکت ها استفاده نکنید.</div>
                                <div class="fs-6 text-gray-700 pe-7">آمار استفاده شده و ارسال موفق بصورت هفتگی بروز می شود.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                @if(Session::has('status'))
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
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
                                <div class="fs-6 text-gray-700 pe-7">{{session('status') }}</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                @endif




                    @if(count($user_products) == 0)
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
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
                                    <h4 class="text-danger-900 fw-bolder">کاربر گرامی!</h4>
                                    <div class="fs-6 text-gray-700 pe-7">در حال حاضر هیچ کالا یا خدماتی را انتخاب نکرده اید. در صورت نیاز می‌توانید با کلیک بر روی دکمه «ثبت و مدیریت شناسه های یکتای من»، شناسه دلخواه را به لیست خود اضافه نمایید.</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                    @endif


                    @if(\Illuminate\Support\Facades\Session::get('success'))
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
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
                                    <div class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @endif
                    @if(\Illuminate\Support\Facades\Session::get('fail'))
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <h4 class="text-danger-900 fw-bolder">خطا!</h4>
                                    <div class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('fail')}}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @endif
                    <!--end::Notice-->
                    <!--begin::Tables Widget-->
                        <form method="get" action="{{route('product.index')}}" id="kt_account_profile_details_form" enctype="multipart/form-data">
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bolder m-0">جستجوی شناسه ها</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Content-->
                                <div id="kt_account_settings_profile_details" class="collapse show">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row g-9">
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2">شناسه کالا/خدمت</label>
                                                <input type="text" class="form-control form-control-solid" placeholder="بخشی از شناسه کالا را وارد کنید" name="taxTpStoPartCode" value="{{$taxTpStoPartCode}}">
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="fw-bolder required fs-6 fw-bold mb-2">شرح شناسه</label>
                                                <input type="text" class="form-control form-control-solid required" placeholder="بخشی از شرح شناسه را وارد کنید" name="descriptionOfId" value="{{$descriptionOfId}}" >
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Actions-->
                                            <div class="col-md-4 fv-row">
                                                <button type="submit" class="btn btn-primary mt-8">جستجو</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Basic info-->
                        </form>
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted text-center">
                                                <th class="min-w-120px ">شناسه کالا یا خدمت</th>
                                                <th class="min-w-120px">شرح کالا یا خدمت</th>
                                                <th class="min-w-150px">نرخ ارزش افزوده</th>
                                                <th class="min-w-150px">اختصاصی</th>
                                                <th class="min-w-150px">تعداد استفاده شده</th>
                                                <th class="min-w-120px">عملیات</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                        @php($i=0)
                                        @foreach($products as $product)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{$product->taxTpStoPartCode}}</span>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{$product->descriptionOfId}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{$product->vat}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">@if(strlen($product->specialOrGeneral) == 0) خیر @else بله @endif</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{InvoiceItem::where('sstid', '=', $product->taxTpStoPartCode)->count()}}</span>
                                                </td>
                                                <td>
                                                    @if(in_array($product->taxTpStoPartCode, $user_products))
                                                    <a href="" class="m-2" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="موجود در شناسه های یکتای شما"><span class="fs-1 text-success">✓</span></a>
                                                    @else
                                                    <a href="{{route('product.add-to-list', $product->id)}}" class="m-2" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="افزودن به شناسه های من"><span class="fs-1">+</span></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                                <!--start::Table paginent-->
                                {{ $products->render() }}
                            <!--end::Table paginent-->
                            </div>
                        <!--begin::Body-->
                        </div>
                    <!--end::Tables Widget 13-->
                    </div>
                <!--end::Row-->
                </div>
            <!--end::Container-->
            </div>
            <!--end::Post-->
        <!--end::Content-->
@endsection
