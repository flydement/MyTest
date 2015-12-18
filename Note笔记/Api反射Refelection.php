<?php
class person{
	public $name;
	public $gender;
	protected $n = 213;
	public function say(){
		echo $this->name,"\t is",$this->gender,"\r\n";
	}
	public function __set($name,$value){
		echo "Srtting $name to $value \r\n";
		$this->$name =$value;
	}
	
	public function __get($name){
		if(!isset($this->$name)){
			echo "未设置值";
			$this->$name = "这踏马是默认值好伐";

		}
		return $this->$name;
	}
}

$man = new person();
$man->name = 'wonima';
$man->gender = "female";
$man->age  = 17;

$reflect = new ReflectionObject($man);
$props = $reflect->getProperties();

	foreach($props as $prop){
		print $prop->getName()."\n";
	}
	
$m = $reflect->getMethods();
foreach($m as $prop){
	print $prop->getName()."\n";
}

var_dump(get_object_vars($man));
var_dump(get_class_vars(get_class($man)));
var_dump(get_class_methods(get_class($man)));
echo get_class($man);


$obj = new ReflectionClass('person');
$className = $obj->getName();
$Method = $Properites = array();
foreach($obj->getProperties() as $v){
	$Properites[$v->getName()] = $v;
}

foreach($obj->getMethods() as $v){
	$Method[$v->getName()] = $v;
}

echo " class {$className}\n{\n";
is_array($Properites) && ksort($Properites);
foreach($Properites as $k=>$v){
	echo "\t";
	echo $v->isPublic()?"Public":" ",$v->isPrivate()?"private":' ',
	$v->isProtected()?'protected':" ",
	$v->isStatic()?"static":" ";
	echo "\t{$k}\n";
}
echo "\n";
if(is_array($Method))ksort($Method);
foreach($Method as $k=>$v){
	echo "\tfunction {$k}(){}\n";
}
echo "}\n";
?>