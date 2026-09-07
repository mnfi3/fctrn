@php use App\Models\Moadian\Product;use App\Models\Moadian\Unit; @endphp
    <!DOCTYPE html>

<html>
<head>
    <link href="/Content/css/Factor.css" rel="stylesheet"/>
{{--    <script type="text/javascript" src="/Content/Scripts/jquery.min.js"></script>--}}
    <script src="{{asset('dash-assets/js/jquery3.7.1.min.js')}}"></script>
    <title id="pagetitle">پرینت صورتحساب</title>

    <meta name="twitter:image"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="/Content/Images/favicon.png"/>
    <link rel="icon" href="/Content/Images/favicon.png"/>
    <link rel="shortcut icon" href="/Content/Images/favicon.png"/>
    <link rel="apple-touch-icon" href="/Content/Images/favicon.png"/>
    <meta name="theme-color" content="#346566"/>
    <meta name="msapplication-navbutton-color" content="#346566"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#346566"/>


    <style>
        .tblcover {
            background: url(../../content/files/sign/);
            background-repeat: no-repeat;
            background-position: left;
            background-size: cover
        }

        .tblcover.hide-bg {
            background-image: none;
        }

        .hader-table {
            text-align: center;
            vertical-align: middle;
            border-top: 1.0pt solid windowtext;
        }

        body {
            direction: rtl;
            font-family: "Shabnam-Light", tahoma;
            color: windowtext;
            font-style: normal;
            text-decoration: none;
            font-size: 9.0pt;
            font-weight: 800;
        }

        .titer-table {
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            background: #F2F2F2;
            background-color: rgb(242, 242, 242);
            background-position-x: 0%;
            background-position-y: 0%;
            background-repeat: repeat;
            background-attachment: scroll;
            background-image: none;
            background-size: auto;
            background-origin: padding-box;
            background-clip: border-box;
        }

        .info {
            text-align: right;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            padding-right: 10px;
        }

        .titer-product {
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            word-wrap: break-word;
        }

        .product-table {
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
        }

        .product-table {
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
        }

        .footer-table {
            position: relative;
            z-index: 1;
            text-align: right;
            vertical-align: top;
            border-top: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            padding-right: 10px;
            padding-top: 6px;
        }
    </style>
    <link href="{{ asset('dash-assets/css/font.dash.css') }}" rel="stylesheet" type="text/css" />

</head>
<body oncontextmenu="return false">


