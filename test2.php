<?php
include("./phpprc/phprpc_client.php");
$client = new PHPRPC_Client("http://spf.cn/test.php");
echo $client->HelloWorld();
?>