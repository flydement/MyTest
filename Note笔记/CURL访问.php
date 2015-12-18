<?php
//CURL批处理
$ch1 =curl_init();
$ch2 = curl_init();

curl_setopt($ch1,CURLOPT_URL,$url1);
curl_setopt($ch1,CURLOPT_HEADER,0);
curl_setopt($ch2,CURLOPT_URL,$url2);
curl_setopt($ch2,CURLOPT_HEADER,0);
//创建批处理
$mh = curl_multi_init();
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);
//预定义状态变量
$active = null;
do{
	$mrc = curl_multi_exec($mh,$active);
}while($mrc == CURLM_CALL_MULTI_PERFORM);
while($active && $mrc == CURLM_OK){
	if(curl_multi_select($mh) != -1){
		do{
			$mrc = curl_multi_exec($mh,$active);
		}while($mrc == CURLM_CALL_MULTI_PERFORM);
	}
}
curl_multi_remove_handle($mh,$ch1);
curl_multi_remove_handle($mh,$ch2);
curl_multi_close($mh);

//CURL POST
$cu = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
$output = curl_exec($ch);
curl_close($ch);

//模拟手机登陆3G
@header("Content-type:text/html;charset=utf-8");

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://3g.qq.com");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$h = array(
	'HTTP_VIA:HTTP/1.1 SNXA-PS-WAP-GW21(infoX-WISG,HuaweiTrchnologies)',
	'HTTP_X_UP_DEVCAP_SCREENDEPTH:16 HTTP_X_UP_DEVCAP_SCREENPIXELS:1280,1600',
	'HTTP_ACCEPT:appliaction/vnd.wap.wmlscriptc,text/vnd.wap.wml,application/vnd.wap.html+xml,application/xhtml+xml,text/html,multipart/mixed,*/*',
	'HTTP_ACCEPT_CHARSET:ISO-8859-1,US-ASCII,UTF-8;Q=0.8,ISO-8859-15;Q=0.8,ISO-10646-UCS-2;Q=0.6,UTF-16;Q=0.6');
curl_setopt($ch,CURLOPT_HTTPHEADER,$h);	
$output = curl_exec($ch);
curl_close($ch);

//第二次跳转
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'http://info50.3g.qq.com/g/s?aid=index&amp;s_it=3&amp;g-from=3gindex&amp;&amp;g_f=1283');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$h);
$output =curl_exec($ch);
curl_close($ch);
echo $output;
var_dump($_SERVER);


exit;
//CURL加载图片
@header("Content-type:image/png");
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
$output = curl_getinfo($ch);
file_put_contents("",$output);
$size = filesize("");
if($size != $info['size_download']){
	echo "下载数据不完整";
}else{
	echo "OK";
}


//CURL 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://www.baidu.com");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,1);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
/*
array (size=26)
  'url' => string 'http://www.baidu.com' (length=20)
  'content_type' => string 'text/html' (length=9)
  'http_code' => int 200
  'header_size' => int 836
  'request_size' => int 52
  'filetime' => int -1
  'ssl_verify_result' => int 0
  'redirect_count' => int 0
  'total_time' => float 0.031
  'namelookup_time' => float 0
  'connect_time' => float 0.015
  'pretransfer_time' => float 0.015
  'size_upload' => float 0
  'size_download' => float 14613
  'speed_download' => float 471387
  'speed_upload' => float 0
  'download_content_length' => float 14613
  'upload_content_length' => float 0
  'starttransfer_time' => float 0.031
  'redirect_time' => float 0
  'certinfo' => 
    array (size=0)
      empty
  'primary_ip' => string '14.215.177.38' (length=13)
  'primary_port' => int 80
  'local_ip' => string '192.168.1.72' (length=12)
  'local_port' => int 52243
  'redirect_url' => string '' (length=0)
*/
curl_close($ch);
var_dump($info);
echo $output;
?>