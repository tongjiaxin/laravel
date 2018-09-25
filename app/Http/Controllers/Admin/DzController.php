<?php
namespace  App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Dz;
use App\Model\Dz1;
use Illuminate\Support\Facades\DB;

class DzController extends Controller {

    public function index(){
        $users = Dz::get()->toArray();
        return view('Admin.dz.index',['users'=>$users]);
    }

    public function add(){
        return view('Admin.dz.add');
    }
    public function add1(){
        $arr = $_POST;
        unset($arr['_token']);
        if(DB::table('dz')->insert($arr)){
            return redirect('/Dz/index');
        }
    }
    public function info(){
        $id = $_GET['id'];
        $admin_id=$_GET['admin_id'];//用户id
        $b=Dz::select('num')->where('id',$id)->get()->toArray();
        $num =$b[0]['num'];//点赞数
        $c=Dz1::select('id')->where('admin_id',$admin_id)->get()->toArray();
        //$d=$c[0];
        //var_dump($d);die;
        if(in_array($id,$c)){
            $nums['num'] = $num-1;
            if(Dz::where('id',$id)->update($nums)){
                if(Dz1::where('admin_id',$admin_id)->delete()){
                    return redirect('/Dz/index');
                }
            }
        }
        else{
            $nums['num']=$num+1;
            $list['id']=$id;
            $list['admin_id']=$admin_id;
            if(Dz::where('id',$id)->update($nums)){
                if(Dz1::insert($list)){
                    return redirect('/Dz/index');
                }
            }
        }
    }
}