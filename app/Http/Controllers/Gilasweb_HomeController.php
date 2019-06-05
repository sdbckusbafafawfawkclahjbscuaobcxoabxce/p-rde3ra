<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App\Http\Controllers;
use App\generalinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\content;
use App\banner;
use App\User;

class Gilasweb_HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->generalinfo = generalinfo::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allmenucontents=content::where('catgory','menu')->whereNotIn('status',['deleted'])->get();
        $allcontentspost=content::where('post_type_id','1')->whereNotIn('status',['deleted'])->get();
        $allcontentspage=content::where('post_type_id','2')->whereNotIn('status',['deleted'])->get();
        $allbanner=banner::whereNotIn('status',['deleted'])->get();
        $users=User::whereNotIn('status',['deleted','inactive'])->get();
        /*
        if(Auth::check())
        return view('home')->with('generalinfo',$this->generalinfo)->with('allmenucontents',$allmenucontents)->with('allcontentspost',$allcontentspost)->with('allcontentspage',$allcontentspage);
        else
        return view('welcome')->with('generalinfo',$this->generalinfo);
        */
        return view('theme.home')->with('users',$users)->with('allbanner',$allbanner)->with('generalinfo',$this->generalinfo)->with('allmenucontents',$allmenucontents)->with('allcontentspost',$allcontentspost)->with('allcontentspage',$allcontentspage);
    }
    public function show_userpage(Request $request)
    {
        $allmenucontents=content::where('catgory','menu')->whereNotIn('status',['deleted'])->get();
        $user=User::find($request->userid);
        return view('theme.users_single')->with('user',$user)->with('generalinfo',$this->generalinfo)->with('allmenucontents',$allmenucontents);
    }
}
