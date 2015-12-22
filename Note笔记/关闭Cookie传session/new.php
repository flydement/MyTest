<?php
$sessionName = session_name();
$sessionID = $_GET[$sessionName];
session_id($sessionID);
session_start();
print_r($_COOKIE);
var_dump($_SESSION);
?>