<div id="main-container" align=center style=" margin-top:10px;">
    <input id="GuidCode" type="hidden" name="GuidCode" value="43a49a27-1b7d-4b5e-a6df-1f3116e35600"/>
    <table class="tblcover" border=0 cellpadding=0 cellspacing=0 style='border-collapse: collapse; width: auto;  '>

        <tr>
            <td colspan="4" height=38 class=hader-table
                style='border-right: .5pt solid windowtext; padding-right: 10px; text-align: right'>شماره مالیاتی: <span
                    id="modeltaxid">{{$invoice->taxid}}</span></td>
            <td colspan="3" style="border-top: .5pt solid windowtext;"></td>
            @if($invoice->status == 'draft')
                <td rowspan="2" colspan="15" class="hader-table" style="padding-left:160px;font-size:20px">
                    پیش فاکتور فروش کالا/خدمات
                </td>
            @else
                <td rowspan="2" colspan="15" class="hader-table" style="padding-left:160px;font-size:20px">صورتحساب فروش
                    کالا و خدمات
                </td>
            @endif
            <td colspan="2" class="info" width="29" style='border:none;border-top:.5pt solid windowtext;'>شماره:

                {{$invoice->number}}

            </td>
            <td colspan="2" class=titer-product width=83
                style='border: none; border-top: .5pt solid windowtext; border-left: .5pt solid windowtext;'></td>
        </tr>
        <tr>
            <td colspan="4"
                style='border-right: .5pt solid windowtext; padding-right: 10px; padding-bottom: 5px; text-align: right'>
                تاریخ ارسال: <span id="modelissuedate">
                            <span>{{toPersianDateTime($invoice->sent_at)}}</span>


                    </span>
            </td>
            <td colspan="3"></td>


            <td colspan="2" class=info style='border: none;padding-bottom:5px;'>تاریخ
                صدور: {{ toPersianDate(date('Y-m-d', intval($invoice->indatim/1000)))}}</td>
            <td colspan="2" class=titer-product
                style='border: none; border-left: .5pt solid windowtext; padding-bottom: 5px; '></td>
        </tr>


        <tr height=30>
            <td colspan=25 class=titer-table>
                مشخصات فروشنده
            </td>

        </tr>
        <tr height=27>
            <td colspan=8 class=info>
                نام شخص حقوقی: {{optional($invoice->taxpayer)->name}}
            </td>
            <td colspan=5 class=info>
                شماره ثبت:{{optional($invoice->taxpayer)->insert_number}}
            </td>
             <td colspan=8 class=info>
                کد شعبه فروشنده : {{$invoice->sbc}}
            </td>
            <td colspan=4 class=info>
                کداقتصادی: {{optional($invoice->taxpayer)->economic_code}}
            </td>

        </tr>
        <tr height=27>
            <td colspan=3 class=info>
                استان:{{optional($invoice->taxpayer)->state}}
            </td>
            <td colspan=4 class=info>
                شهرستان:{{optional($invoice->taxpayer)->city}}
            </td>
            <td colspan=14 class=info>
                تلفن: {{optional($invoice->taxpayer)->phone}}
            </td>
            <td colspan=4 class=info>
                شناسه ملی: {{optional($invoice->taxpayer)->national_id}}
            </td>

        </tr>
        <tr height=27>
            <td colspan=17 class=info>
                نشانی: {{optional($invoice->taxpayer)->address}}
            </td>
            <td colspan=4 class=info>
                فکس: {{optional($invoice->taxpayer)->fax}}
            </td>
            <td colspan=4 class=info>
                کدپستی: {{optional($invoice->taxpayer)->postal_code}}
            </td>

        </tr>

        <tr height=32>
            <td colspan=25 class=titer-table>
                مشخصات خریدار
            </td>

        </tr>
        <tr height=27>
            <td colspan=8 class=info>

                نام شخص حقوقی: <span id="customername">{{optional($invoice->customer)->name}}</span>
            </td>
            <td colspan=5 class=info>
                شماره ثبت:{{optional($invoice->customer)->insert_number}}
            </td>
                        <td colspan=8 class=info>
                کد شعبه خریدار : {{$invoice->bbc}}
            </td>

            <td colspan=4 class=info>
                کد اقتصادی: {{optional($invoice->customer)->economic_code}}
            </td>

        </tr>
        <tr height=27>
            <td colspan=3 class=info>
                استان: {{optional($invoice->customer)->state}}
            </td>
            <td colspan=4 class=info>
                شهرستان: {{optional($invoice->customer)->city}}
            </td>
            <td colspan=14 class=info>
                تلفن: {{optional($invoice->customer)->phone}}
            </td>
            <td colspan=4 class=info>
                شناسه ملی: {{optional($invoice->customer)->national_code}}
            </td>

        </tr>
        <tr height=27>
            <td colspan=17 class=info>
                نشانی: {{optional($invoice->customer)->address}}
            </td>
            <td colspan=4 class=info>
                فکس:{{optional($invoice->customer)->fax}}
            </td>
            <td colspan=4 class=info>
                کدپستی: {{optional($invoice->customer)->postal_code}}
            </td>

        </tr>

        <tr>
            <td colspan=25 height=27 class=titer-table>
                مشخصات كالا یا خدمات
            </td>
        </tr>
        <tr>
            <td height=69 width="5%" class=titer-product> ردیف</td>
            <td colspan=3 class="titer-product" style="width:250px"> كالا یا خدمات</td>
            <td colspan=1 class="titer-product" style="width:40px">واحد اندازه گیری</td>
            <td colspan=1 class="titer-product" style="width:40px">تعداد/مقدار</td>
            <td colspan=2 class="titer-product" style="width:120px">مبلغ واحد (ریال)</td>
            <td colspan=5 class="titer-product" style="width:150px">مبلغ قبل از تخفیف (ریال)</td>
            <td colspan=4 class="titer-product" style="width:120px"> مبلغ تخفیف (ریال)</td>
            <td colspan=5 class="titer-product" style="width:150px">مبلغ پس از تخفیف (ریال)</td>
            <td colspan=2 class="titer-product" style="width:150px"> مالیات بر ارزش افزوده (ریال)</td>
            <td colspan=2 class="titer-product" style="width:150px">مبلغ کل (ریال)</td>
        </tr>

        @php($i = 0)
        @foreach($invoice->items as $item)
            <tr>
                <td height=29 class="product-table">{{++$i}}</td>
                <td colspan=3 class="product-table text-right">
{{--                    @php($product = Product::where('taxTpStoPartCode', '=', $item->sstid)->first())--}}
{{--                    {{$product->descriptionOfId.'-'.$product->taxTpStoPartCode}}--}}
                    {{$item->sstt}}
                </td>
                <td colspan=1 class="product-table">
                    @php($unit = Unit::where('UnitCode', '=', $item->mu)->first())
                    {{$unit->Unit}}
                </td>
                <td colspan=1 class="product-table">
                    {{$item->am}}
                </td>

                <td colspan=2 class="product-table">{{number_format($item->fee)}}</td>

                <td colspan=5 class="product-table">{{number_format($item->prdis)}}</td>
                <td colspan=4 class="product-table">{{number_format($item->dis)}}</td>
                <td colspan=5 class="product-table">{{number_format($item->adis)}}</td>

                <td colspan=2 class="product-table">{{number_format($item->vam)}}</td>
                <td colspan=2 class="product-table">{{number_format($item->tsstam)}}</td>

            </tr>
        @endforeach

{{--        <tr>--}}
{{--            <td height=29 class="product-table">4</td>--}}
{{--            <td colspan=3 class="product-table text-right"></td>--}}
{{--            <td colspan=1 class="product-table"></td>--}}
{{--            <td colspan=2 class="product-table"></td>--}}

{{--            <td colspan=5 class="product-table"></td>--}}
{{--            <td colspan=4 class="product-table"></td>--}}
{{--            <td colspan=5 class="product-table"></td>--}}

{{--            <td colspan=2 class="product-table"></td>--}}
{{--            <td colspan=2 class="product-table"></td>--}}

