<?php
/**
 * Created by Thai-Fintech.
 * User: Jessy Chan
 * Date: 2018/8/12
 * Time: 20:24
 */
namespace app\admin\controller;

use app\admin\model\ShopSession;
use think\Db;

class Test {

    public function test(){
        echo 'admin/test/test';
        $sessionModel = new ShopSession();
//        $data = $sessionModel::select();
//        $data = Db::query("select * from shop_session");
//        dump($data);

        $data = $sessionModel::getSession();
        dump($data);
    }
}