{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

<?php
use App\userlog;
use Illuminate\Support\Facades\Auth;
?>
<style>
    html, body {
        height: 100%;
        font-family: 'shabnam', tahoma;
        background: #D50000;
        color: white;
    }

    .pnf-content {
        height: 100%;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .pnf-content img {
        width: 400px;
        max-width: 90%;
        margin-bottom: 25px;
    }

    .pnf-content h1 {
        margin: 10px 0 0 0;
    }

    .pnf-content p {
        margin: 5px 0;
        font-size: 13px;
    }

    .pnf-content nav {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        width: 95%;
    }

    .pnf-content nav a {
        margin: 0 10px;
        font-size: 13px;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.5);
        transition: all 250ms;
    }

    .pnf-content nav a:hover {
        color: #fff;
    }

    .split-line {
        width: 150px;
        height: 1px;
        background-color: rgba(255, 255, 255, 0.15);
        border: none;
        margin: 15px 0;
    }
</style>

<div class="pnf-content">
    <img src="/defaultassets/img/theme_gilasweb_ir/404.png" alt="404">
    <h1>
        هیچ صفحه‌ای یافت نشد</h1>
    <p>شاید لینکی که وارد کرده‌اید اشتباه باشد یا صفحه مورد نظر پاک شده باشد</p>

    {{Request::ip()}}
    <hr class="split-line">
    <nav>
        <a href="{{url('/')}}">صفحه اصلی</a>
    </nav>

</div>
<?php
$uarray=[
    'userid' => (isset(Auth::user()->id))?Auth::user()->id:'کاربر مهمان',
    'username' => (isset(Auth::user()->name))?Auth::user()->name:'کاربر مهمان',
    'userrole' => (isset(Auth::user()->role))?Auth::user()->role:'کاربر مهمان',
    'userip' => GetRealIp(),
    'useragent' => $_SERVER['HTTP_USER_AGENT'],
    'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
    'description' => '',
    'jalalitimestamps' => verta()
];
userlog::create([
    'userid' => (isset(Auth::user()->id))?Auth::user()->id:'کاربر مهمان',
    'username' => (isset(Auth::user()->name))?Auth::user()->name:'کاربر مهمان',
    'userrole' => (isset(Auth::user()->role))?Auth::user()->role:'کاربر مهمان',
    'userip' => GetRealIp(),
    'useragent' => $_SERVER['HTTP_USER_AGENT'],
    'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
    'description' => '404 Error',
    'jalalitimestamps' => verta()
]);
$message='';
foreach(array_keys($uarray) as $single){
$message=$message.$single.'=>'.$uarray[$single].'<br>';
}
//mailSender("$_SERVER[HTTP_HOST]صفحه 404 ",$message,"info@$_SERVER[HTTP_HOST]","info@gilasweb.ir");
?>







