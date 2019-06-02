{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="row flex justify-content-center align-center">
            <div class="panel text-center border IRANSans" style="width: 400px">
                <div class="text-light panel-heading py-3 {{$class}}">
                    {{$message}}
                </div>
                <div class="panel-body" dir="rtl">
                    <br>
                    {{$error}}
                    <hr>
                    <a href="{{$prepage}}" class="btn btn-default pb-4"> برگشت به عقب </a>
                </div>
            </div>
        </div>
    </div>
@endsection