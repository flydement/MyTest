<?php
echo "<pre>";
$conn_args = array("host"=>'localhost','port'=>5672,'login'=>'guest',"password"=>'guest','vhost'=>'/');
$conn = new AMQPConnection($conn_args);
if($conn->connect()){
	echo "Success\r\n";
}else{
	echo "Fail\r\n";
}

//关闭连接重新连接
if(!$conn->reconnect()){
	echo "Could not reconnect to server";
}

var_dump($conn);
