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
                                <h4 class="card-title IRANSans"> ویرایش اطلاعات سطر {{$request->row_id}} از
                                    جدول {{$request->model}}</h4>
                                <p class="card-category">ویرایش شما قابل برگشت نیست، لطفا با احتیاط ویرایش کنید</p>
                            </div>
                            <div class="card-body table-responsive" id="content">
                                <form id="form" class="form-horizontal" role="form" method="POST"
                                      action="{{$action}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class=" row">
                                        @foreach($columns as $column)
                                            @if(!in_array($column,['description','imgpath','filepath','catgory','father']))
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{$column}}">{{show_real_target_name($column)}}:</label>
                                                    <input placeholder="{{show_real_target_name($column)}}" type="text"
                                                           class="form-control" name="{{$column}}"
                                                           value="{{$data->$column}}"/>
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach($columns as $column)
                                            @if(in_array($column,['catgory']))
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{$column}}">{{show_real_target_name($column)}}:</label>
                                                    <select class="form-control" name="catgory" id="catgory" required>
                                                        @if(isset($data->catgory) && $data->catgory !== NULL && $data->catgory != 'none')
                                                            @if($data->catgory !== NULL && $data->catgory != 'none' && $data->catgory != 'menu' && $data->catgory != '')
                                                                <option value="{{($data->catgory !== NULL && $data->catgory != 'none')?$data->catgory:''}}"> پیشفرض: {{($data->catgory !== NULL && $data->catgory != 'none' && $data->catgory != 'menu' && $data->catgory != '')?$catgories->find($data->catgory)->title:''}}</option>
                                                            @endif
                                                                <option value="menu"> منو اصلی </option>
                                                        @endif
                                                        @foreach($catgories->where('post_type_id',$data->post_type_id) as $cat1)
                                                            @foreach($catgories as $cat2)
                                                                @if($cat2->father == $cat1->id)
                                                                    <option value="{{$cat2->id}}"> -> {{$cat1->title}}
                                                                        -> {{$cat2->title}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            @if(in_array($column,['father']))
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{$column}}">{{show_real_target_name($column)}}:</label>
                                                    <select class="form-control" name="father" id="father" required>
                                                        <?php
                                                        if($request->model == "banner"){
                                                            $options='';
                                                            $options=$options.'<option value="none">ندارد</option>';
                                                            $fathername=show_real_target_name($data->father);
                                                        }
                                                        elseif($request->model == "catgory")
                                                        {
                                                            $options='';
                                                            foreach($catgories->where('father','none') as $catgory)
                                                            {
                                                                $options=$options.'<option value="'.$catgory->id.'">'.$catgory->title.'</option>';
                                                            }
                                                            $options=$options.'<option value="none">ندارد</option>';
                                                            $fathername=$catgories->find($data->father)->title;
                                                        }
                                                        ?>
                                                        @if(isset($data->father) && $data->father !== NULL && $data->father != 'none')
                                                            <option value="{{($data->father !== NULL && $data->father != 'none')?$data->father:''}}">پیشفرض
                                                                --> {{($data->father !== NULL && $data->father != 'none')?$fathername:''}}</option>
                                                        @endif
                                                        {{(isset($options))?$options:''}}
                                                    </select>
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach($columns as $column)
                                            @if(in_array($column,['description']))
                                                <div class="col-md-12 mb-3">
                                                    <label for="{{$column}}">{{show_real_target_name($column)}}:</label>
                                                    <input value="{{$data->$column}}" id="description"
                                                           name="description" dir="rtl" required>
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach($columns as $column)
                                            @if(in_array($column,['imgpath','filepath']))
                                                <div class="col-md-6 mb-3">
                                                    <label class="pl-1"
                                                           for="{{$column}}">{{show_real_target_name($column)}}:</label>
                                                    <input class="form-control" type="file"
                                                           name="{{$column}}"/>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </form>
                                <div class="col-sm-12 ">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-outline-{{$rand_color}} btn-lg w-100 "
                                                    onclick="document.getElementById('form').submit()">
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
            @include('layouts.admin.admin_footer')
        </div>
    </div>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    {{--/editor license remover--}}
    <script>
        tinymce.init({
            selector: '#description',
            //force_br_newlines : true,
            //force_p_newlines : false,
            plugins: "tabfocus  wordcount fullscreen textcolor preview" +
                " colorpicker image imagetools advlist  link table searchreplace lists charmap  insertdatetime advlist autolink " +
                "  directionality emoticons " +
                "",


            toolbar: "tabfocus wordcount fullscreen preview forecolor  backcolor image  " +
                "link table undo redo styleselect bold italic alignleft aligncenter" +
                " alignright bullist numlist outdent indent code searchreplace insertdatetime ltr rtl" +
                " emoticons sizeselect | bold italic | fontselect |  fontsizeselect charmap",


            //image_caption: true,
            //image_advtab: true,
            min_height: 400,
            images_upload_url: "{{route('contents/img/upload')}}",
            images_upload_base_path: "{{asset('uploads/contents')}}",
            images_upload_credentials: true,
            relative_urls: false, //for change base link

            document_base_url: "{{asset('uploads/contents')}}/",
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', "{{route('contents/img/upload')}}");
                xhr.onload = function () {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.responseText);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr);
                        return;
                    }
                    //json.location="/img/eajaxupload/"+json.location;
                    success("/uploads/contents/" + json.location);
                    console.log(json);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        });
    </script>
@endsection
