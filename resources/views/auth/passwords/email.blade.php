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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h4 class="mt-3 mr-1">بازیابی پسورد:</h4>
                        <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <label for="email" class="col-md-4 control-label">آدرس ایمیل:</label>
                        <input id="email" type="email" class="mb-2 form-control" name="email" value="{{ old('email') }}"
                               required>
                        @if ($errors->has('email'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('email') }}</span>
                        @endif
                        <div class="mt-2 mb-2">
                            <button type="submit" class="btn btn-success btn-lg w-100 ">ارسال ایمیل بازیابی پسورد
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
