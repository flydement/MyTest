<?php
require_once './php/voice/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);
$callback = function($msg){
	echo $msg->body,"\n";
};

$channel->basic_consume('hello','',false,true,false,false,$callback);
while(count($channel->callbacks)){
	$channel->wait();
}

?>