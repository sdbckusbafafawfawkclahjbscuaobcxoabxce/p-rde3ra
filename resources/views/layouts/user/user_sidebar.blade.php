{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}


<div class="col-lg-3 p-1  order-lg-first">
<div class="rounded background-2 pt-1 px-2 text-light">
    <div class="my-1 px-1 d-flex justify-content-between">
        <a class="btn text-light" href="{{route('show_user_information')}}">
        @if(Auth::user()->name != 'none')
            <strong>{{ Auth::user()->name }}</strong>
        @else
            <strong>{{ 'کاربر' }}</strong>
        @endif
        </a>
        <a class="btn text-light" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            خروج
        </a>
    </div>
    <center>
    <img src="{{(Auth::user()->imgpath !== null)? Auth::user()->imgpath : '/uploads/profile-default2.jpg'}}" class="card my-2" style="width: 100%; height: 200px; object-fit: cover">
    </center>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
        <div class=" text-center ">
            موجودی/امتیاز
            <span class="h2">{{Auth::user()->credit}}</span>
            <hr class="bg-light">
        </div>
        <ul class="nav flex-column  pr-0 mr-0">
            @if(admin_access(['09163151967','09161145220'],Auth::user()->status,Auth::user()->phone,null))
            <li class="nav-item  btn">
                <a class="text-light nav-link d-flex" href="/admin">
                    <i class="pl-1 fas fa-angle-left"></i>
                    مشاهده مدیریت
                </a>
            </li>
            @endif
            @if(Auth::user()->coabout != NULL)
            <li class="nav-item  btn">
                <a class="text-light nav-link d-flex" href="{{route('userpage',[Auth::user()->id])}}">
                    <i class="pl-1 fas fa-angle-left"></i>
                    مشاهده صفحه
                </a>
            </li>
            @endif
            <li class="nav-item  btn">
                <a class="text-light nav-link d-flex" href="{{route('show_user_information')}}">
                    <i class="pl-1 fas fa-angle-left"></i>
                    اطلاعات حساب
                </a>
            </li>
            <li class="nav-item  btn">
                <a class="text-light mb-2 nav-link d-flex" href="{{route('show_user_changepassword')}}">
                    <i class="pl-1 fas fa-angle-left"></i>
                    تغییر رمز عبور
                </a>
            </li>

            <li class="nav-item  btn d-none">
                <a class="btn  btn-danger btn-block nav-link d-flex" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="pl-1 fas fa-angle-left"></i>
                    خروج
                </a>
            </li>
        </ul>
    <hr class="bg-light">
    <div class="m-1 pb-3 d-flex justify-content-center pb-1">
        <a class="btn btn-sm btn-warning " href="/home">
            برگشت به خانه
        </a>
    </div>
</div>
</div>