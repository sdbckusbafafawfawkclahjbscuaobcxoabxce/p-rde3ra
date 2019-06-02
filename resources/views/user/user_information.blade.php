{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('layouts.user.user_panel')

@section('content')
    @include('layouts.user.user_sidebar')
    <main role="main" class="col-md-9 order-xs-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">داشبورد</h1>
        </div>
        <div class="card">
            <div id="content" class="p-3">
                <h4>اطلاعات حساب</h4>
                <hr>

                <form class="row form-horizontal" method="POST" action="{{ route('action_user_information') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-sm-12 pb-4">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-6 d-flex justify-content-center align-items-center">
                                <img src="{{(Auth::user()->imgpath !== null)? Auth::user()->imgpath : '/uploads/profile-default2.jpg'}}" class="card m-2" height="60px">
                                <label class="btn btn-primary btn-sm" for="userpic"> انتخاب تصویر پروفایل </label>
                                <input  id="userpic" type="file" class="d-none form-control" name="userpic">
                            </div>
                        </div>
                    </div>

<div class="col-sm-4">
                    <label for="name" class="control-label">نام و نام خانوادگی:</label>
                    <input placeholder="نام و نام خانوادگی" id="name" type="text" class="mb-2 form-control" name="name" value="{{ Auth::user()->name }}"
                           required autofocus>
                    @if ($errors->has('name'))
                        <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('name') }}</span>
                    @endif
</div>
<div class="col-sm-4">
                    <label for="phone" class="control-label">تلفن همراه:</label>
                    <input placeholder="تلفن همراه" id="phone" type="number" maxlength="11" class="mb-2 hiddennumberarrow form-control"
                           name="phone" value="{{ Auth::user()->phone }}"
                           required>
                    @if ($errors->has('phone'))
                        <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('phone') }}</span>
                    @endif
</div>
<div class="col-sm-4">
                    <label for="email" class="control-label">آدرس ایمیل:</label>
                    <input placeholder="آدرس ایمیل" id="email" type="email" class="mb-2 form-control" name="email" value="{{ Auth::user()->email }}"
                           required>

                    @if ($errors->has('email'))
                        <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('email') }}</span>
                    @endif
</div>
<div class="col-sm-12 border-top ">
<div class="row d-flex justify-content-center mt-2">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-sm btn-success btn-lg w-100 "> ثبت اطلاعات </button>
                    </div>
</div>
</div>
            </form>

            </div>
        </div>
    </main>
@endsection
