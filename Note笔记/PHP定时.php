<?php 
ignore_user_abort();
set_time_limit(0); 
while(time()<strtotime("2015-12-18 18:30:00")){
	file_put_contents("./test.txt","1\r\n",FILE_APPEND);
	sleep(5);
}