<?php
file_put_contents("ads.txt","22");

exit;
set_time_limit(0);
class Test extends \Thread{
	public function run(){
		while(time()<strtotime("2015-12-21 11:24:00")){
			usleep(5);
			echo time(),"\r\n<br>";
		}
	}
}

$s = new Test();
$s->start();


?>

