@extends('layouts.dashboard')

@section('title', 'پیشخوان')

@section('content')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <span class="content-header d-flex">
            <h3 class="mr-3 " style="border-bottom: 2px darkcyan solid">ویرایش نقش "{{$role->persian_name}}"</h3>
        </span>
        <div class="content-body">

            <form action="{{route('role.update')}}" id="form" method="post" class="">
                @csrf
                <input type="hidden" name="role_id" value="{{$role->id}}">
                <div class=" flex-column align-items-between my-1 p-0">
                    @if(\Illuminate\Support\Facades\Session::get('fail'))
                        <h6 class=" m-auto alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('fail')}}</h6>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::get('success'))
                        <h6 class=" m-auto alert alert-success"> {{\Illuminate\Support\Facades\Session::get('success')}}</h6>
                    @endif
                </div>

                <fieldset class="px-0">
                    <section id="checkout-address" class="list-view product-checkout">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="cTitle">عنوان فارسی نقش :</label>
                                                <input type="text" id="cTitle" value="{{$role->persian_name}}"  class="form-control required" required name="persian_name" placeholder="عنوان فارسی نقش را وارد نمایید" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="cTitle"> نماد انگلیسی :</label>
                                                <input type="text" id="cTitle"  value="{{$role->name}}"  class="form-control required" required name="name" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="cTitle"> نام آدرس ریدایرکت(بعد از ورود) :</label>
                                                <input type="text" id="cTitle"  value="{{$role->redirect_route}}"  class="form-control required" required name="redirect_route" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="cTitle"> نوع نقش(مثلا مدیر یک نقش عمومی و مجری یک نقش خصوصی است) :</label>
                                                <select type="text" id="cTitle"    class="form-control required" required name="type"  >
                                                    <option value="{{\App\Models\Role::TYPE_PUBLIC}}" @if($role->type == \App\Models\Role::TYPE_PUBLIC) selected @endif>عمومی</option>
                                                    <option value="{{\App\Models\Role::TYPE_PRIVATE}}" @if($role->type == \App\Models\Role::TYPE_PRIVATE) selected @endif>خصوصی</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="dropdown-divider col-12"></div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="cTitle">  دسترسی های عمومی :</label>
                                                <div class="row mb-0 mt-1">
                                                    @php($i = 0)
                                                    @foreach($routes as $route)
                                                        @php($i++)
                                                    <div class="col-4">
                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"  name="permissions[{{$route}}]" id="customCheck{{$i}}" @if(roleHasPermission($role, $route) == true) checked @endif>
                                                                <label class="custom-control-label" for="customCheck{{$i}}">{{$route}}</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    @endforeach


                                                </div>

                                            </div>
                                        </div>
                                        <div class="dropdown-divider col-12"></div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="cTitle">  دسترسی های اختصاصی :</label>
                                                <div class="row mb-0 mt-1">

                                                    @foreach($special_permissions as $permission)
                                                    <div class="col-4">
                                                        <fieldset >
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"  name="special_permissions[{{$permission->name}}]" id="special_permissions{{$permission->id}}" @if(roleHasSpecialPermission($role, $permission->name) == true) checked @endif>
                                                                <label class="custom-control-label" for="special_permissions{{$permission->id}}">{{$permission->name . '('. $permission->description . ')'}}</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    @endforeach



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn login-btn btn-primary text-white place-order mt-2">ثبت تغییرات نقش</button>
                                </div>
                            </div>
                        </div>
                    </section>

                </fieldset>
            </form>

        </div>
    </div>
</div>
@endsection

