@extends('layouts.dashboard')
@section('title', 'مدیریت فایل')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="d-block">
                <div class="card-header flex-column align-items-between">
                    @if(\Illuminate\Support\Facades\Session::get('success'))
                        <h6 class=" m-auto alert alert-success">اطلاعات با موفقیت ذخیره شد.</h6>
                    @elseif(\Illuminate\Support\Facades\Session::get('fail'))
                        <h6 class=" m-auto alert alert-danger">خطا در ثبت اطلاعات</h6>
                    @endif
                </div>
                <!-- Responsive tables start -->
                <div class="row" id="table-hover-animation">
                    <div class="col-12">
                        <div class="card">
                            <div class="col-12 divider">
                                <h2 class=" mb-0 divider-text" style="font-size: 1rem; background: transparent">افزودن فایل</h2>
                            </div>
                            <form class="form p-2" method="post" action="{{route('file-manager.insert')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group input-divider-left">
                                                <input type="text" name="name" class="form-control" id="iconLeft2" placeholder="نام فایل" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="file" name="file" required
                                                       class="form-control-file">
                                                <label for="">انتخاب فایل</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success text-white m-5" style="max-width: 150px;text-align: center">ثبت فایل</button>
                                    </div>
                                    </div>
                            </form>

                                        <div class="col-12 divider">
                                            <h2 class=" mb-0 divider-text" style="font-size: 1rem; background: transparent">مدیریت فایل ها</h2>
                                        </div>

                                        <table class="table table-striped mb-0 w-100 m-5">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">عنوان</th>
                                                <th scope="col">لینک</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                            </thead>
                                            <tbody id="body">
                                            @php($i=0)
                                            @foreach($files as $file)
                                            <tr class="">
                                                <td>{{++$i}}</td>
                                                <td style="max-width: 100px">
                                                  {{$file->name}}
                                                </td>
                                                <td class="align-items-center" style="max-width: 500px;min-width: 200px">
                                                    <div class="form-group d-flex justify-content-start">
                                                        <input type="text" class="form-control" id="copy-to-clipboard-input" value="{{url('/').'/'.$file->path}}" style="max-width: 500px">
                                                        <div class="btn btn-orange-gradient text-dark " id="btn-copy" style="max-width: 100px">کپی</div>
                                                    </div>
                                                </td>
                                                <th><a href="{{route('file-manager.delete', $file->id)}}">حذف</a></th>

                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @if(count($files) == 0)
                                            <div class="content-body my-5" style="margin-top: 7rem">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <i class="fa fa-shopping-bag mb-3" style="font-size: 3rem"></i>
                                                    <h1 class="text-black-50 text-center"><span></span>موردی وجود ندارد</h1>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                        </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <nav aria-label="Page navigation example" class="">
                            <ul class="pagination justify-content-center mt-2">
                                {{$files->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Responsive tables end -->
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection

