<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--begin::Fonts-->
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />--}}
    <link rel="stylesheet" href="{{asset('dash-assets/fonts/poppins-v24-latin-regular.woff2')}}" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dash-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash-assets/css/font.dash.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('dash-assets/media/illustrations/dozzy-1/14.png')}}">
        <!--begin::Authentication-->
        @yield('content')
        <!--end::Authentication-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="/" class="text-muted text-hover-primary px-2">درباره ما</a>
                <a href="/" class="text-muted text-hover-primary px-2">شرایط و ضوابط</a>
                <a href="/" class="text-muted text-hover-primary px-2">تماس با ما</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src={{asset('dash-assets/plugins/global/plugins.bundle.js')}}></script>
<script src={{asset('dash-assets/js/scripts.bundle.js')}}></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('dash-assets/js/custom/authentication/password-reset/new-password.js')}}"></script>
<script src="{{asset('dash-assets/js/custom/authentication/password-reset/password-reset.js')}}"></script>
<script src="{{asset('dash-assets/js/custom/authentication/sign-in/two-steps.js')}}"></script>
<script src="{{asset('dash-assets/js/custom/authentication/sign-in/general.js')}}"></script>
<script src="{{asset('dash-assets/js/custom/authentication/sign-up/general.js')}}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
