@extends('layouts.landing')
@section('title', 'ساخت فایل csr برای سامانه مودیان')
@section('content')
    @php
        $description = '';
        $keywords = '';
    @endphp
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
                        <!--begin::Title-->
                        <h3 class="text-dark mb-7">ساخت فایل csr برای سامانه مودیان</h3>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <div class="ms-lg-4">
                            <div class="section-title mb-4 pb-2">
                                <h4 class="title mb-4">نکات مهم ساخت فایل csr برای سامانه مودیان</h4>
                                <p class="text-gray-800 para-desc">
                                    لطفا قبل از تکمیل فرم به نکات زیر توجه داشته باشید
                                </p>
                            </div>

                            <ul class="text-gray-800">
                                <li class="mb-0">
                                    برای دریافت CSR و کد معتبر حتما نام ثبت شده در مالیات را ثبت نمایید.
                                </li>

                                <li class="mb-0">
                                    نام صحیح انگلیسی شرکت یا شخص را ثبت نمایید.
                                </li>
                                <li class="mb-0">
                                    صحت کلید خصوصی و عمومی با سازمان مالیات بر اساس فیلدهایی که پر می کنید، هنگام دریافت شناسه یکتا سنجیده می شود. لذا اطلاعات وارد شده غلط، کد غلط می سازد.
                                </li>

                                <li class="mb-0">
                                    کد ها به پست الکترونیک شما هم ارسال خواهد شد.
                                </li>

                                <li class="mb-0">
                                    بهترین روش تولید CSR برای سامانه مودیان این روش است ولی می توان از راه طولانی و دشوار نصب و راه اندازی OpenSSL  هم گواهی تولید کرد.
                                </li>
                                <li class="mb-0">
                                    در ضمن اگر هر کدام از کلیدهای خود را گم و یا فراموش کرده اید. ما برای شما کلید عمومی، خصوصی و CSR را بازیابی می کنیم.
                                </li>
                                <li class="mb-0">
                                    در حفظ و نگهداری این کدها کوشا باشید.
                                </li>

                            </ul>
                        </div>
                        <div class="container mt-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card shadow rounded border-0 mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title mb-0 pb-2">فرم زیر را تکمیل نمایید</h5>

                                            <form class="mt-3 comment-form" method="post" action="{{route('csr.generate')}}">
                                                @csrf

                                                <div class="row">

                                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">نوع سازمان<span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">

                                                                <select class="form-select form-select-solid border-1 border border-gray-300 " data-control="select2" data-placeholder="نوع شرکت" name="type" id="Unit" required>
                                                                    <option value="">نوع شرکت را مشخص کنید...</option>
                                                                        <option value="non_gov" @if($type == 'non_gov') selected @endif >غیردولتی</option>
                                                                        <option value="gov" @if($type == 'gov') selected @endif >دولتی</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">نام شرکت/نام و نام خانوادگی فارسی <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <input name="company_name" id="FaName" type="text" class="form-control ps-2 required" placeholder="فاکتورین صورتحساب مودیان (واحد سازمانی)" maxlength="150" value="{{$company_name}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                                        <div class="mb-3">
                                                            <label id="p1" class="form-label">نام شرکت/نام و نام خانوادگی لاتین  <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <input name="company_english_name" id="EnName" type="text" class="form-control ps-2 required" placeholder="karposhe easy send invoice" title="نام شرکت لاتین" required="" value="{{$company_english_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">شناسه ملی/ کدملی  <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <input name="national_id" id="NationalNo" type="text" class="form-control ps-2 required" placeholder="10045678978" required="" maxlength="11" value="{{$national_id}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-xs-12">
                                                        <div class="mb-3">
                                                            <label id="p1" class="form-label">تلفن همراه  <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <input type="text" pattern="^09\d{9}$" id="mobilem" name="mobile" value="{{$mobile}}" class="form-control ps-2 required" required maxlength="11">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-xs-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">پست الکترونیک  <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <input type="email" pattern="^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,9}$" id="emailm" name="email" value="{{$email}}" required class="form-control ps-2 required" maxlength="120">
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="col-lg-4 col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="email"> کد امنیتی :</label>
                                                                <img alt="برای نمایش صفحه را رفرش کنید" src="{{captcha_src()}}">
                                                                <input class="form-control required" type="text" id="captcha" name="captcha" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    @error('captcha')
                                                    <div class=" flex-column align-items-between my-1 p-0">
                                                        <h6 class=" m-auto alert alert-danger">{{ $message }}</h6>
                                                    </div>
                                                    @enderror


                                                    <div class="col-md-12 col-xs-12">
                                                        <div class="send d-grid">
                                                            <button type="submit" id="gen-csr" class="btn btn-primary">تولید فایل csr و دانلود گواهی</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            @if(strlen($public) > 1)

                                            <h5 class="card-title mb-0 pt-4" >کلید عمومی (Public Key)</h5>
                                            <div class="mt-3 comment-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <div class="form-icon position-relative">
                                                                <textarea name="pubkey" id="pubkey" class="form-control" style="direction: ltr!important;" disabled="disabled" rows="10" cols="4">{!! $public !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                                <h5 class="card-title mb-0 pt-4">دانلود فایل حاوی کلیدعمومی(Public Key)</h5>--}}
                                                <div class="mt-3 comment-form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <div class="form-icon position-relative">
                                                                    <a id="gen-csr" class="btn btn-primary" href="{{asset($file_public)}}" download="">دانلود</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <hr>




                                            <h5 class="card-title mb-0 pt-4">کلید خصوصی (Private Key)</h5>
                                            <div class="mt-3 comment-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <div class="form-icon position-relative">
                                                                <textarea name="prikey" id="prikey" class="form-control" style="direction: ltr!important;" disabled="disabled" rows="10" cols="4">{!! $private !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                                <h5 class="card-title mb-0 pt-4">دانلود فایل حاوی کلید خصوصی(Private Key)</h5>--}}
                                                <div class="mt-3 comment-form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <div class="form-icon position-relative">
                                                                    <a id="gen-csr" class="btn btn-primary" href="{{asset($file_private)}}" download="">دانلود</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>




                                            <h5 class="card-title mb-0 pt-4">گواهی امضای الکترونیکی (CSR)</h5>
                                            <div class="mt-3 comment-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <div class="form-icon position-relative">
                                                                <textarea name="csrkey" id="csrkey" class="form-control" style="direction: ltr!important;" disabled="disabled" rows="10" cols="4">{!! $csr !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


{{--                                                <h5 class="card-title mb-0 pt-4">دانلود فایل حاوی CSR</h5>--}}
                                                <div class="mt-3 comment-form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <div class="form-icon position-relative">
                                                                    <a id="gen-csr" class="btn btn-primary" href="{{asset($file_csr)}}" download="">دانلود</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                            <hr>
                                            <hr>

                                                <h5 class="card-title mb-0 pt-4">دانلود فایل حاوی کلیدهاو CSR (به صورت یکجا)</h5>
                                                <div class="mt-3 comment-form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <div class="form-icon position-relative">
                                                                    <a id="gen-csr" class="btn btn-success" href="{{asset($file)}}" download="">دانلود یکجا</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@endsection
