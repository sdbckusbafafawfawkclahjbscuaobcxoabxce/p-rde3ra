<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use App\generalinfo;
use App\User;
use App\userlog;
use Hash;

class Gilasweb_UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->generalinfo = generalinfo::where('status', 'active')->get();
        $this->base_path= base_path('../public_html'); //online host
        //$this->base_path= base_path('public'); //local host
    }

    public function index()
    {
        return view('user/user_dashbord')->with('generalinfo', $this->generalinfo);
    }

    public function show_information()
    {
        return view('user.user_information')->with('generalinfo', $this->generalinfo);
    }

    public function action_information(Request $request)
    {
        userlog::create([
            'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
            'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
            'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
            'userip' => GetRealIp(),
            'useragent' => $_SERVER['HTTP_USER_AGENT'],
            'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'description' => 'change information',
            'jalalitimestamps' => verta()
        ]);

        $request_array = get_object_vars($request);
        $user = Auth::user();

        if (Auth::user()->name != $request->name) {
            Validator::make($request_array, [
                'name' => 'required|string|max:255',
            ]);
            $user->name = fl_clean($request->name);
        }

        if (Auth::user()->email != $request->email) {
            Validator::make($request_array, [
                'email' => 'required|string|email|max:255|unique:users',
            ]);
            $user->email = fl_clean($request->email);
        }

        if (Auth::user()->phone != $request->phone) {
            Validator::make($request_array, [
                    'phone' => 'required|max:99999999999|min:1000000000|numeric|unique:users',
                ]
            );
            $user->phone = fl_clean($request->phone);
        }
        if (Auth::user()->coname != $request->coname) {
            Validator::make($request_array, [
                    'coname' => 'required|string',
                ]
            );
            $user->coname = fl_clean($request->coname);
        }
        if (Auth::user()->cocat != $request->cocat) {
            Validator::make($request_array, [
                    'cocat' => 'required|string',
                ]
            );
            $user->cocat = fl_clean($request->cocat);
        }
        if (Auth::user()->cocrative != $request->cocrative) {
            Validator::make($request_array, [
                    'cocrative' => 'required|string',
                ]
            );
            $user->cocrative = fl_clean($request->cocrative);
        }
        if (Auth::user()->coabout != $request->coabout) {
            Validator::make($request_array, [
                    'coabout' => 'required|string',
                ]
            );
            $user->coabout = fl_clean($request->coabout);
        }
        
        if($request->hasFile('userpic')) {
            $user->imgpath =file_handle(Input::file('userpic'),"---", '/uploads/userpic', $this->base_path);
        }
        $user->save();

        $prepage = url()->previous();
        $message = "عملیات موفق";
        $error = 'اطلاعات با موفقیت بروز شد';
        $class = "bg-success";
        exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
    }

    public function show_changepassword()
    {
        return view('auth.passwords.changepassword');
    }

    public function action_changePassword(Request $request)
    {
        userlog::create([
            'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
            'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
            'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
            'userip' => GetRealIp(),
            'useragent' => $_SERVER['HTTP_USER_AGENT'],
            'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'description' => 'change password',
            'jalalitimestamps' => verta()
        ]);
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            $prepage = "/user/changepassword";
            $message = "خطای ورودی";
            $error = 'پسورد قبلی خود را به درستی وارد نکرده بودید';
            $class = "bg-warning";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            $prepage = "/user/changepassword";
            $message = "خطای ورودی";
            $error = 'پسورد جدید نمی تواند شبیه پسورد قبلی باشد';
            $class = "bg-warning";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }

        if ($request->get('new-password-confirmation') == $request->get('new-password')) {
            $this->validate($request, [
                'current-password' => 'required',
                'new-password' => 'required|string|min:6',
            ]);
            //Change Password
            $user = Auth::user();
            $user->password = Hash::make($request->get('new-password'));
            $user->save();
            $prepage = url()->previous();
            $message = "عملیات موفق";
            $error = 'پسورد با موفقیت تغییر کرد';
            $class = "bg-success";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        } else {
            $prepage = "/user/changepassword";
            $message = "خطای ورودی";
            $error = 'خطا در تایید(دو ورودی مثل هم نیستند) پسورد جدید';
            $class = "bg-warning";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
    }

}



