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
                                <h4 class="card-title IRANSans">ثبت محتوی جدید</h4>
                                <p class="card-category"> پست تایپ شماره  {{$request->post_type_id}} </p>
                            </div>
                            <div class="card-body table-responsive" id="content">
                        <form id="form" class="form-horizontal" role="form" method="POST" action="{{route('action_admin_contents',['post_type_id'=>$request->post_type_id])}}"
                              enctype="multipart/form-data">
                            <fieldset>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">عنوان:</label>
                                        <input placeholder="عنوان" type="text" class="form-control" name="title"
                                               value="@if(isset($data->id)){{$data->title}} @else{{ old('title') }}@endif" autofocus required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">دسته بندی:</label>
                                        <select class="form-control" name="catgory" id="catgory" required>
                                            <option value="none" disabled> انتخاب موضوع </option>
                                            <option value="menu">منو اصلی</option>
                                            @foreach($catgories as $cat1)
                                                @foreach($catgories as $cat2)
                                                        @if($cat2->father == $cat1->id)
                                                            <option value="{{$cat2->id}}"> -> {{$cat1->title}} -> {{$cat2->title}}</option>
                                                        @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                    <div class="mt-3 ">
                                        <label for="">متن:</label>
                                        <input value="@if(isset($data->id)){{$data->description}} @else {{old('description',isset($post)?$post->description:'')}} @endif" id="description"
                                               name="description" dir="rtl" required>
                                    </div>


                                <div class="col-md-12 my-3 mr-0 pr-0">
                                    <label for="img" class="pl-1"> انتخاب تصویر شاخص:  </label>
                                    <input class="form-control" type="file" name="img" id="img" class="file">
                                </div>

                                @if(isset($data->id))
                                    <div class="d-none">
                                        <input value="{{$data->imgpath}}" name="imgpath">
                                    </div>
                                @endif
                            </fieldset>
                        </form>
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
                @include('layouts.admin.admin_footer')
            </div>
        </div>
        {{--editor--}}
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
                        success("/uploads/contents/"+json.location);
                        console.log(json);
                    };
                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                }
            });
        </script>
@endsection
