<?php
namespace app\admin\controller;
use app\admin\model\Test;
use app\admin\model\PosUser;
use think\Controller;
use think\Db;
class User extends Controller
{
    public function index()
    {
		//$user = PosUser::find();
      	//$user = Db::query("select * from pos_user");
      	$user = new PosUser();
		$name = '8364124742';
		$data = $user->getUserByName($name);

        $this->assign('user', $data);
        //dump($user);
      	//dump($data);
        return view();
    }
}

