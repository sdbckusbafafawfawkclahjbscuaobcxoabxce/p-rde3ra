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
                                <h4 class="card-title IRANSans">مدیریت بنرها و اسلایدر</h4>
                                <p class="card-category"> مدیریت تمام تصاویر نمایشی(خارج از محتوی) موجود</p>
                            </div>
                            <div class="card-body table-responsive">
                                <form id="form" class="row justify-content-center" method="POST"
                                      action="
                                      {{($data !== NULL)? route('action_public_edits',['model'=>'banner','row_id'=>$data->id]):route('action_admin_banners')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-sm-3">
                                        <label for="title" class="control-label">عنوان:</label>
                                        <input placeholder="عنوان بنر" id="title" type="text" class="mb-2 form-control"
                                               name="title" value="{{($data !== NULL)?$data->title:''}}"
                                               required>
                                        @if ($errors->has('title'))
                                            <span class="text-{{$rand_color}} mt-2 mb-0 d-block">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="link" class="control-label">لینک:</label>
                                        <input dir="ltr" value="#" placeholder="https://..." id="link" type="text"
                                               class="mb-2 form-control" name="link"
                                               value="{{($data !== NULL)?$data->link:NULL}}"
                                        >
                                        @if ($errors->has('link'))
                                            <span class="text-{{$rand_color}} mt-2 mb-0 d-block">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="father" class="control-label">وابستگی:</label>
                                        <select id="father" class="mb-2 form-control" name="father">
                                            @if(isset($data->father) && $data->father !== NULL && $data->father != 'none')
                                                <option value="{{($data->father !== NULL && $data->father != 'none')?$data->father:''}}">پیش فرض: {{($data->father !== NULL && $data->father != 'none')?show_real_target_name($data->father):''}}  </option>
                                            @endif
                                            <option value="lg_slider">اسلایدشو بزرگ</option>
                                            <option value="sm_slider">گالری تصاویر</option>
                                            <option value="vendor_slider">همکاران/مشتریان ما</option>
                                            <option value="banners_1">بنر های کد یک</option>
                                            <option value="banners_2">بنر های کد دو</option>
                                        </select>
                                        @if ($errors->has('father'))
                                            <span class="text-{{$rand_color}} mt-2 mb-0 d-block">{{ $errors->first('father') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="img" class="control-label">انتخاب فایل:</label>
                                        <input name="img" type="file" class="mb-2 form-control">
                                        @if ($errors->has('img'))
                                            <span class="text-{{$rand_color}} mt-2 mb-0 d-block">{{ $errors->first('img') }}</span>
                                        @endif
                                    </div>
                                </form>
                                <div id="content">
                                    <div class="row">

                                        @if(count($allbanners->where('father','lg_slider')))
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class=" table-responsive">
                                                        <table class="table table-hover ">
                                                            <tr class="font-weight-bold border border-{{$rand_color}}">
                                                                <td class="text-center text-{{$rand_color}}" colspan="3">
                                                                    <h4 class="pt-2 font-weight-bold  IRANSans">
                                                                        اسلایدشو بزرگ
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            @foreach($allbanners->where('father','lg_slider') as $banner)
                                                                <tr class="font-weight-bold">
                                                                    <td class="text-center "><img class=" img-thumbnail"
                                                                                                  src="{{$banner->imgpath}}"
                                                                                                  height="40px"
                                                                                                  style="max-width:100px; object-fit: cover">
                                                                    </td>
                                                                    <td class="text-center"><a class="text-{{$rand_color}}" href="{{$banner->link}}" target="_blank">{{$banner->title}}</a></td>
                                                                    <td  class="text-center d-print-none">
                                                                        <a href="{{route('show_admin_banners_edit',['banner_id'=>$banner->id])}}"  rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                                            <i class="material-icons">edit</i>
                                                                        </a>
                                                                        <a href="{{route('public_actions',['model'=>'banner','row_id'=>$banner->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
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

                                        @if(count($allbanners->where('father','sm_slider')))
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class=" table-responsive">
                                                        <table class="table table-hover">
                                                            <tr class="font-weight-bold border border-{{$rand_color}}">
                                                                <td class="text-center text-{{$rand_color}}" colspan="3">
                                                                    <h4 class="pt-2 font-weight-bold  IRANSans">
                                                                        اسلایدشو کوچک
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            @foreach($allbanners->where('father','sm_slider') as $banner)
                                                                <tr class="font-weight-bold">
                                                                    <td class="text-center "><img class=" img-thumbnail"
                                                                                                  src="{{$banner->imgpath}}"
                                                                                                  height="40px"
                                                                                                  style="max-width:100px; object-fit: cover">
                                                                    </td>
                                                                    <td class="text-center"><a class="text-{{$rand_color}}" href="{{$banner->link}}" target="_blank">{{$banner->title}}</a></td>
                                                                    <td  class="text-center d-print-none">
                                                                        <a href="{{route('show_admin_banners_edit',['banner_id'=>$banner->id])}}"  rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                                            <i class="material-icons">edit</i>
                                                                        </a>
                                                                        <a href="{{route('public_actions',['model'=>'banner','row_id'=>$banner->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
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

                                        @if(count($allbanners->where('father','banners_1')))
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class=" table-responsive">
                                                        <table class="table table-hover">
                                                            <tr class="font-weight-bold border border-{{$rand_color}}">
                                                                <td class="text-center text-{{$rand_color}}" colspan="3">
                                                                    <h4 class="pt-2 font-weight-bold  IRANSans">
                                                                        بنر های کد یک
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            @foreach($allbanners->where('father','banners_1') as $banner)
                                                                <tr class="font-weight-bold">
                                                                    <td class="text-center "><img class=" img-thumbnail"
                                                                                                  src="{{$banner->imgpath}}"
                                                                                                  height="40px"
                                                                                                  style="max-width:100px; object-fit: cover">
                                                                    </td>
                                                                    <td class="text-center"><a class="text-{{$rand_color}}" href="{{$banner->link}}" target="_blank">{{$banner->title}}</a></td>
                                                                    <td  class="text-center d-print-none">
                                                                        <a href="{{route('show_admin_banners_edit',['banner_id'=>$banner->id])}}"  rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                                            <i class="material-icons">edit</i>
                                                                        </a>
                                                                        <a href="{{route('public_actions',['model'=>'banner','row_id'=>$banner->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
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

                                        @if(count($allbanners->where('father','banners_2')))
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <tr class="font-weight-bold border border-{{$rand_color}}">
                                                                <td class="text-center text-{{$rand_color}}" colspan="3">
                                                                    <h4 class="pt-2 font-weight-bold  IRANSans">
                                                                        بنر های کد دو
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            @foreach($allbanners->where('father','banners_2') as $banner)
                                                                <tr class="font-weight-bold">
                                                                    <td class="text-center "><img class=" img-thumbnail"
                                                                                                  src="{{$banner->imgpath}}"
                                                                                                  height="40px"
                                                                                                  style="max-width:100px; object-fit: cover">
                                                                    </td>
                                                                    <td class="text-center"><a class="text-{{$rand_color}}" href="{{$banner->link}}" target="_blank">{{$banner->title}}</a></td>
                                                                    <td  class="text-center d-print-none">
                                                                        <a href="{{route('show_admin_banners_edit',['banner_id'=>$banner->id])}}"  rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                                            <i class="material-icons">edit</i>
                                                                        </a>
                                                                        <a href="{{route('public_actions',['model'=>'banner','row_id'=>$banner->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
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

                                            @if(count($allbanners->where('father','vendor_slider')))
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class=" table-responsive">
                                                            <table class="table table-hover">
                                                                <tr class="font-weight-bold border border-{{$rand_color}}">
                                                                    <td class="text-center text-{{$rand_color}}" colspan="3">
                                                                        <h4 class="pt-2 font-weight-bold  IRANSans">
                                                                            همکاران/مشتریان ما
                                                                        </h4>
                                                                    </td>
                                                                </tr>
                                                                @foreach($allbanners->where('father','vendor_slider') as $banner)
                                                                    <tr class="font-weight-bold">
                                                                        <td class="text-center "><img class=" img-thumbnail"
                                                                                                      src="{{$banner->imgpath}}"
                                                                                                      height="40px"
                                                                                                      style="max-width:100px; object-fit: cover">
                                                                        </td>
                                                                        <td class="text-center"><a class="text-{{$rand_color}}" href="{{$banner->link}}" target="_blank">{{$banner->title}}</a></td>
                                                                        <td  class="text-center d-print-none">
                                                                            <a href="{{route('show_admin_banners_edit',['banner_id'=>$banner->id])}}"  rel="tooltip" title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                                                <i class="material-icons">edit</i>
                                                                            </a>
                                                                            <a href="{{route('public_actions',['model'=>'banner','row_id'=>$banner->id,'cname'=>'status','function'=>'deleted'])}}" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
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
