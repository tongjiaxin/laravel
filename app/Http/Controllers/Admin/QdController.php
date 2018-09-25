<?php
namespace  App\Http\Controllers\Admin;
use App\Model\Qd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class QdController extends Controller{

    function index(){

        $data = DB::select("select * from oscshop_sign");
        return view("Admin.qd.index",["users"=>$data]);
    }

    function up()
    {
        $data = $_POST;

        $data["time"] = time();
        $info = DB::select("select * from oscshop_sign where id=1");
        $a = $this->object_array($info);
        $timer = date("Y-m-d",$a[0]["time"]);
        $time = $timer . " 24:00:00";
        $t = strtotime($time);
        $t2 = $t+(24*60*60);
        if(time() < $t){//一天之内已经签到过
            echo json_encode(["code"=>"404","msg"=>"今天已签到","data"=>[$_POST["con"],$_POST["l_con"],$_POST["score"]]]);die;
        }
        if(time() > $t2){//从新开始签到
            $data["l_con"] = 1;
            $data["con"] = $data["con"] + 1;
            $data["score"] = $data["score"] + 1;
        }else{//连续签到
            $data["l_con"] = $data["l_con"] + 1;
            $data["con"] = $data["con"] + 1;
            $data["score"] = $data["score"] + $data["l_con"];
        }
        unset($data['_token']);
        $a = DB::table('oscshop_sign')->where('id',1)->update($data);
        if($a){
            echo json_encode(["code"=>"200","msg"=>"签到成功！","data"=>[$data["con"],$data["l_con"],$data["score"]]]);
        }else{
            echo json_encode(["code"=>"400","msg"=>"服务器响应超时！","data"=>[$_POST["con"],$_POST["l_con"],$_POST["score"]]]);
        }
    }
    function object_array($array){
        if(is_object($array)){
            $array = (array)$array;
        }
        if(is_array($array)){
            foreach($array as $k=>$v){
                $array[$k]=$this->object_array($v);
            }
        }
        return $array;
    }
}