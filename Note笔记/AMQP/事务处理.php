<?php
echo "<pre>";
$conn_args = array("host"=>'localhost','port'=>5672,'login'=>'guest',"password"=>'guest','vhost'=>'/');
$conn = new AMQPConnection($conn_args);
if($conn->connect()){
	echo "Success\r\n";
}else{
	echo "Fail\r\n";
}

$e_name = 'test.fanout'; //交换机名
$q_name = 'q_test5'; //队列名称
$r_key = 'key_test1';

//消息
$message = json_encode(array("HelloWorld"));
//创建channel
$channel = new AMQPChannel($conn);
$ex = new AMQPExchange($channel);
$ex->setName($e_name); //创建exchange的名字
echo "\n";



$channel->startTransaction(); //开启事务处理
echo "send: ".$ex->publish($message); //将数据发送
$channel->commitTransaction(); //提交事务
$channel->rollbackTransaction (); //回滚事务
$conn->disconnect();