<?php

namespace App\Model;
use  App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Seeder;


class Roles extends Model
{
    protected $table='roles';
    public function getout(){
        $list = self::get();
        return $list;
    }
}
