<?php

namespace App\Http\Controllers\Admin;
use App\Model\Permission;
use App\Model\Permission_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Permission_roleController extends Controller
{
    public function index(){
        $users = DB::table('permission_role')->get();
        return view('Admin.permission_role.index',['users'=>$users]);
    }
    public function add(){
        $p1 = new Permission();
       $user = $p1->show();
        return view('Admin.permission_role.add',['users'=>$user]);
    }
}
