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
                        <form action="{{route('action_admin_generalinfo')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header card-header-{{$rand_color=rand_color(['5','4','1'])}}">
                                <h4 class="card-title IRANSans">تنظیمات عمومی</h4>
                                <p class="card-category">در صورت عدم آگاهی از کارایی یک فیلد ویرایش نکنید</p>
                            </div>
                            <div class="card-body table-responsive" id="content">
                                <div class="row" dir="rtl">
                                    <div class="col-xs-12 col-lg-6">
                                        عمومی
                                        <table class="table table-bordered" dir="rtl">
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center">عنوان وب سایت</td>
                                                <td><input class="form-control" type="text" name="g0"
                                                           value="{{$generalinfo[0]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> توضیحات وبسایت</td>
                                                <td><input class="form-control" type="text" name="g1"
                                                           value="{{$generalinfo[1]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> کلمات کلیدی</td>
                                                <td><input class="form-control" type="text" name="g2"
                                                           value="{{$generalinfo[2]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> ایمیل ادمین وبسایت</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g3"
                                                           value="{{$generalinfo[3]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس وبسایت (URL)</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g4"
                                                           value="{{$generalinfo[4]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> لوگوی وبسایت</td>
                                                <td>
                                                        <img height="40px" src="{{$generalinfo[5]->value}}">
                                                        <input name="g5" type="file">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آیکن لوگو (favicon)</td>
                                                <td>
                                                        <img height="40px" src="{{$generalinfo[6]->value}}">
                                                        <input name="g6" type="file">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> تصویر هدر شاخص</td>
                                                <td>
                                                    <img height="40px" src="{{$generalinfo[24]->value}}">
                                                    <input name="g24" type="file">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g7"
                                                           value="{{$generalinfo[7]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> تلفن ثابت</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g9"
                                                           value="{{$generalinfo[9]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> تلفن همراه</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g10"
                                                           value="{{$generalinfo[10]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> شماره خط</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g20"
                                                           value="{{$generalinfo[20]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> مالیات</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g21"
                                                           value="{{$generalinfo[21]->value}}"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        شبکه ها
                                        <table class="table table-bordered" dir="rtl">
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس صفحه Facebook</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g11"
                                                           value="{{$generalinfo[11]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس صفحه Twitter</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g12"
                                                           value="{{$generalinfo[12]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس کانال آپارات</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g13"
                                                           value="{{$generalinfo[13]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس کانال سروش</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g14"
                                                           value="{{$generalinfo[14]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس صفحه Instagram</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g15"
                                                           value="{{$generalinfo[15]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس کانال Telegram</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g16"
                                                           value="{{$generalinfo[16]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> آدرس صفحه Linkedin</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g17"
                                                           value="{{$generalinfo[17]->value}}"></td>
                                            </tr>
                                        </table>
                                        کلیدها
                                        <table class="table table-bordered" dir="rtl">
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> کلید زرین پال</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g18"
                                                           value="{{$generalinfo[18]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center">کلید گوگل</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g22"
                                                           value="{{$generalinfo[22]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> کلید پیامک</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g19"
                                                           value="{{$generalinfo[19]->value}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-{{$rand_color}} w-25 text-light text-center"> کلید بانک</td>
                                                <td><input dir="ltr" class="form-control" type="text" name="g23"
                                                           value="{{$generalinfo[23]->value}}"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                        <textarea class="w-100" rows="5" dir="ltr" name="g8">{{$generalinfo[8]->value}}</textarea>
                                </div>
                                <div class="col-sm-12 ">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-outline-{{$rand_color}} btn-lg w-100 ">
                                                <i class="material-icons pr-1">
                                                    save
                                                </i>
                                                ثبت اطلاعات/تغییرات
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                @include('layouts.admin.admin_footer')
            </div>
        </div>
@endsection
