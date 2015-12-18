<?php
class message{
	public $name; //姓名
	public $email; //联系方式
	public $content; //留言内容
	public function __set($name,$value){
		$this->$name = $value;
	}
	
	public function __get($name){
		if(!isset($this->$name)){
			$this->$name = NULL;
		}
	}
}


/**
*留言本模型，负责管理留言本
*$bookPath :留言本属性
*/

class gbookModel{
	private $bookPath; //留言本文件
	private $data; //留言数据
	
	public function setBookPath($bookPath){
		$this->bookPath = $bookPath;
	}
	
	public function getBookPath(){
		return $this->bookPath;
	}
	
	public function open(){
		
	}
	
	public function close(){
		
	}
	
	public function read(){
		return file_get_contents($this->bookPath);
	}
	
	//写入留言
	public function write($data){
		$this->data=self::safe($data)->name."&".self::safe($data)->email."\r\nsaid:\r\n".self::safe($data)->content;
		return file_put_contents($this->bookPath,$this->data,FILE_APPEND);
	}
	
	//模拟数据的安全模式，先拆包再打包
	public static function safe($data){
		$reflect = new ReflectionObject($data);
		$props = $reflect->getProperties();
		$messagebox = new stdClass();
		foreach($props as $prop){
			$ivar = $prop->getName();
			$messagebox->$ivar = trim($prop->getValue($data));
		}
		return $messagebox;
	}
	
	public function delete(){
		file_put_contents($this->bookPath,"'it's empty now!");
	}
	
	public function readByPage(){
		$handle = file($this->bookPath);
		$count = count($handle);
		$page = isset($_GET['page'])?intval($_GET['page']):1;
		if($page<1 || $page>$count)$page =1;
		$pnum =9;
		$begin = ($page-1)*$pnum;
		$end = ($begin+$pnum)?$count:$begin+$pnum;
		for($i=$begin;$i<$end;$i++){
			echo "<strong>",$i+1,'</strong>',$handle[$i],"<br/>";
		}
		for($i=1;$i<ceil($count/$pnum);$i++){
			echo "<a href=? page=${i}>${i}</a>";
		}
	}
}

class leaveModel{
	public function write(gbookModel $gb,$data){
		$book= $gb->getBookPath();
		$gb->write($data);//记录日志
	}
}

class authorControl{
	public function message(leaveModel $i,gbookModel $g,message $data){
		$i->write($g,$data);
	}
	
	public function view(gbookModel $g){
		return $g->read();
	}
	
	public function delete(gbookModel $g){
		$g->delete();
		echo self::view($g);
	}
	
	public function viewByPage(gbookModel $g){
		return $g->readByPage();
	}
}

$message = new message;
$message->name = 'phper';
$message->email = 'phper@php.net';
$message->content = 'a creazy phper love php so much.';
$gb = new authorControl();
$pen = new leaveModel();
$book = new gbookModel();
$book->setBookPath("D:\\wamp\\www\\Jobs\\shuipfcms\\a.txt");
$gb->message($pen,$book,$message);
echo $gb->viewByPage($book);
//$gb->delete($book);