<?php
/**
 * Created by Thai-Fintech.
 * User: Jessy Chan
 * Date: 2018/8/10
 * Time: 4:40
 * Version 1.0.0
 */

namespace app\index\controller;
use app\lib\Csv;

/**
 * Class Test
 * @package app\index\controller
 * 前台测试控制器
 */
class Test {

    public function csvTest(){
        $resource = fopen('./static/csv/20180809184515.csv', 'r');
		
        $obj = new Csv($resource);	//实例化对象时传入文件资源

        $data = $obj->insert('leshua'); //将数据导入MySQL

        dump($data);
    }

}