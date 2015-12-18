<?php
$data = array("author"=>'卓大侠','mail'=>'info@hehe.com','text'=>'博客之王');
$data = http_build_query($data);
$opts = array(
	'http'=>array(
		'method'=>'POST',
		'header'=>'Content-type:application/x-www-form-urlencode\r\n'.'Content-Length:'.strlen($data).'\r\n',
		'content'=>$data
	)
);
$context = stream_context_create($opts);
$html = @file_get_contents("http://aiyooyoo.com/index.php/archives/7/connent",false,$context);
var_dump($html);
?>