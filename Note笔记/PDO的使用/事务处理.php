<?php
$db->beginTransaction(); //开启事务处理
$db->exec("INSERT INTO ");//SQL语句
$db->commit();//提交
?>

