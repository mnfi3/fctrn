@php use App\Models\Academy; @endphp

@extends('layouts.dashboard')

@section('title', 'مدیریت آموزش‌ها')

@section('content')

    <div class="container-fluid">

        {{-- عنوان صفحه --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">مدیریت آموزش‌ها</h4>
                <p class="text-muted mb-0">
                    در این بخش می‌توانید آموزش‌ها را ایجاد، ویرایش و حذف کنید.
                </p>
            </div>

            <button type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#createTrainingModal">
                <i class="bi bi-plus-lg"></i>
                آموزش جدید
            </button>
        </div>


        {{-- پیام موفقیت --}}
        @if(\Illuminate\Support\Facades\Session::get('success'))
            <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                <span class="svg-icon svg-icon-2tx svg-icon-success me-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
                                                                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black" />
                                                                </svg>
                                                            </span>
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <!--begin::Content-->
                    <div class="mb-3 mb-md-0 fw-bold">
                        <h4 class="text-danger-900 fw-bolder">تایید!</h4>
                        <div class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
        @endif
        @if(\Illuminate\Support\Facades\Session::get('fail'))
            <!--begin::Notice-->
            <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                <span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                    </svg>
                                </span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <!--begin::Content-->
                    <div class="mb-3 mb-md-0 fw-bold">
                        <h4 class="text-danger-900 fw-bolder">خطا!</h4>
                        <div class="fs-6 text-gray-700 pe-7">{{\Illuminate\Support\Facades\Session::get('fail')}}</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
        @endif


        {{-- جدول آموزش‌ها --}}
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white py-3">
                <h5 class="mb-0">لیست آموزش‌ها</h5>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                        <tr>
                            <th width="100">#</th>
                            <th>عنوان</th>
                            <th>شماره آموزش</th>
                            <th>توضیحات کوتاه</th>
                            <th>تعداد بازدید</th>
                            <th width="170">عملیات</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($academies as $academy)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $academy->title }}
                                    </strong>
                                </td>
                                <td>
                                    <strong>
                                        {{ $academy->number }}
                                    </strong>
                                </td>

                                <td>
                                    <div style="max-width: 400px;">
                                        {{ \Illuminate\Support\Str::limit($academy->short_description, 200) }}
                                    </div>
                                </td>

                                <td>
                                    <strong>
                                        {{ $academy->show_count }}
                                    </strong>
                                </td>


                                <td>

                                    {{-- ویرایش --}}
                                    <button type="button"
                                            class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editTrainingModal{{ $academy->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>


                                    {{-- حذف --}}
                                    <form action="{{ route('admin.academy.delete') }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('آیا از حذف این آموزش مطمئن هستید؟');">
                                        <input type="hidden" name="id" value="{{$academy->id}}">

                                        @csrf


                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>


                            {{-- Modal ویرایش --}}
                            <div class="modal fade"
                                 id="editTrainingModal{{ $academy->id }}"
                                 tabindex="-1">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">

                                        <form action="{{ route('admin.academy.update') }}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$academy->id}}">

                                            <div class="modal-header">

                                                <h5 class="modal-title">
                                                    ویرایش آموزش
                                                </h5>

                                                <button type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"></button>

                                            </div>


                                            <div class="modal-body">

                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        عنوان آموزش
                                                    </label>

                                                    <input type="text"
                                                           name="title"
                                                           class="form-control"
                                                           placeholder="مثلاً آموزش ثبت نام در سامانه مودیان"
                                                           value="{{ $academy->title }}"
                                                           required>

                                                </div>


                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        لینک اسکریپت آپارات
                                                    </label>

                                                    <input type="text"
                                                           name="aparat_embeded"
                                                           class="form-control"
                                                           placeholder="لینک اسکریپ امبد"
                                                           value="{{ $academy->aparat_embeded }}">

                                                    <small class="text-muted">
                                                        لینک اسکریپت آپارات را وارد کنید.
                                                    </small>

                                                </div>

                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        لینک محلی ویدیو(در صورتی که از آپارات استفاده نمیکنید)
                                                    </label>

                                                    <input type="url"
                                                           name="video_path"
                                                           class="form-control"
                                                           placeholder="/uploads/video.mp4"
                                                           value="{{ $academy->video_path }}">

                                                    <small class="text-muted">
                                                        لینک ویدیو را وارد کنید.
                                                    </small>

                                                </div>


                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        توضیحات کوتاه
                                                    </label>

                                                    <textarea name="short_description"
                                                              class="form-control"
                                                              rows="2"
                                                              placeholder="توضیحات کوتاه مربوط به این آموزش...">{{ $academy->short_description}}</textarea>

                                                </div>


                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        توضیحات اصلی
                                                    </label>

                                                    <textarea name="description"
                                                              class="form-control"
                                                              rows="6"
                                                              placeholder="توضیحات اصلی مربوط به این آموزش...">{{ $academy->description }}</textarea>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <label class="form-label">
                                                            شماره آموزش
                                                        </label>

                                                        <input type="number"
                                                               name="number"
                                                               class="form-control"
                                                               value="{{$academy->number }}"
                                                        >

                                                    </div>




                                                </div>

                                            </div>


                                            <div class="modal-footer">

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    انصراف
                                                </button>

                                                <button type="submit"
                                                        class="btn btn-primary">
                                                    ویرایش آموزش
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5 text-muted">

                                    هنوز آموزشی ثبت نشده است.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
    {{-- Modal ایجاد آموزش --}}
    <div class="modal fade"
         id="createTrainingModal"
         tabindex="-1">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form action="{{ route('admin.academy.insert') }}"
                      method="POST">
                    @csrf

                    <div class="modal-header">

                        <h5 class="modal-title">
                            ایجاد آموزش جدید
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"></button>

                    </div>


                    <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label">
                                عنوان آموزش
                            </label>

                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   placeholder="مثلاً آموزش ثبت نام در سامانه مودیان"
                                   value="{{ old('title') }}"
                                   required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                لینک اسکریپت آپارات
                            </label>

                            <input type="text"
                                   name="aparat_embeded"
                                   class="form-control"
                                   placeholder="لینک اسکریپ امبد"
                                   value="{{ old('aparat_embeded') }}">

                            <small class="text-muted">
                                لینک اسکریپت آپارات را وارد کنید.
                            </small>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                لینک محلی ویدیو(در صورتی که از آپارات استفاده نمیکنید)
                            </label>

                            <input type="url"
                                   name="video_path"
                                   class="form-control"
                                   placeholder="/uploads/video.mp4"
                                   value="{{ old('video_path') }}">

                            <small class="text-muted">
                                لینک ویدیو را وارد کنید.
                            </small>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                توضیحات کوتاه
                            </label>

                            <textarea name="short_description"
                                      class="form-control"
                                      rows="2"
                                      placeholder="توضیحات کوتاه مربوط به این آموزش...">{{ old('short_description') }}</textarea>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                توضیحات اصلی
                            </label>

                            <textarea name="description"
                                      class="form-control"
                                      rows="6"
                                      placeholder="توضیحات اصلی مربوط به این آموزش...">{{ old('description') }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <label class="form-label">
                                    شماره آموزش
                                </label>

                                @php($last_number = ((Academy::orderBy('number', 'desc')->first()) == null) ? 0 :  Academy::orderBy('number', 'desc')->first()->number)
                                <input type="number"
                                       name="number"
                                       class="form-control"
                                       value="{{ old('number', $last_number + 1) }}"
                                >

                            </div>




                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            انصراف
                        </button>

                        <button type="submit"
                                class="btn btn-primary">
                            ایجاد آموزش
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection


