<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use App\generalinfo;
use App\User;
use App\file;
use App\userlog;
use App\catgory;
use App\content;
use App\banner;
use App\userlogsarchive;

class Gilasweb_AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->x='0';
        $this->base_path= base_path('../public_html'); //online host
        //$this->base_path= base_path('public'); //local host
        $this->mail_path= base_path('../mail');
        $this->core_path= base_path();
        $this->generalinfo = generalinfo::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
    }


    public function action_files_upload(Request $request){
        if (Auth::user()->role != $this->x){
            userlog::create([
                'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
                'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
                'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
                'userip' => GetRealIp(),
                'useragent' => $_SERVER['HTTP_USER_AGENT'],
                'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
                'description' => 'admin invalid try',
                'jalalitimestamps' => verta()
            ]);
            $prepage = "/admin";
            $message = "دسترسی شما محدود است";
            $error = 'لطفا جهت جلوگیری از بلاک شدن آی پی از تلاش مجدد خودداری کنید';
            $class = "bg-danger";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
        $file= $request->file('file');
        if($file !== NULL){

            $temp=explode(".",$file->getClientOriginalName());
            $format=$temp[(count($temp )-1) ];
            $filesize=$file->getClientSize();
            $filepath=file_handle(Input::file('file'),"---", '/uploads/files',$this->base_path);

            file::create([
                'name' => 'فایل بدون نام',
                'format' =>  $format,
                'size' => $filesize,
                'path' => $filepath,
                'extradata' => 'none',
                'status' => 'active',
                'jalalitimestamps' => verta()
            ]);

            echo $request->index;
            exit;
        }
        else{
            return 'error';
        }
    }




    //dashbord
    public function index()
    {
        if (Auth::user()->role != $this->x){
            userlog::create([
                'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
                'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
                'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
                'userip' => GetRealIp(),
                'useragent' => $_SERVER['HTTP_USER_AGENT'],
                'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
                'description' => 'admin invalid try',
                'jalalitimestamps' => verta()
            ]);
            $prepage = "/admin";
            $message = "دسترسی شما محدود است";
            $error = 'لطفا جهت جلوگیری از بلاک شدن آی پی از تلاش مجدد خودداری کنید';
            $class = "bg-danger";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
        userlog::create([
            'userid' => (isset(Auth::user()->id)) ? Auth::user()->id : 'کاربر مهمان',
            'username' => (isset(Auth::user()->name)) ? Auth::user()->name : 'کاربر مهمان',
            'userrole' => (isset(Auth::user()->role)) ? Auth::user()->role : 'کاربر مهمان',
            'userip' => GetRealIp(),
            'useragent' => $_SERVER['HTTP_USER_AGENT'],
            'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'description' => 'admin',
            'jalalitimestamps' => verta()
        ]);
        //refresh userlogs table
        $userlogcopys = userlog::whereDate('created_at', '!=', Carbon::today())->get();
        foreach ($userlogcopys as $userlogcopy) {
            userlogsarchive::create([
                'userid' => $userlogcopy->userid,
                'username' => $userlogcopy->username,
                'userrole' => $userlogcopy->userrole,
                'userip' => $userlogcopy->userip,
                'useragent' => $userlogcopy->useragent,
                'path' => $userlogcopy->path,
                'description' => $userlogcopy->description,
                'jalalitimestamps' => $userlogcopy->jalalitimestamps
            ]);
        }
        userlog::whereDate('created_at', '!=', Carbon::today())->delete();
        $sizeondisk =(round((dirsize($this->core_path)+dirsize($this->base_path)+dirsize($this->mail_path))/1000000))+30;
        $chargepanelsms = (is_connected()) ? round(chargepanelsms($this->generalinfo[19]->value) / 1000) * 100 : '0';
        $usersalldb = user::whereNotIn('status',['deleted'])->orderBy('id', 'desc');
        $usersnumber = $usersalldb->count();
        $users = $usersalldb->take(10)->get();
        $upusersnumber = $usersalldb->where('role', '>', '1')->count();
        $userlogerroralldb = userlog::whereDate('created_at', Carbon::today())->whereNotIn('description', ['', 'success seen', 'admin', 'try', 'file show/download'])->select('id', 'username', 'userip', 'description', 'jalalitimestamps', 'path')->orderBy('id', 'desc');
        $userlogerrornumber = $userlogerroralldb->count();
        $userlogerror = $userlogerroralldb->take(20)->get();
        $userlogipalldb = userlog::whereDate('created_at', Carbon::today())->distinct('userip')->orderBy('id', 'desc');
        $userlogipnumber = $userlogipalldb->get(['userip'])->count();
        $userlogip = $userlogipalldb->take(10)->get(['userip']);
        foreach ($userlogip as $singleuserlogip) {
            $ipuserinfo2 = NULL;
            $ipuserinfo1 = userlog::whereDate('created_at', Carbon::today())->where('userip', $singleuserlogip->userip)->orderBy('id', 'desc')->first();
            if ($ipuserinfo1->username == 'کاربر مهمان')
                $ipuserinfo2 = userlog::where('userip', $singleuserlogip->userip)->where('username', 'NOT LIKE', 'کاربر مهمان')->orderBy('id', 'desc')->first();

            if ($ipuserinfo2 !== NULL)
                $userlogvisit[] = $ipuserinfo2;
            else
                $userlogvisit[] = $ipuserinfo1;
        }
        return view('admin.admin_dashbord')->with('chargepanelsms', $chargepanelsms)->with('generalinfo', $this->generalinfo)->with('upusersnumber', $upusersnumber)->with('users', $users)->with('usersnumber', $usersnumber)->with('sizeondisk', $sizeondisk)->with('userlogerror', $userlogerror)->with('userlogerrornumber', $userlogerrornumber)->with('userlogipnumber', $userlogipnumber)->with('userlogvisit', $userlogvisit);
    }
    public function show_users()
    {
        $users = user::whereNotIn('status',['deleted'])->orderBy('id', 'desc')->paginate(25);
        return view('admin.admin_users')->with('users', $users)->with('generalinfo', $this->generalinfo);
    }

    //generalinfo
    public function show_generalinfo()
    {
        return view('admin.admin_generalinfo')->with('generalinfo', $this->generalinfo);
    }
    public function action_generalinfo(Request $request)
    {
        foreach ($this->generalinfo as $general) {
            $general->value = (isset($request['g' . ($general->id - 1)]) && $request['g' . ($general->id - 1)] != NULL && !in_array('g' . ($general->id - 1), ['g5', 'g6'])) ? fl_clean($request['g' . ($general->id - 1)]) : fl_clean($general->value) ;
            $general->save();
        }
        if ($request->hasFile('g5')){
            $this->generalinfo[5]->value=file_handle(Input::file('g5'),$this->generalinfo[5]->value,'/uploads/generalinfo',$this->base_path);
            $this->generalinfo[5]->save();
        }
        if ($request->hasFile('g6')){
            $this->generalinfo[6]->value=file_handle(Input::file('g6'),$this->generalinfo[6]->value,'/uploads/generalinfo',$this->base_path);
            $this->generalinfo[6]->save();
        }
        if ($request->hasFile('g24')){
            $this->generalinfo[24]->value=file_handle(Input::file('g24'),$this->generalinfo[24]->value,'/uploads/generalinfo',$this->base_path);
            $this->generalinfo[24]->save();
        }
        $prepage=url()->previous();
        $message = "عملیات موفق";
        $error = 'تنظیمات با موفقیت ذخیره شد';
        $class = "bg-success";
        exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
    }


    //catgory
    public function show_catgory(Request $request)
    {
        $fathercatgories=catgory::where('post_type_id',$request->post_type_id)->where('father','none')->whereNotIn('status',['deleted'])->get();
        $allcatgories=catgory::where('post_type_id',$request->post_type_id)->whereNotIn('status',['deleted'])->get();
        $data=(isset($request->cat_id))?catgory::find($request->cat_id):NULL;
        return view('admin.admin_catgories')->with('generalinfo', $this->generalinfo)->with('request',$request)->with('data',$data)->with('allcatgories',$allcatgories)->with('fathercatgories',$fathercatgories);
    }
    public function action_catgory(Request $request)
    {
       $catgory=catgory::firstOrNew(array('id' => (isset($request->cat_id))?fl_clean($request->cat_id):0));
       $catgory->title=fl_clean($request->title);
       $catgory->post_type_id=fl_clean($request->post_type_id);
       $catgory->father=fl_clean($request->father);
       $catgory->jalalitimestamps=verta();
       $catgory->status='active';
       $catgory->save();
        $prepage=url()->previous();
        $message = "عملیات موفق";
        $error = 'دسته بندی با موفقیت ذخیره شد';
        $class = "bg-success";
        exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
    }


    //banner
    public function show_banners(Request $request)
    {
        $allbanners=banner::whereNotIn('status',['deleted'])->get();
        $data=(isset($request->banner_id))?banner::find($request->banner_id):NULL;
        return view('admin.admin_banners')->with('generalinfo', $this->generalinfo)->with('request',$request)->with('data',$data)->with('allbanners',$allbanners);
    }
    public function action_banners(Request $request)
    {
        $banner=banner::firstOrNew(array('id' => (isset($request->banner_id))?fl_clean($request->banner_id):0));
        if ($request->hasFile('img')){
            $banner->imgpath= file_handle(Input::file('img'),"---", '/uploads/banners',$this->base_path);
        }
        if($request->link !== NULL){
            $banner->link=fl_clean($request->link);
        }
        $banner->title=fl_clean($request->title);
        $banner->father=fl_clean($request->father);
        $banner->jalalitimestamps=verta();
        $banner->status='active';
        $banner->save();
        $prepage=url()->previous();
        $message = "عملیات موفق";
        $error = 'محتوی با موفقیت ذخیره شد';
        $class = "bg-success";
        exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
    }

    //content posts/pages
    public function show_contents_list(Request $request)
    {
        $catgories=catgory::where('post_type_id',$request->post_type_id)->whereNotIn('status',['deleted'])->get();
        $allcontents=content::where('post_type_id',$request->post_type_id)->whereNotIn('status',['deleted'])->paginate(25);
        return view('admin.admin_contentslist')->with('generalinfo', $this->generalinfo)->with('request',$request)->with('allcontents',$allcontents)->with('catgories',$catgories);
    }

    //content posts/pages
    public function show_files_list(Request $request)
{
    $allfiles=file::whereNotIn('status',['deleted'])->paginate(25);
    return view('admin.admin_fileslist')->with('generalinfo', $this->generalinfo)->with('request',$request)->with('allfiles',$allfiles);
}

    public function show_content(Request $request)
    {
        $catgories=catgory::where('post_type_id',$request->post_type_id)->whereNotIn('status',['deleted'])->get();
        $data=(isset($request->post_id))?content::find($request->post_id):NULL;
        return view('admin.admin_contents')->with('generalinfo', $this->generalinfo)->with('request',$request)->with('catgories',$catgories)->with('data',$data);
    }

    public function action_content(Request $request)
    {
        $content=content::firstOrNew(array('id' => (isset($request->post_id))?fl_clean($request->post_id):0));
        if ($request->hasFile('img')){
            $content->imgpath=file_handle(Input::file('img'),"---", '/uploads/contents',$this->base_path);
        }
        $content->post_type_id=fl_clean($request->post_type_id);
        $content->catgory=fl_clean($request->catgory);
        $content->title=fl_clean($request->title);
        $content->description=fl_clean($request->description);
        $content->jalalitimestamps=verta();
        $content->status='active';
        $content->save();
        $prepage=url()->previous();
        $message = "عملیات موفق";
        $error = 'محتوی با موفقیت ذخیره شد';
        $class = "bg-success";
        exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
    }

    public function content_img_upload( Request $request ) {
        userlog::create([
            'userid' => (isset(Auth::user()->id))?Auth::user()->id:'کاربر مهمان',
            'username' => (isset(Auth::user()->name))?Auth::user()->name:'کاربر مهمان',
            'userrole' => (isset(Auth::user()->role))?Auth::user()->role:'کاربر مهمان',
            'userip' => GetRealIp(),
            'useragent' => $_SERVER['HTTP_USER_AGENT'],
            'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'description' => '',
            'jalalitimestamps' => verta()
        ]);

        $this->validate( $request, [
            'file' => 'image|max:3000|mimes:jpeg,jpg,png',
        ] );

        $file = $request->file( 'file' );
        if($file !== NULL){
            $base_path=realpath( '../'.$this->base_path.'/uploads/contents');
            $name=str_random(10).'.'.$file->getClientOriginalExtension();
            $img = file_handle($file,"---", '/uploads/contents',$this->base_path,$name);
            return response()->json([ 'location' => $name]);
        }
        else{
            return 'null recive';
        }
    }

    public function public_actions(Request $request)
    {
        $cname=fl_clean($request->cname);
        $class_name = "App\\".fl_clean($request->model);
        $r = new \ReflectionClass($class_name);
        $instance =  $r->newInstanceWithoutConstructor();
        $modeldata=$instance->find(fl_clean($request->row_id));
        $modeldata->$cname=fl_clean($request->function);
        if($request->function == 'deleted'){
            if (isset($modeldata->imgpath)) {
                file_handle('---', $modeldata->imgpath,'/uploads/'.$request->model.'s',$this->base_path);
            } elseif (isset($modeldata->filepath)) {
                file_handle('---', $modeldata->filepath,'/uploads/'. $request->model.'s',$this->base_path);
            }elseif (isset($modeldata->path)) {
                file_handle('---', $modeldata->path,'/uploads/'. $request->model.'s',$this->base_path);
            }
        }
        $modeldata->save();
        return redirect(url()->previous());
    }

    public function show_public_edits(Request $request)
    {
        $class_name = "App\\".fl_clean($request->model);
        $r = new \ReflectionClass($class_name);
        $instance =  $r->newInstanceWithoutConstructor();
        $catgories=catgory::whereNotIn('status',['deleted'])->get();
        $data=$instance->find(fl_clean($request->row_id));
        $table = $data->getTable();
        $columns = \Schema::getColumnListing($table);
        $columns=array_unseter($columns);
        $action_roles=[
        'content' => route('action_public_edits',['model'=>$request->model,'row_id'=>$request->row_id]),
        'User' => route('action_public_edits',['model'=>$request->model,'row_id'=>$request->row_id]),
        'file' => route('action_public_edits',['model'=>$request->model,'row_id'=>$request->row_id]),
        'catgory' => route('action_public_edits',['model'=>$request->model,'row_id'=>$request->row_id]),
        'banner' => route('action_public_edits',['model'=>$request->model,'row_id'=>$request->row_id]),
        ];
        $action=$action_roles[$request->model];
        return view('admin.admin_publicedit')->with('generalinfo', $this->generalinfo)->with('request',$request)->with('catgories',$catgories)->with('data',$data)->with('columns',$columns)->with('action',$action);
    }

    public function action_public_edits(Request $request)
    {
        $class_name = "App\\".fl_clean($request->model);
        $r = new \ReflectionClass($class_name);
        $instance =  $r->newInstanceWithoutConstructor();
        $data=$instance->find(fl_clean($request->row_id));
        if($data->status == 'active'){
            $table = $data->getTable();
            $columns = \Schema::getColumnListing($table);
            $columns = array_unseter($columns, ['imgpath', 'filepath']);
            foreach ($columns as $column) {
                $data->$column = fl_clean($request->$column);
            }
            if ($request->hasFile('img')) {
                $data->imgpath = file_handle(Input::file('img'), $data->imgpath, '/uploads/' . $request->model . 's', $this->base_path);
            }
            if ($request->hasFile('imgpath')) {
                $data->imgpath = file_handle(Input::file('imgpath'), $data->imgpath, '/uploads/' . $request->model . 's', $this->base_path);
            }
            if ($request->hasFile('file')) {
                $data->filepath = file_handle(Input::file('file'), $data->filepath, '/uploads/' . $request->model . 's', $this->base_path);
            }
            if ($request->hasFile('filepath')) {
                $data->filepath = file_handle(Input::file('filepath'), $data->filepath, '/uploads/' . $request->model . 's', $this->base_path);
            }
            $data->save();
            $prepage = url()->previous();
            $message = "عملیات موفق";
            $error = 'تغییرات با موفقیت اعمال شد';
            $class = "bg-success";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
        else{
            $data->save();
            $prepage = '/admin';
            $message = "عملیات نا موفق";
            $error = 'محتوی مورد نظر شما غیر فعال یا پاک شده است';
            $class = "bg-danger";
            exit(view('message')->with('error', $error)->with('message', $message)->with('prepage', $prepage)->with('class', $class));
        }
    }
}