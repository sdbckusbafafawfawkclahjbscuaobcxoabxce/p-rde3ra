<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\generalinfo;
use App\User;
use App\userlog;
use Hash;

class PhoneController extends Controller
{
    public function checkphonelogin(Request $form)
    {
        userlog::create([
            'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
            'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
            'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
            'userip' => GetRealIp(),
            'useragent' => $_SERVER['HTTP_USER_AGENT'],
            'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'description' => '',
            'jalalitimestamps' => verta()
        ]);

        if (isset($form->phone)) {
            $form->phone = fl_fa2en_num($form->phone);
            $generalinfo = generalinfo::where('status', 'active')->get();
            if (fl_irmobile($form->phone)) {
                $code = rand(1000, 9999);
                session(['verifyphonecode' => $code]);
                $user = User::where('phone', '=', $form->phone)->where('status', '=', 'active')->first();;
                if ($user !== null) {
                    smsverifysend($form->phone, 'verify', $generalinfo[19]->value, $_SERVER['SERVER_NAME'], $code, '', '', '');
                    return view('auth.verifycode')->with('phone', $form->phone)->with('generalinfo', $generalinfo);
                } else {
                    //return Redirect('/login')->withErrors(['عضوی با این شماره موبایل یافت نشد']);
                    $newUser = [
                        "email" => "$form->phone@noemail.com",
                        "phone" => $form->phone,
                        "password" => Hash::make($form->phone.md5(verta())),
                        "name" => "user".time(),
                        "status" => "active",
                        "level" => "none",
                        "other" => "none",
                        "extradata" => "none",
                        "scores" => "0",
                        "credit" => "0",
                        "role" => "0",
                    ];
                    $newUserdata = User::create($newUser);
                    smsverifysend($form->phone, 'verify', $generalinfo[19]->value, $_SERVER['SERVER_NAME'], $code, '', '', '');
                    return view('auth.verifycodenewuser')->with('phone', $form->phone)->with('generalinfo', $generalinfo);
                }
            } else {
                return view('auth.login')->withErrors(['شماره موبایل وارد شده معتبر نیست'])->with('generalinfo', $generalinfo);
            }
        } else {
            if(auth::check)
            {
                return redirect("/user");
            }
            $prepage = asset("/login");
            $message = "خطای ساختار";
            $error = 'خطا: ساختار شماره موبایل شما با فرمت خط اپراتورهای ایران مطابقت ندارد ';
            $class = "bg-warning";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
    }


    public function checkcodelogin(Request $form)
    {
        userlog::create([
            'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
            'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
            'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
            'userip' => GetRealIp(),
            'useragent' => $_SERVER['HTTP_USER_AGENT'],
            'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'description' => '',
            'jalalitimestamps' => verta()
        ]);
        $truecode = session()->get('verifyphonecode');
        if (isset($form->code) && isset($form->phone)) {
            $form->code = fl_fa2en_num($form->code);
            $form->phone = fl_fa2en_num($form->phone);
            if ($truecode == $form->code) {
                $user = User::where('phone', '=', $form->phone)->where('status', '=', 'active')->first();
                if($form->username !== null){
                    $user->name=$form->username;
                    $user->save();
                    post_req('http://www.rscu.ir/rest/register', "phone=".$form->phone."&name=".$form->username);
                }
                Auth::login($user);
                return Redirect(asset('/levelcheck'));
            } else {
                $generalinfo = generalinfo::where('status', 'active')->get();
                return view('auth.login')->withErrors(['کد وارد شده اشتباه است'])->with('phone', $form->phone)->with('generalinfo', $generalinfo);
            }
        } else {
            if(auth::check)
            {
                return redirect("/user");
            }
            $prepage = asset("/login");
            $message = "خطای ساختار";
            $error = 'خطا: درخواست حاوی اطلاعات غلط است ';
            $class = "bg-warning";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
    }
}