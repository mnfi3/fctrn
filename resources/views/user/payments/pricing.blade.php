@extends('layouts.dashboard')
@section('title', 'خرید بسته جدید')
@section('content')
    <script>
        function SetTaxpayerId(){
            var taxpayerValue = document.getElementById("taxpayer").value;
            var elements = document.getElementsByName("taxpayer_id");
            for (var i = 0; i < elements.length; i++) {
                elements[i].value = taxpayerValue;
            }
        }
    </script>
    <style>
        @media print {
            body * {
                visibility: hidden; /* Hide everything */
            }

            .modal-body, .modal-body * {
                visibility: visible; /* Show only the modal body */
            }

            .modal-body {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
        }
    </style>

    <script>
        function printModal() {
            const modal = document.querySelector('.modal-body');
            if (modal) {
                window.print();
            }
        }
    </script>
    <script>
        function verifyDiscountCode(packageId, originalCost) {


            const discountCodeInput = document.getElementById(`discountCodeInputI${packageId}`);
            const discountCode = discountCodeInput.value.trim();
            const discountMessage = document.getElementById(`discountMessageI${packageId}`);
            const totalElement = document.getElementById(`totalI${packageId}`);
            const vatElement = document.getElementById(`vatI${packageId}`);
            const grandTotalElement = document.getElementById(`grandTotalI${packageId}`);

            if (!discountCode) {
                discountMessage.style.display = 'block';
                discountMessage.textContent = 'لطفاً کد تخفیف را وارد کنید.';
                discountMessage.classList.remove('text-danger', 'text-success');
                discountMessage.classList.add('text-warning');

                return;
            }

            // Clear previous message
            discountMessage.style.display = 'none';

            // Send AJAX request
            fetch('{{ route("discount.verify") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: discountCode, type: "{{ \App\Models\Discount::TYPE_PUBLIC }}" })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 1) {
                    let discountAmount = data.discount.amountOfDiscount;

                    // Calculate new totals
                    if (data.discount.discount_type == 0) {
                        discountAmount = (originalCost * discountAmount) / 100;
                    }

                    const newTotal = originalCost - discountAmount;
                    console.log(newTotal);
                    console.log(originalCost);
                    console.log(discountAmount);
                    const vat = newTotal / 10;
                    const grandTotal = newTotal + vat;
                    // Update the DOM
                    totalElement.innerHTML = `
                <span style="text-decoration: line-through; color: red;">${originalCost.toLocaleString()} ریال</span>
                <span style="margin-left: 8px;">${Math.round(newTotal).toLocaleString()} ریال</span>
            `;
                    vatElement.innerHTML = `
                <span style="text-decoration: line-through; color: red;">${(originalCost / 10).toLocaleString()} ریال</span>
                <span style="margin-left: 8px;">${Math.round(vat).toLocaleString()} ریال</span>
            `;
                    grandTotalElement.innerHTML = `
                <span style="text-decoration: line-through; color: red;">${(originalCost * 1.1).toLocaleString()} ریال</span>
                <span style="margin-left: 8px;">${Math.round(grandTotal).toLocaleString()} ریال</span>
            `;

                    discountMessage.style.display = 'block';
                    discountMessage.textContent = `${Math.round(data.discount.amountOfDiscount).toLocaleString()}${data.discount.discount_type == 1 ? 'ریال' : '%'} تخفیف اعمال شد! ${data.discount.description ? data.discount.description : ''}`;
                    discountMessage.classList.remove('text-danger');
                    discountMessage.classList.add('text-success');
                } else {
                    totalElement.innerHTML = `${originalCost.toLocaleString()} ریال`;
                    vatElement.innerHTML = `${(originalCost / 10).toLocaleString()} ریال`;
                    grandTotalElement.innerHTML = `${(originalCost * 1.1).toLocaleString()} ریال`;

                    discountMessage.style.display = 'block';
                    discountMessage.textContent = data.message;
                    discountMessage.classList.remove('text-success');
                    discountMessage.classList.add('text-danger');
                }
            })
            .catch(error => {
                console.error('Error verifying discount code:', error);
                discountMessage.style.display = 'block';
                discountMessage.textContent = 'خطا در تأیید کد تخفیف. لطفاً مجدداً تلاش کنید.';
            });

        };
    </script>
    <script>
        function verifyDiscountCodePublic(packageId, originalCost) {

            const discountCodeInput = document.getElementById(`discountCodeInput${packageId}`);
            const discountCode = discountCodeInput.value.trim();
            const discountMessage = document.getElementById(`discountMessage${packageId}`);
            const totalElement = document.getElementById(`total${packageId}`);
            const vatElement = document.getElementById(`vat${packageId}`);
            const grandTotalElement = document.getElementById(`grandTotal${packageId}`);

            if (!discountCode) {
                discountMessage.style.display = 'block';
                discountMessage.textContent = 'لطفاً کد تخفیف را وارد کنید.';
                discountMessage.classList.remove('text-danger', 'text-success');
                discountMessage.classList.add('text-warning');
                return;
            }

            // Clear previous message
            discountMessage.style.display = 'none';

            // Send AJAX request
            fetch('{{ route("discount.verify") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: discountCode, type: "{{ \App\Models\Discount::TYPE_INFINITE }}" })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 1) {
                        let discountAmount = data.discount.amountOfDiscount;

                        // Calculate new totals
                        if (data.discount.discount_type == 0) {
                            discountAmount = (originalCost * discountAmount) / 100;
                        }

                        const newTotal = originalCost - discountAmount;
                        console.log(newTotal);
                        console.log(originalCost);
                        console.log(discountAmount);
                        const vat = newTotal / 10;
                        const grandTotal = newTotal + vat;
                        // Update the DOM
                        totalElement.innerHTML = `
                <span style="text-decoration: line-through; color: red;">${originalCost.toLocaleString()} ریال</span>
                <span style="margin-left: 8px;">${Math.round(newTotal).toLocaleString()} ریال</span>
            `;
                        vatElement.innerHTML = `
                <span style="text-decoration: line-through; color: red;">${(originalCost / 10).toLocaleString()} ریال</span>
                <span style="margin-left: 8px;">${Math.round(vat).toLocaleString()} ریال</span>
            `;
                        grandTotalElement.innerHTML = `
                <span style="text-decoration: line-through; color: red;">${(originalCost * 1.1).toLocaleString()} ریال</span>
                <span style="margin-left: 8px;">${Math.round(grandTotal).toLocaleString()} ریال</span>
            `;

                        discountMessage.style.display = 'block';
                        discountMessage.textContent = `${Math.round(data.discount.amountOfDiscount).toLocaleString()}${data.discount.discount_type == 1 ? 'ریال' : '%'} تخفیف اعمال شد! ${data.discount.description ? data.discount.description : ''}`;
                        discountMessage.classList.remove('text-danger');
                        discountMessage.classList.add('text-success');
                    } else {
                        totalElement.innerHTML = `${originalCost.toLocaleString()} ریال`;
                        vatElement.innerHTML = `${(originalCost / 10).toLocaleString()} ریال`;
                        grandTotalElement.innerHTML = `${(originalCost * 1.1).toLocaleString()} ریال`;

                        discountMessage.style.display = 'block';
                        discountMessage.textContent = data.message;
                        discountMessage.classList.remove('text-success');
                        discountMessage.classList.add('text-danger');
                    }
                })
                .catch(error => {
                    console.error('Error verifying discount code:', error);
                    discountMessage.style.display = 'block';
                    discountMessage.textContent = 'خطا در تأیید کد تخفیف. لطفاً مجدداً تلاش کنید.';
                });

        };
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
                                <a class="btn btn-light-info btn-active btn-active-info px-6 py-3 me-2 fs-2" data-bs-toggle="tab" href="#menu1">بسته های نامحدود</a>
                                <a class="btn btn-light-info btn-active btn-active-info px-6 py-3 fs-2 active" data-bs-toggle="tab" href="#menu2">بسته های اعتباری</a>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="menu1" role="tabpanel">
                                    <!--end::Nav group-->
                                    <div class="mb-13 text-center">
                                        <h1 class="fs-2hx fw-bolder mb-5">بسته های نامحدود</h1>
                                        <div class="text-gray-600 fw-bold fs-5">
                                            شما می توانید با خرید هر یک از این بسته ها، تا زمان مشخص شده به تعداد نامحدود، صورتحساب برای آن مؤدی ثبت نمایید.
                                        </div>
                                        <div class="text-danger fw-bold fs-5">
