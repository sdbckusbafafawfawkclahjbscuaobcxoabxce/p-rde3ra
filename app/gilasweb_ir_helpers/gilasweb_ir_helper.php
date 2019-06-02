<?php
//////////////////////////////////////////////////////////////////////////////////////// Programer Control

//access
//user_access((isset($userinfo->status))?$userinfo->status:'active');
//admin_access(['09163151967',],(isset($userinfo->status))?$userinfo->status:'active',(isset($userinfo->phone))?$userinfo->phone:null);
//exit("<center style='width: 100%; height: 100%; display: flex; align-items: center; justify-content: center'><h1 style='color:red'>سامانه در حال آپدیت می باشد</h1></center>");

//SSl Control
if(!isset($_SERVER['HTTPS'])) {
    $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //header("Location: $actual_link");
}

//ip_blocker
function ip_blocker($userslogerror){
    $safeIPs=array('5.127.46.151','185.94.99.251');
    if($userslogerror->count() > 2000 && !in_array(GetRealIp(),$safeIPs))
    {
        exit(redirect('https://www.google.com/search?q=You+Are+Dangerous'));
    }
    elseif($userslogerror->where('userip',GetRealIp())->count() > 300 && !in_array(GetRealIp(),$safeIPs)){
        $prepage = "https://www.google.com/search?q=You+Are+Dangerous";
        $message = "دسترسی شما محدود شده است";
        $error = 'لطفا جهت جلوگیری از بلاک شدن آی پی از تلاش مجدد خودداری کنید';
        $class = "bg-danger";
        exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
    }
}

//ir filter
/*
if (json_decode(file_get_contents("http://ipinfo.io/".GetRealIp()))->country != "IR")
{
    exit("<center style='width: 100%; height: 100%; display: flex; align-items: center; justify-content: center'><h1 style='color:red' DIR='rtl'>سامانه رسانچت برای IP های خارج ایران در دسترس نیست</h1></center>");
}
*/
//////////////////////////////////////////////////////////////////////////////////////// Programer Control

function admin_access($status,$phone,$check = NULL){
    if($status != "active" || !in_array($phone,['09163151967'])){
        if(!isset($check) || $check == 0 || $check == NULL) {
            return false;
        }
        else
        {
            return true;
        }
    }
    else{
        return true;
    }
}

function user_access($status,$check = NULL){
    if($status == "inactive"){
        if(!isset($check) || $check == 0 || $check == NULL) {
            $prepage = "/";
            $message = "دسترسی شما محدود است";
            $error = "لطفا جهت جلوگیری از بلاک شدن آی پی از تلاش مجدد خودداری کنید";
            $class = "bg-danger";
            exit(view("message")->with("error", $error)->with("message", $message)->with("prepage", $prepage)->with("class", $class));
        }
        else
        {
            return false;
        }
    }
    else{
        return true;
    }
}

