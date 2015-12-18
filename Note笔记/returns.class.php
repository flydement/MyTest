<?php
class returns{
	
	function __call($method,$args){
		echo $method."方法并不存在";
		echo "参数是:";
		print_r($args);
	}
	
	public $a =  1;
	
	function __construct(){
		echo "初始化成功\n\t";
	}
	function hehe(){
		echo " hehe";
	}
} 

interface returns2{
	
} 

class returns3 implements returns2{
	
}
?>