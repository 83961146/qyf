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
 * ǰ̨���Կ�����
 */
class Test {

    public function csvTest(){
        $resource = fopen('./static/csv/20180809184515.csv', 'r');
		
        $obj = new Csv($resource);	//ʵ��������ʱ�����ļ���Դ

        $data = $obj->insert('leshua'); //�����ݵ���MySQL

        dump($data);
    }

}