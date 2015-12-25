<?php
echo "<pre>";
$conn_args = array('host'=>'localhost','port'=>5672,'login'=>'guest','password'=>'guest','vhost'=>'/');
$q_name ='t1'; //获取队列名称

$conn = new AMQPConnection($conn_args);
$conn->connect();

$channel = new AMQPChannel($conn);
$q = new AMQPQueue($channel);
$q->setName($q_name);
$q->setFlags(AMQP_DURABLE|AMQP_AUTODELETE);

while($a=$q->declare()){
	echo "queue status:".$a;
	echo "=============\n";
	
	$message = $q->get(AMQP_AUTOACK);
	print_r($message->getBody());
	echo "\n";
}
$conn->disconnect();