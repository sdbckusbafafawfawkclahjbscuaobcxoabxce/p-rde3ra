<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App\Http\Controllers;
use App\content;
use App\catgory;
use App\generalinfo;
use Illuminate\Http\Request;

class Gilasweb_ContentController extends Controller
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
        $this->allmenucontents=content::where('catgory','menu')->whereNotIn('status',['deleted'])->get();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_all(Request $request)
    {
        $catgories=catgory::whereNotIn('status',['deleted'])->get();
        if(isset($request->post_type_id))
            $allcontents=content::search(fl_clean($request->key), null, true)->where('post_type_id',fl_clean($request->post_type_id))->whereNotIn('status',['deleted'])->paginate(25);
        else
            $allcontents=content::search(fl_clean($request->key), null, true)->whereNotIn('status',['deleted'])->paginate(25);

        return view('theme.contents_archive')->with("allmenucontents",$this->allmenucontents)->with('allcontents',$allcontents)->with('catgories',$catgories)->with('generalinfo', $this->generalinfo);
    }
    public function archive_all(Request $request)
    {
        $catgories=catgory::whereNotIn('status',['deleted'])->get();
        if(isset($request->post_type_id))
        $allcontents=content::where('post_type_id',fl_clean($request->post_type_id))->whereNotIn('status',['deleted'])->paginate(25);
        else
        $allcontents=content::whereNotIn('status',['deleted'])->paginate(25);
        return view('theme.contents_archive')->with("allmenucontents",$this->allmenucontents)->with('allcontents',$allcontents)->with('catgories',$catgories)->with('generalinfo', $this->generalinfo);
    }
    public function single_sll(content $content)
    {
        return view('theme.contents_single')->with("allmenucontents",$this->allmenucontents)->with("content",$content)->with('generalinfo', $this->generalinfo);
    }
}
