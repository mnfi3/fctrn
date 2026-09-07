@php use App\Models\Moadian\Invoice; @endphp
@extends('layouts.dashboard')
@section('title', 'فاکتورهای ثبت شده')
@section('content')

{{--    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>--}}
    <script src="{{asset('dash-assets/js/jquery3.7.1.min.js')}}"></script>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">فاکتورهای ثبت شده
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">تمام فاکتورهای ثبت شده را در این بخش مشاهده نمایید.</small>
                        <!--end::Description--></h1>
                    <!--end::Title-->

                </div>
                <!--end::Page title-->
                <!--begin::Page Action-->
                <div class="row mt-5 mb-5 text-end">
                    <div class="col d-flex justify-content-end">
                        <a href="{{route('invoice.create')}}" class="btn btn-primary badge">ثبت فاکتور جدید +</a>
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
                    <!--begin::Form-->
                    <form method="get" action="{{route('invoice.index')}}" class="form" enctype="multipart/form-data">
                        <div class=" flex-column align-items-between my-1 p-0">
                            @if(\Illuminate\Support\Facades\Session::get('fail'))
                                <h6 class=" m-auto alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('fail')}}</h6>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::get('success'))
                                <h6 class=" m-auto alert alert-success"> {{\Illuminate\Support\Facades\Session::get('success')}}</h6>
                            @endif
                        </div>
                        <!--begin::SearchBox-->
                        <div class="col-xl-12" id="kt_post">
                            <!--begin::Container-->
                            <div id="kt_content_container" class="col-xl-12">
                                <!--begin::Card-->
                                <div class="card mb-1 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-3 mb-1">پنل جستجو</span>
                                            <span class=" bg-light-danger rounded mt-1 fw-bold fs-5 p-2 text-gray-600">کاربر گرامی! جهت جستجوی صورتحساب(های) مدنظر، از طریق پنل زیر اقدام نمایید.</span>
                                        </h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                            <!--begin::Row-->
                                            <div class="row g-8 mb-8">
                                                <div class="col-md-3 fv-row">
                                                    <label class="fw-bolder  fs-6 fw-bold mb-2 @if(count($taxpayer_ids) > 0) text-danger @endif ">مودی</label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="همه" name="taxpayer_ids[]" multiple="multiple">
                                                        <option value="0">همه</option>
                                                        @foreach($taxpayers as $taxpayer)
                                                            <option value="{{$taxpayer->id}}" @if(in_array($taxpayer->id, $taxpayer_ids)) selected @endif >{{$taxpayer->name.'-'.$taxpayer->username}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3 fv-row">
                                                    <label class="fw-bolder  fs-6 fw-bold mb-2 @if(count($customer_ids) > 0) text-danger @endif ">مشتری</label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="همه" name="customer_ids[]" multiple="multiple">
                                                        <option value="0">همه</option>
                                                        @foreach($customers as $customer)
                                                            <option value="{{$customer->id}}" @if(in_array($customer->id, $customer_ids)) selected @endif >{{$customer->name.'-'.$customer->national_code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3 fv-row">
                                                    <label class="fw-bolder  fs-6 fw-bold mb-2 @if(strlen($number) > 0) text-danger @endif ">شماره فاکتور</label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="بخشی از شماره فاکتور را وارد نمایید..." value="{{$number}}" name="text">
                                                </div>
                                                <!--begin:Action-->
                                                <div class="col-md-3 fv-row">
                                                    <button type="submit" class="btn btn-primary me-5 mt-8">جستجو</button>
                                                    <a id="kt_horizontal_search_advanced_link" class="btn btn-link  mt-8" data-bs-toggle="collapse" aria-expanded="" href="#kt_advanced_search_form">جستجوی پیشرفته</a>
                                                </div>
                                                <!--end:Action-->
                                            </div>
                                            <!--end::Compact form-->
                                            <!--begin::Advance form-->
                                            <div class="collapse
                                            @if(
                                                strlen($from_date) > 0
                                              || strlen($to_date) > 0
                                              || count($ins) > 0
                                              || count($statuses) > 0
                                              || strlen($from_amount) > 0
                                              || strlen($to_amount) > 0
                                              || strlen($taxid) > 0
                                              || strlen($refrence_number) > 0
                                              ) show @endif
                                            " id="kt_advanced_search_form">
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed mt-9 mb-6"></div>
                                                <!--end::Separator-->
                                                <!--begin::Row-->
                                                <div class="row g-8 mb-8">
                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(strlen($from_date) > 0) text-danger @endif ">از تاریخ صدور</label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="تاریخ را انتخاب کنید" name="from_date" data-jdp value="{{$from_date}}">
                                                    </div>

                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(strlen($to_date) > 0) text-danger @endif ">تا تاریخ صدور</label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="تاریخ را انتخاب کنید" name="to_date" data-jdp  value="{{$to_date}}">
                                                    </div>
                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(count($ins) > 0) text-danger @endif ">موضوع</label>
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder=" همه" name="ins[]" multiple="multiple">
                                                            <option value="0">همه</option>
                                                            <option value="1" @if(in_array(1, $ins)) selected @endif >اصلی</option>
                                                            <option value="2" @if(in_array(2, $ins)) selected @endif >اصلاحی</option>
                                                            <option value="3" @if(in_array(3, $ins)) selected @endif >ابطالی</option>
                                                            <option value="4" @if(in_array(4, $ins)) selected @endif >برگشت از فروش</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(count($statuses) > 0) text-danger @endif ">وضعیت</label>
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder=" همه" name="statuses[]" multiple="multiple">
                                                            <option value="0">همه</option>
                                                            <option value="{{Invoice::STATUS_DRAFT}}" @if(in_array(Invoice::STATUS_DRAFT, $statuses)) selected @endif >پیش نویس</option>
                                                            <option value="{{Invoice::STATUS_SENT_SUCCESS}}" @if(in_array(Invoice::STATUS_SENT_SUCCESS, $statuses)) selected @endif >ارسال موفق</option>
                                                            <option value="{{Invoice::STATUS_SENT_FAIL}}" @if(in_array(Invoice::STATUS_SENT_FAIL, $statuses)) selected @endif >ارسال ناموفق</option>
                                                            <option value="{{Invoice::STATUS_VERIFY_SUCCESS}}" @if(in_array(Invoice::STATUS_VERIFY_SUCCESS, $statuses)) selected @endif >استعلام موفق</option>
                                                            <option value="{{Invoice::STATUS_VERIFY_FAIL}}" @if(in_array(Invoice::STATUS_VERIFY_FAIL, $statuses)) selected @endif >استعلام ناموفق</option>
                                                            <option value="{{Invoice::STATUS_EXPIRED}}" @if(in_array(Invoice::STATUS_EXPIRED, $statuses)) selected @endif >ابطال شده</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(strlen($from_amount) > 0) text-danger @endif ">از مبلغ</label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="مبلغ را وارد نمایید" name="from_amount" value="{{$from_amount}}">
                                                    </div>
                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(strlen($to_amount) > 0) text-danger @endif ">تا مبلغ</label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="مبلغ را وارد نمایید" name="to_amount" value="{{$to_amount}}" >
                                                    </div>
                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(strlen($taxid) > 0) text-danger @endif ">شماره مالیاتی</label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="شماره مالیاتی را وارد نمایید" name="taxid" value="{{$taxid}}" >
                                                    </div>
                                                    <div class="col-md-3 fv-row">
                                                        <label class="fw-bolder  fs-6 fw-bold mb-2 @if(strlen($refrence_number) > 0) text-danger @endif ">شماره مرجع</label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="شماره مرجع را وارد نمایید" name="refrence_number" value="{{$refrence_number}}">
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Advance form-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::SearchBox-->
                    </form>
                    <!--end::Form-->
                    @if($invoices->isEmpty())
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
                                    <div class="fs-6 text-gray-700 pe-7">در حال حاضر هیچ فاکتوری یافت نشد. در صورت نیاز می‌توانید به کلیک بر روی دکمه «ثبت فاکتور جدید»، فاکتور خود را ثبت نمایید.</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @else
                        <!--begin::Tables Widget-->
                        <div class="card mb-3 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <div class="row gy-5 g-xl-8 align-items-start p-4">
                                    <div class="col-xl-12 rounded border-danger border-1 border-dashed px-7 py-2 fw-bolder bg-light-danger">
                                        <div class="col-xl-12 fw-bolder fs-4 text-danger mb-2">راهنمای آیکون ها: </div>
                                        <div class="col-xl-12">
                                           <span class="mr-6">
                                            برای ویرایش صورتحساب: <i class="bi bi-pencil-fill text-primary fs-4"></i>
                                            </span>
                                            <span class="mx-6">
                                                پرینت صورتحساب ثبت شده: <i class="bi bi-printer-fill text-primary fs-4"></i>
                                            </span>

                                            <span class="mx-6">
                                                ابطال صورتحساب در سامانه مؤدیان: <i class="bi bi-archive-fill text-danger fs-4 cursor-pointer"></i>
                                            </span>
                                        </div>
                                        <div class="col-xl-12">
                                            <span class="mr-6">
                                               استعلام وضعیت صورت حساب ارسالی: <i class="bi bi-send-check-fill text-info fs-4"></i>
                                            </span>
                                            <span class="mx-6">
                                                ارسال صورتحساب به سامانه مؤدیان: <i class="bi bi-send-fill text-success fs-4"></i>
                                            </span>

                                            <span class="mx-6">
                                                کپی اطلاعات صورتحساب و ارسال در قالب صورتحساب جدید: <i class="bi bi-clipboard-plus text-primary fs-4"></i>
                                            </span>

                                            <span class="mx-6">
                                                حذف صورت حساب : <i class="bi bi-trash text-danger fs-4"></i>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-striped border rounded gy-5 gs-7 dataTable" id="table1">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted text-center">
                                                <th>ردیف</th>
                                                <th>نام مشتری</th>
                                                <th>شماره مالیاتی</th>
                                                <th>مجموع ارزش افزوده(ریال)</th>
                                                <th>مجموع صورتحساب(ریال)</th>
                                                <th>تاریخ صدور</th>

                                                <th>شماره فاکتور</th>
                                                <th>نوع</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                        @php($i = 0)
                                        @foreach($invoices as $invoice)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{ ++$i }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{ optional($invoice->customer)->name }}</span>
                                                </td>
                                                <td>
                                                    @if($invoice->status == Invoice::STATUS_VERIFY_SUCCESS)
                                                        <span class="text-dark fw-bolder fs-7">{{ $invoice->taxid }}</span>
                                                    @else
                                                        <span >---</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-7">{{ number_format($invoice->tvam) }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-7">{{ number_format($invoice->tbill) }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-7 badge badge-light">{{ toPersianDate(date('Y-m-d', intval($invoice->indatim/1000))) }}</span>
                                                </td>

                                                <td>
                                                    <span class="text-dark fw-bolder fs-7 badge badge-light">{{ $invoice->number }}</span>
                                                </td>
                                                <td>
                                                    @if($invoice->ins == 1)
                                                        <span class="badge badge-light-primary">اصلی</span>
                                                    @elseif($invoice->ins == 2)
                                                        <span class="badge badge-light-warning">اصلاحی</span>
                                                    @elseif($invoice->ins == 3)
                                                        <span class="badge badge-light-danger">ابطالی</span>
                                                    @elseif($invoice->ins == 4)
                                                        <span class="badge badge-light-danger">برگشت از فروش</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($invoice->status == Invoice::STATUS_DRAFT)
                                                        <span class="badge badge-light-primary">پیش نویس</span>
                                                    @elseif($invoice->status == Invoice::STATUS_SENT_SUCCESS)
                                                        <span class="badge badge-light-success">ارسال موفق</span>
                                                    @elseif($invoice->status == Invoice::STATUS_SENT_FAIL)
                                                        <span class="badge badge-light-danger">ارسال ناموفق</span>
                                                    @elseif($invoice->status == Invoice::STATUS_VERIFY_SUCCESS)
                                                        <span class="badge badge-light-success">استعلام موفق</span>
                                                    @elseif($invoice->status == Invoice::STATUS_VERIFY_FAIL)
                                                        <span class="badge badge-light-danger">استعلام ناموفق</span>
                                                    @elseif($invoice->status == Invoice::STATUS_VERIFY_PENDING)
                                                        <span class="badge badge-light-warning">در صف استعلام</span>
                                                    @elseif($invoice->status == Invoice::STATUS_EXPIRED)
                                                        <span class="badge badge-light-warning">ابطال شده </span>
                                                    @endif
                                                </td>
                                                <td>

                                                    @if($invoice->status != Invoice::STATUS_VERIFY_SUCCESS && $invoice->status != Invoice::STATUS_VERIFY_PENDING)
                                                        <a href="{{route('invoice.edit',$invoice->id)}}" class="m-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="ویرایش"><i class="bi bi-pencil-fill text-primary fs-4"></i></a>
                                                    @endif
                                                    @if($invoice->status == Invoice::STATUS_DRAFT)
                                                        <a   data-bs-toggle="modal" data-bs-target="#SendFactor{{$invoice->id}}"class="m-2" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="ارسال به سامانه مرکزی"><i class="bi bi-send-fill text-success fs-4"></i></a>

                                                    @endif
                                                    @if($invoice->status == Invoice::STATUS_DRAFT || $invoice->status == Invoice::STATUS_VERIFY_FAIL)
                                                            <a   data-bs-toggle="modal" data-bs-target="#DeleteFactor{{$invoice->id}}"class="m-2" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="حذف فاکتور "><i class="bi bi-trash text-danger fs-4"></i></a>
                                                    @endif
                                                    @if($invoice->ins == 1)
                                                        <a href="{{route('invoice.copy', $invoice->id)}}" class="m-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="کپی این فاکتور"><i class="bi bi-clipboard-plus text-primary fs-4"></i></a>
                                                    @endif
                                                    @if($invoice->status == Invoice::STATUS_SENT_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_PENDING)
                                                        <a href="{{route('invoice.verify', $invoice->id)}}" class="m-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="استعلام از سامانه مرکزی"><i class="bi bi-send-check-fill text-info fs-4"></i></a>
                                                    @endif
                                                    @if(($invoice->status == Invoice::STATUS_SENT_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_SUCCESS) && $invoice->ins == 1 )
                                                        <a data-bs-toggle="modal" data-bs-target="#cancelFactor{{$invoice->id}}" class="m-2"><i class="bi bi-archive-fill text-danger fs-4 cursor-pointer"></i></a>
                                                    @endif
                                                    @if($invoice->status == Invoice::STATUS_SENT_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_PENDING || $invoice->status == Invoice::STATUS_DRAFT)
                                                        <a href="{{route('invoice.print',$invoice->id)}}" target="_blank" class="m-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="پرینت"><i class="bi bi-printer-fill text-primary fs-4"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                {{--{{ $invoices->render() }} --}}

@foreach($invoices as $invoice)
    <!--begin::Modal - New Target-->
        <div class="modal fade" id="cancelFactor{{$invoice->id}}" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-800px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <!--begin:Form-->
                        <!--begin::Heading-->
                        <div class="mb-6 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">ابطال صورتحساب</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <div class="row gy-5 g-xl-8 align-items-start d-flex">
                            <div class="col-xl-12 rounded border-gray-700 border-1 border-gray-300 border-dashed px-7 py-3 border-gray-400">
                                    <span class="fw-bolder fs-4 text-danger">توجه: </span>
                                <span>    از ابطال صورتحساب خود اطمینان دارید؟</span>
                                    <span class="mx-5">
                                        <a href="{{route('invoice.expire', $invoice->id)}}" class="btn btn-danger badge">بله</a>
                                    </span>
                            </div>
                        </div>
                        <!--end:Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - New Target-->
        <!--begin::Modal - New Target-->
        <div class="modal fade" id="SendFactor{{$invoice->id}}" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-800px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <!--begin:Form-->
                        <!--begin::Heading-->
                        <div class="mb-6 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">ارسال صورتحساب</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <div class="row gy-5 g-xl-8 align-items-start d-flex">
                            <div class="col-xl-12 rounded border-gray-700 border-1 border-gray-300 border-dashed border-gray-400 px-7 py-3">
                                <span class="text-danger fw-bolder fs-5">توجه!</span>
                                <br/>
                                <span class="p-2 fs-6 fw-bold">    مؤدی گرامی! در صورت اطمینان از اطلاعات ثبت شده و تمایل به ارسال مستقیم صورتحساب به سازمان امور مالیاتی، بر روی گزینه «ارسال صورتحساب» کلیک نمایید.</span>
                                </span>
                                <div class="d-flex justify-content-center">
                                    <a href="{{route('invoice.send', $invoice->id)}}" class="m-2 btn btn-success">ارسال صورتحساب</a>
                                </div>
                            </div>

                        </div>
                        <!--end:Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>



        <div class="modal fade" id="DeleteFactor{{$invoice->id}}" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-800px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content rounded">
                                                <!--begin::Modal header-->
                                                <div class="modal-header pb-0 border-0 justify-content-end">
                                                    <!--begin::Close-->
                                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--begin::Modal header-->
                                                <!--begin::Modal body-->
                                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                    <!--begin:Form-->
                                                    <!--begin::Heading-->
                                                    <div class="mb-6 text-center">
                                                        <!--begin::Title-->
                                                        <h1 class="mb-3">حذف صورتحساب</h1>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Heading-->
                                                    <div class="row gy-5 g-xl-8 align-items-start d-flex">
                                                        <div class="col-xl-12 rounded border-gray-700 border-1 border-gray-300 border-dashed border-gray-400 px-7 py-3">
                                                            <span class="text-danger fw-bolder fs-5">توجه!</span>
                                                            <br/>
                                                            <span class="p-2 fs-6 fw-bold">آیا از حذف این صورت حساب مطمئن هستید؟</span>
                                                            </span>
                                                            <div class="d-flex justify-content-center">
                                                                <a href="{{route('invoice.delete', $invoice->id)}}" class="m-2 btn btn-danger">حذف صورتحساب</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--end:Form-->
                                                </div>
                                                <!--end::Modal body-->
                                            </div>
                                            <!--end::Modal content-->
                                        </div>
                                        <!--end::Modal dialog-->
                                    </div>
        <!--end::Modal - New Target-->
@endforeach
    <!--end::Table container-->

</div>
<!--begin::Body-->
</div>
<!--end::Tables Widget 13-->
@endif
</div>
<!--end::Row-->
</div>
<!--end::Container-->
</div>
<!--end::Post-->
<!--end::Content-->
<script>
$(document).ready(function() {
// Setup - add a text input to each footer cell


// DataTable
var table = $('#table1').DataTable({

"pageLength": 20,
"scrollY":        "800px",
"scrollX":        "800px",

"scrollCollapse": true,
"paging":         true,
"info":      true,
dom: 'Bfrtip',
columnDefs: [
{
targets: 0,
className: 'noVis'
}
],
    "columnDefs": [
        {
            "targets": [2,6],
            "visible": false

        }
    ],
buttons: [
{
extend: 'colvis',
columns: ':not(.noVis)',
}
],

"language": {
"lengthMenu": "نمایش _MENU_",
"info": "نمایش صفحه _PAGE_ از _PAGES_ صفحه",
"zeroRecords": "رکوردی پیدا نشد!",
"infoFiltered": "(فیلتر شده از _MAX_ ردیف موجود)",
"search":         "جستجو:",
buttons: {
colvis: 'نمایش/عدم نمایش ستون ها'
}
},

});

} );
</script>
@endsection
