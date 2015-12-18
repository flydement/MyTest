<?php
//制作TOKEN
define("SECRET","67%$#ap28");
function m_token(){
	$str = mt_rand(1000,9999);
	$str2 = dechex($_SERVER['REQUEST_TIME']-$str);
	
	echo hexdec($str2);
	echo "<br/>";
	return $str.substr(md5($str.SECRET),0,10).$str2;
}

echo "<br/>";
function v_token($str,$delay=300){
	$rs =substr($str,0,4);
	$middle = substr($str,0,14);
	$rs2 = substr($str,14,8);
	echo "<br />";
	echo $rs;
	echo "<br />";
	echo $middle;
	echo "<br />";
	echo $rs2;
	echo "<br />";
	echo hexdec($rs2);
	echo "<br>";
	echo ($_SERVER['REQUEST_TIME'] -hexdec($rs2)-$rs<$delay);
	return ($middle == $rs.substr(md5($rs.SECRET),0,10)) &&($_SERVER['REQUEST_TIME'] -hexdec($rs2)-$rs <$delay);

}
$s = m_token();
echo $s;
var_dump(v_token($s));
?>