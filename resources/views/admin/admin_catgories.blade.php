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
                            <div class="card-header card-header-{{$rand_color=rand_color(['5','4','1'])}}">
                                <h4 class="card-title IRANSans">مدیریت دسته بندی ها</h4>
                                <p class="card-category"> پست تایپ شماره  {{$request->post_type_id}} </p>
                            </div>
                            <div class="card-body table-responsive" >
                                <form id="form" class="row justify-content-center" method="POST" action="{{($data !== NULL)? route('action_public_edits',['model'=>'catgory','row_id'=>$data->id]):route('action_admin_catgories',['cat_id'=>$request->post_type_id])}}">
                                    {{ csrf_field() }}
                                    <div class="col-sm-3">
                                        <label for="title" class="control-label">عنوان:</label>
                                        <input placeholder="عنوان دسته" id="title" type="text" class="mb-2 form-control" name="title" value="{{($data !== NULL)?$data->title:''}}"
                                               required>
                                        @if ($errors->has('title'))
                                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="father" class="control-label">وابستگی:</label>
                                        <select id="father" class="mb-2 form-control" name="father">
                                            @if(isset($data->father) && $data->father !== NULL && $data->father != 'none')
                                            <option value="{{($data->father !== NULL && $data->father != 'none')?$data->father:''}}">{{($data->father !== NULL && $data->father != 'none')?$fathercatgories->find($data->father)->title:''}}</option>
                                            @endif
                                            <option value="none">ندارد</option>
                                            @foreach($fathercatgories as $catgory)
                                            <option value="{{$catgory->id}}">{{$catgory->title}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('father'))
                                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('father') }}</span>
                                        @endif
                                    </div>
                                </form>
                                <div id="content">
                                    <div class="row">
                                        @foreach($fathercatgories as $catgory)
                                         @if(count($allcatgories->where('father',$catgory->id)))
                                        <div class="col-sm-4">
                                            <div class="">
                                                <div class="table-responsive" >
                                                    <table class="table table-hover">
                                                        <tr class="font-weight-bold border border-{{$rand_color}}">
                                                            <td  class="text-center text-{{$rand_color}}"><h4 class="pt-2 font-weight-bold  IRANSans">{{$catgory->title}}</h4></td>
                                                            <td  class="text-center d-print-none">
                                                                <a href="{{route('show_admin_catgories_edit',['post_type_id'=>$request->post_type_id,'cat_id'=>$catgory->id])}}" rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                                <a href="{{route('public_actions',['model'=>'catgory','row_id'=>$catgory->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                                    <i class="material-icons">close</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @foreach($allcatgories->where('father',$catgory->id) as $catgory)
                                                                <tr class="font-weight-bold">
                                                                    <td  class="text-center">{{$catgory->title}}</td>
                                                                    <td  class="text-center d-print-none">
                                                                        <a href="{{route('show_admin_catgories_edit',['post_type_id'=>$request->post_type_id,'cat_id'=>$catgory->id])}}" rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                                            <i class="material-icons">edit</i>
                                                                        </a>
                                                                        <a href="{{route('public_actions',['model'=>'catgory','row_id'=>$catgory->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                                            <i class="material-icons">close</i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                          @endif
                                        @endforeach
                                            <div class="col-sm-12 ">
                                                <div class="row d-flex justify-content-center mt-2">
                                                    <div class="col-sm-4">
                                                        <button type="submit" class="btn btn-outline-{{$rand_color}} btn-lg w-100 "  onclick="document.getElementById('form').submit()">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @include('layouts.admin.admin_footer')
            </div>
        </div>
@endsection
