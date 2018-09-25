<?php
namespace  App\Http\Controllers\Admin;
use Home\Controller\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ListController extends Controller{

    public function index(){
        return view('Admin.list.index');
    }

}