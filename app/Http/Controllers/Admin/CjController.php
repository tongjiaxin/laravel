<?php
namespace  App\Http\Controllers\Admin;
use App\Model\Cj;
use App\Model\Cj1;
use App\Model\Cj2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CjController extends Controller{

   public function show(){
       $assign['record_list'] = Cj2::select('phone','real_name')
           ->leftJoin('cj_record','cj_record.user_id','=','cj_user.id')
           ->orderBy('cj_record.id','desc')
           ->get()
           ->toArray();

        return view('Admin.cj.show',$assign);
    }

//执行抽奖操作
        public function info(Request $request){
            $userId = $request->input('user_id',0);
            $actId = $request->input('act_id',0);

            $currentTime = date('Y-m-d H:i:s', time());

            $stime = strtotime(date('Y-m-d 10:00:00', time()));//十点开始抽奖

            $etime = strtotime(date('Y-m-d 11:00:00', time()));//十一点结束

            $activity = Cj::first()->toArray();//从数据库获取活动信息

            //判断活动时间时间
            if($currentTime < $activity['s_time'] || $currentTime > $activity['e_time']) {
                $result = [
                    'code' => 500,
                    'msg' => "不再活动时间内"
                ];

                return json_encode($result);
            }

        $res = Cj1::where('user_id',$userId)
            ->where('act_id',$actId)
            ->where('cj_date',date('Y-m-d',time()))
            ->count();

        if($res >= 3){
            $result = [
                'code' => 500,
                'msg' => "今天已经抽奖完毕"
            ];

            return json_encode($result);
        }

        //查询用户列表
        $cjUser = Cj2::select('id','phone')
            ->get()
            ->toArray();

        $user = [];

        foreach ($cjUser as $value){
            $user[$value['id']] = $value['phone'];
        }

        $userId = array_rand($user);

        //添加获奖记录
        $data = [
            'user_id' => $userId,
            'act_id'  => $actId,
            'cj_date' => date('Y-m-d',time())
        ];

        Cj1::insert($data);

        $result = [
            'code' => 200,
            'msg' => "抽奖成功",
            'data' => $user[$userId]
        ];

        return json_encode($result);
    }
}