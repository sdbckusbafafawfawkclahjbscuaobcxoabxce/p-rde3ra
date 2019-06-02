{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('theme.themelayout')

@section('content')
    <div class="container-fluid">
        <div class="row  sin2"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="min-height: 60vh">
                <center class="my-4">
                    <img src="{{$content->imgpath}}" class="img-fluid" style="max-width:100%;">
                </center>
                <div class="my-4 px-4 card px-2 bg-light  IRANSans text-right" dir="rtl">
                    <h4 class="mt-4 text-dark">{{$content->title}}</h4>
                    <style>
                        p img{
                            width: 100%;
                        }
                    </style>
                    <p class="des" style="font-family: IRANSans!important;">{!! htmlspecialchars_decode($content->description) !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
