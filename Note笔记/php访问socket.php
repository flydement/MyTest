<?php
//php访问Socket
$sock = fsockopen('192.168.0.2',8001,$errno,$errstr,1);
if(!$sock){
	echo "$errstr($errno)<br />\n";
}else{
	set_socket_blocking($sock,false);
	fwrite($sock,"send data......\r\n"); //数据末尾需要\r\n否则可能无回应，即时刷新也无效，需等关闭连接才有回应
	fwrite($sock,"end \r\n");
	
	//end命令终止
	while(!feof($sock)){
		echo fread($sock,128);
		flush();
		ob_flush();
		sleep(1);
	}
	fclose($sock);
}
?>