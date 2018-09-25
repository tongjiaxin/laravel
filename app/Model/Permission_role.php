<?php

namespace App\Model;
use App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;

class Permission_role extends Model
{
    protected $table='permission_role';
    public function getuser($info){
        $role_id = UserRole::select('role_id')->where('admin_user_id',$info['id'])
            ->get()
            ->toArray();
        $Permission_id=Permission_role::select('Permission_id')->where('Role_id',$role_id[0]['role_id'])
            ->get()
            ->toArray();
        $id = explode('.',$Permission_id[0]['Permission_id']);
        $permission = Permission::select('id','name','url','fid')->whereIn('id',$id)
            ->get()
            ->toArray();
        $list = [];
        foreach ($permission as $k=>$v){
            $list[$k]=$v['url'];
        }
        return ['permission'=>$permission,'list'=>$list];
    }
}
