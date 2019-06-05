{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}
@extends('theme.themelayout')
@section('content')
    <!-- Start main content -->
    <div class="main flex-column w-100 m-0 d-flex justify-content-center">
        <div class="login-regester d-flex row-reverse justify-content-end">
                             <span class="GilasUserSet px-4 text-center">
                    @if(Auth::check())
                                     <button>
                            خوش آمدید
                                         @if(Auth::user()->name != 'none')
                                             <strong>{{ Auth::user()->name }}</strong>
                                         @else
                                             <strong>{{ 'کاربر' }}</strong>
                                         @endif
                                         <i class="ion-arrow-down-b"></i>
                        </button>
                                     <div class="list text-center">
                            <a class="text-center" href="/user">پنل کاربری</a>
                            <a class="text-center" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                خروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                                 @else
                                     <a class="btn btn-brandColor" href="/login">ورود / عضویت</a>
                                 @endif
                </span>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center m-5">
            <div class="logo flex-column d-flex justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/logo.png" alt="logo">
                <p>
                    برای مشاهده خدمات، شهر و محل خود را انتخاب کنید
                </p>
            </div>
            <div class="input-group-search d-flex flex-wrap-reverse">
                <button type="button" class="btn-search">مشاهده آگهی</button>
                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">

                <div class="input-group">
                    <select class="custom-select city text-right" id="inputGroupSelect01" dir="rtl">
                        <option value="
 تهران
">
                            تهران
                        </option>
                        <option value="
 خوزستان
">
                            خوزستان
                        </option>
                        <option value="
 آذربایجان شرقی
">
                            آذربایجان شرقی
                        </option>
                        <option value="
   آذربایجان غربی
">
                            آذربایجان غربی
                        </option>
                        <option value="
     اردبیل
">
                            اردبیل
                        </option>
                        <option value="
   اصفهان
">
                            اصفهان
                        </option>
                        <option value="
 البرز
">
                            البرز
                        </option>

                        <option value="
    ایلام
">
                            ایلام
                        </option>
                        <option value="
بوشهر
">
                            بوشهر
                        </option>
                        <option value="
  چهارمحال و بختیاری
">
                            چهارمحال و بختیاری
                        </option>
                        <option value="
    خراسان جنوبی
">
                            خراسان جنوبی
                        </option>
                        <option value="
 خراسان رضوی
">
                            خراسان رضوی
                        </option>
                        <option value="
  خراسان شمالی
">
                            خراسان شمالی
                        </option>

                        <option value="
   زنجان
">
                            زنجان
                        </option>
                        <option value="
     سمنان
">
                            سمنان
                        </option>
                        <option value="
  سیستان و بلوچستان
">
                            سیستان و بلوچستان
                        </option>
                        <option value="
  فارس
">
                            فارس
                        </option>
                        <option value="
  قزوین
">
                            قزوین
                        </option>

                        <option value="
  قم
">
                            قم
                        </option>

                        <option value="
     کردستان
">
                            کردستان
                        </option>

                        <option value="
   کرمان
">
                            کرمان
                        </option>

                        <option value="
  کرمانشاه
">
                            کرمانشاه
                        </option>

                        <option value="
  کهگیلویه و بویراحمد
">
                            کهگیلویه و بویراحمد
                        </option>

                        <option value="
     گلستان
">
                            گلستان
                        </option>

                        <option value="
    گیلان
">
                            گیلان
                        </option>

                        <option value="
     لرستان
">
                            لرستان
                        </option>

                        <option value="
      مازندران
">
                            مازندران
                        </option>

                        <option value="
    مرکزی
">
                            مرکزی
                        </option>

                        <option value="
  هرمزگان
">
                            هرمزگان
                        </option>

                        <option value="
  همدان یزد
">
                            همدان یزد
                        </option>

                        <option value="
 یزد
