{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('layouts.user.user_panel')

@section('content')
    @include('layouts.user.user_sidebar')
    <main role="main" class="col-lg-9 order-first">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">داشبورد</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="mr-2" dir="ltr">
                    <button class="m-1 btn btn-outline-secondary d-flex" onclick="openWin(document.getElementById('content').innerHTML)">
                        <i class="fas fa-print pr-1 pt-1"></i>
                        پرینت
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div id="content" class="p-3">
                <h4>عنوان بخش</h4>
                <hr>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </div>
        </div>
    </main>
@endsection
