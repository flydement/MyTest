<?php

//错误托管
function customError($errno,$errstr,$errfile,$errline){
	echo "<b>错误的代码:</b>[${errno}]${errstr}\r\n";
	echo "错误所在的行: {$errline}文件{$errfile}\r\n";
	echo "PHP版本",PHP_VERSION,"(",PHP_OS,")\r\n";
}

set_error_handler("customError",E_ALL|E_STRICT);
$a = array('o'=>12,4,6,8);
echo $a[o];
restore_error_handler() //取消错误托管




//错误抛出异常
function customError($errno,$errstr,$errfile,$errline){
	throw new Exception($level."|".${errstr});
}

set_error_handler("customError",E_ALL|E_STRICT);
try{
	$a = 5/0;
}catch(Exception $e){
	echo "错误信息:",$e->getMessage();
}


class Shutdown{
	public function stop(){
		if(error_get_last()){
			print_r(error_get_last());
		}
		die("Stop");
	}
}
//类 方法
register_shutdown_function(array(new Shutdown(),'stop'));
$a = new a();
echo "终止";



//自定义
$divisor = 0;
if($divisor == 0){
	trigger_error("Cannot divide by zero",E_USER_ERROR);
}
echo "break";
?>