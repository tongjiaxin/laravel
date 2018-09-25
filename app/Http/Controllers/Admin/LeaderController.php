<?php
namespace  App\Http\Controllers\Admin;
use App\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderController extends Controller{

    public function index(){
        $users=DB::table('author')->get();
        $user=DB::table('novel_chapter')->get();
        $type=DB::table('type')->get();
        return view('Admin.leader.index',['users'=>$users,'user'=>$user,'type'=>$type]);
    }

    public function add(){
        $user = DB::table('novel')->get();
        return view('Admin.leader.add',['user'=>$user]);
    }
    public function add1(){
        return view('Admin.leader.add1');
    }
    public function addd(){
        $arr = $_POST;
        unset($arr['_token']);
        if(DB::table('novel_chapter')->insert($arr)){
            return redirect('/Film/index');
        }
    }

    public function del(){
        $id=$_GET['id'];
        if(DB::table('novel_chapter')->where('id',$id)->delete()){
            return redirect('/Film/index');
        }
    }


}