">
                            یزد
                        </option>

                    </select>
                </div>
            </div>
            <div class="Services d-flex flex-column justify-content-center align-items-center">
                <p>
                    خدمات<span>پرده</span>در دسته بندی مشخص
                </p>
                <div class="d-flex flex-row flex-wrap  justify-content-center align-items-center">
                    <div class="services-icon-hover d-flex flex-column justify-content-center align-items-center m-4">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                        <p class="mt-2">پرده سراها</p>
                    </div>
                    <div class="services-icon-hover d-flex flex-column justify-content-center align-items-center m-4">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                        <p class="mt-2">پرده سراها</p>
                    </div>
                    <div class="services-icon-hover d-flex flex-column justify-content-center align-items-center m-4">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                        <p class="mt-2">پرده سراها</p>
                    </div>
                    <div class="services-icon-hover d-flex flex-column justify-content-center align-items-center m-4">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                        <p class="mt-2">پرده سراها</p>
                    </div>
                    <div class="services-icon-hover d-flex flex-column justify-content-center align-items-center m-4">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                        <p class="mt-2">پرده سراها</p>
                    </div>
                    <div class="services-icon-hover d-flex flex-column justify-content-center align-items-center m-4">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                        <p class="mt-2">پرده سراها</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content -->

    <!-- Start new ads -->
    <div class="new-ads d-flex flex-column justify-content-center align-items-center">
        <h2 class="m-5">جدیدترین آگهی ها</h2>
        <div class="new-ads-list d-flex flex-row  flex-wrap justify-content-center align-items-center">
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>
            <div class="new-ads-list-item d-flex flex-column justify-content-center align-items-center">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <p class="m-0">تهران خیابان نیاوران</p>
                <a href="#" class="text-center py-2 btn-ads-item">مشاهده آگهی</a>
            </div>

        </div>
    </div>
    <!-- End new ads -->

    <!-- Start Popular store -->
    <div class="popular-store d-flex flex-column ">
        <h2 class="m-5 d-flex align-self-center">محبوب ترین فروشگاه ها</h2>
        <div class="popular-store-list customer-logos slider">
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>
            <div class="popular-store-list-item slide">
                <img src="/themeassets/pardesara/img/ads1.png" alt="ads">
                <h3 class="m-3">پرده دست دوم نقش برجسته مدل رومی</h3>
                <div class="popular-store-star d-flex flex-row justify-content-center align-items-center">
                    <p>256 نفر</p>
                    <div class="d-flex flex-row">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                        <img src="/themeassets/pardesara/img/star.png" alt="star">
                    </div>
                </div>
                <p class="m-0">تهران خیابان نیاوران</p>
            </div>

        </div>
    </div>
    <!-- End Popular store -->

    <!-- Start Help -->
    <div class="py-5 help d-flex flex-column justify-content-center align-items-center">
        <img src="/themeassets/pardesara/img/help.png" alt="backgrund">
        <br>
        <h3 class="text-light pt-5 mt-5">راهنمای خرید، آسان و سریع ۳ مرحله‌ای</h3>
        <div class="help-card d-flex flex-row w-100 flex-wrap justify-content-center">
            <div class="m-0 mx-lg-4 help-card-item d-flex flex-column justify-content-center align-items-center m-1">
                <span></span>
                <div class="help-card-item-icon d-flex justify-content-center align-items-center"><img src="/themeassets/pardesara/img/website.png" alt="help"></div>
                <h3>آگهی را انتخاب کن</h3>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
            </div>
            <div class="m-0 mx-lg-4  help-card-item d-flex flex-column justify-content-center align-items-center m-1">
                <span></span>
                <div class="help-card-item-icon d-flex justify-content-center align-items-center"><img src="/themeassets/pardesara/img/website.png" alt="help"></div>
                <h3>آگهی را انتخاب کن</h3>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
            </div>
            <div class="m-0 mx-lg-4  help-card-item d-flex flex-column justify-content-center align-items-center m-1">
                <span></span>
                <div class="help-card-item-icon d-flex justify-content-center align-items-center"><img src="/themeassets/pardesara/img/website.png" alt="help"></div>
                <h3>آگهی را انتخاب کن</h3>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
            </div>
        </div>
    </div>
    <!-- End Help -->

    <!-- Start Insert ad -->
    <div class="insert-ad d-flex flex-column justify-content-center align-items-center">
        <div class="d-none d-sm-block">
            <div class="d-none d-sm-block insert-ad-back d-flex flex-row flex-wrap">
                <div class="d-flex flex-row flex-wrap ">
                    <div class="insert-ad-back-icon-1 services-icon-hover d-flex flex-column justify-content-center align-items-center">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                    </div>
                    <div class="insert-ad-back-icon-2 services-icon-hover d-flex flex-column justify-content-center align-items-center">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                    </div>
                    <div class="insert-ad-back-icon-3 services-icon-hover d-flex flex-column justify-content-center align-items-center">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                    </div>
                    <div class="insert-ad-back-icon-4 services-icon-hover d-flex flex-column justify-content-center align-items-center">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                    </div>
                    <div class="insert-ad-back-icon-5 services-icon-hover d-flex flex-column justify-content-center align-items-center">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                    </div>
                    <div class="insert-ad-back-icon-6 services-icon-hover d-flex flex-column justify-content-center align-items-center">
                        <div class="services-icon">
                            <img src="/themeassets/pardesara/img/curtain.png" alt="Services-curtain">
                        </div>
                        <span class="icon-hover"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="insert-ad-content d-flex flex-column justify-content-center align-items-center">
            <h2>با ثبت خدمات خود در پرده سرا به صورت انلاین سفارش بگیرید</h2>
            <a href="/login" class="btn-insert-ad btn text-light text-center py-3">ثبت آگهی<img src="/themeassets/pardesara/img/plus.png" alt="plus"></a>
        </div>
    </div>
    <!-- End Insert ad -->
@endsection
