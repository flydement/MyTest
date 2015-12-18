<?php
session_start();

$_SESSION['name']="Tushar";
$n=$_SESSION['name'];
$_SESSION['Age']="23";
$_SESSION['city']="Tarapur";

//echo session_encode()."<br/>";//Prints all Session Data
//echo session_is_registered($n);
echo session_module_name();//it prints "files"


ini_set('session.use_trans_sid',0);
ini_set('session.use_cookies',1);
ini_set('session.cookie_path',"/");
int_set('session.save_handler','user');
session_module_name('user');
session_set_save_handler(array($session,"open"),array($session,"close"),array($session,"read"),array($session,"write"),array($session,"destory"));
?>