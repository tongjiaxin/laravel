<?php
namespace  App\Http\Controllers\Admin;
use App\Model\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController{
    public function login(){
        return view('Admin.login.login');
    }

    public function out(){
        if(isset($_SESSION['user_info'])){
            unset($_SESSION['user_info']);
            return redirect('/admin/login');
        }
    }

    public function dologin(Request $request){
        $username = $request->input('username','');
        $password = $request->input('password','');
        $p1 = new AdminUser();
        $info = $p1->login($username);
        if(empty($info)){
            //验证用户
            return redirect('/admin/login')->with('msg','用户不存在！');
        }else{
            //验证密码
            if($info->password != $password){
                return redirect('/admin/login')->with('msg','密码输入有误！');
            }
            if($info->is_admin==2){
                return redirect('/admin/login')->with('msg','您不能登陆后台！');
            }
            else{
                $userData = [
                    'id'=>$info->id,
                    'username'=>$info->username,
                    'password'=>$info->password,
                    'image_url'=>$info->image_url,
                    'is_super'=>$info->is_super
                ];
                $_SESSION['user_info']=$userData;
                //var_dump($_SESSION['user_info']);die;
                return redirect('/admin/index');
            }

        }
    }
}

?>
