@extends('layouts.dashboard')

@section('title','تیکت در جریان' )

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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">درخواست
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">اطلاعات مربوط به درخواست {{ $ticket->ticket_id }}#</small>
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
                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">اطلاعات پیام</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row g-9 mb-4">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bolder mb-2">عنوان: </label>
                                        <span class="fs-6 mb-2 badge badge-light-info">{{ $ticket->title }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row g-9 mb-4">
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="fs-5 fw-bolder mb-2">دسته‌بندی: </label>
                                        <span class="badge badge-light-primary">{{ $ticket->category->name }}</span>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-2 fv-row">
                                        <label class="fs-5 fw-bolder mb-2">اولویت: </label>
                                        @if($ticket->priority == "زیاد")
                                            <span class="badge badge-light-danger">زیاد</span>
                                        @elseif($ticket->priority == "متوسط")
                                            <span class="badge badge-light-warning">متوسط</span>
                                        @else
                                            <span class="badge badge-light-primary">کم</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-2 fv-row">
                                        <label class="fs-5 fw-bolder mb-2">وضعیت: </label>

                                        @if($ticket->status == "بسته شده")
                                            <span class="badge badge-light-danger">{{ $ticket->status }}</span>
                                        @else
                                            <span class="badge badge-light-primary">{{ $ticket->status }}</span>
                                        @endif
                                        <label class="fs-6 mb-2"></label>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="fs-5 fw-bolder mb-2">ایجاد شده در: </label>
                                            <td><a href="#" class="badge badge-light-primary">{{toPersianDateTime($ticket->created_at)}}</a></td>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-4 fv-row">
                                    <label class="fs-5 fw-bolder mb-2">متن پیام:</label>
                                    <span class="fs-6 mb-2">{{ $ticket->message }}</span>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-4">
                                    <label class="fs-5 fw-bolder mb-2">فایل ضمیمه:</label>
                                    <!--begin::Dropzone-->
                                    @if($ticket->media != null)
                                    <a class="btn btn-info badge" href="/images/tickets/{{Auth::user()->id}}/{{$ticket->media ? $ticket->media->url : 'http://placehold.it/400x400'}}">دانلود</a>
                                    @else
                                        فایل پیوستی وجود ندارد
                                    @endif
                                    <!--end::Dropzone-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Basic info-->
                    <!--begin::Messenger-->
                    <div class="card" id="kt_chat_messenger">
                        <!--begin::Card body-->
                        <div class="card-body" id="kt_chat_messenger_body">
                            <!--begin::Messages-->
                            <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" style="max-height: 176px;">
                            @foreach($ticket->comments as $comment)
                                @if( $comment->user_id == 1 )
                                    <!--begin::Message(out)-->
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-end">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Details-->
                                                    <style>
                                                        #ltr_set2 {
                                                            direction: ltr;
                                                        }
                                                    </style>
                                                    <div class="me-3">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">پشتیبان</a>
                                                        <div id="ltr_set2">
                                                            <span class="text-muted fs-7 mb-1">({{ $comment->created_at ?  $comment->created_at->diffForHumans() : ''}})</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Details-->
                                                    <!--begin::Avatar-->
                                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                        <span class="badge badge-light-success p-4 fw-bolder">B</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-700px text-end" data-kt-element="message-text">{!! $comment->comment !!}</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(out)-->
                                @else
                                        <!--begin::Message(in)-->
                                        <div class="d-flex justify-content-start">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-start">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Avatar-->
                                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                        <span class="badge badge-light-danger p-4 fw-bolder">A</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <style>
                                                        #ltr_set1 {
                                                            direction: ltr;
                                                        }
                                                    </style>
                                                    <div class="me-3" style="margin-right: 5px;">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1"> «{{ $comment->user->first_name }} {{$comment->user->last_name}}»</a>
                                                        <div id="ltr_set1" class="mr-2">
                                                            <span class="text-muted fs-7 mb-1">({{ $comment->created_at ?  $comment->created_at->diffForHumans() : ''}})</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-700px text-start" data-kt-element="message-text">{{ $comment->comment }}</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(in)-->
                                    @endif
                                @endforeach
                            </div>
                            <!--end::Messages-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                            <!--begin::Input-->
                            <form action="{{ route('UserTickets.PostComment') }}" method="POST" class="form">
                                {!! csrf_field() !!}
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                @if( hasRole(\App\Models\Role::ADMIN) )
                                    <textarea id="kt_docs_tinymce_hidden" name="comment" class="tox-target" rows="3"></textarea>
                                @else
                                    <textarea class="form-control form-control-flush mb-3" rows="1" name="comment" data-kt-element="input" placeholder="پیام جدید خود را در این قسمت بنویسید." required></textarea>
                                @endif
                                <!--end::Input-->
                                <!--begin:Toolbar-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Send-->
                                    <button class="btn btn-primary" type="submit">ارسال</button>
                                    <!--end::Send-->
                                </div>
                            </form>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Messenger-->
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
