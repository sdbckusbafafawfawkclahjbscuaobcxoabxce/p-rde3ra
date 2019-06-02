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
                    <h4 class="mt-3 mr-1">تغییر پسورد:</h4>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('action_user_changepassword') }}">
                        {{ csrf_field() }}
                        <label> کلمه عبور فعلی </label>
                        <input id="current-password" type="password" class="mb-2  form-control" name="current-password" placeholder="کلمه عبور فعلی" required>
                        @if ($errors->has('current-password'))
                            <span class="text-danger mt-2 mb-3">{{ $errors->first('current-password') }}</span>
                        @endif
                        <label> کلمه عبور جدید </label>
                        <input id="new-password" type="password" class="mb-2  form-control" name="new-password" placeholder="کلمه عبور جدید" required>
                        @if ($errors->has('new-password'))
                            <span class="text-danger mt-2 mb-3">{{ $errors->first('new-password') }}</span>
                        @endif
                        <label> تکرار کلمه عبور جدید</label>
                        <input id="new-password-confirmation" type="password" class="mb-2 form-control" name="new-password-confirmation" placeholder="تکرار کلمه عبور جدید"
                               required>
                        @if ($errors->has('new-password-confirmation'))
                            <span class="text-danger mt-2 mb-3">{{ $errors->first('new-password-confirmation') }}</span>
                        @endif
                        <div class="mt-2 mb-2">
                            <button type="submit" class="btn btn-success btn-lg w-100 ">تغییر پسورد</button>
                        </div>
                        <div class="d-flex justify-content-center pb-1">
                            <a class="btn btn-sm btn-warning btn-block" href="/user">
                               انصراف
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection