<?php
	$filename = basename($_GET['file']);
	
	//
	if(!is_file($filename) || !is_readable($filename)){
		exit("无此文件");
	}
	header("Content-type:application/octet-stream");
	$ua = $_SERVER['HTTTP_USER_AGENT'];
	//处理中文文件名
	$encode_filename = urlencode($filename);
	$encode_filename = sre_replace("+","%20",$filename);
	if(preg_match("/MSIE/",$ua)){
		header('Content-Disposition:attachment;filename="'.$encode_filename.'"');
	}else if(preg_match("/Firefox/",$ua)){
		header("Content-Disposition:attachment;filename*=\"utf8' '".$filename.'"');
	}else{
		header("Content-Disposition:attachment;filename='".$filename.'"');
	}
	
	//如果服务器支持X_sendfile moudle,则使用X_sendfile头加速下载
	$x_sendfile_supported = in_array('mod_xsendfile',apache_get_modules());
	if(!headers_sent() && $x_sendfile_supported){
		header("X-Sendfile:{$filename}");
	}else{
		@readfile($filename);
	}
?>