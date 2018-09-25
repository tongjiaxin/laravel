<?php
namespace  App\Http\Controllers\Admin;
use App\Model\Bouns;
use App\Model\Bouns_record;
use App\Model\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BonusController extends Controller{
    
    public function index(){//展示页面
        $data = Bouns::select()->get();
        return view("Admin.bonus.index",["users"=>$data]);
    }
    public function getBouns(){//发送红包
        $a = $_GET;
        $bag = new Bouns();
        foreach($a as $k => $v){
            $bag ->$k = $v;
        }
        if($bag -> save()){
            return redirect("/Bonus/add");
        }
    }

    public function getBag(Request $request){//jq点击抢红包时

        $arr = $request->all();
        //判断这个红包是否存在 并取出他的详细信息
        $red = Bouns::where("id",$arr["bonus_id"]) -> get() -> toArray();

        if($arr['pwd1']!=$red[0]['pwd']){
            return json_encode(['code'=>120,'msg'=>'口令输入错误！']);
        }

        //判断在这个红包中有没有这个用户id
        $his = Bouns_record::where("user_id",$arr["user_id"])->where("bonus_id",$red[0]["id"])->first();
        if(!empty($his)){
            return json_encode(["code"=>401,"msg"=>"您已经抢过红包了哟"]);
        }

        $min = 0.01;//最小值
        $max = $red[0]["amount"] - ($red[0]["nums"] - 1)* $min;//最大值
        $mon = sprintf("%.2f",rand($min*100,$max*100)/100);//随机值
        //最后一人要拿光红包

        $red[0]["nums"] = $red[0]["nums"] - 1;
        $red[0]["amount"] = $red[0]["amount"] - $mon;
        //修改红包里的值
        Bouns::where("id",$red[0]["id"])->update($red[0]);
        $in["money"] = $mon;
        $in["bonus_id"] = $red[0]["id"];
        $in["user_id"] = $arr["user_id"];

        //如果红包为最后一个 把钱都塞给这个人
        if($red[0]["nums"] == 1){
            $in["money"] = $red[0]["amount"];
        }

        if(Bouns_record::insert($in)){
            return json_encode(["code"=>200,"msg"=>"抢到了{$in["money"]}元"]);
        }

    }

    public function showbag(){//展示红包表
        $data["data"] = Bound_record::all()->toArray();
        // dd($data);
        $info["info"] = Bouns::all()->toArray();
        //  dd($info);
        return view("Admin.bonus",$data,$info);
    }
}