function jalalitimestamp()
{
    $g_y=date('Y');
    $g_m=date('m');
    $g_d=date('d');

    $d_4 = $g_y % 4;
    $g_a = array(0, 0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
    $doy_g = $g_a[(int)$g_m] + $g_d;
    if ($d_4 == 0 and $g_m > 2)
        $doy_g++;
    $d_33 = (int)((($g_y - 16) % 132) * 0.0305);
    $a = ($d_33 == 3 or $d_33 < ($d_4 - 1) or $d_4 == 0) ? 286 : 287;
    $b = (($d_33 == 1 or $d_33 == 2) and ($d_33 == $d_4 or $d_4 == 1)) ? 78 : (($d_33 == 3 and $d_4 == 0) ? 80 : 79);
    if((int)(($g_y - 10) / 63) == 30) {
        $a--;
        $b++;
    }
    if($doy_g > $b) {
        $jy = $g_y - 621;
        $doy_j = $doy_g - $b;
    }
    else {
        $jy = $g_y - 622;
        $doy_j = $doy_g + $a;
    }
    if($doy_j < 187) {
        $jm = (int)(($doy_j - 1) / 31);
        $jd = $doy_j - (31 * $jm++);
    }
    else {
        $jm = (int)(($doy_j - 187) / 30);
        $jd = $doy_j - 186 - ($jm * 30);
        $jm += 7;
    }
    date_default_timezone_set("Asia/Tehran");
    return $jy.'/'.$jm.'/'.$jd.' - '.date("h:i:sa");
}


include "sms/vendor/autoload.php";
use Kavenegar\KavenegarApi;

function file_handle($file,$oldpath,$newpath,$basepath,$name = null)
{
    $allowedformat= array("jpeg","jpg","JPEG","JPG","png","PNG","pdf","PDF","doc","docx","DOC","DOCX","zip","ZIP","rar","RAR","psd","PSD","wav","WAV");
    $allowedmimetype= array("image/jpeg","image/jpg","image/pjpeg","image/x-png","image/png","application/octet-stream","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.ms-word","application/msword","application/pdf","application/zip","application/x-rar","image/vnd.adobe.photoshop");
    if (file_exists($basepath.$oldpath)){
        unlink($basepath.$oldpath);
    }
    if(is_file($file)){
        $temp=explode(".",$file->getClientOriginalName());
        $format=$temp[(count($temp )-1) ];
        $mimetype=$file->getMimeType();
        $filesize=$file->getClientSize(); //byte
        if(count($temp) == 2 && $filesize < 50000000 && in_array($format,$allowedformat) && in_array($mimetype,$allowedmimetype)) {
            if (!isset($name)){
                $fullname = explode(".", $file->getClientOriginalName());
                $format = $fullname[(count($fullname) - 1)];
                $name = md5(rand(0, 9999)) . md5(round(0, 1000000));
                $name =$name.".".strtolower($format);
            }
            $file->move($basepath.$newpath,$name);
            return $path=$newpath.trim(" / ").$name;
        }
        else
        {
            return "file type error";
        }
    }
    return "no file detected";
}

function smsverifysend($phone,$template,$apikey,$token,$token2,$token3,$token10,$token20){
//775170416E4355574F434753496D46635050575644413D3D
    $api = new KavenegarApi($apikey);
    $type = "sms";//sms | call
    if(strlen($token)<=1){
        unset($token);
    }
    if(strlen($token2)<=1){
        unset($token2);
    }
    if(strlen($token3)<=1){
        unset($token3);
    }
    if(strlen($token10)<=1){
        unset($token10);
    }
    if(strlen($token20)<=1){
        unset($token20);
    }
//token10 & token20
    if(isset($phone,$template,$token,$token2,$token3,$token10,$token20))
        return $result = $api->VerifyLookup($phone,$token,$token2,$token3,$template,$type,$token10,$token20);
    elseif(isset($phone,$template,$token,$token2,$token10,$token20))
        return $result = $api->VerifyLookup($phone,$token,$token2,"",$template,$type,$token10,$token20);
    elseif(isset($phone,$template,$token,$token10,$token20))
        return $result = $api->VerifyLookup($phone,$token,"","",$template,$type,$token10,$token20);

//token20
    elseif(isset($phone,$template,$token,$token2,$token3,$token20))
        return $result = $api->VerifyLookup($phone,$token,$token2,$token3,$template,$type,"",$token20);
    elseif(isset($phone,$template,$token,$token2,$token20))
        return $result = $api->VerifyLookup($phone,$token,$token2,"",$template,$type,"",$token20);
    elseif(isset($phone,$template,$token,$token20))
        return $result = $api->VerifyLookup($phone,$token,"","",$template,$type,"",$token20);

//token10
    elseif(isset($phone,$template,$token,$token2,$token3,$token10))
        return $result = $api->VerifyLookup($phone,$token,$token2,$token3,$template,$type,$token10,"");
    elseif(isset($phone,$template,$token,$token2,$token10))
        return $result = $api->VerifyLookup($phone,$token,$token2,"",$template,$type,$token10,"");
    elseif(isset($phone,$template,$token,$token10))
        return $result = $api->VerifyLookup($phone,$token,"","",$template,$type,$token10,"");

//alltoken
    elseif(isset($phone,$template,$token,$token2,$token3))
        return $result = $api->VerifyLookup($phone,$token,$token2,$token3,$template,$type);
    elseif(isset($phone,$template,$token,$token2))
        return $result = $api->VerifyLookup($phone,$token,$token2,"",$template,$type);
    elseif(isset($phone,$template,$token))
        return $result = $api->VerifyLookup($phone,$token,"","",$template,$type);
}

function chargepanelsms($apikey)
{
    $APIcode=$apikey;
    ob_start();
    $url = "https://api.kavenegar.com/v1/".$APIcode."/account/info.json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_exec($ch);
    $obj = ob_get_contents();
    ob_end_clean();
    $parsedJson = json_decode($obj);
    $entry = $parsedJson->entries;
    return (isset($entry->remaincredit))? $entry->remaincredit : 0;

}

function GetRealIp() {
    if (!empty($_SERVER["HTTP_CLIENT_IP"]))
//check ip from share internet
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
//to check ip is pass from proxy
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    else
        $ip = $_SERVER["REMOTE_ADDR"];
    return $ip;
}

function dirsize($dir)
{
    @$dh = opendir($dir);
    $size = 0;
    while ($file = @readdir($dh))
    {
        if ($file != "." and $file != "..")
        {
            $path = $dir."/".$file;
            if (is_dir($path))
            {
                $size += dirsize($path); // recursive in sub-folders
            }
            elseif (is_file($path))
            {
                $size += filesize($path); // add file
            }
        }
    }
    @closedir($dh);
    return $size;
}

function is_connected()
{
    $connected = @fsockopen("www.example.com", 80);
//website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;
}

function rand_color($ignore = NULL)
{
    $colors=["success","primary","danger","info","warning","rose"];
    if(isset($ignore))
    {
        foreach ($ignore as $singleignore)
        {array_splice($colors,$singleignore, 1);}
    }
    return $colors[rand(0,count($colors)-1)];
}

function array_unseter($arrays,$extratargers = NULL)
{
    $targets=["format","path","size","slug","id","created_at","updated_at","extradata","post_type_id","jalalitimestamps","status","credit","level","other","password","remember_token"];
    if(isset($extratargers))
    {
        $targets=array_merge($targets,$extratargers);
    }
    foreach($targets as $target){
        $arraysid=array_search($target,$arrays);
        unset($arrays[$arraysid]);
    }
    return $arrays=array_values(array_filter($arrays));
}

function show_real_target_name($name)
{
    $array_name = ["link"=>"لینک","father"=>"وابستگی","lg_slider"=> "اسلایدشو بزرگ","sm_slider"=> "گالری تصاویر","vendor_slider"=> "همکاران/مشتریان ما","banners_1"=> "بنر های کد یک","banners_2"=> "بنر های کد دو","role" => "سطح دسترسی", "title" => "عنوان", "description" => "متن", "imgpath" => "انتخاب تصویر شاخص", "catgory" => "دسته بندی", "status" => "وضعیت", "phone" => "تلفن همراه", "email" => "ایمیل", "name" => "نام و نام خانوادگی",];
    if(isset($array_name[$name]))
    {
        return $array_name[$name];
    }
    else
    {
        return $name;
    }
}

function post_req($url,$var){
    ob_start();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$var);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    echo curl_exec ($ch);
    curl_close ($ch);
    $obj = ob_get_contents();
    ob_end_clean();
    return $obj;
}

