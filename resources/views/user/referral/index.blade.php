@php use App\Models\Moadian\Invoice; @endphp
@extends('layouts.dashboard')
@section('title', 'معرفی های من')
@section('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">معرفی های من
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">تمام مشتریان ثبت نام شده با کد معرف شما در جدول زیر گردآوری شده است..</small>
                        <!--end::Description--></h1>
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
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    @if(count($users) == 0)
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
                                    <div class="fs-6 text-gray-700 pe-7">در حال حاضر هیچ مشتری با کد معرف شما ثبت نام نکرده است. در صورت تمایل می‌توانید با معرفی «تکستو»، از هدایای آن بهره مند شوید.</div>
                                </div>
                                <!--end::Content-->
                            </div>

                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @endif

                        <!--begin::Tables Widget-->
                        <div class="card mb-3 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-striped border rounded gy-5 gs-7">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted text-center">
                                                <th>ردیف</th>
                                                <th>نام مشتری</th>
                                                <th>تاریخ ثبت نام</th>
                                                <th>بسته خریداری شده</th>
                                                <th>هدیه دریافتی</th>

                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                        @php($i = 0)
                                        @foreach($users as $user)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{ ++$i }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{getFullName($user, false)}}</span>
                                                </td>
                                                <td>
                                                        <span >{{toPersianDateTime($user->created_at)}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-7"> </span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-7"></span>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                {{--{{ $invoices->render() }} --}}

    <!--end::Table container-->

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
