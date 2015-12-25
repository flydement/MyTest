<?php
echo "<pre>";
$conn_args = array("host"=>'localhost','port'=>5672,'login'=>'guest',"password"=>'guest','vhost'=>'/');
$conn = new AMQPConnection($conn_args);
if($conn->connect()){
	echo "Success\r\n";
}else{
	echo "Fail\r\n";
}
$channel = new AMQPChannel($conn);

$q = new AMQPQueue($channel);

//先设定名字队列，如果没有将自动创建队列
$q->setName('t111');
//声明队列
$q->declareQueue(); //$q->declare(); 等同效果



//取出数据之(闭塞方式) 一直运行
$q->consume('callback1'); //通过回调函数取出 函数传2个参数，一个Envelope类型，一个队列

//(非闭塞方式) 取尽则停
//$message = $q->get(AMQP_AUTOACK); //AMQP_AUTOACK 貌似写不写都一样 
//print_r($message->getBody()); 

function callback1($envelope,$queue){
	echo "Message :".$envelope->getBody()."\n";
}
