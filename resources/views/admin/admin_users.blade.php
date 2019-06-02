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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header card-header-{{$rand_color=rand_color(['5','4','2'])}}">
                                <h4 class="card-title IRANSans">اعضا ثبت نام شده</h4>
                                <p class="card-category">25 ردیف در هر صفحه</p>
                            </div>
                            <div class="card-body table-responsive" id="content">
                                <table class="table table-hover">
                                    <thead class="text-{{$rand_color}}">
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
                                                <a href="{{route('show_public_edits',['model'=>'User','row_id'=>$user->id])}}" rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                @if ($user->status == 'active')
                                                    <a href="{{route('public_actions',['model'=>'User','row_id'=>$user->id,'cname'=>'status','function'=>'inactive'])}}"  rel="tooltip" title="غیر فعال کردن " class="btn btn-warning btn-link btn-sm">
                                                        <i class="material-icons">thumb_down</i>
                                                    </a>
                                                @elseif($user->status == 'inactive')
                                                    <a href="{{route('public_actions',['model'=>'User','row_id'=>$user->id,'cname'=>'status','function'=>'active'])}}" rel="tooltip" title="فعال کردن" class="btn btn-{{$rand_color}} btn-link btn-sm">
                                                        <i class="material-icons">thumb_up</i>
                                                    </a>
                                                @else
                                                    {{$user->status}}
                                                @endif
                                                <a href="{{route('public_actions',['model'=>'User','row_id'=>$user->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                <div class="card-footer">

                                    <!-- start-page-pagination -->
                                        <ul class="pagination p-0 m-0 d-flex justify-content-center align-items-center">
                                            <li class="page-item"><a class="font-weight-bold btn btn-md btn-outline-{{$rand_color}}" href="?page=1" aria-label="Previous"><span
                                                            aria-hidden="true">&laquo;</span></a></li>
                                            @for($ipn=1; $ipn<=$users->lastPage(); $ipn++)
                                                @if(isset($_GET['page']) && $_GET['page'] != 1)
                                                    <?php $l1 = $_GET['page'] - 2; $l2 = $_GET['page'] + 2;?>
                                                    @if($l1 <=  $ipn  && $ipn  <= $l2 )
                                                        <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold  btn bg-{{$rand_color}} btn-outline-{{$rand_color}}" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                                    @endif @else @if(1 <=  $ipn  && $ipn  <= 5)
                                                    <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold btn bg-{{$rand_color}} btn-outline-{{$rand_color}}" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                                @endif @endif @endfor
                                            <li class="page-item"><a class="font-weight-bold btn btn-md btn-outline-{{$rand_color}}" href="<?php echo "?page=" . $users->lastPage(); ?>"
                                                                     aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                                        </ul>
                                    <!-- finish-page-pagination -->

                                    <a class="btn btn-outline-{{$rand_color}} font-weight-bold " href="#" onclick="openWin(document.getElementById('content').innerHTML)">
                                        <i class="material-icons pr-1">
                                            print
                                        </i>
                                        پرینت
                                    </a>

                                </div>

                        </div>
                    </div>
                </div>
            </div>
                @include('layouts.admin.admin_footer')
            </div>
        </div>
@endsection
