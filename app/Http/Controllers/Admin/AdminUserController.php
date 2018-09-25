<?php
namespace  App\Http\Controllers\Admin;
use App\Model\AdminUser;
use App\Model\UserRole;
use App\Model\Permission;
use App\Model\Permission_role;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller{
        public function index(){
            $user = DB::table('admin_users')->get();
            return view('Admin.user.index',['users'=>$user]);
        }
        //展示用户表
        public function add(){
            $user = DB::table('roles')->get();
            $p1 = new Permission();
            $users = $p1->show_tree();
            return view('Admin.user.add',['users'=>$user],['menu'=>$users]);
        }
        public function add1(Request $request)
        {
            $arr = $request->all();
            $user_role['admin_user_id']=$arr['id'];
            $user_role['role_id']=$arr['role_id'];
            $Permission_id['Role_id']=$arr['role_id'];
            $d = implode($arr['Permission_id'],".");
            $Permission_id['Permission_id']=$d;
            unset($arr['_token']);
            unset($arr['role_id']);
            unset($arr['Permission_id']);
            $arr['image_url'] = $this->uploadFile($arr['image_url']);
            $bin = new UserRole();
            $bouns = new AdminUser();
            $btn = new Permission_role();
            foreach($Permission_id as $k=>$v){
                $btn->$k = $v;
            }
            foreach($arr as $k=>$v){
                $bouns->$k = $v;
            }
            foreach($user_role as $key=>$val){
                $bin->$key = $val;
            }
            $a = $bouns->save();//添加用户表
            $b = $bin->save();//添加用户角色表
            $c = $btn->save();//添加角色权限表
            if($a && $b && $c){
                return redirect('/AdminUser/index');
            }


        }
        public function del(Request $request){
            $id = $request['id'];
            $a = DB::table('admin_users')->where('id',$id)->delete();
            $c = UserRole::where('admin_user_id',$id)->get()->toArray();
            $b = DB::table('user_role')->where('admin_user_id',$id)->delete();
            $d = Permission_role::where('Role_id',$c[0]['role_id'])->delete();
            if($a && $b && $d){
                return redirect('/AdminUser/index');
            }
        }
        public function info(){
            $id = $_GET['id'];
            $a = UserRole::where('admin_user_id',$id)->get()->toArray();
            $user = AdminUser::where('id',$id)->get();
            $users = DB::table('roles')->get();
            $p1 = new Permission();
            $menu = $p1->show();
            return view('Admin.user.info',['users'=>$user],['user'=>$users],['menu'=>$menu]);
        }
        public function info1(Request $request){
            $arr = $request->all();
            $Permission_id['Role_id']=$arr['role_id'];
            $d = implode($arr['Permission_id'],".");
            $Permission_id['Permission_id']=$d;
            $info['role_id']=$arr['role_id'];
            unset($arr['Permission_id']);
            unset($arr['_token']);
            unset($arr['role_id']);
            $arr['image_url'] = $this->uploadFile($arr['image_url']);
            $c = Permission_role::where('Role_id',$Permission_id['Role_id'])->update($Permission_id);
            $a = DB::table('admin_users')->where('id',$arr['id'])->update($arr);
            $b = DB::table('user_role')->where('admin_user_id',$arr['id'])->update($info);
            if($a && $b && $c){
                return redirect('/AdminUser/index');
            }
        }

        //上传文件
    public function uploadFile($files){
        if(empty($files)){
            return '/images/photos/loggeduser.png';
        }
        $basePath = "uploads/".date('Y-m-d',time());//路径
        if(!file_exists($basePath)){//如果这个路径不存在
            mkdir($basePath,755,true);
        }
        $filename = "/".date('YmdHis',time()).'.'.$files->extension();
        move_uploaded_file($files->path(),$basePath.$filename);
        return "/".$basePath.$filename;
    }
}