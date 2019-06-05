{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('layouts.user.user_panel')

@section('content')
    @include('layouts.user.user_sidebar')
    <main role="main" class="col-md-9 order-xs-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">داشبورد</h1>
        </div>
        <div class="card">
            <div id="content" class="p-3">
                <h4>اطلاعات حساب</h4>
                <hr>

                <form class="row form-horizontal" method="POST" action="{{ route('action_user_information') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-sm-12 pb-4">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-6 d-flex justify-content-center align-items-center">
                                <img src="{{(Auth::user()->imgpath !== null)? Auth::user()->imgpath : '/uploads/profile-default2.jpg'}}" class="card m-2" height="60px">
                                <label class="btn btn-primary btn-sm" for="userpic"> انتخاب تصویر پروفایل </label>
                                <input  id="userpic" type="file" class="d-none form-control" name="userpic">
                            </div>
                        </div>
                    </div>

<div class="col-sm-4">
                    <label for="name" class="control-label">نام و نام خانوادگی مدیر:</label>
                    <input placeholder="نام و نام خانوادگی" id="name" type="text" class="mb-2 form-control" name="name" value="{{ Auth::user()->name }}"
                           required autofocus>
                    @if ($errors->has('name'))
                        <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('name') }}</span>
                    @endif
</div>

                    <div class="col-sm-4">
                        <label for="coname" class="control-label">نام فروشگاه:</label>
                        <input placeholder="نام فروشگاه" id="email" type="text" class="mb-2 form-control" name="coname" value="{{ Auth::user()->coname }}"
                               required>

                        @if ($errors->has('coname'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('coname') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="cocat" class="control-label">حوزه فعالیت:</label>
                        <input placeholder="حوزه فعایت" id="cocat" type="text" class="mb-2 form-control" name="cocat" value="{{ Auth::user()->cocat }}"
                               required>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="phone" class="control-label">تلفن همراه:</label>
                        <input placeholder="تلفن همراه" id="phone" type="number" maxlength="11" class="mb-2 hiddennumberarrow form-control"
                               name="phone" value="{{ Auth::user()->phone }}"
                               required>
                        @if ($errors->has('phone'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="email" class="control-label">آدرس ایمیل:</label>
                        <input placeholder="آدرس ایمیل" id="email" type="email" class="mb-2 form-control" name="email" value="{{ Auth::user()->email }}"
                               required>

                        @if ($errors->has('email'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="cocat" class="control-label">شماره تلفن:</label>
                        <input placeholder="شماره تلفن" id="cocat" type="text" class="mb-2 form-control" name="cocat" value="{{ Auth::user()->cocat }}"
                               required>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="cocat" class="control-label">آیدی/شماره  تلگرام:</label>
                        <input placeholder="آیدی/شماره  تلگرام" id="cocat" type="text" class="mb-2 form-control" name="cocat" value="{{ Auth::user()->cocat }}"
                               required>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="cocat" class="control-label">شماره واتس اپ:</label>
                        <input placeholder="شماره واتس اپ" id="cocat" type="text" class="mb-2 form-control" name="cocat" value="{{ Auth::user()->cocat }}"
                               required>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="cocat" class="control-label">آیدی اینستاگرام:</label>
                        <input placeholder="آیدی اینستاگرام" id="cocat" type="text" class="mb-2 form-control" name="cocat" value="{{ Auth::user()->cocat }}"
                               required>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <label for="cocat" class="control-label">آدرس:</label>
                        <input placeholder="آدرس" id="cocat" type="text" class="mb-2 form-control" name="cocat" value="{{ Auth::user()->cocat }}"
                               required>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <label for="cocat" class="control-label"> کد ضمیمه گوگل مپ:<a target="_blank" href="https://www.google.com/maps"> (Share or embed map از اینجا بگیرید)</a> </label>
                        <input placeholder="کد ضمیمه گوگل مپ" id="cocat" type="text" class="mb-2 form-control" name="cocat" value="{{ Auth::user()->cocat }}"
                               required>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-12 pb-4">
                        <label for="cocat" class="control-label">درباره فروشگاه یا خدمات:</label>
                        <textarea class="form-control" rows="5"></textarea>
                        @if ($errors->has('cocat'))
                            <span class="text-danger mt-2 mb-0 d-block">{{ $errors->first('cocat') }}</span>
                        @endif
                    </div>

                    <br>
                   <!--<div class="d-none col-sm-12">
                        <label for="coabout">درباره شرکت(حداقل 3 سطر)</label>
                        <input value="{{Auth::user()->coabout}}" id="coabout"
                                dir="rtl">
                    </div>-->
                    <div class="col-sm-12 border-top ">
                    <div class="row d-flex justify-content-center mt-2">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-sm btn-success btn-lg w-100 "> ثبت اطلاعات </button>
                    </div>
</div>
</div>
            </form>

            </div>
        </div>
    </main>
    <? /*



    {{--editor--}}
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    {{--/editor license remover--}}
    <script class="d-none">
        tinymce.init({
            selector: '#coabout',
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
 */?>
@endsection
