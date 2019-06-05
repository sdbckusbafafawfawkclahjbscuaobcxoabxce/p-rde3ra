{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}


<?php
if (!isset($_SERVER['HTTPS'])) {
    $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //header("Location: $actual_link");
}
?>
        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @if(isset($generalinfo))
        <title>{{$generalinfo[0]->value}}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{$generalinfo[1]->value}}">
        <meta name="keywords" content="{{$generalinfo[2]->value}}">
        <meta name="author" content="{{$generalinfo[3]->value}}">
        <meta property=og:site_name content="{{$generalinfo[0]->value}}"/>
        <meta property=og:url content="{{$generalinfo[4]->value}}"/>
        <meta property=og:title content="{{$generalinfo[0]->value}}"/>
        <meta property=og:type content=website/>
        <meta property=og:image content="{{$generalinfo[5]->value}}"/>
        <meta property=og:description content="{{$generalinfo[1]->value}}"/>
        <meta name=og:keywords content="{{$generalinfo[2]->value}}"/>
        <link rel="icon" href="{{(isset($generalinfo[6]->value) && strlen($generalinfo[6]->value)>0)? $generalinfo[6]->value :'/defaultassets/img/theme_gilasweb_ir/fv_gray.png'}}">
    @else
        <title>صفحه بدون عنوان</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
@endif
<!-- Styles -->
    <link href="{{ asset('defaultassets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('defaultassets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class=" bgpa container-fluid text-right IRANSans " dir="rtl">
        <div class="row d-flex justify-content-center">
        <div class="col-md-10 my-4">
        <div class="row persianumber">
            @if(count($errors))
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="alert alert-danger text-right IRANSans" role="alert">
                                @foreach($errors->all() as $error)
                                    <strong>{{ $error }}</strong> - <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
            </div>
        </div>
    </div>
<img class="d-none d-md-block fixed-bottom bgpb imgbg" src="/themeassets/pardesara/img/footer.png"/>
<!-- Scripts -->
<script src="{{ asset('defaultassets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/persianumber.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/popper.js') }}"></script>
<script src="{{ asset('defaultassets/js/app.js') }}"></script>
<script>
    function openWin(content)
    {
        myWindow=window.open('','','width=695,height=820');
        myWindow.document.write('<div dir="rtl" class="pt-2 text-right">'+content+'</div><br>');
        myWindow.document.close(); //missing code
        myWindow.focus();
        myWindow.print();
    }
</script>

</body>
</html>

