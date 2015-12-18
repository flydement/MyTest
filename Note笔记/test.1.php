<?php
exit;
namespace t1;
class test{
	static function test1(){
		echo "2324";
	}
}

namespace t2;
class test{
	static function test1(){
		echo "123231";
	}
}

\t1\test::test1();
var_dump(array(new test(),'test1'));

exit;

class Product{
	public $name;
	public $price;
	
	function __construct($name,$price){
		$this->name= $name;
		$this->price = $price;
	}
}

class ProcessSale{
	private $callbacks;
	function registerCallback($callback){
		if(! is_callable($callback)){
			throw new Exception("callback not callable");
		}
		$this->callbacks[] = $callback;
	}
	
	function sale($product){
		print "{$product->name}:processing";
		foreach($this->callbacks as $callback){
			call_user_func($callback,$product);
		}
	}
}

$logger = create_function('$product','print "loging({$product->name})\n";');
$processor = new ProcessSale();
$processor->registerCallback($logger);
$processor->sale(new Product("shoes",6));
print "\n";
$processor->sale(new Product("coffee",6));
exit;
class Test{
	function __call($method,$args){
		
		echo "方法不存在";
		var_dump($args);
		
	}
	
	function __toString(){
		return "你他娘的在打印";
	}
	public $name;
	
	function getname(){
		echo "2134";
	}
}
$t = new Test();
$t->name = 123;
$b = $t;
$d = clone $t;
$d->name="沃妮马";
$b->name= '456';
echo $d->name;
echo $b->name;
echo $t->name;
print $t;
exit;
class PersinWriter{
	function writeName(Person $p){
		print $p->getName()."\n";
	}
	
	function writeAge(Person $p){
		print $p->getAge()."\n";
	}
}


class Person{
	private $writer;
	
	function __construct(PersinWriter $writer){
		$this->writer = $writer;
	}
	
	function __call($methodname,$args){
		if(method_exists($this->writer,$methodname)){
			return $this->writer->$methodname($this);
		}
	}
	
	function getName(){return "Name";}
	
	function getAge(){return "123";}
}

$p = new Person(new PersinWriter());
$p->writeName();

exit;
class Person{
	
	private $name;
	private $age;
	
	function __set($property,$value){
		
		$method = "set{$property}";
		if(method_exists($this,$method)){
			return $this->$method($value);
		}
		
	}
	
	
	
	function __get($property){
		echo "被调用";
		$method = "get{$property}";
		//echo $method;
		if(method_exists($this,$method)){
			return $this->$method();
		}
		
	}
	
	
	function __isset($property){
		
		$mehod = "get{$property}";
		return "234".(method_exists($this,$mehod));
		
	}
	
	
	function setname($value){
		$this->name = $value;
	}
	
	function setage($value){
		$this->age = $value;
	}
	
	function getname(){
		return $this->name;
	}
	function getAge(){
		return "123";
	}
}

$p = new Person();
$p->name = "沃妮马";
echo $p->name;
var_dump(isset($p->nam1e));

exit;
try{
	if(!is_bool("呵呵")){
		throw new Exception("出错咯");
	}
	
}catch(Exception $e){
	echo $e->getMessage();
}




exit;
$xml = simplexml_load_file("test.xml");
$match = $xml->xml->xpath("/conf/item[0]");
var_dump($match);



exit;
