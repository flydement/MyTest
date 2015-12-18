<?php

//进程类 的基础
interface process{
	public function process();
}

//具体操作的进程类
class playerencode implements process{
	public function process(){
		echo "Encode\r\n";
	}
}

//具体操作的进程类
class playeroutput implements process{
	public function process(){
		echo "Output\r\n";
	}
}

//程序类，用于调用具体的基础类的操作
class playProcess{
	private $message = null;
	public function __construct(){
		
	}
	
	//获取一个事件，用于调用进程的方法
	public function callback(event $event){
		$this->message = $event->click();
		if($this->message instanceof process){
			$this->message->process();
		}
	}
}


//具体对象类，兑现归类调用程序
class mp4{
	
	//具体方法，调用进程
	public function work(){
		$playProcess = new playProcess();
		$playProcess->callback(new event('Encode'));
		$playProcess->callback(new event("Output"));
	}
}

//事件类，用于程序类和进程类之间的联系
class event{
	private $m;
	public function __construct($me){
		$this->m = $me;
	}
	
	public function click(){
		switch($this->m){
			case 'Encode':
			return new playerencode();
			break;
			case "Output" :
			return new playeroutput();
			break;
		}
	}
}

$mp4 = new mp4;
$mp4->work();
?>