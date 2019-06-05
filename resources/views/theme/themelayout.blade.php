{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}


<!--
..%%%%...%%%%%%..%%.......%%%%....%%%%............%%%%....%%%%...%%%%%%..%%%%%%..%%...%%...%%%%...%%%%%...%%%%%%..........%%%%%%..%%%%%%...%%%%...%%...%%.
.%%........%%....%%......%%..%%..%%..............%%......%%..%%..%%........%%....%%...%%..%%..%%..%%..%%..%%................%%....%%......%%..%%..%%%.%%%.
.%%.%%%....%%....%%......%%%%%%...%%%%............%%%%...%%..%%..%%%%......%%....%%.%.%%..%%%%%%..%%%%%...%%%%..............%%....%%%%....%%%%%%..%%.%.%%.
.%%..%%....%%....%%......%%..%%......%%..............%%..%%..%%..%%........%%....%%%%%%%..%%..%%..%%..%%..%%................%%....%%......%%..%%..%%...%%.
..%%%%...%%%%%%..%%%%%%..%%..%%...%%%%............%%%%....%%%%...%%........%%.....%%.%%...%%..%%..%%..%%..%%%%%%............%%....%%%%%%..%%..%%..%%...%%.
..........................................................................................................................................................

............................................................................................................................
.%%...%%..%%...%%..%%...%%...........%%%%...%%%%%%..%%.......%%%%....%%%%...%%...%%..%%%%%%..%%%%%...........%%%%%%..%%%%%..
.%%...%%..%%...%%..%%...%%..........%%........%%....%%......%%..%%..%%......%%...%%..%%......%%..%%............%%....%%..%%.
.%%.%.%%..%%.%.%%..%%.%.%%..........%%.%%%....%%....%%......%%%%%%...%%%%...%%.%.%%..%%%%....%%%%%.............%%....%%%%%..
.%%%%%%%..%%%%%%%..%%%%%%%....%%....%%..%%....%%....%%......%%..%%......%%..%%%%%%%..%%......%%..%%....%%......%%....%%..%%.
..%%.%%....%%.%%....%%.%%.....%%.....%%%%...%%%%%%..%%%%%%..%%..%%...%%%%....%%.%%...%%%%%%..%%%%%.....%%....%%%%%%..%%..%%.
............................................................................................................................
-->
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
    <link href="{{ asset('defaultassets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('defaultassets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('themeassets/pardesara/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('themeassets/pardesara/css/slider.css') }}" rel="stylesheet">

</head>
<body class="d-felx m-0 p-0 container-fluid">
<!-- Start alert top -->
<div class="alert-top w-100 m-0 d-flex justify-content-center">
    <p>
       آیا می خواهید آگهی خود را در پورتال بانک پرده ثبت کنید؟
        <a href="/login" class="text-decoration-none text-light btn">برای شروع اینجا کلیک کنید</a>
    </p>
</div>
<!-- End alert top -->

@yield('content')

<!-- Start footer -->
<footer>
    <div class="footer d-flex flex-wrap flex-row-reverse justify-content-center align-items-center pb-4">
        <div class="mx-sm-3 links d-flex flex-column justify-content-center align-items-center">
            <h4>پرده سرا</h4>
            <a class="m-3" href="#">درباره پرده سرا</a>
            <a class="m-3" href="#">قوانین و مقررات</a>
            <a class="m-3" href="#">تماس با ما</a>
            <a class="m-3" href="#">سوالات متداول</a>
        </div>
        <div class="mx-sm-3 about d-flex flex-column justify-content-center align-items-center">
            <h4 class="m-3">حس خوب سفارش و تحویل آنلاین پرده</h4>
            <p class="m-3">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>
        </div>
        <div class="mx-sm-3 symbol">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <a class="m-2" href="#"><img width="300px" src="/themeassets/pardesara/img/nemad.png" alt="nemad"></a>
            </div>
            <div class="symbol-icon d-flex flex-row justify-content-center align-items-center">
                <div class="d-flex justify-content-center align-items-center m-2"><a href="#"><img src="/themeassets/pardesara/img/facebook.png" alt="facebook"></a></div>
                <div class="d-flex justify-content-center align-items-center m-2"><a href="#"><span></span><img src="/themeassets/pardesara/img/twitter.png" alt="twitter"></a></div>
                <div class="d-flex justify-content-center align-items-center m-2"><a href="#"><span></span><img src="/themeassets/pardesara/img/instagram.png" alt="instagram"></a></div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->

<script src="/themeassets/pardesara/js/jquery-3.3.1.slim.min.js"></script>
<script src="/themeassets/pardesara/js/popper.min.js"></script>
<script src="/themeassets/pardesara/js/bootstrap.min.js"></script>
<script src="/themeassets/pardesara/js/slick.js"></script>
<script src="/themeassets/pardesara/js/slider.js"></script>
</body>
</html>
<!--
..%%%%...%%%%%%..%%.......%%%%....%%%%............%%%%....%%%%...%%%%%%..%%%%%%..%%...%%...%%%%...%%%%%...%%%%%%..........%%%%%%..%%%%%%...%%%%...%%...%%.
.%%........%%....%%......%%..%%..%%..............%%......%%..%%..%%........%%....%%...%%..%%..%%..%%..%%..%%................%%....%%......%%..%%..%%%.%%%.
.%%.%%%....%%....%%......%%%%%%...%%%%............%%%%...%%..%%..%%%%......%%....%%.%.%%..%%%%%%..%%%%%...%%%%..............%%....%%%%....%%%%%%..%%.%.%%.
.%%..%%....%%....%%......%%..%%......%%..............%%..%%..%%..%%........%%....%%%%%%%..%%..%%..%%..%%..%%................%%....%%......%%..%%..%%...%%.
..%%%%...%%%%%%..%%%%%%..%%..%%...%%%%............%%%%....%%%%...%%........%%.....%%.%%...%%..%%..%%..%%..%%%%%%............%%....%%%%%%..%%..%%..%%...%%.
..........................................................................................................................................................

............................................................................................................................
.%%...%%..%%...%%..%%...%%...........%%%%...%%%%%%..%%.......%%%%....%%%%...%%...%%..%%%%%%..%%%%%...........%%%%%%..%%%%%..
.%%...%%..%%...%%..%%...%%..........%%........%%....%%......%%..%%..%%......%%...%%..%%......%%..%%............%%....%%..%%.
.%%.%.%%..%%.%.%%..%%.%.%%..........%%.%%%....%%....%%......%%%%%%...%%%%...%%.%.%%..%%%%....%%%%%.............%%....%%%%%..
.%%%%%%%..%%%%%%%..%%%%%%%....%%....%%..%%....%%....%%......%%..%%......%%..%%%%%%%..%%......%%..%%....%%......%%....%%..%%.
..%%.%%....%%.%%....%%.%%.....%%.....%%%%...%%%%%%..%%%%%%..%%..%%...%%%%....%%.%%...%%%%%%..%%%%%.....%%....%%%%%%..%%..%%.
............................................................................................................................
-->