function fl_fa2en_num($xe) {
    $persian_num = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
    $latin_num = range(0, 9);
    $xe = str_replace($persian_num,$latin_num,$xe);
    return $xe;
}

function fl_en2fa_num($xe) {
    $persian_num = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
    $latin_num = range(0, 9);
    $xe = str_replace($latin_num,$persian_num,$xe);
    return $xe;
}

function get_gilasweb_message($mtype){
    $gilaswebmessage["img"]="https://www.gilasweb.ir/img/Gilas_Logo.jpg ";
    $gilaswebmessage["text_head"]="تشکر از اعتماد شما";
    $gilaswebmessage["text_body"]="به سیستم مدیریت جی ال اف تیم نرم افزاری گیلاس خوش آمدید، امیدواریم حس خوب مدیریت کامل پورتال خود را بتوانید تجربه کنید؛ ما نیز ضمن حمایت و پشتیبانی شما به مرور در تلاش برای بهبود و ارتقا فنی پنل خواهیم بود:)";
    $gilaswebmessage["action"]=" <br> <br>  ";
    return $gilaswebmessage[$mtype];
}

function fl_fa( $item ) {
    if(strlen($item)) {
        $item = str_split($item);
        for ($i = 0; $i < 10000; $i++) {
            if (!(isset($item[$i])&& $item[$i] != null)) {
                break;
            }
            $arrString[] = $item[$i];
        }

        foreach ($arrString as $key) {
            if (!preg_match("#[(a-zA-Z0-9 ‌،آابپتثجچحیخدذرزژسشطظعغفقکگلمنوهیئضص۱۲۳۴۵۶۷۸۹۰ء./\|,)+]#", $key)) {
                return false;
            }
        }
        return true;
    }
    else
    {
        return false;
    }
}


function fl_irmobile( $item ) {
    if(strlen($item)) {
        if (!preg_match("/^(09([0-9]{1}[0-9]{1})([0-9]{7}))*$/",$item)) {
            return false;
        }
        return true;
    }
    else
    {
        return false;
    }
}

function fl_clean($str) {
    return is_array($str) ? array_map('_clean', $str) : str_replace('\\', '\\\\', strip_tags(trim(htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES))));
}

function f_pusher($pusherid,$data)
{
    require __DIR__ . '/pusher/vendor/autoload.php';

    $options = array(
        'cluster' => 'eu',
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        'a794b0f1089fafd7fe18',
        '7e0ffeff073df3e14cf9',
        '684548',
        $options
    );
    $pusher->trigger('gilasweb',$pusherid,$data);
}

?>