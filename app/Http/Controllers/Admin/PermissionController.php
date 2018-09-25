<?php
namespace  App\Http\Controllers\Admin;
use App\Model\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller{
    public function index(){
        $p1 = new Permission();
        $users = $p1->make_tree(0);
        return view('Admin.permission.index',['users'=>$users]);
    }
   public function son(){
        $fid = $_GET['id']?$_GET['id']:0;
        $p1=new Permission();
        $arr = $p1->make_tree($fid);
       return view('Admin.permission.index',['users'=>$arr]);
   }
    public function add(){
            $users =Permission::get();
            return view('Admin.permission.add',['users'=>$users]);

    }

    public function add1(){
        $arr = $_POST;
        if($arr['_token']){
            unset($arr['_token']);
        }
        $bouns = new Permission();
        foreach($arr as $k=>$v){
            $bouns->$k = $v;
        }
        $a = $bouns->save();
        if($a){
            return redirect('Permission/index');
        }
    }
    public function del(){
        $id = $_GET;
        $a = Permission::where($id)->delete();
        if($a==1){
            return redirect('Permission/index');
        }
    }

    public function info(){
        $id = $_GET;
        $users = Permission::where($id)->get();
        $user =Permission::get();
        return view('Admin.permission.info',['users'=>$users],['user'=>$user]);
    }
    public function info1(){
        $arr = $_POST;
        //$id = $arr['id'];
        if($arr['_token']){
            unset($arr['_token']);
        }

        $a = Permission::where('id',$arr['id'])
            ->update($arr);
        if($a){
            return redirect('Permission/index');
        }
    }
}

?>
