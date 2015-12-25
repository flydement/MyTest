<?php
try{
	$dsn = "mysql:host=localhost;dbname=a1";//配置PDO
	$db = new PDO($dsn,'root','root');
	//var_dump($db);
	//设置捕捉
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET NAMES 'UTF8'");
	$sql = "INSERT INTO tc0_log (name,content,ip,datetime) values('admin','插入一条记录','{$_SERVER['REMOTE_ADDR']}',now())";
	$db->exec($sql);
	$insert = $db->prepare("INSERT INTO tc0_log(name,content,ip,datetime) values(?,?,?,now())");
	$insert->execute(array('admin',"插入记录111","{$_SERVER['REMOTE_ADDR']}"));
	$insert->execute(array('admin',"插入记录222","{$_SERVER['REMOTE_ADDR']}",8,9));//异常
	$sql = "select name,content,ip,datetime from tc0_log";
	$query = $db->prepare($sql);
	$query->execute();
	var_dump($query->fetchAll(PDO::FETCH_ASSOC));
	
}catch(PDOException $err){
	echo $err->getMessage();
}
?>

