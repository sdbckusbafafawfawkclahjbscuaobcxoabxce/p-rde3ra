{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @if(!isset($generalinfo))
        @php $generalinfo = App\generalinfo::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get(); @endphp
    @endif
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
<body class="background-2 fullwidth-100vh">
    <div class="pt-5">
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
<!-- Scripts -->
<script src="{{ asset('defaultassets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/persianumber.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/popper.js') }}"></script>
<script src="{{ asset('defaultassets/js/app.js') }}"></script>
</body>
</html>
