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
                    <h4 class="mt-3 mr-1">ثبت پسورد جدید:</h4>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <label for="email" class="col-md-4 control-label">آدرس ایمیل:</label>
                        <input id="email" type="email" class="mb-2 form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('email') }}</span>
                        @endif
                        <label for="password" class="col-md-4 control-label">پسورد جدید:</label>
                        <input id="password" type="password" class="mb-2 form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('password') }}</span>
                        @endif
                        <label for="password-confirm" class="col-md-4 control-label">تکرار پسورد جدید:</label>
                        <input id="password-confirm" type="password" class="mb-2  form-control" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                        <div class="mt-2 mb-2">
                            <button type="submit" class="btn btn-success btn-lg w-100 ">تغییر پسورد</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
@endsection
