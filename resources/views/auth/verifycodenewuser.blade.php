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
                    <h4 class="mt-3 mr-1">تایید تلفن همراه:</h4>
                    <hr>
                    <form class="form px-2" method="POST" action="{{asset('/phone/checkcode')}}">
                        {{ csrf_field() }}
                        <input class="form-control" value="{{ $phone }}" name="phone" disabled>
                        <input class="form-control d-none" value="{{ $phone }}" name="phone" >
                        <br>
                        <label class="mt-2 mr-3 p-0">نام و نام خانوادگی:</label>
                        <input class="form-control" id="username" type="text" class="form-control" name="username" minlength="2" value="{{ old('username') }}" placeholder="نام و نام خانوادگی"  autofocus required>
                        <br>
                        <label class="mt-2 mr-3 p-0">محل ورود کد 4 رقمی:</label>
                        <input class="form-control" id="code" type="text" class="form-control" name="code" maxlength="4" value="{{ old('code') }}" placeholder="محل ورود کد 4 رقمی" required>
                        @if ($errors->has('phone'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('phone') }}</span>
                        @endif
                        <br>
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                            <button type="submit" class="btn btn-dark w-100">تایید کد وارد شده</button>
                        </div>
                    </form>
                    <hr>
                    <div class="mb-3">
                        <a href="/login">آیا شماره را اشتباه وارد کردید؟</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
