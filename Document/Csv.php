<?php
/**
 * Created by Thai-Fintech.
 * User: Jessy Chan
 * Date: 2018/8/17
 * Time: 19:43
 */

namespace app\lib;
use think\Db;
use think\Model;

/**
 * Class Csv
 * @package app\lib
 * csv文件处理类
 * Version 1.0.0
 */
class Csv {

    private $resource;

    public function __construct($resource) {
        $this->resource = $resource;
    }

    /**
     * @param $resource 参数为打开csv文件句柄(资源)
     * @return array    返回二维数组
     */
    public function csvToArray(){
        return $this->csvHandle();
    }

    /**
     * 乐刷数据格式化
     * @return array
     */
    public function arrayFormat(){
        $arr = $this->csvHandle();
        unset($arr[0]);
        $data = [];
        $i = 0;
        foreach ($arr as $v){
            $data[$i]['trading_time'] = $v[0];
            $data[$i]['brand'] = $v[1];
            $data[$i]['agent'] = $v[2];
            $data[$i]['merchant_no'] = $v[3];
            $data[$i]['terminal_no'] = $v[4];
            $data[$i]['terminal_name'] = $v[5];
            $data[$i]['amount'] = $v[6];
            $data[$i]['card_type'] = $v[7];
            $i++;
        }
        return $data;
    }

    //插入数据库
    public function insert($type){
        switch ($type){
            case 'leshua';
                $data = $this->arrayFormat();
            break;
            default:
                return 'error';
        }
        //批量插入数据库
        return $res = Db::name('orderLeshua')->insertAll($data);
    }

    protected function csvHandle(){
        $res = [];
        while($data = fgetcsv($this->resource)){
            $res[] = explode('	', iconv('gb2312', 'utf-8', $data[0]));
        }
        return $res;
    }

    public function __destruct() {
        // TODO: Implement __destruct() method.
        unset($this->resource);
    }
}