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
        <script>var shopdirectory=""</script>
        <script src="<?php echo asset('defaultassets/ajaxupload/js/ajaxuploader.js')?>"></script>
        <link href="<?php echo asset('defaultassets/ajaxupload/css/ajaxuploader.css')?>" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
            var config = {
                support : "image/jpg,image/png,image/bmp,image/jpeg,image/gif",		// Valid file formats
                form: "demoFiler",					// Form ID
                dragArea: "dragAndDropFiles",		// Upload Area ID
                uploadUrl: "{{asset("/admin/files_upload")}}"				// Server side upload url
            }
            $(document).ready(function(){
                initMultiUploader(config);
            });
        </script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header card-header-{{$rand_color=rand_color(['5','4','2'])}}">
                                <h4 class="card-title IRANSans">مدیریت فایل ها و مدیاهای مستقل</h4>
                            </div>
                            <div class="card-body table-responsive" id="content">
                                <form class="w-100 d-flex justify-content-center" name="demoFiler" id="demoFiler" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input class="d-none" type="file" name="multiUpload" id="multiUpload" multiple />
                                    <div class="center-block">
                                        <label for="multiUpload" class="btn btn-outline-success">انتخاب دستی</label>
                                        <input type="submit" name="submitHandler" id="submitHandler" value="آپلود" class=" btn btn-outline-danger" />
                                    </div>
                                </form>
                                <div id="dragAndDropFiles" class="uploadArea">
                                    <h5 class="py-3 text-secondary text-center IRANSans">فایل ها را اینجا بکشید و رها کنید، سپس روی آپلود بزنید</h5>
                                </div>
                                <div class="progressBar">
                                    <div class="status"></div>
                                </div>
                                <br>
                                <table class="table table-hover">
                                    <thead class="text-{{$rand_color}}">
                                    <th class="text-center">کد</th>
                                    <th class="text-center">نام</th>
                                    <th class="text-center">فرمت</th>
                                    <th class="text-center">حجم</th>
                                    <th class="text-center">تاریخ ثبت</th>
                                    <th class="text-center">دانلود</th>
                                    <th class="text-center">وضعیت</th>
                                    <th class="text-center d-print-none">عملیات</th>
                                    </thead>
                                    <tbody>
                                    @foreach($allfiles as $file)
                                        <tr class="font-weight-bold">
                                            <td  class="text-center">{{$file->id}}</td>
                                            <td  class="text-center"><a target="_blank" href=""><i class="text-md material-icons">
                                                        insert_drive_file
                                                    </i>{{$file->name}}</a></td>
                                            <td  class="text-center">{{$file->format}}</td>
                                            <td  class="text-center">{{$file->size}} کیلو بایت </td>
                                            <td  class="text-center">{{$file->jalalitimestamps}}</td>
                                            <td  class="text-center">
                                                <a class="btn btn-sm btn-outline-info" href="{{asset($file->path)}}" download>
                                                لینک دانلود
                                                </a>
                                            </td>
                                            <td  class="text-center">{{$file->status}}</td>
                                            <td  class="text-center d-print-none">
                                                <a href="{{route('show_public_edits',['model'=>'file','row_id'=>$file->id])}}" rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                @if ($file->status == 'active')
                                                    <a href="{{route('public_actions',['model'=>'file','row_id'=>$file->id,'cname'=>'status','function'=>'inactive'])}}"  rel="tooltip" title="غیر فعال کردن " class="btn btn-warning btn-link btn-sm">
                                                        <i class="material-icons">thumb_down</i>
                                                    </a>
                                                @elseif($file->status == 'inactive')
                                                    <a href="{{route('public_actions',['model'=>'file','row_id'=>$file->id,'cname'=>'status','function'=>'active'])}}" rel="tooltip" title="فعال کردن" class="btn btn-{{$rand_color}} btn-link btn-sm">
                                                        <i class="material-icons">thumb_up</i>
                                                    </a>
                                                @else
                                                    {{$file->status}}
                                                @endif
                                                <a href="{{route('public_actions',['model'=>'file','row_id'=>$file->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
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
                                            @for($ipn=1; $ipn<=$allfiles->lastPage(); $ipn++)
                                                @if(isset($_GET['page']) && $_GET['page'] != 1)
                                                    <?php $l1 = $_GET['page'] - 2; $l2 = $_GET['page'] + 2;?>
                                                    @if($l1 <=  $ipn  && $ipn  <= $l2 )
                                                        <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold  btn bg-{{$rand_color}} btn-outline-{{$rand_color}}" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                                    @endif @else @if(1 <=  $ipn  && $ipn  <= 5)
                                                    <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold btn bg-{{$rand_color}} btn-outline-{{$rand_color}}" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                                @endif @endif @endfor
                                            <li class="page-item"><a class="font-weight-bold btn btn-md btn-outline-{{$rand_color}}" href="<?php echo "?page=" . $allfiles->lastPage(); ?>"
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
