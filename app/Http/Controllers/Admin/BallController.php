<?php
namespace  App\Http\Controllers\Admin;
use App\Model\Ball;
use App\Model\Ball1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BallController extends Controller{

    public function index(){
        $users = Ball::get()->toArray();
        $u = Ball1::get()->toArray();
        return view('Admin.ball.index',['users'=>$users]);
    }
    public function add(){
        $arr = $_POST;
        unset($arr['_token']);
        $a = $arr['time'];
        $a = $a." 24:00:00";
        $b = strtotime($a);
        $arr['time']=$b;
        $c = Ball::insert($arr);
        if($c){
            return redirect('/Ball/index');
        }
    }
    public function add1(){
        $id = $_GET['id'];
        $user = Ball::where('id',$id)->get()->toArray();
        return view('Admin.ball.add',['users'=>$user]);
    }
    public function add2(){
        $arr = $_POST;
        unset($arr['_token']);
        $a = DB::table('ball1')->insert($arr);
        if($a){
            return redirect('/Ball/index');
        }

    }

    public function info(){
        $id = $_GET['id'];
        $list = Ball::where('id',$id)->get()->toArray();
        $user = Ball1::where('id',$id)->get()->toArray();
        return view('Admin.ball.info',['user'=>$list],['users'=>$user]);

    }
}