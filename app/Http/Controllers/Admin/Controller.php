<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Model\Permission_role;
use App\Model\Roles;
use App\Model\UserRole;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Middleware;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        view()->share('user_info',$this->get());//登陆数据共享
        view()->share('menu',$this->out());//权限共享
        /*共享数据*/
    }
    public function out(){

     if($_SESSION['user_info']['is_super']==2){
            $p1 = new Permission();
            $add = $p1->show_tree();
            return $add;
        }else{
         $p1 = new Permission_role();
         $arr = $p1->getuser($_SESSION['user_info']);
         $permission = $arr['permission'];
         $add = $this->show_tree($permission);
         return $add;
         }
    }

    public function show_tree($arr){//以无限极模式输出
        $p1 = new Permission();
        $add = $p1->tree($arr);
        return $add;
    }

    public function get(){
        if(isset($_SESSION['user_info'])){
            return $_SESSION['user_info'];
        }else{
            return '';
        }
    }
    public function gx($arr=array()){
        if($arr['_token']){
            unset($arr['_token']);
        }
        return $arr;
    }
}
