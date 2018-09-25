<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        view()->share('user_info',$this->get());

        //dd($this->get());
        /*共享数据*/
    }
    public function get(){
        session_start();
        $info = $_SESSION['user_info'];
        if($info){
            return json_decode($info,true);
        }else{
            return $info;
        }
    }
}
