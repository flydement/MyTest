<?php
$d = microtime();
$str = "23";
for($i =0;$i<1000;$i++){
	echo  "234","heheh";
}
echo microtime()-$d;

class Person{
	public $name;
	function __construct($name){
		$this->name = $name;
	}
}

interface Module{
	function execute();
}

class FtpModule implements Module{
	function setHost($host){
		print "FtpModule::setHost() : $host\n";
	}
	
	function setUser($user){
		print "FtpModule::setUser(): $user\n";
	}
	
	function execute(){
		
	}
}

class PersonModule implements Module{
	function setPerson(Person $person){
		print "PersonModule::setPerson():{$person->name}\n";
	}
	
	function execute(){
		
	}
}

class ModuleRunner{
	private $configData = array("PersonModule"=>array('person'=>'bob')
								,"FtpModule"=>array('host'=>'example.com',
													'user'=>'anon'
									)
	);
	private $modules = array();
}
?>