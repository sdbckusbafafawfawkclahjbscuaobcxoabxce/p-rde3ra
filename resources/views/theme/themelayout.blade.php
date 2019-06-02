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
    <link href="{{ asset('themeassets/blue-formal/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('defaultassets/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
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


    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm  navbar-light IRANSans " DIR="rtl">
            <a class="navbar-brand" href="/">
                <img src="{{$generalinfo['5']->value}}" HEIGHT="40px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-block d-sm-none">
                <ul class="mr-sm-5 navbar-nav justify-content-center align-items-center align-content-center">
                    <li class="d-none nav-item">
                        <a class="nav-link font-weight-bold" href="{{route('show_archive_all')}}">آرشیو مطالب</a>
                    </li>
                    @if(isset($allmenucontents))
                        @foreach($allmenucontents as $menucontent)
                            <li class="nav-item">
                                <a class="px-sm-3 nav-link font-weight-bold"
                                   href="{{route('show_single_sll',['content'=>$menucontent->slug])}}">{{$menucontent->title}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <span class=" GilasUserSet px-4">
                    @if(Auth::check())
                        <button>
                            خوش آمدید
                            @if(Auth::user()->name != 'none')
                                <strong>{{ Auth::user()->name }}</strong>
                            @else
                                <strong>{{ 'کاربر' }}</strong>
                            @endif
                            <i class="ion-arrow-down-b"></i>
                        </button>
                        <div class="list text-center">
                            <a href="/user">پنل کاربری</a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                خروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @else
                        <a class="btn btn-brandColor" href="/register">عضویت</a>
                        <a class="btn btn-brandColor" href="/login">ورود</a>
                    @endif
                </span>
                <hr class="d-block d-sm-none">
                <div class="d-block d-sm-none ">
                    <form class="pb-3 pb-sm-0 form-inline d-flex justify-content-center mr-sm-4" action="{{route('show_search_all')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row w-100">
                            <input class="col-7 form-control " name="key" type="text" placeholder="جستجو...">
                            <button class="col-5 btn btn-success" type="submit">جستجو</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-none d-sm-block ">
                <form class="pb-3 pb-sm-0 form-inline d-flex justify-content-center mr-sm-4" action="{{route('show_search_all')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row w-100">
                        <input class="col-7 form-control " name="key" type="text" placeholder="جستجو...">
                        <button class="col-5 btn btn-success" type="submit">جستجو</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>

    @yield('content')

    <div class="container-fluid sec-footer">
        <div class="row">
            <div class="col-12 sin">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card desc-box">
                                <div class="card-body">
                                    <div class="card-title">ارتباط با ما</div>
                                    <div class="card-text">
                                        <div class="row">
                                            <div class="col">
                                                <i class="fas fa-phone my-3 ml-3"></i>
                                                <a class="text-decoration-none text-light" href="tel:{{$generalinfo[9]->value}}"><span>{{$generalinfo[9]->value}}</span></a>
                                            </div><!--.col-->
                                        </div><!--.row-->
                                        <div class="row">
                                            <div class="col">
                                                <i class="fas fa-map-marker my-3 ml-3"></i>
                                                <a target="_blank"  class="text-decoration-none text-light" href="https://www.google.com/maps/search/{{$generalinfo[7]->value}}"><span>{{$generalinfo[7]->value}}</span></a>
                                            </div><!--.col-->
                                        </div><!--.row-->
                                        <div class="row">
                                            <div class="col">
                                                <i class="fas fa-envelope-open my-3 ml-3"></i>
                                                <a class="text-decoration-none text-light" href="mailto:{{$generalinfo[3]->value}}"><span>{{$generalinfo[3]->value}}</span></a>
                                            </div><!--.col-->
                                        </div><!--.row-->
                                    </div><!--.card-text-->
                                </div>
                            </div><!--.card-->
                        </div><!--.col-->

                        <div class="col-lg-4 text-center d-flex justify-content-center flex-column">
                            <i>
                                <img style="filter:invert(100%); max-height: 120px;" src="{{$generalinfo[5]->value}}" alt="Image">
                            </i>
                            <br>
                            <div class="pb-3">
                                @if(strlen($generalinfo[17]->value)>8 )
                                    <a  href="{{$generalinfo[17]->value}}" class="snip1472"><i class="fab fa-linkedin-in"></i></a>
                                @endif

                                @if(strlen($generalinfo[15]->value)>8)
                                    <a href="{{$generalinfo[15]->value}}" class="snip1472"><i class="fab fa-instagram"></i></a>
                                @endif

                                @if(strlen($generalinfo[16]->value)>8)
                                    <a href="{{$generalinfo[16]->value}}" class="snip1472"><i class="fab fa-telegram-plane"></i></a>
                                @endif
                            </div>
                        </div><!--.col-->
                        <div class="col-lg-4">
                            <div class="card desc-box">
                                <div class="card-body">
                                    <div class="card-title">درباره ما</div>
                                    <div class="card-text" dir="rtl">
                                        <h1 class="h6 d-inline">{{$generalinfo[0]->value}}</h1> - {{$generalinfo[1]->value}}
                                        <br>
                                        کلمات کلیدی:
                                        {{$generalinfo[2]->value}}
                                    </div>
                                </div>
                            </div><!--.card-->
                        </div><!--.col-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer - start -->
    <footer class="py-3 text-center container-fluid bg-dark-dark">
        <a href="http://gilas-web.ir" ><img height="20px" src="https://iranflood.ir/wp-content/themes/Gilas-Eventpro/img/gilas_logo_footer.png"></a>
    </footer>
    <!-- footer - end -->
</div>
<!-- Scripts -->
<script src="{{ asset('defaultassets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/slick.js') }}"></script>
<script src="{{ asset('defaultassets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/persianumber.min.js') }}"></script>
<script src="{{ asset('defaultassets/js/popper.js') }}"></script>
<script src="{{ asset('defaultassets/js/app.js') }}"></script>
<script src="{{ asset('themeassets/blue-formal/js/theme.js') }}"></script>
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