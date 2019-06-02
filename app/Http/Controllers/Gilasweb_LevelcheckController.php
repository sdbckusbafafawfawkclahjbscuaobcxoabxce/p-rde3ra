<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\usercart;
use App\userlog;

class Gilasweb_LevelcheckController extends Controller
{
    public function index()
    {
        userlog::create([
            'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
            'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
            'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
            'userip' => GetRealIp(),
            'useragent' => $_SERVER['HTTP_USER_AGENT'],
            'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'description' => '',
            'jalalitimestamps' => jalalitimestamp()
        ]);

        if(auth::check())
        {
            $usercart = usercart::where('userid',Auth::user()->id)->latest()->take(1)->get();
            $link = (strlen(session()->get('afterloginbacktolink'))>3)? session()->get('afterloginbacktolink') : '/user' ; //baselink
            if (count(Cart::content()) > 0 || (isset($usercart[0]) && ($usercart[0]->number != 'none' && $usercart[0]->number > 0))){$link = '/user/cart';}
            return redirect($link);
        }
        else
        {
            return redirect('/login');
        }
    }
}