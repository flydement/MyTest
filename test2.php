<?php
class test2{
	function ts(){
		$id = isset($_GET['id'])?$_GET['id']:"ehe";
		echo $id;
	}
}
$s= new test2;
$s->ts();
?>