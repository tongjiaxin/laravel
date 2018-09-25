<?php
namespace  App\Http\Controllers\Admin;
use App\Model\Film;
use App\Model\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller{


    public function index(){
        $users = Film::paginate(2);
        $user = DB::table('type')->get();
        $list = DB::table('author')->get();

        return view('Admin.film.index',['users'=>$users,'user'=>$user,'list'=>$list]);
    }
    public function add(){
        $user = DB::table('type')->get();
        $users = DB::table('author')->get();
        return view('Admin.film.add',['user'=>$user,'users'=>$users]);
    }
    public function add1(Request $request){
        $arr = $request->all();
        unset($arr['_token']);
        $arr['Image_url']=$this->upload($arr['Image_url']);
        if(Film::insert($arr)){
            return redirect('/Film/index');
        }
    }

    public function read(){
        $id = $_GET['id'];
        $user = DB::table('novel_chapter')->where('Novel_id',$id)->get();
        $users = DB::table('novel')->where('id',$id)->get();
        return view('Admin.leader.index',['user'=>$user,'users'=>$users]);
    }

    public function content(){
        $id=$_GET['id'];
        $user = DB::table('novel_chapter')->where('id',$id)->get();
        return view('Admin.leader.content',['user'=>$user]);
    }

    public function del(){
        $id = $_GET['id'];
        $a = DB::table('novel')->where('id',$id)->delete();
        $b = DB::table('novel_chapter')->where('Novel_id',$id)->delete();
        if($a && $b){
            return redirect('/Film/index');
        }
    }

    public function upload($file){
        if(empty($file)){
            return '/images/photos/loggeduser.png';
        }
        $basePath = "uploads/".date('Y-m-d',time());//路径
        if(!file_exists($basePath)){//如果这个路径不存在
            mkdir($basePath,755,true);
        }
        $filename = "/".date('YmdHis',time()).'.'.$file->extension();
        move_uploaded_file($file->path(),$basePath.$filename);
        return "/".$basePath.$filename;
    }
}