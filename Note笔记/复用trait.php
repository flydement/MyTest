<?php
trait Hello{
	public function sayHello(){
		echo "Hello";
	}
}

trait World{
	public function sayWrold(){
		echo "World";
	}
}

class MyHelloWorld{
	use Hello,World;
	public function sayExclamationMark(){
		echo "! ";
	}
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWrold();
$o->sayExclamationMark();
?>