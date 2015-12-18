<?php
$a = null;
try{
	$a = 5/1;
	echo $a,PHP_EOL;
}catch(exception $e){
	$e->getMessage();
	$a = -1;
} /*PHP5.5 之后有 finally {
	echo "执行完毕";
}*/
echo $a;

class emailException extends exception{
	
}

class pwdException extends exception{
	function __toString(){
		return "<div class=\"error\">Exception {$this->getCode()}:
		{$this->getMessage()}
		in File:{$this->getFile()} on line :{$this->getLine()}</div>";
		//改写异常抛出
	}
}

function reg($reginfo = null){
	if(empty($reginfo) || !isset($reginfo)){
		throw new Exception("参数非法");
	}
	
	if(empty($reginfo['email'])){
		throw new emailException("邮件为空");
	}
	
	if($reginfo['pwd'] != $reginfo['repwd']){
		throw new pwdException("两次密码不一致");
	}
	echo "注册成功";
}

try{
	reg(array('email'=>'123@qq.com','pwd'=>123456,'repwd'=>123454678));
}catch(emailException $ee){
	$ee->getMessage();
}catch(pwdException $ep){
	echo $ep;
	echo PHP_EOL,"特殊处理";
}catch(Exception $e){
	echo $e->getTraceAsString();
	echo $e->getMessage();
	echo PHP_EOL,'其他情况，统一处理';
}
?>