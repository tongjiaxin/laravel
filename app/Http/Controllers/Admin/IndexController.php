<?php
namespace  App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller{

    public function index(){
        if(isset($_SESSION['user_info'])){
            return view('Admin.index.index');
        }
        }
}