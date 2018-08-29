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

    public function csvToArray1(){
        $filename = './static/csv/20180809184515.csv';

        $handle = fopen($filename, 'r');
        $result = $this->input_csv($handle); //解析csv
//        dump($result);
        $len_result = count($result);
//        dump($len_result);
        if($len_result==0){
            echo '没有任何数据！';
            exit;
        }

        fclose($handle);
    }

    public function input_csv($handle) {
        $out = array ();
        $n = 0;
        while ($data = fgetcsv($handle)) {
            $num = count($data);
            for ($i = 0; $i < $num; $i++) {
                $out[$n][$i] = iconv('gb2312', 'utf-8', $data[$i]);
//                $out[$n][$i] = $data[$i];
            }
            $n++;
        }
        return $out;
    }

    public function csvTest(){
        $resource = fopen('./static/csv/20180809184515.csv', 'r');
//        dump($resource);
        $obj = new Csv($resource);
//        $data = $obj->csvToArray();    //将上传的CSV文件转换为数组
//        $data = $obj->arrayFormat();
//        $res = $obj->insert($data);

        $data = $obj->insert('leshua'); //将数据导入MySQL

//        unset($data[0]);
        dump($data);
    }

    public function csvUpload(){
        dump($_FILES);
    }

}