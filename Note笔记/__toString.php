<?php
class Account{
	public $user =1;
	private $pwd = 2;
	
	//可以自定义直接echo 类的信息;
	public function __toString(){
		return "当前的对象是{$this->user},密码是{$this->pwd}";
	}
}

$a = new Account();
echo $a;
echo PHP_EOL;
print_r($a);
print_r($a->pwd);
?>