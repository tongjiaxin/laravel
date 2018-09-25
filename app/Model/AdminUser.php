<?php

namespace App\Model;
use  App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Seeder;


class AdminUser extends Model
{
    const
        STATUS_NORMAL = 1,//正常
        STATUS_FAIL = 2, //注销
        END = true;

    protected $table='admin_users';
    public function login($username){
        $users = DB::table('admin_users')->select('id','username','password','image_url','is_super','is_admin')
            //$users = self::select('id','username', 'password')
            ->where('username',$username)
            ->where('status',self::STATUS_NORMAL)
            ->first();
        return $users;

    }
}
