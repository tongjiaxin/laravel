<?php
namespace  App\Http\Controllers\Admin;
use App\Model\AdminUser;
use App\Model\Cj;
use App\Model\Egg;
use App\Model\UserRole;
use App\Model\Permission;
use App\Model\Permission_role;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class EggController extends Controller{
    public function index(){
        $list = Cj::get();
        return view('Admin.egg.index',['list'=>$list]);
    }

    public function add(){
        $arr = $_GET;
        $star=Cj::get()
            ->where('id',$arr['hd_id'])
            ->toArray();
        $s_time = strtotime($star[0]['s_time']);
        $e_time = strtotime($star[0]['e_time']);
        if(time()<$s_time||time()>$e_time){
            return json_encode(['code'=>500,'msg'=>'不在活动时间内！']);
        }else{
           /* $jl=Egg::

                */
           $jl = Egg::get()
               ->where('username',$arr['username'])
               ->toArray();
            $count = count($jl);
            if($count>3){
                return json_encode(['code'=>600,'msg'=>'您今天已经抽完！']);
            }else{
                $jp = [];
                foreach ($this->setLottery() as $k=>$v){
                    $jp[$k]=$v['per'];
                }

                $result = $this->get_rand($jp);
                if(Egg::insert($arr)){
                    return json_encode(['code'=>200,'msg'=>$this->setLottery()[$result]['name']]);
                }
            }
            //print_r($count);
        }
        //print_r($e_time);
    }
    public function setLottery()
    {
        return [
            1=> [
                'name' => '1等奖100元出行包',
                'per'  => 10,
            ],
            2=> [
                'name' => '2等奖60元出行包',
                'per'  => 30,
            ],
            3=> [
                'name' => '3等奖20元出行包',
                'per'  => 50,
            ],
            4=> [
                'name' => '很遗憾没中奖',
                'per'  => 10,
            ],
        ];
    }
    public function get_rand($preArr)
    {
        $result = "";

        //求所有奖品的概率总和
        $preSum = array_sum($preArr);

        foreach ($preArr as $key => $preCur){
            //中奖随机值
            $preNum = mt_rand(1, $preSum);

            if($preNum <=$preCur) {//中奖情况
                $result = $key;
                break;
            }else{//未中奖情况
                $preSum -= $preCur;
            }
        }

        unset($preArr);

        return $result;
    }
}