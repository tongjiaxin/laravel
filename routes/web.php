<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('admin/login','Admin\LoginController@login');//登录页面
Route::post('admin/dologin','Admin\LoginController@dologin');//验证登陆
Route::get('admin/out', 'Admin\LoginController@out');//退出登录

Route::get('Qd/index', 'Admin\QdController@index')->middleware('admin_auth');//签到
Route::post('Qd/up', 'Admin\QdController@up')->middleware('admin_auth');//签到
Route::group(['middleware'=>'admin_auth','prefix'=>'admin'],function () {
    Route::get('index', 'Admin\IndexController@index')->name("admin.index");//首页
});
Route::get('Bonus/index', 'Admin\BonusController@index')->middleware('admin_auth');//展示页面
Route::get('Bonus/show', 'Admin\BonusController@show')->middleware('admin_auth');
Route::get('Bonus/getBouns', 'Admin\BonusController@getBouns')->middleware('admin_auth');//发送红包
Route::post('Bonus/bouns', 'Admin\BonusController@bouns')->middleware('admin_auth');//验证红包是否发送成功
Route::any('Bonus/getBag', 'Admin\BonusController@getBag')->middleware('admin_auth');
//权限列表
Route::get('Permission/index', 'Admin\PermissionController@index')->middleware('admin_auth');//展示页面
Route::get('Permission/add', 'Admin\PermissionController@add')->middleware('admin_auth');//添加
Route::post('Permission/add1', 'Admin\PermissionController@add1')->middleware('admin_auth');
Route::get('Permission/del', 'Admin\PermissionController@del')->middleware('admin_auth');//删除
Route::get('Permission/info', 'Admin\PermissionController@info')->middleware('admin_auth');//修改
Route::post('Permission/info1', 'Admin\PermissionController@info1')->middleware('admin_auth');
Route::get('Permission/son', 'Admin\PermissionController@son')->middleware('admin_auth');


//角色列表
Route::get('Roles/index', 'Admin\RolesController@index')->middleware('admin_auth');//展示页面
Route::get('Roles/add', 'Admin\RolesController@add')->middleware('admin_auth');//添加
Route::post('Roles/add1', 'Admin\RolesController@add1')->middleware('admin_auth');
Route::get('Roles/del', 'Admin\RolesController@del')->middleware('admin_auth');
Route::get('Roles/info', 'Admin\RolesController@info')->middleware('admin_auth');
Route::post('Roles/info1', 'Admin\RolesController@info1')->middleware('admin_auth');

//用户角色
Route::get('AdminUser/index', 'Admin\AdminUserController@index')->middleware('admin_auth');//展示页面
Route::get('AdminUser/add', 'Admin\AdminUserController@add')->middleware('admin_auth');//添加
Route::post('AdminUser/add1', 'Admin\AdminUserController@add1')->middleware('admin_auth');
Route::get('AdminUser/del', 'Admin\AdminUserController@del')->middleware('admin_auth');
Route::get('AdminUser/info', 'Admin\AdminUserController@info')->middleware('admin_auth');
Route::post('AdminUser/info1', 'Admin\AdminUserController@info1')->middleware('admin_auth');

//权限列表的无限极分类
Route::get('Jc/index', 'Admin\JcController@index')->middleware('admin_auth');

//权限角色分配
Route::get('Permission_role/index', 'Admin\Permission_roleController@index')->middleware('admin_auth');
Route::get('Permission_role/add', 'Admin\Permission_roleController@add')->middleware('admin_auth');//添加
Route::post('Permission_role/add1', 'Admin\Permission_roleController@add1')->middleware('admin_auth');
Route::get('Permission_role/del', 'Admin\Permission_roleController@del')->middleware('admin_auth');//删除
Route::get('Permission_role/info', 'Admin\Permission_roleController@info')->middleware('admin_auth');//修改
Route::post('Permission_role/info1', 'Admin\Permission_roleController@info1')->middleware('admin_auth');
Route::get('Permission_role/son', 'Admin\Permission_roleController@son')->middleware('admin_auth');
Route::get('Controller/out', 'Admin\Controller@out')->middleware('admin_auth');


//点赞
Route::get('Dz/index', 'Admin\DzController@index')->middleware('admin_auth');
Route::get('Dz/add', 'Admin\DzController@add')->middleware('admin_auth');
Route::post('Dz/add1', 'Admin\DzController@add1')->middleware('admin_auth');
Route::get('Dz/del', 'Admin\DzController@del')->middleware('admin_auth');
Route::get('Dz/info', 'Admin\DzController@info')->middleware('admin_auth');

//小说
Route::get('Film/index', 'Admin\FilmController@index')->middleware('admin_auth');
Route::get('Film/add', 'Admin\FilmController@add')->middleware('admin_auth');
Route::post('Film/add1', 'Admin\FilmController@add1')->middleware('admin_auth');
Route::get('Film/info', 'Admin\FilmController@info')->middleware('admin_auth');
Route::get('Film/del', 'Admin\FilmController@del')->middleware('admin_auth');
Route::post('Film/info1', 'Admin\FilmController@info1')->middleware('admin_auth');//修改
Route::any('Film/read', 'Admin\FilmController@read')->middleware('admin_auth');//章节列表
Route::any('Film/content', 'Admin\FilmController@content')->middleware('admin_auth');//内容

//小说配置表展示
Route::get('Leader/index', 'Admin\LeaderController@index')->middleware('admin_auth');
Route::get('Leader/add', 'Admin\LeaderController@add')->middleware('admin_auth');//添加小说章节
Route::post('Leader/addd', 'Admin\LeaderController@addd')->middleware('admin_auth');
Route::get('Leader/del', 'Admin\LeaderController@del')->middleware('admin_auth');//删除小说章节

//足球竞猜
Route::get('Ball/index', 'Admin\BallController@index')->middleware('admin_auth');
Route::post('Ball/add', 'Admin\BallController@add')->middleware('admin_auth');
Route::get('Ball/add1', 'Admin\BallController@add1')->middleware('admin_auth');
Route::post('Ball/add2', 'Admin\BallController@add2')->middleware('admin_auth');
Route::get('Ball/info', 'Admin\BallController@info')->middleware('admin_auth');

//抽奖
Route::get('Cj/index', 'Admin\CjController@index')->middleware('admin_auth');
Route::any('Cj/show', 'Admin\CjController@show')->middleware('admin_auth');
Route::any('Cj/info', 'Admin\CjController@info')->middleware('admin_auth');

//评论
Route::any('Content/index', 'Admin\ContentController@index')->middleware('admin_auth');
Route::any('Content/add', 'Admin\ContentController@add')->middleware('admin_auth');
Route::any('Content/add1', 'Admin\ContentController@add1')->middleware('admin_auth');
//砸金蛋
Route::any('Egg/index', 'Admin\EggController@index')->middleware('admin_auth');
Route::any('Egg/add', 'Admin\EggController@add')->middleware('admin_auth');
Route::any('Content/add1', 'Admin\ContentController@add1')->middleware('admin_auth');

//考试
Route::any('Comment/index', 'Admin\CommentController@index')->middleware('admin_auth');
Route::any('Comment/add', 'Admin\CommentController@add')->middleware('admin_auth');
Route::any('Comment/add1', 'Admin\CommentController@add1')->middleware('admin_auth');
Route::any('Comment/del', 'Admin\CommentController@del')->middleware('admin_auth');

