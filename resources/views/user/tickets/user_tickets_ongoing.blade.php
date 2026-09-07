@extends('layouts.dashboard')
@section('title', 'درخواست ها')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">درخواست‌های پشتیبانی در جریان
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">لیست پیام‌هایی که هنوز در جریان درخواست و دریافت پاسخ می‌باشند.</small>
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
                @if($tickets->isEmpty())
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
                                <div class="fs-6 text-gray-700 pe-7">در حال حاضر هیچ درخواست در جریانی ندارید. در صورت نیاز می‌توانید به بخش درخواست‌های بسته شده مراجعه نمایید.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                        <!--end::Notice-->
                @else
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
                                        <th class="min-w-120px">دسته‌بندی</th>
                                        <th class="min-w-150px">عنوان</th>
                                        <th class="min-w-150px">کاربر</th>
                                        <th class="min-w-150px">وضعیت</th>
                                        <th class="min-w-120px">شناسه</th>
                                        <th class="min-w-120px">اولویت</th>
                                        <th class="min-w-120px">آخرین بروزرسانی</th>
                                        <th class="min-w-120px">عملیات</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr class="text-center">
                                            <td>
                                                <a href="{{ url('user/tickets/ongoing/' . $ticket->ticket_id) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $ticket->category->name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ url('user/tickets/ongoing/' . $ticket->ticket_id) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $ticket->title }}</a>
                                            </td>
                                            @php
                                            $user = \App\Models\User::where('id',$ticket->user_id)->first();
                                            @endphp
                                            <td>
                                                <span class="badge badge-light-primary">{{getFullName($user)}}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-info">{{ $ticket->status }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-light-primary">{{ $ticket->ticket_id }}</span>
                                            </td>
                                            <td>
                                                @if($ticket->priority == "زیاد")
                                                    <span class="badge badge-light-danger">زیاد</span>
                                                @elseif($ticket->priority == "متوسط")
                                                    <span class="badge badge-light-warning">متوسط</span>
                                                @else
                                                    <span class="badge badge-light-primary">کم</span>
                                                @endif
                                            </td>
                                            @php
                                                $last_comment = \App\Models\Comment::where('ticket_id',$ticket->id)->latest()->first();
                                            @endphp
                                            @if($last_comment != null)
                                                <td><a href="#" class="badge badge-light-primary">{{toPersianDateTime($last_comment->updated_at)}}</a></td>
                                            @else
                                                <td><a href="#" class="badge badge-light-primary">{{toPersianDateTime($ticket->created_at)}}</a></td>
                                            @endif
                                            <td>
                                                <a href="{{ route('UserTickets.ShowOngoing',$ticket->ticket_id) }}" class="btn btn-primary badge">مشاهده</a>
                                                <a href="{{ route('UserTickets.closeTicket',$ticket->ticket_id) }}" class="btn btn-danger badge">بستن</a>
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
                            <div class="row mt-5 mb-5">
                                <div class="col d-flex justify-content-center">
                                    {{ $tickets->render() }}
                                </div>
                            </div>
                            <!--end::Table paginent-->
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
@endsection
