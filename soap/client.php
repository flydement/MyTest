<?php
$client = new SoapClient(null,
					array('location'=>"http://spf.cn/soap/proxy.php",
						"uri"=>"http://test-uri",
						"style"=>SOAP_RPC,
						"use"=>SOAP_ENCODED,
						"trace"=>1,
						"exceptions"=>0));
						var_dump($client);
$addresult = $client->add(1,6);
echo "获取是：",$addresult,"\r\n";

?>