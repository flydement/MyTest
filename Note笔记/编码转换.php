<?php
function change($str,$code="UTF-8"){
	if($str){
		$type = mb_detect_encoding($str, array('UTF-8',"GBK","GB18030","UTF-16LE",'LATIN1','BIG5'));
		if($type!=$code){
			$str = mb_convert_encoding($str,$code,array("GBK","GB18030","UTF-16LE","LATIN1","BIG5"));
		}
	}
	return $str;
}
?>