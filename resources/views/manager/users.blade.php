@extends('layouts.dashboard')

@section('title', 'پیشخوان')

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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">لیست کاربران
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">تمام کاربران ثبت شده را در این بخش مشاهده نمایید.</small>
                        <!--end::Description--></h1>
                    <!--end::Title-->

                </div>
                <!--end::Page title-->
                <!--begin::Page Action-->
                <div class="row mt-5 mb-5 text-end">
                    <div class="col d-flex justify-content-end">
                        <a href="{{route('user.create')}}" class="btn btn-primary badge">ثبت کاربر جدید +</a>
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
                    <!--begin::Tables Widget-->
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
                                        <th class="min-w-120px">ردیف</th>
                                        <th class="min-w-120px">نام</th>
                                        <th class="min-w-150px">شماره تماس</th>
                                        <th class="min-w-150px">ایمیل</th>
                                        <th class="min-w-150px">کدملی</th>
                                        <th class="min-w-150px">زمان ثبت نام</th>
                                        <th class="min-w-120px">عملیات</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @php($i = 0)
                                    @foreach($users as $user)
                                        @if(hasRole(\App\Models\Role::ADMIN, $user))
                                            @continue
                                        @endif
                                        <tr>
                                            <td scope="row">{{++$i}}</td>
                                            <td>{{getFullName($user)}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->national_code}}</td>
                                            <td>{{toPersianDateTime($user->created_at)}}</td>
                                            <td style="min-width: 200px">
                                                <a  class="details-link badge  btn-success" href="{{route('user.detail', $user->id)}}">اطلاعات</a>
                                                <a  class="details-link badge  btn-info" data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}">ویرایش</a>
                                                <a  class="edit-link btn-warning badge" data-bs-toggle="modal" data-bs-target="#pasReset{{$user->id}}">بازیابی رمز</a>
                                                <a  class=" btn-primary badge" href="{{route('user.login-with-id', $user->id)}}">ورود به پنل کاربر</a>
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




        @foreach($users as $user)
            <!--begin::Modal - New Target-->
            <div class="modal fade" id="pasReset{{$user->id}}" tabindex="-1" aria-hidden="true">
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
                                <h1 class="mb-3">بازیابی رمز عبور</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="row gy-5 g-xl-8 align-items-start d-flex">
                                <div class="col-xl-12">
                                    <div class="rounded border-gray-700 border-1 border-gray-300 border-dashed px-7 py-3">
                                        <span class="fw-bolder fs-4 text-danger">نکته مهم: </span>
                                        <span class="fs-6">
                                 «بعد از فشردن کلید بازیابی ,  <strong>  رمزعبور </strong> نامبرده به <strong> کدملی</strong> وی تغییر خواهد کرد.»
                                </span>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <form action="{{route('user.reset.password.other')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-primary login-btn text-white" ><i class="fa fa-edit"></i> بازیابی رمز</button>
                                    </form>
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

        @foreach($users as $user)
            <!--begin::Modal - New Target-->
            <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" aria-hidden="true">
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
                                <h1 class="mb-3">ویرایش اطلاعات</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="row gy-5 g-xl-8 align-items-start d-flex">
                                <div class="col-xl-12  rounded border-gray-700 border-1 border-gray-300 border-dashed px-7 py-3">
                                    <form class="form" method="post" action="{{route('user.update.other')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="cTitle"> نام :</label>
                                                    <input type="text" id="cTitle" value="{{$user->first_name}}"  class="form-control form-control-solid required" required name="first_name" placeholder="نام را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="familt"> نام خانوادگی :</label>
                                                    <input type="text" id="family" value="{{$user->last_name}}"  class="form-control form-control-solid required" required name="last_name" placeholder="نام خانوادگی را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="code"> کد ملی :</label>
                                                    <input type="text" id="code" value="{{$user->national_code}}" class="form-control form-control-solid required" required name="national_code" placeholder="کد ملی را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="mobile"> شماره موبایل :</label>
                                                    <input type="text" id="mobile" value="{{$user->mobile}}" class="form-control form-control-solid required" required name="mobile" placeholder="شماره موبایل  را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="password"> رمز(در صورتی نیاز تغییر دهید.) :</label>
                                                    <input type="password" id="password"  class="form-control form-control-solid"  name="password" placeholder="رمز جدید را در صورت نیاز به تعویض وارد نمایید(حداقل 6 کاراکتر)" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">

                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="checkout-apt-number" >جنسیت : </label>
                                                    <select name="gender" class="form-control form-control-solid">
                                                        <option value="male" @if($user->gender == 'male') selected @endif>مرد</option>
                                                        <option value="female" @if($user->gender == 'female') selected @endif>زن</option>

                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="email"> ایمیل :</label>
                                                    <input type="email" id="email" value="{{$user->email}}"  class="form-control form-control-solid required" required name="email" placeholder="ایمیل را وارد نمایید" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="fw-bolder required fs-6 fw-bold mb-2" for="pic">تصویر پرسنلی(در صورت نیاز به تغییر آپلود کنید.) :</label>
                                                    <input type="file" name="avatar" id="pic"  class="form-control form-control-solid "   placeholder="" >
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                                                <button type="submit" class="btn btn-primary login-btn text-white place-order"><i class="fa fa-edit"></i> ثبت تغییرات</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        <script>
            // $.fn.dataTable.ext.classes.sPageButton = '';
            $.extend( true, $.fn.dataTable.defaults, {
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                    "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",
                    "infoPostFix": "",
                    "infoFiltered": "(فیلتر شده از _MAX_ ردیف)",
                    "loadingRecords": "در حال بارگزاری...",
                    "lengthMenu": "نمایش _MENU_ ردیف",
                    "paginate": {
                        "first": "برگه‌ی نخست",
                        "last": "برگه‌ی آخر",
                        "next": "بعدی",
                        "previous": "قبلی"
                    },
                    "processing": "در حال پردازش...",
                    "search": "جستجو:",
                    "searchPlaceholder": "",
                    "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
                    "emptyTable": "",
                    "aria": {
                        "sortAscending": ": فعال سازی نمایش به صورت صعودی",
                        "sortDescending": ": فعال سازی نمایش به صورت نزولی"
                    },
                    //only works for built-in buttons, not for custom buttons
                    "buttons": {
                        "create": "Neu",
                        "edit": "Ändern",
                        "remove": "Löschen",
                        "copy": "Kopieren",
                        "csv": "CSV-Datei",
                        "excel": "Excel-Tabelle",
                        "pdf": "PDF-Dokument",
                        "print": "Drucken",
                        "colvis": "Spalten Auswahl",
                        "collection": "Auswahl",
                        "upload": "Datei auswählen...."
                    },
                    "select": {
                        "rows": {
                            _: '%d Zeilen ausgewählt',
                            0: 'Zeile anklicken um auszuwählen',
                            1: 'Eine Zeile ausgewählt'
                        }
                    }
                }
            } );
            pdfMake.fonts = {
                Vazir: {
                    normal: 'Vazir.ttf',
                    bold: 'Vazir-Bold.ttf'

                }
            };
            $(document).ready(function() {
                var table = $('#example').DataTable({
                        dom: 'Bfrtip',
                        language: {
                            searchPlaceholder: "عنوان یا نام..."
                        },
                        "buttons": [
                            {extend: 'copy',text: 'کپی',exportOptions: {columns: [0,1,2,3,4,5]},title: '  مسؤلین سامانه'},
                            {extend: 'excel',text: 'اکسل',exportOptions: {columns: [0,1,2,3,4,5]},title: ' مسؤلین سامانه'},
                            // {extend: 'pdf',text: 'پی دی اف',exportOptions: {columns: ':visible'},
                            //     customize: function (doc) {
                            //         doc.defaultStyle.font = 'Vazir';
                            //         doc.defaultStyle.fontSize = 8;
                            //         doc.content[0].alignment = 'center';
                            //         doc.content[1].alignment = 'center';
                            //         },},
                            {extend: 'print',text: 'پرینت',exportOptions: {columns: [0,1,2,3,4,5]},title: ' مسؤلین سامانه'}],
                        searching: true,
                        iDisplayLength: 5,
                        columnDefs: [
                            { orderable: false, targets: [5] },
                            // { width: "100px", targets: 9 }
                        ]
                    }
                );
            } );

        </script>


@endsection
