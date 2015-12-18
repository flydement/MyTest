<?php
$str = <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB18030">
<style type="text/css">
body{
background-color: #ECF2F7;
}
</style>
<title>null</title>
</head>
<body>
	<br />
	<h3>1450424183634:  发生了错误- null</h3>
	<div style="text-align: center;">
		<a href="javascript:window.history.go(-1);">返回</a></div>
</body>
</html>
EOF;

$str2 = <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB18030">
<style type="text/css">
body{
background-color: #ECF2F7;
}
</style>
<title>null</title>
</head>
<body>
	<br />
	<h3>1450424183634:閫佽泲绯曟埧閮芥槸</h3>
	<div style="text-align: center;">
		<a href="javascript:window.history.go(-1);">璇翠笢鏂归棯鐢�</a></div>
</body>
</html>
EOF;


function change($str){
	if($str){
		$type = mb_detect_encoding($str, array('UTF-8',"GBK","GB18030","UTF-16LE",'LATIN1','BIG5'));
		if($type!="UTF-8"){
			$str = mb_convert_encoding($str,"UTF-8",array("GBK","GB18030","UTF-16LE","LATIN1","BIG5"));
		}
	}
	return $str;
}
var_dump(change($str));
var_dump(change($str2));
//var_dump(mb_detect_encoding($str, array('UTF-8',"GBK","GB18030","UTF-16LE",'LATIN1','BIG5')));
//var_dump(mb_detect_encoding($str2, array('UTF-8',"GBK","GB18030","UTF-16LE",'LATIN1','BIG5')));

exit;
print_r($str);
$str = iconv('GBK', 'UTF-8//IGNORE', $str);
print_r($str);
/*
class test extends Thread{
	private $num;
	public function __construct($num){
		$this->num = $num;
	}
	
	public function run(){
		echo $this->num,"\n";
		
	}
}

foreach(range(1,9) as $v){
	$t[] = new test($v);
}
foreach($t as $k=>$v){
	$v->start();
	if($v->isRunning()){
		usleep(10);
	}
	$v->join();
}*/
