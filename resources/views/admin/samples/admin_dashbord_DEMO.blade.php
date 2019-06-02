@extends('layouts.admin.admin_panel')

@section('content')
    @include('layouts.admin.admin_sidebar')
    <div class="main-panel IRANSans">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#pablo">داشبورد</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="جستجو...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    آمارها
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">۵</span>
                                <p class="d-lg-none d-md-block">
                                    اعلان‌ها
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">محمدرضا به ایمیل شما پاسخ داد</a>
                                <a class="dropdown-item" href="#">شما ۵ وظیفه جدید دارید</a>
                                <a class="dropdown-item" href="#">از حالا شما با علیرضا دوست هستید</a>
                                <a class="dropdown-item" href="#">اعلان دیگر</a>
                                <a class="dropdown-item" href="#">اعلان دیگر</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    حساب کاربری
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <p class="card-category">فضا مصرف شده</p>
                                <h3 class="card-title IRANSans">49/50
                                    <small>GB</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    <a href="#pablo">فضای بیشتری داشته باشید...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store</i>
                                </div>
                                <p class="card-category">سود</p>
                                <h3 class="card-title IRANSans">$34,245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>۲۴ ساعت اخیر
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <p class="card-category">مشکلات حل شده</p>
                                <h3 class="card-title IRANSans">75</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> توسط گیت‌هاب
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <p class="card-category">دنبال‌کننده</p>
                                <h3 class="card-title IRANSans">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> هم‌اکنون
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-success">
                                <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title IRANSans">فروش روزانه</h4>
                                <p class="card-category">
                    <span class="text-success">
                      <i class="fa fa-long-arrow-up"></i> 55% </span> رشد در فروش امروز.</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> ۴ دقیقه پیش
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-warning">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title IRANSans">دنبال کننده‌های ایمیلی</h4>
                                <p class="card-category">کارایی آخرین کمپین</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> کمپین دو روز پیش ارسال شد
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-danger">
                                <div class="ct-chart" id="completedTasksChart"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title IRANSans">وظایف انجام شده</h4>
                                <p class="card-category">کارایی آخرین کمپین</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> کمپین دو روز پیش ارسال شد
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper IRANSans">
                                        <span class="nav-tabs-title">وظایف:</span>
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                                    <i class="material-icons">bug_report</i> باگ‌ها
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#messages" data-toggle="tab">
                                                    <i class="material-icons">code</i> وبسایت
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#settings" data-toggle="tab">
                                                    <i class="material-icons">cloud</i> سرور
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن؟</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند؟</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>همان حال کار آنها به نوعی وابسته به متن می‌باشد
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید؟</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی؟</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td> از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی ؟
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند؟</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="ویرایش وظیفه" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="حذف" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title IRANSans">آمار کارکنان</h4>
                                <p class="card-category">کارکنان جدید از ۱۵ آبان ۱۳۹۶</p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>کد</th>
                                    <th>نام</th>
                                    <th>حقوق</th>
                                    <th>استان</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>احمد حسینی</td>
                                        <td>$36,738</td>
                                        <td>مازندران</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>مینا رضایی</td>
                                        <td>$23,789</td>
                                        <td>گلستان</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>مبینا احمدپور</td>
                                        <td>$56,142</td>
                                        <td>تهران</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>جلال آقایی</td>
                                        <td>$38,735</td>
                                        <td>شهرکرد</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title IRANSans">اعلان ها</h3>
                                <p class="card-category">ایجاد شده توسط دوست ما
                                    <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. لطفا
                                    <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">مستندات کامل </a> را مشاهده بکنید.
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>
                      این یک اعلان است که با کلاس "alert-warning" ایجاد شده است.</span>
                                </div>
                                <div class="alert alert-primary">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>
                      این یک اعلان است که با کلاس "alert-primary" ایجاد شده است.</span>
                                </div>
                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                    <i class="material-icons" data-notify="icon">add_alert</i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span data-notify="پیام">این یک اعلان با دکمه بستن و آیکن است</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="/adminassets/img/faces/marc.jpg" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-category text-gray">مدیرعامل / مدیرفنی</h6>
                                <h4 class="card-title IRANSans">خداداد عزیزی</h4>
                                <p class="card-description">
                                    طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند ...
                                </p>
                                <a href="#pablo" class="btn btn-primary btn-round">دنبال‌کردن</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="http://sms.gilasweb.ir/">
                                    شارژ پیامک
                                </a>
                            </li>
                            <li>
                                <a href="https://gilasweb.ir/sposts/%D9%87%D9%85%DA%A9%D8%A7%D8%B1%DB%8C">
                                    همکاری با ما
                                </a>
                            </li>
                            <li>
                                <a href="https://www.gilasweb.ir/user/support">
                                    درخواست پشتیبانی
                                </a>
                            </li>
                            <li>
                                <a href="http://pay.gilasweb.ir/">
                                    پرداخت آزاد
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, قالب کرافیکی ساخته شده
                        توسط
                        <a href="https://www.creative-tim.com" target="_blank">تیم خلاق</a>، توسعه پردازشی و اصلاح شده توسط
                        <a href="https://Gilasweb.ir" target="_blank">Gilasweb.ir</a>
                        برای وب بهتر.
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
