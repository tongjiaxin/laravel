<?php
namespace  App\Http\Controllers\Admin;
use App\Model\User;
use App\Model\Novel;
use Illuminate\Http\Request;
use App\Model\Permission;
use Illuminate\Support\Facades\DB;

class UserController
{
    public function getUser(Request $request)
    {
        $params = $request -> all();
        $data = User::where("id",$params["userid"])->get()->toArray();
        if(empty($data)){
            return json_encode([
                "code"=>4004,
                "msg"=>"未找到数据"
            ]);
        }else{
            return json_encode([
                "code"=>2000,
                "msg"=>"用户信息",
                "data"=>$data
            ]);
        }
    }

    public function getNovel(Request $request){
        $params = $request -> all();
        $data = Novel::where("id",$params["novelid"])->get()->toArray();
        if(empty($data)){
            return json_encode([
                "code"=>4004,
                "msg"=>"未找到数据"
            ]);
        }else{
            return json_encode([
                "code"=>2000,
                "msg"=>"小说信息",
                "data"=>$data
            ]);
        }
    }
}