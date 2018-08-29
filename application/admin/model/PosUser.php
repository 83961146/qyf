<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class PosUser extends Model
{
  	Private $old_id='';
  	Private $mydata='';
  	public function getDataByName($name,$cx)
	{						
        $arr	=	array();
      	$i		=	0;
      	$m		=	0;
      	//$cx		=	0;
		
		//定义 sql 语句
		$sql = "select t1.* from pos_user t1,";
		$sql = $sql."(select psubid as id from pos_user where username='".$name."') t2 ";
		$sql = $sql."where FIND_IN_SET(t1.id,t2.id)";
      	$result = Db::query($sql);		//根据定义好的 sql 语句进行查询 pos_user 表数据
      	while($i<count($result))
        {
			array_push($arr,$result[$i]);
          	$i++;
        }

		while($m<count($arr))			//使用临时变量 $m 进行递归
		{
          	if($m>0)
            {
              $this->old_id=$arr[$m-1]["parentid"];
              if($this->old_id<>$arr[$m]["parentid"])
              {
              	$cx++;
              }
            }else
            {
            	$cx++;
            }
			if($m>0)
            {
              if($arr[$m-1]["parentid"]<>$arr[$m]["parentid"])
              {
                	$this->mydata=$this->mydata."<ul>";
                	
               }
            }else
            {
              	$this->mydata=$this->mydata."<ul>";
            }
            if($arr[$m]["psubid"]<>""){
				 $this->mydata=$this->mydata."<li class='parent".$arr[$m]["parentid"]." li".$cx."'onclick='nextUser(this,".$arr[$m]["id"].")'>".$arr[$m]["name"]."<em>&#xe972;</em>(<span>". count(explode(",",$arr[$m]["psubid"]))."</span>)<em class='searchData'>&#xe986;</em>";	
            }else{
            	$this->mydata=$this->mydata."<li class='parent".$arr[$m]["parentid"]." li".$cx."'>".$arr[$m]["name"]." <em>&#xe972;</em>(<span>0</span>)<em class='searchData'>&#xe986;</em>";
            }
          	
	
          	$this->getDataByName($arr[$m]["username"],$cx);	
          	if($m<count($arr)-1)
            {
              if($arr[$m+1]["parentid"]<>$arr[$m]["parentid"]){
                  $this->mydata=$this->mydata."</li></ul>";
              }
              $this->mydata=$this->mydata."</li>";
            }else
            {
            	 $this->mydata=$this->mydata."</li></ul>";
            }
			$m=$m+1;	
         
		}
      
      	
    }

	function getUserByName($name)
	{
		echo $name."<br>";
      	$this->getDataByName($name,0);
      	return $this->mydata ;
	}
  
}
