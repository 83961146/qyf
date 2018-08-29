<?php
namespace app\index\controller;


class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    public function excel(){
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel();
//        echo '<hr>';
//        dump($obj);
//        echo '<hr>';

        $inputFileName = './static/excel/20180809184515.xls';

//        date_default_timezone_set('PRC');
//        读取excel文件
        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFileName);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(\Exception $e) {
            die('加载文件发生错误：" '.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        // 确定要读取的sheet
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

//             获取一行的数据
//        for ($row = 1; $row <= $highestRow; $row++) {
////             Read a row of data into an array
//            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
////            这里得到的rowData都是一行的数据，得到数据后自行处理，我们这里只打出来看看效果
//            var_dump($rowData);
//            echo "<br>";
//        }

        dump($sheet->rangeToArray());
    }
}