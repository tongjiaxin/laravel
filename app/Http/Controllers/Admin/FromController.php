<?php
namespace  App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FromController extends Controller{

    public function index(){
        return view('Admin.from.index');
    }
}