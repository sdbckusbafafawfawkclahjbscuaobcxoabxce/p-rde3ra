{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('layouts.auth')

@section('content')
    <div class="container IRANSans">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card p-2 text-right" dir="rtl">
                    <h4 class="mt-3 mr-1">عضویت:</h4>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <label for="name" class="  control-label">نام و نام خانوادگی:</label>
                        <input id="name" type="text" class="mb-2 form-control" name="name" value="{{ old('name') }}"
                               required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('name') }}</span>
                        @endif
                        <label for="phone" class="  control-label">تلفن همراه:</label>

                        <input id="phone" type="number" maxlength="11" class="mb-2 hiddennumberarrow form-control"
                               name="phone" value="{{ old('phone') }}"
                               required>
                        @if ($errors->has('phone'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('phone') }}</span>
                        @endif
                        <label for="email" class="  control-label">آدرس ایمیل:</label>
                        <input id="email" type="email" class="mb-2 form-control" name="email" value="{{ old('email') }}"
                               required>

                        @if ($errors->has('email'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('email') }}</span>
                        @endif

                        <label for="password" class="  control-label">پسورد:</label>
                        <input id="password" type="password" class="mb-2 form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('password') }}</span>
                        @endif

                        <label for="password-confirm" class="  control-label">تکرار پسورد:</label>
                        <input id="password-confirm" type="password" class="mb-2 form-control"
                               name="password_confirmation" required>
                        <div class="mt-2 mb-2">
                            <button type="submit" class="btn btn-success btn-lg w-100 ">ثبت‌نام</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