ارزش افزوده برعهده خریدار می باشد.                                        </div>
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
                                                            <!--begin::Button-->
                                                            <a href="#" class="btn btn-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_create_apps{{$package->id}}" id="kt_toolbar_primary_buttons{{$package->id}}">انتخاب</a>
                                                            <!--end::Button-->
                                                            <!--begin::Modal - Create App-->
                                                            <div class="modal fade" id="kt_modal_create_apps{{$package->id}}" tabindex="-1" aria-hidden="true">
                                                                <!--begin::Modal dialog-->
                                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                                    <!--begin::Modal content-->
                                                                    <div class="modal-content">
                                                                        <!--begin::Modal header-->
                                                                        <div class="modal-header">
                                                                            <!--begin::Modal title-->
                                                                            <h2>پیش فاکتور</h2>
                                                                            <!--end::Modal title-->
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
                                                                        <!--end::Modal header-->
                                                                        <!--begin::Modal body-->
                                                                        <div class="modal-body py-lg-10 px-lg-10">
                                                                            <!--begin::Stepper-->
                                                                            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                                                                                <!--begin::Aside-->
                                                                                <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100">
                                                                                    <!--begin::Nav-->
                                                                                    <div class="stepper-nav ps-lg-10">
                                                                                        <!--begin::Step 1-->
                                                                                        <div class="stepper-item current p-0" data-kt-stepper-element="nav">
                                                                                            <!--begin::Container-->
                                                                                            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                                                                                                <!--begin::Post-->
                                                                                                <div class="content flex-row-fluid p-0" id="kt_content">
                                                                                                    <!-- begin::Invoice 3-->
                                                                                                    <div class="card">
                                                                                                        <!-- begin::Body-->
                                                                                                        <div class="card-body p-0">
                                                                                                            <!-- begin::Wrapper-->
                                                                                                            <div class="mw-lg-950px mx-auto w-100">
                                                                                                                <!--begin::Body-->
                                                                                                                <!--begin::Wrapper-->
                                                                                                                <div class="d-flex flex-column gap-7 gap-md-10">
                                                                                                                    <!--begin::Message-->
                                                                                                                    <div class="fw-bolder fs-4">همکار گرامی {{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}
                                                                                                                        <br />
                                                                                                                        <span class="text-muted fs-5">جزئیات سفارش شما به شرح ذیل می باشد. از انتخاب شما متشکریم.</span></div>
                                                                                                                    <!--begin::Message-->
                                                                                                                    <!--begin::Separator-->
                                                                                                                    <div class="separator"></div>
                                                                                                                    <!--begin::Separator-->
                                                                                                                    <!--begin::Order details-->
                                                                                                                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bolder">
                                                                                                                        <div class="flex-root d-flex flex-column">
                                                                                                                            <span class="">شماره صورتحساب: #14534</span>
                                                                                                                        </div>
                                                                                                                        <div class="flex-root d-flex flex-column">
                                                                                                                            <span class="">تاریخ: {{toPersianDate(now())}}</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <!--end::Order details-->
                                                                                                                    <!--begin:Order summary-->
                                                                                                                    <div class="d-flex justify-content-between flex-column">
                                                                                                                        <!--begin::Table-->
                                                                                                                        <div class="table-responsive border-bottom mb-9">
                                                                                                                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                                                                                                <thead>
                                                                                                                                <tr class="border-bottom border-dark fs-6 fw-bolder">
                                                                                                                                    <th class="min-w-175px pb-2">خدمات</th>
                                                                                                                                    <th></th>
                                                                                                                                    <th></th>
                                                                                                                                    <th class="min-w-70px text-start pb-2">مبلغ</th>
                                                                                                                                </tr>
                                                                                                                                </thead>
                                                                                                                                <tbody class="fw-bold text-gray-800">
                                                                                                                                <!--begin::Products-->
                                                                                                                                <tr>
                                                                                                                                    <!--begin::Product-->
                                                                                                                                    <td>
                                                                                                                                        <div class="d-flex align-items-center">
                                                                                                                                            <!--begin::Title-->
                                                                                                                                            <div class="fw-bolder">{{$package->name}} - {{$package->desc}}</div>
                                                                                                                                            <!--end::Title-->
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                    <!--end::Product-->
                                                                                                                                    <td></td>
                                                                                                                                    <td></td>
                                                                                                                                    <!--begin::Total-->
                                                                                                                                    <td class="text-primary" id="total{{$package->id}}">
                                                                                                                                        {{number_format($package->cost)}} ریال</td>
                                                                                                                                    <!--end::Total-->
                                                                                                                                </tr>
                                                                                                                                @if(Auth::user()->is_admin_register == 1 && Auth::user()->is_payed_register_cost == 0)
                                                                                                                                <tr>
                                                                                                                                    <!--begin::Product-->
                                                                                                                                    <td>
                                                                                                                                        <div class="d-flex align-items-center">
                                                                                                                                            <!--begin::Title-->
                                                                                                                                                <div class="fw-bolder">خدمات ثبت نام (۰ تا ۱۰۰ ثبت نام و اتصال به سامانه مؤدیان- امضاء الکترونیک- دریافت شناسه یکتا- ثبت شناسه کالا/خدمات و ...)</div>
                                                                                                                                            <!--end::Title-->
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                    <!--end::Product-->
                                                                                                                                    <td></td>
                                                                                                                                    <td></td>
                                                                                                                                    <!--begin::Total-->
                                                                                                                                    <td class="text-primary" id="totalI{{$package->id}}">
                                                                                                                                        {{number_format(Auth::user()->register_cost)}} ریال</td>
                                                                                                                                    <!--end::Total-->
                                                                                                                                </tr>
                                                                                                                                @endif
                                                                                                                                <!--end::Products-->
                                                                                                                                <!--begin::VAT-->
                                                                                                                                <tr>
                                                                                                                                    <td colspan="3" class="text-end">ارزش افزوده (۱۰%)</td>
                                                                                                                                    @if(Auth::user()->is_admin_register == 1 && Auth::user()->is_payed_register_cost == 0)
                                                                                                                                    <td class="text-start text-warning" id="vatI{{$package->id}}"> {{number_format(($package->cost + Auth::user()->register_cost)/10)}} ریال</td>
                                                                                                                                    @else
                                                                                                                                    <td class="text-start text-warning" id="vatI{{$package->id}}"> {{number_format($package->cost/10)}} ریال</td>

                                                                                                                                    @endif
                                                                                                                                </tr>
                                                                                                                                <!--end::VAT-->
                                                                                                                                <!--begin::Discount-->
                                                                                                                                <tr>
                                                                                                                                    <td colspan="3" class="text-end">کد تخفیف</td>
                                                                                                                                    <td class="text-start text-warning">
                                                                                                                                        <div class="d-flex justify-content-start mt-3">
                                                                                                                                            <input type="text" id="discountCodeInput{{$package->id}}" class="form-control form-control-solid border-1 border border-gray-300 me-3" name="code">
                                                                                                                                            <button type="button" class="btn btn-success me-12" onclick="verifyDiscountCodePublic('{{$package->id}}', {{$package->cost}})">اعمال</button>
                                                                                                                                        </div>
                                                                                                                                        <span id="discountMessage{{$package->id}}" class="text-danger mt-2 d-block" style="display: none;"></span>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <!--end::Discount-->
                                                                                                                                <!--begin::Grand total-->
                                                                                                                                <tr class=" border-top border-dark">
                                                                                                                                    <td colspan="3" class="fs-3 text-dark fw-bolder text-end">مبلغ قابل پرداخت</td>
                                                                                                                                    @if(Auth::user()->is_admin_register == 1 && Auth::user()->is_payed_register_cost == 0)
                                                                                                                                    <td class="text-success fs-3 fw-boldest text-end" id="grandTotal{{$package->id}}">
                                                                                                                                        {{number_format(($package->cost + Auth::user()->register_cost)*1.1)}} ریال</td>
                                                                                                                                    @else
                                                                                                                                        {{number_format($package->cost*1.1)}} ریال</td>
                                                                                                                                    @endif
                                                                                                                                </tr>
                                                                                                                                <!--end::Grand total-->
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </div>
                                                                                                                        <!--end::Table-->
                                                                                                                    </div>
                                                                                                                    <!--end:Order summary-->
                                                                                                                    <!--end::Wrapper-->
                                                                                                                </div>
                                                                                                                <!--end::Body-->
                                                                                                                <!-- begin::Footer-->
                                                                                                                <div class="d-flex flex-stack flex-wrap">
                                                                                                                    <!-- begin::Actions-->
                                                                                                                    <div class="my-1 me-5">
                                                                                                                        <!-- begin::Pint-->
                                                                                                                        <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">پرینت صورتحساب</button>
                                                                                                                        <!-- end::Pint-->
                                                                                                                        <button type="submit" class="btn btn-primary my-1 me-12"  onclick="SetTaxpayerId()">پرداخت</button>
                                                                                                                    </div>
                                                                                                                    <!-- end::Actions-->
                                                                                                                </div>
                                                                                                                <!-- end::Footer-->
                                                                                                            </div>
                                                                                                            <!-- end::Wrapper-->
                                                                                                        </div>
                                                                                                        <!-- end::Body-->
                                                                                                    </div>
                                                                                                    <!-- end::Invoice 1-->
                                                                                                </div>
                                                                                                <!--end::Post-->
                                                                                            </div>
                                                                                            <!--end::Container-->
                                                                                        </div>
                                                                                        <!--end::Step 1-->
                                                                                    </div>
                                                                                </div>
                                                                                <!--end::Content-->
                                                                            </div>
                                                                            <!--end::Stepper-->
                                                                        </div>
                                                                        <!--end::Modal body-->
                                                                    </div>
                                                                    <!--end::Modal content-->
                                                                </div>
                                                                <!--end::Modal dialog-->
                                                            </div>
                                                            <!--end::Modal - Create App-->
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
                                <div class="tab-pane fade  show active" id="menu2" role="tabpanel">
                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <h1 class="fs-2hx fw-bolder mb-5">بسته های اعتباری</h1>
                                        <div class="text-gray-600 fw-bold fs-5">
                                            با خرید هر یک از این بسته ها، بدون محدودیت زمانی و تا وقتی که شارژ دارید، می توانید صورتحساب ایجاد کنید.
                                        </div>
                                        <div class="text-danger fw-bold fs-5">
ارزش افزوده برعهده خریدار می باشد.
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

                                                            <!--begin::Button-->
                                                            <a href="#" class="btn btn-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app{{$package->id}}" id="kt_toolbar_primary_button{{$package->id}}">انتخاب</a>
                                                            <!--end::Button-->
                                                            <!--begin::Modal - Create App-->
                                                            <div class="modal fade" id="kt_modal_create_app{{$package->id}}" tabindex="-1" aria-hidden="true">
                                                                <!--begin::Modal dialog-->
                                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                                    <!--begin::Modal content-->
                                                                    <div class="modal-content">
                                                                        <!--begin::Modal header-->
                                                                        <div class="modal-header">
                                                                            <!--begin::Modal title-->
                                                                            <h2>پیش فاکتور</h2>
                                                                            <!--end::Modal title-->
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
                                                                        <!--end::Modal header-->
                                                                        <!--begin::Modal body-->
                                                                        <div class="modal-body py-lg-10 px-lg-10">
                                                                            <!--begin::Stepper-->
                                                                            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                                                                                <!--begin::Aside-->
                                                                                <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100">
                                                                                    <!--begin::Nav-->
                                                                                    <div class="stepper-nav ps-lg-10">
                                                                                        <!--begin::Step 1-->
                                                                                        <div class="stepper-item current p-0" data-kt-stepper-element="nav">
                                                                                            <!--begin::Container-->
                                                                                            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                                                                                                <!--begin::Post-->
                                                                                                <div class="content flex-row-fluid p-0" id="kt_content">
                                                                                                    <!-- begin::Invoice 3-->
                                                                                                    <div class="card">
                                                                                                        <!-- begin::Body-->
                                                                                                        <div class="card-body p-0">
                                                                                                            <!-- begin::Wrapper-->
                                                                                                            <div class="mw-lg-950px mx-auto w-100">
                                                                                                                <!--begin::Body-->
                                                                                                                <!--begin::Wrapper-->
                                                                                                                <div class="d-flex flex-column gap-7 gap-md-10">
                                                                                                                    <!--begin::Message-->
                                                                                                                    <div class="fw-bolder fs-4">همکار گرامی {{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}
                                                                                                                        <br />
                                                                                                                        <span class="text-muted fs-5">جزئیات سفارش شما به شرح ذیل می باشد. از انتخاب شما متشکریم.</span></div>
                                                                                                                    <!--begin::Message-->
                                                                                                                    <!--begin::Separator-->
                                                                                                                    <div class="separator"></div>
                                                                                                                    <!--begin::Separator-->
                                                                                                                    <!--begin::Order details-->
                                                                                                                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bolder">
                                                                                                                        <div class="flex-root d-flex flex-column">
                                                                                                                            <span class="">شماره صورتحساب: #14534</span>
                                                                                                                        </div>
                                                                                                                        <div class="flex-root d-flex flex-column">
                                                                                                                            <span class="">تاریخ: {{toPersianDate(now())}}</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <!--end::Order details-->
                                                                                                                    <!--begin:Order summary-->
                                                                                                                    <div class="d-flex justify-content-between flex-column">
                                                                                                                        <!--begin::Table-->
                                                                                                                        <div class="table-responsive border-bottom mb-9">
                                                                                                                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                                                                                                <thead>
                                                                                                                                <tr class="border-bottom border-dark fs-6 fw-bolder">
                                                                                                                                    <th class="min-w-175px pb-2">خدمات</th>
                                                                                                                                    <th></th>
                                                                                                                                    <th></th>
                                                                                                                                    <th class="min-w-70px text-start pb-2">مبلغ</th>
                                                                                                                                </tr>
                                                                                                                                </thead>
                                                                                                                                <tbody class="fw-bold text-gray-800">
                                                                                                                                <!--begin::Products-->
                                                                                                                                <tr>
                                                                                                                                    <!--begin::Product-->
                                                                                                                                    <td>
                                                                                                                                        <div class="d-flex align-items-center">
                                                                                                                                            <!--begin::Title-->
                                                                                                                                                <div class="fw-bolder">{{$package->name}} - {{$package->desc}}</div>
                                                                                                                                            <!--end::Title-->
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                    <!--end::Product-->
                                                                                                                                    <td></td>
                                                                                                                                    <td></td>
                                                                                                                                    <!--begin::Total-->
                                                                                                                                    <td class="text-primary" id="totalI{{$package->id}}">
                                                                                                                                        {{number_format($package->cost)}} ریال</td>
                                                                                                                                    <!--end::Total-->
                                                                                                                                </tr>
                                                                                                                                @if(Auth::user()->is_admin_register == 1 && Auth::user()->is_payed_register_cost == 0)
                                                                                                                                <tr>
                                                                                                                                    <!--begin::Product-->
                                                                                                                                    <td>
                                                                                                                                        <div class="d-flex align-items-center">
                                                                                                                                            <!--begin::Title-->
                                                                                                                                                <div class="fw-bolder">خدمات ثبت نام (۰ تا ۱۰۰ ثبت نام و اتصال به سامانه مؤدیان- امضاء الکترونیک- دریافت شناسه یکتا- ثبت شناسه کالا/خدمات و ...)</div>
                                                                                                                                            <!--end::Title-->
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                    <!--end::Product-->
                                                                                                                                    <td></td>
                                                                                                                                    <td></td>
                                                                                                                                    <!--begin::Total-->
                                                                                                                                    <td class="text-primary" id="totalI{{$package->id}}">
                                                                                                                                        {{number_format(Auth::user()->register_cost)}} ریال</td>
                                                                                                                                    <!--end::Total-->
                                                                                                                                </tr>
                                                                                                                                @endif
                                                                                                                                <!--end::Products-->
                                                                                                                                <!--begin::VAT-->
                                                                                                                                <tr>
                                                                                                                                    <td colspan="3" class="text-end">ارزش افزوده (۱۰%)</td>
                                                                                                                                    @if(Auth::user()->is_admin_register == 1 && Auth::user()->is_payed_register_cost == 0)
                                                                                                                                    <td class="text-start text-warning" id="vatI{{$package->id}}"> {{number_format(($package->cost + Auth::user()->register_cost)/10)}} ریال</td>
                                                                                                                                    @else
                                                                                                                                    <td class="text-start text-warning" id="vatI{{$package->id}}"> {{number_format($package->cost/10)}} ریال</td>

                                                                                                                                    @endif
                                                                                                                                </tr>
                                                                                                                                <!--end::VAT-->
                                                                                                                                <!--begin::Discount-->
                                                                                                                                <tr>
                                                                                                                                    <td colspan="3" class="text-end">کد تخفیف</td>
                                                                                                                                    <td class="text-start text-warning">
                                                                                                                                        <div class="d-flex justify-content-start mt-3">
                                                                                                                                            <input type="text" id="discountCodeInputI{{$package->id}}" class="form-control form-control-solid border-1 border border-gray-300 me-3" name="code">
                                                                                                                                            <button type="button" class="btn btn-success me-12" onclick="verifyDiscountCode('{{$package->id}}', {{$package->cost}})">اعمال</button>
                                                                                                                                        </div>
                                                                                                                                        <span id="discountMessageI{{$package->id}}" class="text-danger mt-2 d-block" style="display: none;"></span>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <!--end::Discount-->
                                                                                                                                <!--begin::Grand total-->
                                                                                                                                <tr class=" border-top border-dark">
                                                                                                                                    <td colspan="3" class="fs-3 text-dark fw-bolder text-end">مبلغ قابل پرداخت</td>
                                                                                                                                    <td class="text-success fs-3 fw-boldest text-end" id="grandTotalI{{$package->id}}">
                                                                                                                                        {{number_format(($package->cost + Auth::user()->register_cost)*1.1)}} ریال</td>
                                                                                                                                </tr>
                                                                                                                                <!--end::Grand total-->
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </div>
                                                                                                                        <!--end::Table-->
                                                                                                                    </div>
                                                                                                                    <!--end:Order summary-->
                                                                                                                    <!--end::Wrapper-->
                                                                                                                </div>
                                                                                                                <!--end::Body-->
                                                                                                                <!-- begin::Footer-->
                                                                                                                <div class="d-flex flex-stack flex-wrap justify-content-end">
                                                                                                                    <!-- begin::Actions-->
                                                                                                                    <div class="my-1 me-5">
                                                                                                                        <!-- begin::Pint-->
                                                                                                                        <button type="button" class="btn btn-success me-12" onclick="printModal()">پرینت صورتحساب</button>
                                                                                                                        <!-- end::Pint-->
                                                                                                                        <button type="submit" class="btn btn-primary"  onclick="SetTaxpayerId()">پرداخت</button>
                                                                                                                    </div>
                                                                                                                    <!-- end::Actions-->
                                                                                                                </div>
                                                                                                                <!-- end::Footer-->
                                                                                                            </div>
                                                                                                            <!-- end::Wrapper-->
                                                                                                        </div>
                                                                                                        <!-- end::Body-->
                                                                                                    </div>
                                                                                                    <!-- end::Invoice 1-->
                                                                                                </div>
                                                                                                <!--end::Post-->
                                                                                            </div>
                                                                                            <!--end::Container-->
                                                                                        </div>
                                                                                        <!--end::Step 1-->
                                                                                    </div>
                                                                                </div>
                                                                                <!--end::Content-->
                                                                            </div>
                                                                            <!--end::Stepper-->
                                                                        </div>
                                                                        <!--end::Modal body-->
                                                                    </div>
                                                                    <!--end::Modal content-->
                                                                </div>
                                                                <!--end::Modal dialog-->
                                                            </div>
                                                            <!--end::Modal - Create App-->
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
