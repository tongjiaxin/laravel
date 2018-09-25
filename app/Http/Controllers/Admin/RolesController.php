<?php
namespace  App\Http\Controllers\Admin;
use App\Model\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller{
    protected $roles;
    public function __construct()
    {
        parent::__construct();
        $this->roles = new Roles();
    }

    public function index(){
        $users = $this->roles->getout();
        //print_r($assign);die;
        return view('Admin.roles.index',['users'=>$users]);
    }
    public function add(){
        return view('Admin.roles.add');
    }
    public function add1(){
        $arr = $_POST;

        $p1 = $this->gx($arr);
        $a = $this->roles;
        foreach($p1 as $k=>$v){
            $a->$k=$v;
        }
        $a =$a->save();
        if($a){
            return redirect('/Roles/index');
        }
    }
    public function del(){
        $id = $_GET['id'];
        $a = $this->roles->where('id',$id)->delete();
        if($a){
            return redirect('/Roles/index');
        }
    }
    public function info(){
        $id = $_GET['id'];
        $users = $this->roles->getout()->where('id',$id);
        //print_r($assign);die;
        return view('Admin.roles.info',['users'=>$users]);
    }
    public function info1(){
        $arr = $_POST;
        //$arr = $this->gx($arr);
        //$a = Roles::where('id',$arr['id'])->update($arr);
        $bin = new Roles();
        foreach ($arr as $k=>$v){
            $bin->$k=$v;
        }
        $a = Roles::find($arr['id'])->save($bin);
        if($a){
            return redirect('/Roles/index');
        }
    }
}