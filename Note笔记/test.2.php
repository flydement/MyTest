<?php

function __autoload($name){
	$filename = $name.".class.php";
	if(is_file($filename)){
	require $filename;
	}else{
		echo "沃妮马。不存在 \n\t";
	}
}

class ReflectionUtil{
	static function getClassSource(ReflectionClass $class){
		$path = $class->getFilename();
		$lines = @file($path);
		$from = $class->getStartLine();
		$to = $class->getEndLine();
		$len = $to-$from+1;
		return implode(array_slice($lines,$from-1,$len));
	}
}
echo "<pre>";
print ReflectionUtil::getClassSource(
	new ReflectionClass("returns")
);

exit;
function classData(ReflectionClass $class){
	$details = "";
	$name = $class->getName();
	
	if($class->isUserDefined()){
		$details .= "$name is user defined \n";
	}
	
	if($class->isInternal()){
		$details .= "$name is built-in\n";
	}
	
	if($class->isInternal()){
		$details .= "$name is interface \n";
	}
	
	if($class->isAbstract()){
		$details .= "$name is a final class\n";
	}
	
	if($class->isFinal()){
		$details .= "$name is a final class\n";
	}
	
	if($class->isInstantiable()){
		$details .="$name can be instantiated\n";
	}else{
		$details .= "$name can not be instantiated\n";
	}
	
	return $details;
	
}

$s = new returns(); 
$t = new ReflectionClass("returns");
print classData($t);
echo "<pre>";
//ReflectionClass::export($t);
//print_r($t);
exit;
$s->sf("1","2","3");
$d  =new returns3();

print_r(class_implements($d));
exit;
$s = new returns();
//$s->hehe();
print_r(get_class_vars('returns'));
echo "\n";
print is_callable(array($s,"hehe"));
echo "\n";
print "234";
print_r(get_class_methods($s));
if($s instanceof returns){
	echo "是的";
}else{
	echo "不，不是的";
}
var_dump(get_class($s));
//__constructvar_dump(get_declared_classes());


exit;
echo PATH_SEPARATOR;
ECHO "\n\t";
echo DIRECTORY_SEPARATOR;
//set_include_path(get_include_path().":/a1/"); 
//echo get_include_path();

// 在所有 PHP 版本中均有效
//echo ini_get('include_path');

?>