<?php
$memecache = new Memcache();
$conn = $memcache->connect("localhost","22202");
$data = $conn->get("key");
$res =  $conn->set('key','value');
?>