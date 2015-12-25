<?php
echo "<pre>";
$conn_args = array("host"=>'localhost','port'=>5672,'login'=>'guest',"password"=>'guest','vhost'=>'/');
$conn = new AMQPConnection($conn_args);
if($conn->connect()){
	echo "Success\r\n";
}else{
	echo "Fail\r\n";
}

$e_name = 'ex_test5'; //交换机名
$q_name = 'q_test5'; //队列名称
$r_key = 'key_test1';

//消息
$message = json_encode(array("HelloWorld"));
//创建channel
$channel = new AMQPChannel($conn);

//注：队列跟exchange 都需要基于channel channel基于connection

$ex = new AMQPExchange($channel); //新建exchange
$ex->setName($e_name); //创建exchange的名字
$ex->setType(AMQP_EX_TYPE_DIRECT); //TPYE DIRECT 添加进绑定key的所有的队列，FANOUT 添加进绑定的所有队列 TOPIC 自定义的规则 . 连接多个队列 #为通配符 
$ex->setFlags(AMQP_DURABLE|AMQP_AUTODELETE);
echo "exchange status:".$ex->declare();
echo "\n";

//创建队列
$q = new AMQPQueue($channel); //新建队列
//设置队列的名字 如果不存在则自动添加
$q->setName($q_name);
$q->setFlags(AMQP_DURABLE|AMQP_AUTODELETE); //添加属性 DURABLE持久的 AUTODELEETE没有连接自动删除
echo "queue status:".$q->declare(); //声明队列
echo "\n";
echo 'queue bind:'.$q->bind($e_name,$r_key); //将队列绑定到routingKey
echo "\n";

$channel->startTransaction();
echo "send: ".$ex->publish($message,$r_key); //将数据通过routingKey发送
$channel->commitTransaction();
$conn->disconnect(); //关闭连接 