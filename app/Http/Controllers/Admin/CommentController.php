<?php
namespace  App\Http\Controllers\Admin;
use App\Model\AdminUser;
use App\Model\Comment;
use App\Model\UserRole;
use App\Model\Permission;
use App\Model\Permission_role;
use App\Model\Hf;
use app\models\Login;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller{

    public function index(){

        $list = Comment::select('content.id','image_url','comment','time','username')
            ->leftJoin('admin_users','content.user_id','=','admin_users.id')
            ->orderBy('content.id','desc')
            ->get()
            ->toArray();
        $user = Hf::select('hf.id','hf.hf_id','username','image_url','hf_content','hf_time')
            ->leftJoin('admin_users','hf.hf_id','=','admin_users.id')
            ->get()
            ->toArray();
        return view('Admin.comment.index',['list'=>$list,'user'=>$user]);
    }

    public function add(){
        $arr = $_GET;
        unset($arr['r']);
        $a=Comment::insert($arr);
        if($a){
            return json_encode(['code'=>200]);
        }

    }
    public function add1(){
            $arr = $_GET;
            unset($arr['r']);
            $a = Hf::insert($arr);
            if($a){
                return json_encode(['code'=>200]);
            }
    }
    public function del(){
        $id=$_GET;
        $id = $_GET['id'];
        $a = Comment::where('id',$id)->delete();
        if($a){
            return redirect('/Comment/index');
        }
    }

}