<?php
namespace  App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Permission;
use Illuminate\Support\Facades\DB;

class JcController extends Controller{

    public function index(){
        return view('Sy.admin-app');
    }
}