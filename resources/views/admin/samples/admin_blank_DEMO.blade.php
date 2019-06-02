@extends('layouts.admin.admin_panel')

@section('content')
    @include('layouts.admin.admin_sidebar')
    <div class="main-panel IRANSans">
        @include('layouts.admin.admin_nav')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title IRANSans">اعضا ثبت نام شده</h4>
                                <p class="card-category">25 ردیف در هر صفحه</p>
                            </div>
                            <div class="card-body table-responsive" id="content">
                                <table class="table table-hover">
                                    <thead class="text-success">
                                    <th class="text-center">کد</th>
                                    <th class="text-center">نام</th>
                                    <th class="text-center">تلفن همراه</th>
                                    <th class="text-center">آدرس ایمیل</th>
                                    <th class="text-center">امتیاز</th>
                                    <th class="text-center">رتبه</th>
                                    <th class="text-center">وضعیت</th>
                                    <th class="text-center d-print-none">عملیات</th>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="font-weight-bold">
                                            <td  class="text-center">{{$user->id}}</td>
                                            <td  class="text-center">{{$user->name}}</td>
                                            <td  class="text-center">{{$user->phone}}</td>
                                            <td class="text-center text-nowrap" dir="ltr">{{$user->email}}</td>
                                            <td  class="text-center">{{$user->credit}}</td>
                                            <td  class="text-center">{{$user->level}}</td>
                                            <td  class="text-center">{{$user->status}}</td>
                                            <td  class="text-center d-print-none">
                                                <button type="button" rel="tooltip" title="ویرایش" class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                @if ($user->status == 'active')
                                                    <button type="button" rel="tooltip" title="غیر فعال کردن " class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">thumb_down</i>
                                                    </button>
                                                @elseif($user->status == 'inactive')
                                                    <button type="button" rel="tooltip" title="فعال کردن" class="btn btn-success btn-link btn-sm">
                                                        <i class="material-icons">thumb_up</i>
                                                    </button>
                                                @else
                                                    {{$user->status}}
                                                @endif
                                                <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">

                                <!-- start-page-pagination -->
                                <ul class="pagination p-0 m-0">
                                    <li class="page-item"><a class="font-weight-bold btn btn-outline-success" href="?page=1" aria-label="Previous"><span
                                                    aria-hidden="true">&laquo;</span></a></li>
                                    @for($ipn=1; $ipn<=$users->lastPage(); $ipn++)
                                        @if(isset($_GET['page']) && $_GET['page'] != 1)
                                            <?php $l1 = $_GET['page'] - 2; $l2 = $_GET['page'] + 2;?>
                                            @if($l1 <=  $ipn  && $ipn  <= $l2 )
                                                <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light bg-success font-weight-bold btn btn-outline-success" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                            @endif @else @if(1 <=  $ipn  && $ipn  <= 5)
                                            <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light bg-success font-weight-bold btn btn-outline-success" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                        @endif @endif @endfor
                                    <li class="page-item"><a class="font-weight-bold btn btn-outline-success" href="<?php echo "?page=" . $users->lastPage(); ?>"
                                                             aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                                </ul>
                                <!-- finish-page-pagination -->

                                <a class="btn btn-outline-success font-weight-bold " href="#" onclick="openWin(document.getElementById('content').innerHTML)">
                                    <i class="material-icons pr-1">
                                        print
                                    </i>
                                    پرینت
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
                @include('layouts.admin.admin_footer')
            </div>
        </div>
@endsection
