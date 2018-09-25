<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Admin\Controller;
use App\Model\Permission;
use App\Model\Permission_role;
use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            $controller = new Controller();
            $p1 = new Permission_role();
            if(empty($controller->get())){
                return redirect("admin/login")->send();
            }
            $info = $controller->get();
            $arr = $p1->getuser($info);
            $list = $arr['list'];//权限地址
//            $permission = $arr['permission'];//权限信息
            $url = \Route::currentRouteName();//当前地址的url
//            $add = $controller->show_tree($permission);
            if(!in_array($url,$list) && $info['is_super']==1){
                return view('Admin.permission_role.404');
            }
           return $next($request);
        }
}
