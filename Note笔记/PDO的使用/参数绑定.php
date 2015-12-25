<?php
$calories = 150;
$colour = 'red';
$sth = $dbh->prepare("SELECT name,color,calories 
		FROM fruit 
		WHERE calories<: calories AND colour=:colour");
$sth->bindParam(":calories",$calories,PDO::PARAM_INT);
$sth->bindParam(":colour",$colour,PDO::PARAM_STR,12);
$sth->execute();
$sth->$dbh->prepare("SELECT name,colour,calories FROM fruit
	WHERE calories<? AND colour = ?
");
$sth->bindParam(1,$calories,PDO::PARAM_INT);
$sth->bindParam(2,$colour,PDO::PARAM_STR,12);
$sth->execute();
?>
