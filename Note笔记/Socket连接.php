<?php
//1
$sock = fsockopen("192.168.0.2",8001,$errno,$errstr,1);













//2
$host = "192.168.0.2";
$port = '12345';
set_time_limit(0);

//创建socket
$socket = socket_create(AF_INET,SOCK_STREAM,0) or die("Could not create socket \n");

//绑定socket
$result = socket_bind($socket,$host,$port) or die("Could not bind to socket \n");

//开始监听
$spawn = socket_listen($socket,3) or die("Could not set up socket listener \n");

//接收连接请求并调用另一个字Socket处理客户端-服务器间的信息
$spawn = socket_accept($socket) or die('Could not accept incoming connection \n');

//读取客户端信息
$input =socket_read($spawn,1024) or die("Could not read input \n");
//clean up input string
$input = trim($input);

//翻转客户端输入数据，返回服务端
$output = strrev($input)."\n";
socket_write($spawn,$output,strlen($output)) or die("Could not write output \n");

//关闭sockets
socket_close($spawn);
socket_close($socket);
?>