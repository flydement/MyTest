<?php
class cook{
	public function meal(){
		echo '番茄蛋',PHP_EOL;
	}
	
	public function drink(){
		echo "紫菜蛋花汤",PHP_EOL;
	}
	
	public function ok(){
		echo "完蛋",PHP_EOL;
	}
}

interface Command{
	public function execute();
}

class MealCommand implements Command{
	
	private $cook;
	
	public function __construct(cook $cook){
		$this->cook = $cook;
	}
	
	public function execute(){
		$this->cook->meal();
	}
}

class DrinkCommand implements Command{
	
	private $cook;
	
	public function __construct(cook $cook){
			$this->cook = $cook;
	}
	
	public function execute(){
		$this->cook->drink();
	}
}

class cookControl{
	private $mealcommand;
	private $drinkcommand;
	
	public function addCommand(Command $mealcommand,Command $drinkcommand){
		$this->mealcommand = $mealcommand;
		echo get_class($mealcommand);
		$this->drinkcommand = $drinkcommand;
	}
	
	public function callmeal(){
		$this->mealcommand->execute();
	}
	
	public function calldrink(){
		$this->drinkcommand->execute();
	}
}

$controller = new cookControl;
$cook = new cook;
$mealcommand = new MealCommand($cook);
$drinkcommand = new DrinkCommand($cook);
$controller->addCommand($mealcommand,$drinkcommand);
$controller->callmeal();
$controller->calldrink();
?>