{{--        </tr>--}}
       {{--  <tr>--}}
         {{--    <td  colspan=27 height=29 class="product-table"></td>--}}
       {{--  </tr>--}}


        <tr>
            <td colspan=5 height=34 class="product-table">

                مجموع تخفیفات: {{number_format($invoice->tdis)}} ریال
            </td>
            <td colspan=10 height=34 class="product-table">

                مجموع مالیات بر ارزش افزوده: {{number_format($invoice->tvam)}} ریال
            </td>

            <td colspan=11 height=34 class="product-table"  style="font-size:17px">

                مجموع صورتحساب: {{number_format($invoice->tbill)}} ریال
            </td>
{{--            <td colspan=5 class="product-table">0</td>--}}
{{--            <td colspan=4 class="product-table">60,000,000</td>--}}
{{--            <td colspan=2 class="product-table">5,400,000</td>--}}
        </tr>


        <tr height=34>

            <td colspan=10 class="footer-table">

                <span>روش تسویه:</span>
                <?php
                    switch ($invoice->setm){
                        case 1: echo 'نقد';break;
                        case 2: echo 'نسیه';break;
                        case 3: echo 'نقد/ نسیه';break;
                    }
                ?>
                <span> --- موضوع صورت حساب:</span>
                <?php
                    switch ($invoice->ins){
                        case 1: echo 'اصلی';break;
                        case 2: echo 'اصلاحی';break;
                        case 3: echo 'ابطالی';break;
                        case 4: echo 'برگشت از فروش';break;
                    }
                ?>
            </td>

            <td colspan="16" class=footer-table>
                <span>نوع صورتحساب:</span> نوع {{$invoice->inty}}
                <span> --- الگوی صورتحساب:</span>
                <?php
                    switch ($invoice->inp){
                        case 1:echo 'فروش';break;
                        case 2:echo 'فروش ارزی';break;
                        case 3:echo 'صورت حساب طلا، جواهر، پلاتین';break;
                        case 4:echo 'قرارداد پیمانکاری';break;
                        case 5:echo 'قبوض خدماتی';break;
                        case 6:echo 'بلیط هواپیما';break;
                        case 7:echo 'صاردات';break;
                    }
                ?>
            </td>
            {{--            <td rowspan="2" class="footer-table" style="text-align:center;vertical-align:middle">--}}
            {{--                <img width="75" height="75" src="data:image/png;base64,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dPPlxqE3NU0X+kamcfaCEv0oTdOFvpEpjTZMM79BvyFTO7rZ9Bp6g6ba0c2XG4fe1DRd6BuZxtkLSvSjNE0X+kamNNowzfwG/YZM7ehm02voDZpqRzdfbhx6U9N0oW9kGmcvKNGP0jRd6BuZ0mjDNPMb9BsytaObTa+hN2iqHd18uXHoTU3Thb6RaZy9oEQ/yrV+Ko02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhtr/dQ4e0GJfpRr/VQabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY021vqpcfaCEv0o1/qpNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabaz1U+PsBSX6Ua71U2m0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNpY66fG2QtK9KNc66fSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0sdZPjbMXlOhHudZPpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaGOtnxpnLyjRj3Ktn0qjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdHGWj81zl5Qoh/lWj+VRhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjjbV+apy9oEQ/yrV+Ko02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhtr/dQ4e0GJfpRr/VQabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY021vqpcfaCEv0o1/qpNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabaz1U+PsBSX6Ua71U2m0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNpY66fG2QtK9KNc66fSaMOURhumNNowpdGGKY02TGm0YUqjDVMabZjSaMOURhumNNowpdGGKY02TGm0sdZPjbMXlOhH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NppqRzc31Y5uXt8rjTaaSqONpsbZC0r0ozS1o5svl0YbpjTaaKod3Xy5NNowpdFGU2m00VQ7urmpdnTz+l5ptNFUGm00Nc5eUKIfpek19Abre6XRRlNptGFKow1TO7rZlEYbpjTaaCqNNkxptGFKow1TGm2s9a82XfZFJPqRm15Db7C+VxptNJVGG6Y02jC1o5tNabRhSqONptJow5RGG6Y02jCl0cZa/2rTZV9Eoh+56TX0But7pdFGU2m0YUqjDVM7utmURhumNNpoKo02TGm0YUqjDVMabaz1rzZd9kUk+pGbXkNvsL5XGm00lUYbpjTaMLWjm01ptGFKo42m0mjDlEYbpjTaMKXRxlr/atNlX0SiH7npNfQG63ul0UZTabRhSqMNUzu62ZRGG6Y02mgqjTZMabRhSqMNUxptrPWvNl32RST6kZteQ2+wvlcabTSVRhumNNowtaObTWm0YUqjjabSaMOURhumNNowpdHGWv9q02VfRKIfuek19Abre6XRRlNptGFKow1TO7rZlEYbpjTaaCqNNkxptGFKow1TGm2s9a82XfZFJPqRm15Db7C+VxptNJVGG6Y02jC1o5tNabRhSqONptJow5RGG6Y02jCl0cZa/2rTZV9Eoh+56TX0But7pdFGU2m0YUqjDVM7utmURhumNNpoKo02TGm0YUqjDVMabaz1rzZd9kUk+pGbXkNvsL5XGm00lUYbpjTaMLWjm01ptGFKo42m0mjDlEYbpjTaMKXRxlr/atNlX0SiH7npNfQG63ul0UZTabRhSqMNUzu62ZRGG6Y02mgqjTZMabRhSqMNUxptrPWvNl32RST6kZteQ2+wvlcabTSVRhumNNowtaObTWm0YUqjjabSaMOURhumNNowpdHGWv9q02VfRKIfuek19Abre6XRRlNptGFKow1TO7rZlEYbpjTaaCqNNkxptGFKow1TGm2s9a82XfZFJPqRm15Db7C+VxptNJVGG6Y02jC1o5tNabRhSqONptJow5RGG6Y02jCl0cZa/2rTZV9Eoh+56TX0But7pdFGU2m0YUqjDVM7utmURhumNNpoKo02TGm0YUqjDVMabaz1rzZd9kUk+pGbXkNvsL5XGm00lUYbpjTaMLWjm01ptGFKo42m0mjDlEYbpjTaMKXRxlr/atNlX0SiH7npNfQG63ul0UZTabRhSqMNUzu62ZRGG6Y02mgqjTZMabRhSqMNUxptrPWvNl32RST6kZteQ2+wvlcabTSVRhumNNowtaObTWm0YUqjjabSaMOURhumNNowpdHGWv9q02VfRKIfuek19Abre6XRRlNptGFKow1TO7rZlEYbpjTaaCqNNkxptGFKow1TGm2s9a82XfZFJPqRm15Db7C+VxptNJVGG6Y02jC1o5tNabRhSqONptJow5RGG6Y02jCl0cZa/2rTZV9k5h9G/5Fdn/caegNTGm1cLo021uel0YapHd3cVBptmF5Db3C5NNowjbMXnPmH0X8U1+e9ht7AlEYbl0ujjfV5abRhakc3N5VGG6bX0BtcLo02TOPsBWf+YfQfxfV5r6E3MKXRxuXSaGN9XhptmNrRzU2l0YbpNfQGl0ujDdM4e8GZfxj9R3F93mvoDUxptHG5NNpYn5dGG6Z2dHNTabRheg29weXSaMM0zl5w5h9G/1Fcn/caegNTGm1cLo021uel0YapHd3cVBptmF5Db3C5NNowjbMXnPmH0X8U1+e9ht7AlEYbl0ujjfV5abRhakc3N5VGG6bX0BtcLo02TOPsBWf+YfQfxfV5r6E3MKXRxuXSaGN9XhptmNrRzU2l0YbpNfQGl0ujDdM4e8GZfxj9R3F93mvoDUxptHG5NNpYn5dGG6Z2dHNTabRheg29weXSaMM0zl5w5h9G/1Fcn/caegNTGm1cLo021uel0YapHd3cVBptmF5Db3C5NNowjbMXnPmH0X8U1+e9ht7AlEYbl0ujjfV5abRhakc3N5VGG6bX0BtcLo02TOPsBWf+YfQfxfV5r6E3MKXRxuXSaGN9XhptmNrRzU2l0YbpNfQGl0ujDdM4e8GZfxj9R3F93mvoDUxptHG5NNpYn5dGG6Z2dHNTabRheg29weXSaMM0zl5w5h9G/1Fcn/caegNTGm1cLo021uel0YapHd3cVBptmF5Db3C5NNowjbMXnPmH0X8U1+e9ht7AlEYbl0ujjfV5abRhakc3N5VGG6bX0BtcLo02TOPsBWf+YfQfxfV5r6E3MKXRxuXSaGN9XhptmNrRzU2l0YbpNfQGl0ujDdM4e8GZfxj9R3F93mvoDUxptHG5NNpYn5dGG6Z2dHNTabRheg29weXSaMM0zl5w5h9G/1Fcn/caegNTGm1cLo021uel0YapHd3cVBptmF5Db3C5NNowjbMXnPmH0X8U1+e9ht7AlEYbl0ujjfV5abRhakc3N5VGG6bX0BtcLo02TOPsBWf+YfQfxfV5r6E3MKXRxuXSaGN9XhptmNrRzU2l0YbpNfQGl0ujDdM4e8GZfxj9R3F93mvoDUxptHG5NNpYn5dGG6Z2dHNTabRheg29weXSaMM0zl5Qoh/lWj+VRhvr89rRzabX0BuY2tHNpulC38iURhumNNpoKo02TGm00dTMb+wXI9Ef4Vo/lUYb6/Pa0c2m19AbmNrRzabpQt/IlEYbpjTaaCqNNkxptNHUzG/sFyPRH+FaP5VGG+vz2tHNptfQG5ja0c2m6ULfyJRGG6Y02mgqjTZMabTR1Mxv7Bcj0R/hWj+VRhvr89rRzabX0BuY2tHNpulC38iURhumNNpoKo02TGm00dTMb+wXI9Ef4Vo/lUYb6/Pa0c2m19AbmNrRzabpQt/IlEYbpjTaaCqNNkxptNHUzG/sFyPRH+FaP5VGG+vz2tHNptfQG5ja0c2m6ULfyJRGG6Y02mgqjTZMabTR1Mxv7Bcj0R/hWj+VRhvr89rRzabX0BuY2tHNpulC38iURhumNNpoKo02TGm00dTMb+wXI9Ef4Vo/lUYb6/Pa0c2m19AbmNrRzabpQt/IlEYbpjTaaCqNNkxptNHUzG/sFyPRH+FaP5VGG+vz2tHNptfQG5ja0c2m6ULfyJRGG6Y02mgqjTZMabTR1Mxv7Bcj0R/hWj+VRhvr89rRzabX0BuY2tHNpulC38iURhumNNpoKo02TGm00dTMb+wXI9Ef4Vo/lUYb6/Pa0c2m19AbmNrRzabpQt/IlEYbpjTaaCqNNkxptNHUzG/sFyPRH+FaP5VGG+vz2tHNptfQG5ja0c2m6ULfyJRGG6Y02mgqjTZMabTR1Mxv7Bcj0R/hWj+VRhvr89rRzabX0BuY2tHNpulC38iURhumNNpoKo02TGm00dTMb+wXI9Ef4Vo/lUYb6/Pa0c2m19AbmNrRzabpQt/IlEYbpjTaaCqNNkxptNHUzG/sFyPRH+FaP5VGG+vz2tHNptfQG5ja0c2m6ULfyJRGG6Y02mgqjTZMabTR1Mxv7Bcj0R/hWj+VRhvr89rRzabX0BuY2tHNpulC38iURhumNNpoKo02TGm00dTMb+wXI9Ef4Vo/lUYb6/Pa0c2m19AbmNrRzabpQt/IlEYbpjTaaCqNNkxptNHUzG/sFyPRH+FaP5VGG+vz2tHNptfQG5ja0c2m6ULfyJRGG6Y02mgqjTZMabTR1Mxv7Bcj0R/hWj+VRhvr89rRzabX0BuY2tHNpulC38iURhumNNpoKo02TGm00dTMb+wXI9Ef4Vo/lUYb6/Pa0c2m19AbmNrRzabpQt/IlEYbpjTaaCqNNkxptNHUzG/sFyPRH6FputA3MqXRxvq8NNowzW30zU1ptGFKow1TGm2Y0mjjcmm0YXoNvYHpNfQGpnH2ghL9KE3Thb6RKY021uel0YZpbqNvbkqjDVMabZjSaMOURhuXS6MN02voDUyvoTcwjbMXlOhHaZou9I1MabSxPi+NNkxzG31zUxptmNJow5RGG6Y02rhcGm2YXkNvYHoNvYFpnL2gRD9K03Shb2RKo431eWm0YZrb6Jub0mjDlEYbpjTaMKXRxuXSaMP0GnoD02voDUzj7AUl+lGapgt9I1MabazPS6MN09xG39yURhumNNowpdGGKY02LpdGG6bX0BuYXkNvYBpnLyjRj9I0XegbmdJoY31eGm2Y5jb65qY02jCl0YYpjTZMabRxuTTaML2G3sD0GnoD0zh7QYl+lKbpQt/IlEYb6/PSaMM0t9E3N6XRhimNNkxptGFKo43LpdGG6TX0BqbX0BuYxtkLSvSjNE0X+kamNNpYn5dGG6a5jb65KY02TGm0YUqjDVMabVwujTZMr6E3ML2G3sA0zl5Qoh+labrQNzKl0cb6vDTaMM1t9M1NabRhSqMNUxptmNJo43JptGF6Db2B6TX0BqZx9oIS/ShN04W+kSmNNtbnpdGGaW6jb25Kow1TGm2Y0mjDlEYbl0ujDdNr6A1Mr6E3MI2zF5ToR2maLvSNTGm0sT4vjTZMcxt9c1MabZjSaMOURhumNNq4XBptmF5Db2B6Db2BaZy9oEQ/StN0oW9kSqON9XlptGGa2+ibm9Jow5RGG6Y02jCl0cbl0mjD9Bp6A9Nr6A1M4+wFJfpRmqYLfSNTGm2sz0ujDdPcRt/clEYbpjTaMKXRhimNNi6XRhum19AbmF5Db2AaZy8o0Y/SNF3oG5nSaGN9XhptmOY2+uamNNowpdGGKY02TGm0cbk02jC9ht7A9Bp6A9M4e0GJfpSm6ULfyJRGG+vz0mjDNLfRNzel0YYpjTZMabRhSqONy6XRhuk19Aam19AbmMbZC0r0ozRNF/pGpjTaWJ+XRhumuY2+uSmNNkxptGFKow1TGm1cLo02TK+hNzC9ht7ANM5eUKIfpWm60DcypdHG+rw02jDNbfTNTWm0YUqjDVMabZjSaONyabRheg29gek19AamcfaCEv0oTdOFvpEpjTbW56XRhmluo29uSqMNUxptmNJow5RGG5dLow3Ta+gNTK+hNzCNsxeU6Edpmi70jUxptLE+L402THMbfXNTGm2Y0mjDlEYbpjTauFwabZheQ29geg29gWmcvaBEP0rTdKFvZEqjjfV5abRhmtvom5vSaMOURhumNNowpdHG5dJow/QaegPTa+gNTOPsBSX6UZrSaONyabRhSqMNUxptmMahNzWNQ29qmtvomzf1GnqDtX4qjTZM4+wFJfpRmtJo43JptGFKow1TGm2YxqE3NY1Db2qa2+ibN/UaeoO1fiqNNkzj7AUl+lGa0mjjcmm0YUqjDVMabZjGoTc1jUNvaprb6Js39Rp6g7V+Ko02TOPsBSX6UZrSaONyabRhSqMNUxptmMahNzWNQ29qmtvomzf1GnqDtX4qjTZM4+wFJfpRmtJo43JptGFKow1TGm2YxqE3NY1Db2qa2+ibN/UaeoO1fiqNNkzj7AUl+lGa0mjjcmm0YUqjDVMabZjGoTc1jUNvaprb6Js39Rp6g7V+Ko02TOPsBSX6UZrSaONyabRhSqMNUxptmMahNzWNQ29qmtvomzf1GnqDtX4qjTZM4+wFJfpRmtJo43JptGFKow1TGm2YxqE3NY1Db2qa2+ibN/UaeoO1fiqNNkzj7AUl+lGa0mjjcmm0YUqjDVMabZjGoTc1jUNvaprb6Js39Rp6g7V+Ko02TOPsBSX6UZrSaONyabRhSqMNUxptmMahNzWNQ29qmtvomzf1GnqDtX4qjTZM4+wFJfpRmtJo43JptGFKow1TGm2YxqE3NY1Db2qa2+ibN/UaeoO1fiqNNkzj7AUl+lGa0mjjcmm0YUqjDVMabZjGoTc1jUNvaprb6Js39Rp6g7V+Ko02TOPsBSX6UZrSaONyabRhSqMNUxptmMahNzWNQ29qmtvomzf1GnqDtX4qjTZM4+wFJfpRmtJo43JptGFKow1TGm2YxqE3NY1Db2qa2+ibN/UaeoO1fiqNNkzj7AUl+lGa0mjjcmm0YUqjDVMabZjGoTc1jUNvaprb6Js39Rp6g7V+Ko02TOPsBSX6UZrSaONyabRhSqMNUxptmMahNzWNQ29qmtvomzf1GnqDtX4qjTZM4+wFJfpRmtJo43JptGFKow1TGm2YxqE3NY1Db2qa2+ibN/UaeoO1fiqNNkzj7AUl+lGa0mjjcmm0YUqjDVMabZjGoTc1jUNvaprb6Js39Rp6g7V+Ko02TOPsBSX6UZrSaONyabRhSqMNUxptmMahNzWNQ29qmtvomzf1GnqDtX4qjTZM4+wFJfpRmtJo43JptGFKow1TGm2YxqE3NY1Db2qa2+ibN/UaeoO1fiqNNkzj7AUl+lGa0mjjcmm0YUqjjabSaKOpNNowpdHG+l7t6Ob1ea+hN2gqjTZMabRhSqMNUzu62TTOXlCiH6UpjTYul0YbpjTaaCqNNppKow1TGm2s79WObl6f9xp6g6bSaMOURhumNNowtaObTePsBSX6UZrSaONyabRhSqONptJoo6k02jCl0cb6Xu3o5vV5r6E3aCqNNkxptGFKow1TO7rZNM5eUKIfpSmNNi6XRhumNNpoKo02mkqjDVMabazv1Y5uXp/3GnqDptJow5RGG6Y02jC1o5tN4+wFJfpRmtJo43JptGFKo42m0mijqTTaMKXRxvpe7ejm9XmvoTdoKo02TGm0YUqjDVM7utk0zl5Qoh+lKY02LpdGG6Y02mgqjTaaSqMNUxptrO/Vjm5en/caeoOm0mjDlEYbpjTaMLWjm03j7AUl+lGa0mjjcmm0YUqjjabSaKOpNNowpdHG+l7t6Ob1ea+hN2gqjTZMabRhSqMNUzu62TTOXlCiH6UpjTYul0YbpjTaaCqNNppKow1TGm2s79WObl6f9xp6g6bSaMOURhumNNowtaObTePsBSX6UZrSaONyabRhSqONptJoo6k02jCl0cb6Xu3o5vV5r6E3aCqNNkxptGFKow1TO7rZNM5eUKIfpSmNNi6XRhumNNpoKo02mkqjDVMabazv1Y5uXp/3GnqDptJow5RGG6Y02jC1o5tN4+wFJfpRmtJo43JptGFKo42m0mijqTTaMKXRxvpe7ejm9XmvoTdoKo02TGm0YUqjDVM7utk0zl5Qoh+lKY02LpdGG6Y02mgqjTaaSqMNUxptrO/Vjm5en/caeoOm0mjDlEYbpjTaMLWjm03j7AUl+lGa0mjjcmm0YUqjjabSaKOpNNowpdHG+l7t6Ob1ea+hN2gqjTZMabRhSqMNUzu62TTOXlCiH6UpjTYul0YbpjTaaCqNNppKow1TGm2s79WObl6f9xp6g6bSaMOURhumNNowtaObTePsBSX6UZrSaONyabRhSqONptJoo6k02jCl0cb6Xu3o5vV5r6E3aCqNNkxptGFKow1TO7rZNM5eUKIfpSmNNi6XRhumNNpoKo02mkqjDVMabazv1Y5uXp/3GnqDptJow5RGG6Y02jC1o5tN4+wFJfpRmtJo43JptGFKo42m0mijqTTaMKXRxvpe7ejm9XmvoTdoKo02TGm0YUqjDVM7utk0zl5Qoh+lKY02LpdGG6Y02mgqjTaaSqMNUxptrO/Vjm5en/caeoOm0mjDlEYbpjTaMLWjm03j7AUl+lGa0mjjcmm0YUqjjabSaKOpNNowpdHG+l7t6Ob1ea+hN2gqjTZMabRhSqMNUzu62TTOXlCiH6UpjTYul0YbpjTaaCqNNppKow1TGm2s79WObl6f9xp6g6bSaMOURhumNNowtaObTePsBSX6UZrSaONyabRhSqONdac02rhcGm00lUYbpnHoTU1ptGFKow1TGm2s75VGG6bpsi8i0Y/clEYbl0ujDVMabaw7pdHG5dJoo6k02jCNQ29qSqMNUxptmNJoY32vNNowTZd9EYl+5KY02rhcGm2Y0mhj3SmNNi6XRhtNpdGGaRx6U1MabZjSaMOURhvre6XRhmm67ItI9CM3pdHG5dJow5RGG+tOabRxuTTaaCqNNkzj0Jua0mjDlEYbpjTaWN8rjTZM02VfRKIfuSmNNi6XRhumNNpYd0qjjcul0UZTabRhGofe1JRGG6Y02jCl0cb6Xmm0YZou+yIS/chNabRxuTTaMKXRxrpTGm1cLo02mkqjDdM49KamNNowpdGGKY021vdKow3TdNkXkehHbkqjjcul0YYpjTbWndJo43JptNFUGm2YxqE3NaXRhimNNkxptLG+VxptmKbLvohEP3JTGm1cLo02TGm0se6URhuXS6ONptJowzQOvakpjTZMabRhSqON9b3SaMM0XfZFJPqRm9Jo43JptGFKo411pzTauFwabTSVRhumcehNTWm0YUqjDVMabazvlUYbpumyLyLRj9yURhuXS6MNUxptrDul0cbl0mijqTTaMI1Db2pKow1TGm2Y0mhjfa802jBNl30RiX7kpjTauFwabZjSaGPdKY02LpdGG02l0YZpHHpTUxptmNJow5RGG+t7pdGGabrsi0j0Izel0cbl0mjDlEYb605ptHG5NNpoKo02TOPQm5rSaMOURhumNNpY3yuNNkzTZV9Eoh+5KY02LpdGG6Y02lh3SqONy6XRRlNptGEah97UlEYbpjTaMKXRxvpeabRhmi77IhL9yE1ptHG5NNowpdHGulMabVwujTaaSqMN0zj0pqY02jCl0YYpjTbW90qjDdN02ReR6EduSqONy6XRhimNNtad0mjjcmm00VQabZjGoTc1pdGGKY02TGm0sb5XGm2Ypsu+iEQ/clMabVwujTZMabSx7pRGG5dLo42m0mjDNA69qSmNNkxptGFKo431vdJowzRd9kUk+pGb0mjjcmm0YUqjjXWnNNq4XBptNJVGG6Zx6E1NabRhSqMNUxptrO+VRhum6bIvItGP3JRGG5dLow1TGm2sO6XRxuXSaKOpNNowjUNvakqjDVMabZjSaGN9rzTaME2XfRGJfuSmNNq4XBptmNJoY90pjTYul0YbTaXRhmkcelNTGm2Y0mjDlEYb63ul0YZpuuyLSPQjN6XRxuXSaMOURhvrTmm0cbk02mgqjTZM49CbmtJow5RGG6Y02ljfK402TNNlX0SiH7lputA3MqXRRlNptGFKo42m0mjjcq+hNzC9ht7gcq+hN2iqHd1sakc3m6bLvohEP3LTdKFvZEqjjabSaMOURhtNpdHG5V5Db2B6Db3B5V5Db9BUO7rZ1I5uNk2XfRGJfuSm6ULfyJRGG02l0YYpjTaaSqONy72G3sD0GnqDy72G3qCpdnSzqR3dbJou+yIS/chN04W+kSmNNppKow1TGm00lUYbl3sNvYHpNfQGl3sNvUFT7ehmUzu62TRd9kUk+pGbpgt9I1MabTSVRhumNNpoKo02LvcaegPTa+gNLvcaeoOm2tHNpnZ0s2m67ItI9CM3TRf6RqY02mgqjTZMabTRVBptXO419Aam19AbXO419AZNtaObTe3oZtN02ReR6Edumi70jUxptNFUGm2Y0mijqTTauNxr6A1Mr6E3uNxr6A2aakc3m9rRzabpsi8i0Y/cNF3oG5nSaKOpNNowpdFGU2m0cbnX0BuYXkNvcLnX0Bs01Y5uNrWjm03TZV9Eoh+5abrQNzKl0UZTabRhSqONptJo43KvoTcwvYbe4HKvoTdoqh3dbGpHN5umy76IRD9y03Shb2RKo42m0mjDlEYbTaXRxuVeQ29geg29weVeQ2/QVDu62dSObjZNl30RiX7kpulC38iURhtNpdGGKY02mkqjjcu9ht7A9Bp6g8u9ht6gqXZ0s6kd3WyaLvsiEv3ITdOFvpEpjTaaSqMNUxptNJVGG5d7Db2B6TX0Bpd7Db1BU+3oZlM7utk0XfZFJPqRm6YLfSNTGm00lUYbpjTaaCqNNi73GnoD02voDS73GnqDptrRzaZ2dLNpuuyLSPQjN00X+kamNNpoKo02TGm00VQabVzuNfQGptfQG1zuNfQGTbWjm03t6GbTdNkXkehHbpou9I1MabTRVBptmNJoo6k02rjca+gNTK+hN7jca+gNmmpHN5va0c2m6bIvItGP3DRd6BuZ0mijqTTaMKXRRlNptHG519AbmF5Db3C519AbNNWObja1o5tN02VfRKIfuWm60DcypdFGU2m0YUqjjabSaONyr6E3ML2G3uByr6E3aKod3WxqRzebpsu+iEQ/ctN0oW9kSqONptJow5RGG02l0cblXkNvYHoNvcHlXkNv0FQ7utnUjm42TZd9EYl+5KbpQt/IlEYbTaXRhimNNppKo43LvYbewPQaeoPLvYbeoKl2dLOpHd1smi77IhL9yE3Thb6RKY02mkqjDVMabTSVRhuXew29gek19AaXew29QVPt6GZTO7rZNF32RST6ka/1U+3oZlMabZja0c2mNNowpdGGqR3dbEqjDVMabVwujTaaakc3rzvNbfvCEv3RrPVT7ehmUxptmNrRzaY02jCl0YapHd1sSqMNUxptXC6NNppqRzevO81t+8IS/dGs9VPt6GZTGm2Y2tHNpjTaMKXRhqkd3WxKow1TGm1cLo02mmpHN687zW37whL90az1U+3oZlMabZja0c2mNNowpdGGqR3dbEqjDVMabVwujTaaakc3rzvNbfvCEv3RrPVT7ehmUxptmNrRzaY02jCl0YapHd1sSqMNUxptXC6NNppqRzevO81t+8IS/dGs9VPt6GZTGm2Y2tHNpjTaMKXRhqkd3WxKow1TGm1cLo02mmpHN687zW37whL90az1U+3oZlMabZja0c2mNNowpdGGqR3dbEqjDVMabVwujTaaakc3rzvNbfvCEv3RrPVT7ehmUxptmNrRzaY02jCl0YapHd1sSqMNUxptXC6NNppqRzevO81t+8IS/dGs9VPt6GZTGm2Y2tHNpjTaMKXRhqkd3WxKow1TGm1cLo02mmpHN687zW37whL90az1U+3oZlMabZja0c2mNNowpdGGqR3dbEqjDVMabVwujTaaakc3rzvNbfvCEv3RrPVT7ehmUxptmNrRzaY02jCl0YapHd1sSqMNUxptXC6NNppqRzevO81t+8IS/dGs9VPt6GZTGm2Y2tHNpjTaMKXRhqkd3WxKow1TGm1cLo02mmpHN687zW37whL90az1U+3oZlMabZja0c2mNNowpdGGqR3dbEqjDVMabVwujTaaakc3rzvNbfvCEv3RrPVT7ehmUxptmNrRzaY02jCl0YapHd1sSqMNUxptXC6NNppqRzevO81t+8IS/dGs9VPt6GZTGm2Y2tHNpjTaMKXRhqkd3WxKow1TGm1cLo02mmpHN687zW37whL90az1U+3oZlMabZja0c2mNNowpdGGqR3dbEqjDVMabVwujTaaakc3rzvNbfvCEv3RrPVT7ehmUxptmNrRzaY02jCl0YapHd1sSqMNUxptXC6NNppqRzevO81t+8IS/dGs9VPt6GZTGm2Y2tHNpjTaMKXRhqkd3WxKow1TGm1cLo02mmpHN687zW37whL90az1U+3oZlMabZja0c2mNNowpdGGqR3dbEqjDVMabVwujTaaakc3rzvNbfvCEv3RrPVT7ehmUxptmNrRzaY02jCl0YapHd1sSqMNUxptXC6NNppqRzevO81t+8IzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTMzMzMzM/MH+wf1zMzMzMzMzB/sH9QzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTMzMzMzM/MH+wf1zMzMzMzMzB/sH9QzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTMzMzMzM/MH+wf1zMzMzMzMzB/sH9QzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTMzMzMzM/MH+wf1zMzMzMzMzB/sH9QzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTMzMzMzM/MH+wf1zMzMzMzMzB/sH9QzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTMzMzMzM/MH+wf1zMzMzMzMzB/sH9QzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTMzMzMzM/MH+wf1zMzMzMzMzB/sH9QzMzMzMzMzf7B/UM/MzMzMzMz8wf5BPTP/v/06JgAAgGEY5F91p2G5wQUAAEAg1AAAABAINQAAAARCDQAAAIFQAwAAQCDUAAAAEAg1AAAABEINAAAAgVADAABAINQAAAAQCDUAAAAEQg0AAACBUAMAAEAg1AAAABAINQAAAARCDQAAAIFQAwAAQCDUAAAAEAg1AAAABEINAAAAgVADAABAINQAAAAQCDUAAAAEQg0AAACBUAMAAEAg1AAAABAINQAAAARCDQAAAIFQAwAAQCDUAAAAEAg1AAAABEINAAAAgVADAABAINQAAAAQCDUAAAAEQg0AAACBUAMAAEAg1AAAABAINQAAAARCDQAAAIFQAwAAQCDUAAAAEAg1AAAABEINAAAAgVADAABAINQAAAAQCDUAAAAEQg0AAACBUAMAAEAg1AAAAPC2Hcn7ASeO5sOGAAAAAElFTkSuQmCC" alt="Scan Me" />--}}
            {{--            </td>--}}

        </tr>
        <tr height=100>

            <td colspan=10 class="footer-table">

                مهر و امضاء فروشنده:


            </td>


            <td colspan=16 class=footer-table>
                مهر و امضاء خریدار:
            </td>

        </tr>

    </table>

