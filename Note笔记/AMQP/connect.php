<?php
echo "<pre>";
//$conn_args = array("host"=>'localhost','port'=>5672,'login'=>'guest',"password"=>'guest','vhost'=>'/');
//$conn = new AMQPConnection($conn_args);
$conn = new AMQPConnection();
$conn->setLogin("guest");
$conn->setPassword("guest");
$conn->setPort(5672);
$conn->setVhost("/");

if($conn->connect()){
	echo "Success\r\n";
}else{
	echo "Fail\r\n";
}

var_dump($conn);
