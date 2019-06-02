{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('layouts.admin.admin_panel')

@section('content')
    @include('layouts.admin.admin_sidebar')
    <div class="main-panel IRANSans">
        @include('layouts.admin.admin_nav')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="pb-3 card card-stats">
                            <div class="card-header card-header-{{$rand_color=rand_color(['2'])}} card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">cloud</i>
                                </div>
                                <p class="card-category">فضای مصرف شده</p>
                                <h3 class="card-title IRANSans" DIR="ltr">
                                    {{$sizeondisk}}
                                    <small>MB</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">shop</i>
                                    <a class=" text-success " target="_blank" href="https://www.gilasweb.ir/shop/products/category/2/16/1/8/%D9%87%D8%A7%D8%B3%D8%AA">خرید فضای بیشتر...</a>
                                </div>
                            </div>
                        </div>
                        <div class="pb-3 card card-stats">
                            <div class="card-header card-header-{{$rand_color=rand_color(['2'])}} card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">message</i>
                                </div>
                                <p class="card-category">اعتبار سامانه پیامک</p>
                                <h3 class="card-title IRANSans">{{number_format($chargepanelsms)}}
                                    <small>تومان</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">shop</i>
                                    <a class=" text-success " target="_blank" href="https://sms.gilasweb.ir">خرید شارژ بیشتر...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">

                        <div class="pb-3 card card-stats">
                            <div class="card-header card-header-{{$rand_color=rand_color(['4','2'])}} card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person</i>
                                </div>
                                <p class="card-category">تعداد کارشناس و مدیر</p>
                                <h3 class="card-title IRANSans">{{$upusersnumber}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>همین الان
                                </div>
                            </div>
                        </div>
                        <div class="pb-3 card card-stats">
                            <div class="card-header card-header-{{$rand_color=rand_color(['5','3','1','0'])}} card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">error</i>
                                </div>
                                <p class="card-category">تعداد هشدار سیستم</p>
                                <h3 class="card-title IRANSans">{{$userlogerrornumber}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>۲۴ ساعت اخیر
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">

                        <div class="pb-3 card card-stats">
                            <div class="card-header card-header-{{$rand_color=rand_color(['2'])}} card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">accessibility_new</i>
                                </div>
                                <p class="card-category">تعداد کل اعضا</p>
                                <h3 class="card-title IRANSans">{{$usersnumber}}
                                    <small>نفر</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>از بیگ بنگ تا این لحظه
                                </div>
                            </div>
                        </div>
                        <div class="pb-3 card card-stats">
                            <div class="card-header card-header-{{$rand_color=rand_color(['2'])}} card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mouse</i>
                                </div>
                                <p class="card-category">تعداد بازدید منحصر به فرد</p>
                                <h3 class="card-title IRANSans">{{$userlogipnumber}}
                                    <small>نفر</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>۲۴ ساعت اخیر
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 order-lg-first">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="{{get_gilasweb_message('img')}}" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-category text-gray IRANSans">پیام سیسنم</h6>
                                <h4 class="card-title IRANSans">{{get_gilasweb_message('text_head')}}</h4>
                                <p class="card-description" style="height: 71px">
                                    {{get_gilasweb_message('text_body')}}
                                </p>
                                @if(get_gilasweb_message('action') != null && strlen(get_gilasweb_message('action'))>1)
                                {!! get_gilasweb_message('action') !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-{{$rand_color=rand_color(['4','2'])}}">
                            <h4 class="card-title IRANSans">آخرین اعضا ثبت نام شده</h4>
                            <p class="card-category">10 عضو آخر</p>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-{{$rand_color}}">
                                <th class="text-center">کد</th>
                                <th class="text-center">نام</th>
                                <th class="text-center">تلفن همراه</th>
                                <th class="text-center">آدرس ایمیل</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td class="text-left text-nowrap" dir="ltr">{{$user->email}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-{{$rand_color=rand_color(['4','2'])}}">
                                <h4 class="card-title IRANSans">آخرین بازدیدهای منحصر به فرد</h4>
                                <p class="card-category">10 مورد آخر</p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-{{$rand_color}}">
                                    <th class="text-center">عضو</th>
                                    <th class="text-center">آی پی</th>
                                    <th class="text-center">توضیح</th>
                                    <th class="text-center">آخرین آدرس بازدیدی</th>
                                    <th class="text-center">تاریخ</th>
                                    </thead>
                                    <tbody>
                                    @foreach($userlogvisit as $userlogerrorsingle)
                                    <tr>
                                        <td class="text-nowrap" >{{$userlogerrorsingle->username}}</td>
                                        <td class="text-nowrap" >{{$userlogerrorsingle->userip}}</td>
                                        <td class="text-left" dir="ltr">{{$userlogerrorsingle->description}}</td>
                                        <td class="text-left text-nowrap" dir="ltr">{{$userlogerrorsingle->path}}</td>
                                        <td class="text-nowrap" >{{$userlogerrorsingle->jalalitimestamps}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
               <div class="row">
                   <div class="col-sm-12">
                       <div class="card">
                           <div class="card-header card-header-{{$rand_color=rand_color(['5','3','1',0])}}">
                               <h4 class="card-title IRANSans">آخرین هشدارهای ثبت شده</h4>
                               <p class="card-category">20 هشدار آخر</p>
                           </div>
                           <div class="card-body table-responsive">
                               <table class="table table-hover">
                                   <thead class="text-{{$rand_color}}">
                                   <th class="text-center">عضو</th>
                                   <th class="text-center">آی پی</th>
                                   <th class="text-center">توضیح</th>
                                   <th class="text-center">آدرس</th>
                                   <th class="text-center">تاریخ</th>
                                   </thead>
                                   <tbody>
                                   @foreach($userlogerror as $userlogerrorsingle)
                                       <tr>
                                           <td class="text-nowrap" >{{$userlogerrorsingle->username}}</td>
                                           <td class="text-nowrap" >{{$userlogerrorsingle->userip}}</td>
                                           <td class="text-left" dir="ltr">{{$userlogerrorsingle->description}}</td>
                                           <td class="text-left text-nowrap" dir="ltr">{{$userlogerrorsingle->path}}</td>
                                           <td class="text-nowrap">{{$userlogerrorsingle->jalalitimestamps}}</td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
            @include('layouts.admin.admin_footer')
        </div>
    </div>
@endsection