</div>


<script type="text/javascript">
    $('#UserSendFactor').click(function () {

        $('#UserSendFactor').hide();
        $('#UserEditFactor').hide();
        $('#trpre').hide();

        let timerFormat = (s) => {
            return (s - (s %= 60)) / 60 + (9 < s ? ":" : ":0") + s;
        };

        let counter;
        let startTime = 120;

        timer = () => {
            startTime--;
            document.getElementById("countdown").innerHTML = "لطفا صبر نمایید " + timerFormat(startTime);
            if (startTime === 0) {
                clearInterval(counter);
                document.getElementById("TaxResult").innerHTML = "مجدد تلاش نمایید";
            }

        };
        counter = counter || setInterval(timer, 1000);

        var GuidCode = $("#GuidCode").val();
        var customername = $("#customername").val();

        $.ajax({
            type: 'POST',
            url: '/Invoice/SendTaxAsync',
            dataType: 'json',
            data: {id: GuidCode, internalno: false},
            success: function (data) {
                $('#countdown').hide();


                switch (data.Status) {
                    case 1:
                        document.getElementById("TaxResult").innerHTML = "صورتحساب ارسال شد";
                        document.getElementById("modeltaxid").innerHTML = data.ModelTaxId;
                        document.title = customername + " " + data.ModelTaxId;
                        document.getElementById("modelissuedate").innerHTML = data.IssueDate;
                        break;

                    case 4:
                        document.getElementById("TaxResult").innerHTML = "PENDING";
                        document.getElementById("PrintRefresh").innerHTML = "از دکمه استعلام لیست صورتحساب تلاش کنید";
                        document.title = customername;
                        document.getElementById("preerror").innerHTML = data.ErrorCode;
                        $('#trpre').show();

                        break;

                    default:
                        document.getElementById("TaxResult").innerHTML = "خطا";
                        document.getElementById("PrintRefresh").innerHTML = "برای تلاش مجدد کلیک کنید";
                        document.title = customername;
                        document.getElementById("preerror").innerHTML = data.ErrorCode;
                        $('#trpre').show();

                        break;
                }


                //$("#pricepan").hide();


                //document.getElementById("PriceDiscount").value = "0";


            },

            error: function (data) {

            }
        });

    });

    $('#PrintRefresh').click(function () {
        location.reload();
    });


    function printNoImg() {
        document.getElementById('sign').style.display = 'none';
        $('.tblcover').addClass("hide-bg");
        window.print();


        document.getElementById('sign').style.display = 'block';
        $('.tblcover').removeClass("hide-bg");
    }


</script>


<script>
    document.onkeydown = (e) => {
        if (e.key == 123) {
            e.preventDefault();
        }
        if (e.ctrlKey && e.shiftKey && e.key == 'I') {
            e.preventDefault();
        }
        if (e.ctrlKey && e.shiftKey && e.key == 'C') {
            e.preventDefault();
        }
        if (e.ctrlKey && e.shiftKey && e.key == 'J') {
            e.preventDefault();
        }
        if (e.ctrlKey && e.key == 'U') {
            e.preventDefault();
        }
    };
</script>


</body>
</html>
