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
                    <form class="form" role="form" method="POST" action="/phone/checkcode">
                        {{ csrf_field() }}
                        <label class="label" for="">تلفن همراه:</label>
                        <input class="form-control" value="{{ $phone }}" name="phone" disabled>
                        <input class="form-control d-none" value="{{ $phone }}" name="phone" >
                        <label class="label" for="">محل ورود کد 4 رقمی:</label>
                        <input class="form-control" id="code" type="text" class="form-control" name="code" maxlength="4" value="{{ old('code') }}" placeholder="محل ورود کد 4 رقمی"  autofocus required>
                        @if ($errors->has('phone'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('phone') }}</span>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                            <button type="submit" class="btn btn-success w-100">تایید کد وارد شده</button>
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
