<?php
$appKey = '123456';
$appSecret = '123456';
$mobileNumber = '13578888888';
$amount = '10';
$url = 'http://121.40.104.167:8080/charge/mobilefee';

$param = array(
	'appKey'=>$appKey ,
	'mobileNumber'=>$mobileNumber,
	//'batchNo'=>'serial123546',
	'amount'=>$amount,
	'verify'=>md5($appKey.$mobileNumber.$amount.$appSecret)
);


function post_data($url, $param)
{
	$ch = curl_init();  
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));

	// curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1:8888');
	// curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	
	// receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);
	curl_close ($ch);
	return $server_output;
}
$res = post_data($url,$param);
var_dump(json_decode($res));
?>