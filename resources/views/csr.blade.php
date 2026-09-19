@extends('layouts.landing')
@section('title', 'تولید کلید خصوصی، کلید عمومی و CSR سامانه مودیان')
@section('content')
    @php
        $description = '';
        $keywords = '';
    @endphp

    <div class="fx-csr-page">
        <div class="container-xxl">
            <section class="fx-csr-hero">
                <div class="fx-csr-hero-inner">
                    <div class="fx-csr-kicker"><i class="bi bi-shield-lock-fill"></i> ابزار رایگان فاکتورین</div>
                    <h1>تولید کلید خصوصی، کلید عمومی و CSR سامانه مودیان</h1>
                    <p>کلیدهای موردنیاز برای ثبت‌نام و دریافت شناسه یکتای مالیاتی را به‌سادگی تولید کنید. اطلاعات فرم را مطابق مشخصات ثبت‌شده در سازمان امور مالیاتی وارد کنید و فایل‌های موردنیاز سامانه مودیان را دریافت نمایید.</p>
                    <div class="fx-csr-badges"><span class="fx-csr-badge">تولید رایگان CSR</span><span class="fx-csr-badge">کلید عمومی و خصوصی</span><span class="fx-csr-badge">دانلود فایل‌ها</span></div>
                </div>
            </section>

            <section class="fx-csr-section fx-csr-panel">
                <div class="fx-csr-heading">
                    <div class="fx-csr-heading-icon"><i class="bi bi-info-circle-fill"></i></div>
                    <div><h2>راهنمای تولید CSR برای سامانه مودیان</h2><p>برای اینکه کلیدها و گواهی CSR با اطلاعات پرونده مالیاتی شما مطابقت داشته باشند، موارد زیر را با دقت بررسی کنید.</p></div>
                </div>
                <div class="fx-csr-notes">
                    <div class="fx-csr-note"><div class="fx-csr-note-icon"><i class="bi bi-person-vcard"></i></div><div><strong>نام ثبت‌شده در مالیات</strong><span>نام شرکت یا نام و نام خانوادگی را دقیقاً مطابق اطلاعات ثبت‌شده در سازمان امور مالیاتی وارد کنید.</span></div></div>
                    <div class="fx-csr-note"><div class="fx-csr-note-icon"><i class="bi bi-translate"></i></div><div><strong>نام انگلیسی صحیح</strong><span>نام شرکت یا شخص را به زبان انگلیسی و مطابق اطلاعات موردنیاز فرم ثبت کنید.</span></div></div>
                    <div class="fx-csr-note"><div class="fx-csr-note-icon"><i class="bi bi-shield-check"></i></div><div><strong>دقت اطلاعات</strong><span>صحت کلیدهای عمومی و خصوصی بر اساس اطلاعات واردشده هنگام دریافت شناسه یکتا بررسی می‌شود؛ اطلاعات اشتباه می‌تواند باعث ایجاد کلید نامعتبر شود.</span></div></div>
{{--                    <div class="fx-csr-note"><div class="fx-csr-note-icon"><i class="bi bi-envelope-check"></i></div><div><strong>ارسال به ایمیل</strong><span>کدها و اطلاعات تولیدشده به پست الکترونیک واردشده نیز ارسال خواهد شد.</span></div></div>--}}
                    <div class="fx-csr-note"><div class="fx-csr-note-icon"><i class="bi bi-lightning-charge"></i></div><div><strong>روش ساده تولید CSR</strong><span>این ابزار فرایند تولید CSR را ساده می‌کند و نیازی به طی کردن مراحل دشوار نصب و راه‌اندازی OpenSSL برای تولید گواهی ندارید.</span></div></div>
                    <div class="fx-csr-note"><div class="fx-csr-note-icon"><i class="bi bi-arrow-repeat"></i></div><div><strong>بازیابی کلیدها</strong><span>اگر یکی از کلیدهای خود را گم یا فراموش کرده‌اید، امکان بازیابی کلید عمومی، خصوصی و CSR برای شما وجود دارد.</span></div></div>
                    <div class="fx-csr-note"><div class="fx-csr-note-icon"><i class="bi bi-key-fill"></i></div><div><strong>نگهداری امن</strong><span>کلید خصوصی اطلاعات مهمی است؛ فایل‌ها و کدهای تولیدشده را در محل امن نگهداری کنید.</span></div></div>
                </div>
            </section>

            <section class="fx-csr-section fx-csr-panel fx-csr-form-panel">
                <div class="fx-csr-form-title"><div><h2>تولید کلید و CSR سامانه مودیان</h2><div class="fx-csr-required">فیلدهای دارای <span class="text-danger">*</span> الزامی هستند.</div></div></div>

                <form class="fx-csr-form mt-3 comment-form" method="post" action="{{route('csr.generate')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12"><div class="fx-csr-field"><label class="form-label">نوع سازمان <span class="text-danger">*</span></label><select class="form-select form-select-solid border-1 border border-gray-300" data-control="select2" data-placeholder="نوع شرکت" name="type" id="Unit" required><option value="">نوع شرکت را مشخص کنید...</option><option value="non_gov" @if($type == 'non_gov') selected @endif >غیردولتی</option><option value="gov" @if($type == 'gov') selected @endif >دولتی</option></select></div></div>
                        <div class="col-lg-6 col-md-6 col-xs-12"><div class="fx-csr-field"><label class="form-label">نام شرکت / نام و نام خانوادگی فارسی <span class="text-danger">*</span></label><input name="company_name" id="FaName" type="text" class="form-control ps-2 required" placeholder="نام ثبت‌شده در پرونده مالیاتی" maxlength="150" value="{{$company_name}}" required><div class="fx-csr-hint">نام را مطابق اطلاعات ثبت‌شده در سازمان امور مالیاتی وارد کنید.</div></div></div>
                        <div class="col-lg-6 col-md-6 col-xs-12"><div class="fx-csr-field"><label id="p1" class="form-label">نام شرکت / نام و نام خانوادگی لاتین <span class="text-danger">*</span></label><input name="company_english_name" id="EnName" type="text" class="form-control ps-2 required" placeholder="نام انگلیسی شرکت یا شخص" title="نام شرکت لاتین" required="" value="{{$company_english_name}}"></div></div>
                        <div class="col-lg-6 col-md-6 col-xs-12"><div class="fx-csr-field"><label class="form-label">شناسه ملی / کد ملی <span class="text-danger">*</span></label><input name="national_id" id="NationalNo" type="text" class="form-control ps-2 required" placeholder="مثلاً 10045678978" required="" maxlength="11" value="{{$national_id}}"><div class="fx-csr-hint">شناسه ملی شرکت یا کد ملی شخص را وارد کنید.</div></div></div>
                        <div class="col-lg-4 col-md-6 col-xs-12"><div class="fx-csr-field"><label id="p1" class="form-label">تلفن همراه <span class="text-danger">*</span></label><input type="text" pattern="^09\d{9}$" id="mobilem" name="mobile" value="{{$mobile}}" class="form-control ps-2 required" required maxlength="11" placeholder="09123456789"></div></div>
                        <div class="col-lg-4 col-md-6 col-xs-12"><div class="fx-csr-field"><label class="form-label">پست الکترونیک <span class="text-danger">*</span></label><input type="email" pattern="^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,9}$" id="emailm" name="email" value="{{$email}}" required class="form-control ps-2 required" maxlength="120" placeholder="example@email.com"></div></div>
                        <div class="col-lg-4 col-md-6 col-xs-12"><div class="fx-csr-field"><label for="email" class="form-label">کد امنیتی <span class="text-danger">*</span></label><div class="fx-captcha-box"><img alt="تصویر کد امنیتی؛ برای دریافت کد جدید صفحه را رفرش کنید" src="{{captcha_src()}}"><input class="form-control required" type="text" id="captcha" name="captcha" autocomplete="off" required placeholder="کد را وارد کنید"></div></div></div>
                        @error('captcha')
                        <div class="col-12"><div class="my-1 p-0"><h6 class="m-auto alert alert-danger">{{ $message }}</h6></div></div>
                        @enderror
                        <div class="col-md-12 col-xs-12"><div class="send d-grid mt-2"><button type="submit" id="gen-csr" class="btn btn-primary fx-csr-submit"><i class="bi bi-shield-lock me-2"></i>تولید کلیدها و فایل CSR</button></div></div>
                    </div>
                </form>
                <div class="fx-csr-security"><i class="bi bi-shield-exclamation fs-5"></i><div><strong>نکته امنیتی:</strong> کلید خصوصی و فایل‌های تولیدشده را در اختیار افراد غیرمجاز قرار ندهید و پس از دانلود، آن‌ها را در محل امن نگهداری کنید.</div></div>
            </section>

            @if(strlen($public) > 1)
                <section class="fx-csr-section fx-csr-panel">
                    <div class="fx-csr-result"><div class="fx-csr-result-head"><div class="fx-csr-heading-icon"><i class="bi bi-key-fill"></i></div><div><h3>کلید عمومی (Public Key)</h3><p class="text-muted mb-0">کلید عمومی تولیدشده برای استفاده در فرایند سامانه مودیان.</p></div></div><textarea name="pubkey" id="pubkey" class="form-control fx-csr-code" disabled="disabled" rows="10" cols="4">{!! $public !!}</textarea><div class="mt-3"><a id="gen-csr" class="btn fx-csr-download fx-csr-download-primary" href="{{asset($file_public)}}" download=""><i class="bi bi-download"></i> دانلود کلید عمومی</a></div></div>
                    <hr class="fx-csr-divider">
                    <div class="fx-csr-result"><div class="fx-csr-result-head"><div class="fx-csr-heading-icon"><i class="bi bi-lock-fill"></i></div><div><h3>کلید خصوصی (Private Key)</h3><p class="text-muted mb-0">کلید خصوصی را با دقت نگهداری کنید و در اختیار دیگران قرار ندهید.</p></div></div><textarea name="prikey" id="prikey" class="form-control fx-csr-code" disabled="disabled" rows="10" cols="4">{!! $private !!}</textarea><div class="mt-3"><a id="gen-csr" class="btn fx-csr-download fx-csr-download-secondary" href="{{asset($file_private)}}" download=""><i class="bi bi-download"></i> دانلود کلید خصوصی</a></div></div>
                    <hr class="fx-csr-divider">
                    <div class="fx-csr-result"><div class="fx-csr-result-head"><div class="fx-csr-heading-icon"><i class="bi bi-file-earmark-lock2-fill"></i></div><div><h3>گواهی امضای الکترونیکی (CSR)</h3><p class="text-muted mb-0">فایل CSR تولیدشده برای ادامه فرایند دریافت گواهی و شناسه یکتای مالیاتی.</p></div></div><textarea name="csrkey" id="csrkey" class="form-control fx-csr-code" disabled="disabled" rows="10" cols="4">{!! $csr !!}</textarea><div class="mt-3"><a id="gen-csr" class="btn fx-csr-download fx-csr-download-primary" href="{{asset($file_csr)}}" download=""><i class="bi bi-download"></i> دانلود فایل CSR</a></div></div>
                    <hr class="fx-csr-divider">
                    <div class="text-center"><h3 class="mb-2">دانلود کلیدها و CSR به صورت یکجا</h3><p class="text-muted mb-4">هر سه فایل تولیدشده را در قالب یک فایل دریافت و در محل امن نگهداری کنید.</p><a id="gen-csr" class="btn fx-csr-download fx-csr-download-success" href="{{asset($file)}}" download=""><i class="bi bi-file-earmark-zip-fill"></i> دانلود یکجا</a></div>
                </section>
            @endif
        </div>
    </div>
@endsection
