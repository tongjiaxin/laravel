<?php

namespace App\Model;
use  App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class Permission extends Model
{
    protected $table = 'permissions';
    public $timestamps = false;

    public function make_tree($fid){
        $info = Permission::get()
            ->where('fid',$fid);
        return $info;
    }
    public function show_tree(){
        $info = Permission::get()->toArray();
        $info = $this->tree($info);
        return $info;
    }

    public function tree($array,$fid=0){
        static $list=[];
        foreach($array as $key=>$val){
            if($val['fid']==$fid){
                if(isset($list[$fid])){
                    $list[$fid]['son'][$val['id']]=$val;
                }else{
                    $list[$val['id']]=$val;
                }
                unset($array[$key]);
                $this->tree($array,$val['id']);
            }
        }
        return $list;
    }
}
