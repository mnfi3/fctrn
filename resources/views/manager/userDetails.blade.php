@php use App\Models\Moadian\Invoice;use App\Models\Moadian\Product; @endphp
@extends('layouts.dashboard')

@section('title', 'پیشخوان')

@section('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // Event listener for infinite package select box
            $('select[name="package_id"]').on('change', function () {
                var packageId = $(this).val(); // Get the selected package ID
                var routeName = $(this).closest('form').attr('action'); // Get the form action to determine if it's infinite or public

                if (packageId != 0) { // Check if a package other than "Custom" is selected
                    var url = "";

                    // Determine which route to use based on the form action URL
                    if (routeName.includes("infinite")) {
                        url = "{{ route('infinite-package.info', ['id' => ':id']) }}".replace(':id', packageId);
                    } else if (routeName.includes("public")) {
                        url = "{{ route('public-package.info', ['id' => ':id']) }}".replace(':id', packageId);
                    }

                    // Make the AJAX call to the appropriate route
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (response) {
                            if (response.status == 1) { // Check if response is successful
                                var package = response.data;
                                var updatedCost = package.cost + (0.1 * package.cost);
                                // If it's an infinite package
                                if (routeName.includes("infinite")) {
                                    $('input[id="cost_infinite"]').val(updatedCost); // Set the cost
                                    $('input[name="day_count"]').val(package.day_count); // Set the day_count
                                }

                                // If it's a public package
                                else if (routeName.includes("public")) {
                                    $('input[id="cost_public"]').val(updatedCost); // Set the cost
                                    $('input[name="count"]').val(package.invoice_count); // Set the count
                                }
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error fetching package data:', error);
                        }
                    });
                } else {
                    // If "Custom" option is selected, clear fields
                    $('input[name="cost"]').val('');
                    $('input[name="from_date"]').val('');
                    $('input[name="to_date"]').val('');
                    $('input[name="count"]').val('');
                }
            });
        });
    </script>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-xxl-9">

                @if(\Illuminate\Support\Facades\Session::get('success'))
                    <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                        <span class="svg-icon svg-icon-2tx svg-icon-success me-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                      d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                                      fill="black"/>
                                                                <path
                                                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                                                    fill="black"/>
                                                            </svg>
                                                        </span>
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <div class="mb-3 mb-md-0 fw-bold">
                                <h4 class="text-danger-900 fw-bolder">تایید!</h4>
                                <div
                                    class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::get('fail'))
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                                          fill="black"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                                          fill="black"></rect>
                                </svg>
                            </span>
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <div class="mb-3 mb-md-0 fw-bold">
                                <h4 class="text-danger-900 fw-bolder">خطا!</h4>
                                <div
                                    class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('fail')}}</div>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="col-xxl-12">
                    <!--begin::Navbar-->
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-body pt-9 pb-0">
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <!--begin::User-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="#"
                                                   class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{getFullName($user)}}</a>
                                                <a href="#">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24">
                                                    <path
                                                        d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                        fill="#00A3FF"/>
                                                    <path class="permanent"
                                                          d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                          fill="white"/>
                                                </svg>
                                            </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <a href="#"
                                                   class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3"
                                                   data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">ثبت
                                                    فاکتور</a>
                                                <a href="#"
                                                   class="btn btn-sm btn-light-warning fw-bolder ms-2 fs-8 py-1 px-3"
                                                   data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">ثبت
                                                    اطلاعات</a>
                                                <a href="#"
                                                   class="btn btn-sm btn-light-danger fw-bolder ms-2 fs-8 py-1 px-3"
                                                   data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">ثبت
                                                    نام اولیه</a>
                                            </div>
                                            <!--end::Name-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                                <a href="#"
                                                   class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                      d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                      fill="black"/>
                                                <path
                                                    d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                    fill="black"/>
                                            </svg>
                                        </span>
                                                    <!--end::Svg Icon-->کاربر عادی</a>
                                                <a href="#"
                                                   class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                      d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                      fill="black"/>
                                                <path
                                                    d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                    fill="black"/>
                                            </svg>
                                        </span>
                                                    <!--end::Svg Icon-->{{$user->mobile}}</a>
                                                <a href="#"
                                                   class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                      d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                      fill="black"/>
                                                <path
                                                    d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                    fill="black"/>
                                            </svg>
                                        </span>
                                                    <!--end::Svg Icon-->{{$user->email}}</a>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap flex-stack">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column flex-grow-1 pe-8">
                                            <!--begin::Stats-->
                                            <div class="d-flex flex-wrap">
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{($sum_sell)}}">0
                                                        </div>
                                                        <div class="fs-2 fw-bolder m-1">ریال</div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">مجموع فروش</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{($sum_tax)}}">0
                                                        </div>
                                                        <div class="fs-2 fw-bolder m-1">ریال</div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">مجموع ارزش افزوده</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                          viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{$factor_count}}">0
                                                        </div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">تعداد فاکتور ثبت شده</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{$invoice_remain_count}}">0
                                                        </div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">اعتبار باقیمانده</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{$infinite_package_count}}">0
                                                        </div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">تعداد بسته نامحدود فعال
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{$taxpayer_count}}">0
                                                        </div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">تعداد مؤدی</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{$customer_count}}">0
                                                        </div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">تعداد مشتری</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-4 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                                              transform="rotate(90 13 6)" fill="black"/>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                             data-kt-countup-value="{{$referral_counts}}">0
                                                        </div>
                                                    </div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <div class="fw-bold fs-6 text-gray-400">تعداد معرفی کاربر</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                        </div>
                    </div>
                    <!--end::Navbar-->
                </div>
            </div>
            <!--begin::Row-->
            <div class="row g-xxl-9">
                <div class="col-xxl-12">
                    <!--begin::Form Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header card-header-stretch bg-danger">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-800">تخصیص اعتبار نامحدود</h3>
                            </div>
                        </div>
                        <!--end::Title-->
                        <!--begin::Card Body-->
                        <div class="card-body p-4">
                            <form method="post" action="{{route('custom-package.infinite.register')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <!--begin::First Row-->
                                <div class="row mb-4 mt-4">
                                    <!-- Amount Input -->
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label fs-5 fw-bold text-dark">مودی</label>
                                        <select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2"
                                                data-placeholder="مودی" data-hide-search="true" placeholder="مودی را انتخاب کنید" name="taxpayer_id" required onchange="">
                                            @foreach($taxpayers as $taxpayer)
                                                <option value="{{$taxpayer->id}}">{{$taxpayer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label fs-5 fw-bold text-dark">انتخاب بسته</label>
                                        <select   class="form-select form-select-solid border-1 border border-gray-300" data-control="select2"
                                                  data-placeholder="بسته" data-hide-search="true" placeholder="بسته را انتخاب کنید" name="package_id" required>
                                            <option selected value="0">کاستوم</option>
                                            @foreach($infinite_packages as $package)
                                                <option value="{{$package->id}}">{{$package->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Date Input -->
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label fs-5 fw-bold text-dark">تعداد روز</label>
                                        <input type="text" class="form-control form-control-solid border-1 border border-gray-300"
                                               name="day_count" required/>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label fs-5 fw-bold text-dark">مبلغ (ریال)</label>
                                        <input type="number" class="form-control form-control-solid border-1 border border-gray-300" required
                                               placeholder="مثال: 12000000" name="cost" id="cost_infinite" />
                                    </div>

                                    <!-- Unit Select -->
                                    <div class="col-md-1 d-flex align-items-end mb-3">
                                        <button type="submit" class="btn btn-success btn-lg w-100">ثبت</button>
                                    </div>
                                </div>
                                <!--end::First Row-->
                            </form>
                        </div>
                        <!--end::Card Body-->
                    </div>
                    <!--end::Form Card-->
                </div>
            </div>

            <div class="row g-xxl-9">
                <div class="col-xxl-12">
                    <!--begin::Form Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header card-header-stretch bg-warning">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-800">تخصیص اعتبار محدود</h3>
                            </div>
                        </div>
                        <!--end::Title-->
                        <!--begin::Card Body-->
                        <div class="card-body p-4">
                            <form method="post" action="{{route('custom-package.public.register')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <!--begin::First Row-->
                                <div class="row mb-4 mt-4">


                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fs-5 fw-bold text-dark">انتخاب بسته</label>
                                        <select   class="form-select form-select-solid border-1 border border-gray-300" data-control="select2"
                                                  data-placeholder="بسته" data-hide-search="false" placeholder="بسته را انتخاب کنید" name="package_id" onchange="">
                                            <option selected value="0" >کاستوم</option>
                                            @foreach($public_packages as $package)
                                                <option value="{{$package->id}}">{{$package->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-3 mb-3">
                                        <label class="form-label fs-5 fw-bold text-dark">تعداد</label>
                                        <input type="number" class="form-control form-control-solid border-1 border border-gray-300"
                                               placeholder="مثال: 50" name="count"/>
                                    </div>

                                    <!-- Amount Input -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fs-5 fw-bold text-dark">مبلغ (ریال)</label>
                                        <input type="number" class="form-control form-control-solid border-1 border border-gray-300"
                                               placeholder="مثال: 12000000" name="cost" id="cost_public"/>
                                    </div>

                                    <div class="col-md-1 d-flex align-items-end mb-3">
                                        <button type="submit" class="btn btn-success btn-lg w-100">ثبت</button>
                                    </div>
                                    <!-- Date Input -->

                                </div>
                                <!--end::First Row-->
                            </form>
                        </div>
                        <!--end::Card Body-->
                    </div>
                    <!--end::Form Card-->
                </div>
            </div>

            <!--begin::Row-->
            <div class="row g-xxl-9">
                <!--begin::Col-->
                <div class="col-xxl-12">
                    @if(count($payments) == 0)
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mb-9">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.3"
                                      d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                      fill="black"/>
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="black"/>
                            </svg>
                        </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <div class="fs-6 text-gray-700 pe-7">این کاربر هیچ پرداختی نداشته است.</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @else
                        <!--begin::Tables Widget-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header card-header-stretch bg-success">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <h3 class="m-0 text-white">پرداخت ها</h3>
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                        <!--begin::Table head-->
                                        <thead>
                                        <tr class="fw-bolder text-muted text-center">
                                            <th class="min-w-120px">ردیف</th>
                                            {{--                                            <th class="min-w-150px">نام مؤدی</th>--}}
                                            <th class="min-w-120px">تاریخ پرداخت</th>
                                            <th class="min-w-150px">مبلغ (ریال)</th>
                                            <th class="min-w-120px">وضعیت</th>
                                            <th class="min-w-120px">رسید پرداخت</th>
                                            <th class="min-w-120px">توضیحات</th>
                                        </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>

                                        @php($i = 0)
                                        @foreach($payments as $payment)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{++$i}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-7 badge badge-light">{{toPersianDateTime($payment->created_at)}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-7">{{number_format($payment->amount)}}</span>
                                                </td>
                                                <td>
                                                    @if($payment->is_success == 1)
                                                        <span class="badge badge-light-success">پرداخت موفق </span>
                                                    @else
                                                        <span class="badge badge-light-danger">پرداخت ناموفق</span>
                                                    @endif

                                                </td>

                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-7">{{($payment->receipt)}}</span>
                                                </td>

                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-5 ">{{getPaymentFullInfo($payment)}}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            {{ $payments->render() }}
                            <!--begin::Body-->
                        </div>
                        <!--end::Tables Widget 13-->
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-xxl-9">
                <!--begin::Col-->
                <div class="col-xxl-12">
                    @if(count($taxpayers) == 0)
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mb-9">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3"
                                  d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                  fill="black"/>
                            <path
                                d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                fill="black"/>
                        </svg>
                    </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <div class="fs-6 text-gray-700 pe-7">این کاربر مؤدی ثبت نکرده است.</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @else
                        <!--begin::Tables Widget-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header card-header-stretch bg-info">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <h3 class="m-0 text-white">مؤدیان</h3>
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                        <!--begin::Table head-->
                                        <thead>
                                        <tr class="fw-bolder text-muted text-center">
                                            <th class="min-w-120px">ردیف</th>
                                            <th class="min-w-120px">نام</th>
                                            <th class="min-w-150px">شناسه ملی</th>
                                            <th class="min-w-150px">کد اقتصادی</th>
                                            <th class="min-w-150px">کد پستی</th>
                                            <th class="min-w-150px">نوع شخص</th>
                                            <th class="min-w-120px">عملیات</th>
                                        </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>

                                        @php($i = 0)
                                        @foreach($taxpayers as $taxpayer)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{++$i}}</span>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{$taxpayer->name}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-6">{{$taxpayer->national_id}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-6">{{$taxpayer->economic_code}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-6">{{$taxpayer->postal_code}}</span>
                                                </td>
                                                <td>
                                                <span class="badge badge-light-primary">
                                                        {{$taxpayer->type}}
                                                </span>
                                                </td>
                                                <td>
                                                    <a href="{{route('taxpayer.edit', $taxpayer->id)}}" class="m-2"
                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                       data-bs-original-title="ویرایش"><i
                                                            class="bi bi-pencil-fill text-primary fs-4"></i></a>
                                                    <a href="{{route('taxpayer.delete', $taxpayer->id)}}"
                                                       data-bs-toggle="tooltip" data-bs-placement="right"
                                                       data-bs-original-title="حذف"><i
                                                            class="bi bi-trash-fill text-danger fs-4"></i></a>

                                                    <a href="{{route('taxpayer.restore', $taxpayer->id)}}"
                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                       data-bs-original-title="بازگردانی"><i
                                                            class="bi bi-arrow-clockwise text-warning fs-1"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            {{ $taxpayers->render() }}
                            <!--begin::Body-->
                        </div>
                        <!--end::Tables Widget 13-->
                    @endif
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xxl-12">
                    @if(count($customers) == 0)
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mb-9">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.3"
                                      d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                      fill="black"/>
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="black"/>
                            </svg>
                        </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <div class="fs-6 text-gray-700 pe-7">این کاربر مشتری ثبت نکرده است.</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @else
                        <!--begin::Tables Widget-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header card-header-stretch bg-primary">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <h3 class="m-0 text-white">مشتریان</h3>
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                        <!--begin::Table head-->
                                        <thead>
                                        <tr class="fw-bolder text-muted text-center">
                                            <th class="min-w-120px">ردیف</th>
                                            <th class="min-w-150px">نام</th>
                                            <th class="min-w-150px">شناسه ملی</th>
                                            <th class="min-w-150px">کد اقتصادی</th>
                                            <th class="min-w-150px">کد پستی</th>
                                            <th class="min-w-150px">نوع</th>
                                            <th class="min-w-120px">عملیات</th>
                                        </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>

                                        @php($i = 0)
                                        @foreach($customers as $customer)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{++$i}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{$customer->name}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-6">{{$customer->national_code}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-6">{{$customer->economic_code}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-6">{{$customer->postal_code}}</span>
                                                </td>
                                                <td>

                                                <span class="badge badge-light-success fs-7">
                                                    @if($customer->type == 1)
                                                        شخص
                                                    @elseif($customer->type == 2)
                                                        حقوقی
                                                    @elseif($customer->type == 3)
                                                        مشارکتی
                                                    @elseif($customer->type == 4)
                                                        خارجی
                                                    @elseif($customer->type == 5)
                                                        مصرف کننده
                                                    @endif
                                                </span>

                                                </td>
                                                <td>
                                                    <a href="{{route('customer.edit', $customer->id)}}" class="m-2"
                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                       data-bs-original-title="ویرایش"><i
                                                            class="bi bi-pencil-fill text-primary fs-4"></i></a>
                                                    <a href="{{route('customer.delete', $customer->id)}}"
                                                       data-bs-toggle="tooltip" data-bs-placement="right"
                                                       data-bs-original-title="حذف"><i
                                                            class="bi bi-trash-fill text-danger fs-4"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            {{ $customers->render() }}
                            <!--begin::Body-->
                        </div>
                        <!--end::Tables Widget 13-->
                    @endif
                </div>
                <!--end::Col-->
            </div>


            <div class="row g-xxl-9">
                <!--begin::Col-->
                <div class="col-xxl-12">
                    @if(is_null($user_products))
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mb-9">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.3"
                                      d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                      fill="black"/>
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="black"/>
                            </svg>
                        </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <div class="fs-6 text-gray-700 pe-7">این کاربر هیچ شناسه کالا/خدمتی ثبت نکرده است.
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    @else
                        <!--begin::Tables Widget-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header card-header-stretch bg-success">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <h3 class="m-0 text-white">شناسه کالا/خدمت</h3>
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                        <!--begin::Table head-->
                                        <thead>
                                        <tr class="fw-bolder text-muted text-center">
                                            <th class="min-w-120px">ردیف</th>
                                            <th class="min-w-120px">شناسه کالا/خدمت</th>
                                            <th class="min-w-150px">شرح کالا یا خدمت</th>
                                            <th class="min-w-120px">نرخ ارزش افزوده</th>
                                            <th class="min-w-120px">نوع شناسه</th>
                                            <th class="min-w-120px">ثبت شده توسط این کاربر</th>
                                        </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>

                                        @php($i = 0)
                                        @php($user_product_ids = json_decode($user_products->product_ids, true))
                                        @foreach($user_product_ids as $product_id)
                                            @php($product = Product::find($product_id))
                                            @if(is_null($product))
                                                @continue
                                            @endif

                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{++$i}}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder fs-6 badge badge-light">{{optional($product)->taxTpStoPartCode}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{optional($product)->descriptionOfId}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder fs-6">{{optional($product)->vat}}</span>
                                                </td>

                                                <td>
                                                    <span class="text-dark fw-bolder fs-6 ">{{optional($product)->type}}</span>
                                                </td>

                                                <td>
                                                    <span class="text-dark fw-bolder fs-6 ">
                                                        @if($product->id == $user->id)
                                                            بله
                                                        @else
                                                            خیر
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>

                            <!--begin::Body-->
                        </div>
                        <!--end::Tables Widget 13-->
                    @endif
                </div>
                <!--end::Col-->
            </div>


            <!--end::Row-->
            @if($invoices->isEmpty())
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.3"
                                      d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                      fill="black"/>
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="black"/>
                            </svg>
                        </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-bold">
                            <div class="fs-6 text-gray-700 pe-7">این کاربر، هیچ فاکتوری ثبت نکرده است.</div>
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
                            <div
                                class="col-xl-12 rounded border-danger border-1 border-dashed px-7 py-2 fw-bolder bg-light-danger">
                                <div class="col-xl-12 fw-bolder fs-4 text-danger mb-2">راهنمای آیکون ها:</div>
                                <div class="col-xl-12">
                                           <span class="mr-6">
                                            برای ویرایش صورتحساب: <i class="bi bi-pencil-fill text-primary fs-4"></i>
                                            </span>
                                    <span class="mx-6">
                                                پرینت صورتحساب ثبت شده: <i
                                            class="bi bi-printer-fill text-primary fs-4"></i>
                                            </span>

                                    <span class="mx-6">
                                                ابطال صورتحساب در سامانه مؤدیان: <i
                                            class="bi bi-archive-fill text-danger fs-4 cursor-pointer"></i>
                                            </span>
                                </div>
                                <div class="col-xl-12">
                                            <span class="mr-6">
                                               استعلام وضعیت صورت حساب ارسالی: <i
                                                    class="bi bi-send-check-fill text-info fs-4"></i>
                                            </span>
                                    <span class="mx-6">
                                                ارسال صورتحساب به سامانه مؤدیان: <i
                                            class="bi bi-send-fill text-success fs-4"></i>
                                            </span>
                                    <span class="mx-6">
                                                حذف صورت حساب : <i class="bi bi-trash text-danger fs-4"></i>
                                            </span>
                                    <span class="mx-6">
                                                کپی اطلاعات صورتحساب و ارسال در قالب صورتحساب جدید: <i
                                            class="bi bi-clipboard-plus text-primary fs-4"></i>
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
                                            <span
                                                class="text-dark fw-bolder fs-6">{{ optional($invoice->customer)->name }}</span>
                                        </td>
                                        <td>
                                            @if($invoice->status == Invoice::STATUS_VERIFY_SUCCESS)
                                                <span class="text-dark fw-bolder fs-7">{{ $invoice->taxid }}</span>
                                            @else
                                                <span>---</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder fs-7">{{ number_format($invoice->tvam) }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder fs-7">{{ number_format($invoice->tbill) }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder fs-7 badge badge-light">{{ toPersianDate(date('Y-m-d', intval($invoice->indatim/1000))) }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="text-dark fw-bolder fs-7 badge badge-light">{{ $invoice->number }}</span>
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
                                                <a href="{{route('invoice.admin-edit',$invoice->id)}}" class="m-2"
                                                   data-bs-toggle="tooltip" data-bs-placement="right"
                                                   data-bs-original-title="ویرایش"><i
                                                        class="bi bi-pencil-fill text-primary fs-4"></i></a>
                                            @endif
                                            @if($invoice->status == Invoice::STATUS_DRAFT)
                                                <a data-bs-toggle="modal" data-bs-target="#SendFactor{{$invoice->id}}"
                                                   class="m-2" data-bs-toggle="tooltip" data-bs-placement="left"
                                                   data-bs-original-title="ارسال به سامانه مرکزی"><i
                                                        class="bi bi-send-fill text-success fs-4"></i></a>
                                            @endif
                                            @if($invoice->ins == 1)
                                                <a href="{{route('invoice.copy', $invoice->id)}}" class="m-2"
                                                   data-bs-toggle="tooltip" data-bs-placement="right"
                                                   data-bs-original-title="کپی این فاکتور"><i
                                                        class="bi bi-clipboard-plus text-primary fs-4"></i></a>
                                            @endif
                                            @if($invoice->status == Invoice::STATUS_SENT_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_PENDING)
                                                <a href="{{route('invoice.verify', $invoice->id)}}" class="m-2"
                                                   data-bs-toggle="tooltip" data-bs-placement="right"
                                                   data-bs-original-title="استعلام از سامانه مرکزی"><i
                                                        class="bi bi-send-check-fill text-info fs-4"></i></a>
                                            @endif
                                            @if(($invoice->status == Invoice::STATUS_SENT_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_SUCCESS) && $invoice->ins == 1 )
                                                <a data-bs-toggle="modal" data-bs-target="#cancelFactor{{$invoice->id}}"
                                                   class="m-2"><i
                                                        class="bi bi-archive-fill text-danger fs-4 cursor-pointer"></i></a>
                                            @endif
                                                @if($invoice->status == Invoice::STATUS_DRAFT || $invoice->status == Invoice::STATUS_VERIFY_FAIL)
                                                    <a   data-bs-toggle="modal" data-bs-target="#DeleteFactor{{$invoice->id}}"class="m-2" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="حذف فاکتور "><i class="bi bi-trash text-danger fs-4"></i></a>
                                                @endif
                                            @if($invoice->status == Invoice::STATUS_SENT_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_SUCCESS || $invoice->status == Invoice::STATUS_VERIFY_PENDING)
                                                <a href="{{route('invoice.print',$invoice->id)}}" target="_blank"
                                                   class="m-2" data-bs-toggle="tooltip" data-bs-placement="right"
                                                   data-bs-original-title="پرینت"><i
                                                        class="bi bi-printer-fill text-primary fs-4"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>

                        {{$invoices->render()}}
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
                                            <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                 data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="black"/>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="black"/>
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
                                                <div
                                                    class="col-xl-12 rounded border-gray-700 border-1 border-gray-300 border-dashed px-7 py-3 border-gray-400">
                                                    <span class="fw-bolder fs-4 text-danger">توجه: </span>
                                                    <span>    از ابطال صورتحساب خود اطمینان دارید؟</span>
                                                    <span class="mx-5">
                                        <a href="{{route('invoice.expire', $invoice->id)}}"
                                           class="btn btn-danger badge">بله</a>
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
                                            <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                 data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="black"/>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="black"/>
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
                                                <div
                                                    class="col-xl-12 rounded border-gray-700 border-1 border-gray-300 border-dashed border-gray-400 px-7 py-3">
                                                    <span class="text-danger fw-bolder fs-5">توجه!</span>
                                                    <br/>
                                                    <span class="p-2 fs-6 fw-bold">    مؤدی گرامی! در صورت اطمینان از اطلاعات ثبت شده و تمایل به ارسال مستقیم صورتحساب به سازمان امور مالیاتی، بر روی گزینه «ارسال صورتحساب» کلیک نمایید.</span>
                                                    </span>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{route('invoice.send', $invoice->id)}}"
                                                           class="m-2 btn btn-success">ارسال صورتحساب</a>
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
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <script>
        $(document).ready(function () {
// Setup - add a text input to each footer cell


// DataTable
            var table = $('#table1').DataTable({

                "pageLength": 20,
                "scrollY": "800px",
                "scrollX": "800px",

                "scrollCollapse": true,
                "paging": true,
                "info": true,
                dom: 'Bfrtip',
                columnDefs: [
                    {
                        targets: 0,
                        className: 'noVis'
                    }
                ],
                "columnDefs": [
                    {
                        "targets": [2, 6],
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
                    "search": "جستجو:",
                    buttons: {
                        colvis: 'نمایش/عدم نمایش ستون ها'
                    }
                },

            });

        });
    </script>
@endsection
