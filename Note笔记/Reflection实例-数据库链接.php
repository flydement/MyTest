<?php
class mysql{
	
	//实例化一个类，直接调用后会用的魔术方法
	function __invoke(){
		echo "该类实例化";
	}
	function connect($db){
		echo "成功连接至数据库$db[0]\r\n";
	}
}

class sqlproxy{
	private $target;
	function __construct($tar){
		$this->target[] = new $tar();
	}
	
	function __call($name,$args){
		foreach($this->target as $obj){
			$r = new ReflectionClass($obj);
			if($method = $r->getMethod($name)){
				if($method->isPublic() && !$method->isAbstract()){
					echo " 方法前拦截记录LOG\r\n ";
					$method->invoke($obj,$args);
					echo " 方法拦截后\r\n ";
				}
			}
		}
	}
}

$obj = new sqlproxy('mysql');
$obj->connect('member');
?>