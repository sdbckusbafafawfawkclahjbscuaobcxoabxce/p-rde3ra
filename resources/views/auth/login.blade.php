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
                    <div class="row" dir="ltr">
                        <div class="col-12 d-flex justify-content-end">
                            <ul class="nav nav-pills mb-3 text-center d-flex justify-content-end" id="pills-tab"
                                role="tablist">
                                <li class="nav-item d-flex justify-content-end">
                                    <a class="btn btn-sm btn-light active m-1" data-toggle="pill" href="#p1" role="tab"
                                       aria-controls="pills-home" aria-selected="true">ورود با موبایل</a>
                                </li>
                                <li class="nav-item d-flex justify-content-end">
                                    <a class="btn btn-sm btn-light m-1" data-toggle="pill" href="#p2" role="tab"
                                       aria-controls="pills-profile" aria-selected="false">ورود با ایمیل</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active " id="p1" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="text-center">
                              <i class="fas fa-fingerprint text-lg"></i>
                            </div>
                            <form id="login" class="form" role="form" method="POST" action="/phone/checkphone">
                                {{ csrf_field() }}
                                <label class="label" for="phone">شماره موبایل:</label>
                                <input id="phone" type="number" class="mb-2 hiddennumberarrow form-control"
                                       name="phone" maxlength="11" value="{{ old('phone') }}" placeholder="شماره موبایل"
                                       autofocus required>
                                @if ($errors->has('phone'))
                                    <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('phone') }}</span>
                                @endif
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                                    <button type="submit" class="btn btn-success btn-lg w-100">ورود</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form id="login" class="form" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <label class="label" for="email">ایمیل:</label>
                                <input class="mb-2 form-control" id="email" type="email" name="email"
                                       value="{{ old('email') }}" placeholder="آدرس ايميل" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('email') }}</span>
                                @endif
                                <label class="label" for="password">رمز عبور:</label>
                                <input class="mb-2 form-control" id="password" type="password"
                                       name="password" placeholder="کلمه عبور" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('password') }}</span>
                                @endif
                                <div class="mt-2 mb-2">
                                    <button type="submit" class="btn btn-success btn-lg w-100">ورود</button>
                                </div>
                            </form>
                            <div class="border border-bottom-0 border-left-0 border-right-0">
                                <a href="/register" class="btn btn-sm btn-primary w-100">برای ثبت نام اینجا کلیک کنید</a>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <a href="/password/reset">رمز عبورتان را فراموش کرده‌اید؟</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
