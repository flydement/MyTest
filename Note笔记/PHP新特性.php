<?php
ini_set('assert.exception', 1);

class CustomError extends AssertionError {}

assert(false, new CustomError('Some error message'));
class A {private $x = 1;}
// Pre PHP 7 code
$getXCB = function() {return $this->x;};
$getX = $getXCB->bindTo(new A, 'A'); // intermediate closure
echo $getX();

// PHP 7+ code
$getX = function() {return $this->x;};
echo $getX->call(new A);


echo "<pre>";
function arrsum(array ...$arrays):array
{
		var_dump($arrays);
		return array_map(function(array $array):int{
			return array_sum($array);
		},$arrays);
}
print_r(arrsum([1,2,3],[4,5,6],[7,8,9]));
function str(string ... $str):string{
	return "沃妮马";
}

echo str("2");

exit;
class demoDebugInfo(){
	private $val;
	public function __construct($val){
		$this->val = $val;
	}
	public function __debuginfo(){
		return call_user_func("call_object_vars",$this);
	}
}
$de = new demoDebugInfo(1);
var_dump($de);
exit;
function myTools1($name,$name2,$name3){
	echo $name,"---",$name2,"--",$name3;
}
$arra = ['hhe','234','是否'];
myTools1("Yo",...$arra);
exit;
function myTools($name,...$tools){
	echo "Name".$name;
	echo "Count".count($tools);
}
myTools("I","B","M");
exit;
error_reporting(E_ALL);
const ONE =1;
const TWO = ONE*2;
class helloWorld{
	const THREE = TWO +1;
	public function hello($a = ONE +self::THREE){
		return $a;
	}
}

echo (new helloWorld())->hello()."\n";

exit;
$array = ['1','2','3','5'];
print_r($array);
exit;
$a = $_GET['a']??1;
var_dump($a);

$b = $_GET['b']?:998;
var_dump($b);


?>