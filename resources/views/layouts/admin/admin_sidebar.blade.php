{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}


<div class="sidebar" data-color="purple" data-background-color="white" data-image="/adminassets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            تیم خلاق و گیلاس
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{(strlen(\Request::route()->getName()) == 0)? 'active':''}}">
                <a class="nav-link" href="/admin">
                    <i class="material-icons">dashboard</i>
                    <p>داشبورد</p>
                </a>
            </li>
            <li class="nav-item {{(strlen(\Request::route()->getName())>0 && \Request::route()->getName() == 'show_admin_users')? 'active':''}}">
                <a class="nav-link" href="{{route('show_admin_users')}}">
                    <i class="material-icons">person</i>
                    <p>اعضا</p>
                </a>
            </li>
            <li class="nav-item dropdown {{(strlen(\Request::route()->getName())>0 && in_array(\Request::route()->getName(),['show_admin_catgories','show_admin_contents_list','show_admin_posts','show_admin_contents']) && (isset($request->post_type_id) && $request->post_type_id == 1))? 'active':''}}">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="material-icons">library_books</i>
                    <p class="d-flex" >
                        پست ها
                        <i class="material-icons">arrow_drop_down</i>
                    </p>
                </a>
                <ul class="dropdown-menu bg-dark pb-3">
                    <li>
                        <a class="text-light" href="{{ route('show_admin_contents',['post_type_id'=>'1']) }}">
                            <i class="material-icons">arrow_back_ios</i>
                            <p>ثبت پست جدید</p>
                        </a>
                    </li>
                    <li>
                        <a class="text-light" href="{{ route('show_admin_contents_list',['post_type_id'=>'1']) }}">
                            <i class="material-icons">arrow_back_ios</i>
                            <p>پست ها</p>
                        </a>
                    </li>
                    <li>
                        <a class="text-light" href="{{route('show_admin_catgories',['post_type_id'=>'1'])}}">
                            <i class="material-icons">arrow_back_ios</i>
                            <p>دسته بندی</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{(strlen(\Request::route()->getName())>0 && in_array(\Request::route()->getName(),['show_admin_catgories','show_admin_contents_list','show_admin_posts','show_admin_contents']) && (isset($request->post_type_id) && $request->post_type_id == 2))? 'active':''}}">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="material-icons">featured_video</i>
                    <p class="d-flex" >
                        صفحه ها
                        <i class="material-icons">arrow_drop_down</i>
                    </p>
                </a>
                <ul class="dropdown-menu bg-dark pb-3">
                    <li>
                        <a class="text-light" href="{{ route('show_admin_contents',['post_type_id'=>'2']) }}">
                            <i class="material-icons">arrow_back_ios</i>
                            <p>ثبت صفحه جدید</p>
                        </a>
                    </li>
                    <li>
                        <a class="text-light" href="{{ route('show_admin_contents_list',['post_type_id'=>'2'])}}">
                            <i class="material-icons">arrow_back_ios</i>
                            <p>صفحه ها</p>
                        </a>
                    </li>
                    <li>
                        <a class="text-light" href="{{route('show_admin_catgories',['post_type_id'=>'2'])}}">
                            <i class="material-icons">arrow_back_ios</i>
                            <p>دسته بندی</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{(strlen(\Request::route()->getName())>0 && \Request::route()->getName() == 'show_admin_banners')? 'active':''}}">
                <a class="nav-link" href="{{ route('show_admin_banners') }}">
                    <i class="material-icons">panorama</i>
                    <p>مدیریت بنرها و اسلایدر</p>
                </a>
            </li>
                <li class="nav-item {{(strlen(\Request::route()->getName())>0 && \Request::route()->getName() == 'show_admin_files_list')? 'active':''}}">
                    <a class="nav-link" href="{{ route('show_admin_files_list') }}">
                        <i class="material-icons">cloud</i>
                        <p>مدیریت فایل و مدیا</p>
                    </a>
                </li>
            <li class="nav-item {{(strlen(\Request::route()->getName())>0 && \Request::route()->getName() == 'show_admin_generalinfo')? 'active':''}}">
                <a class="nav-link" href="{{ route('show_admin_generalinfo') }}">
                    <i class="material-icons">settings</i>
                    <p>تنظیمات عمومی</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="material-icons">logout</i>
                    <p>خروج</p>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <li class="nav-item active-pro ">
                <a class="nav-link" href="#">
                    <p>GilasWeb & CreativeTim</p>
                </a>
            </li>
        </ul>
    </div>
</div>