<?php
/**
 * Created by Thai-Fintech.
 * User: Jessy Chan
 * Date: 2018/8/12
 * Time: 23:36
 */
namespace app\admin\model;

use think\Model;

class ShopSession extends Model {

    public static function getSession(){
        $res = getdata(id, name);
        if(!$res) {
            echo 'error';
        }else
            return $res;
    }
}