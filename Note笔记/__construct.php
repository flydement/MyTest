<?php
class person{
	public $name = "Tom";
	public $gender;
	static $money = 10000;
	public function __construct(){
		echo "父类之",PHP_EOL;
	}
	
	public function say(){
		echo $this->name,"\t is",$this->gender,"\r\n";
	}
}

class family extends person{
	public $name;
	public $gender;
	public $age;
	static $money = 100000;
	
	public function __construct(){
		parent::__construct();
		echo "子类之".PHP_EOL;
	}
	
	public function say(){
		parent::say();
		echo $this->name,"\t is \t ",$this->gender,", and is \t ",$this->age,PHP_EOL;
	}
	
	public function cry(){
		echo parent::$money,PHP_EOL;
		echo '%>_<%',PHP_EOL;
		echo self::$money,PHP_EOL;
		echo "(*^_^*)";
	}
}

$poor = new family();
$poor->name = 'Lee';
$poor->gender="female";
$poor->age= 25;
$poor->say();
$poor->cry();

?>