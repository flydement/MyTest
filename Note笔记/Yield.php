<?php
#yield 类似于return 但是不是立刻返回，一直继续生成
function xrange($start, $limit, $step = 1) {
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

foreach(xrange(0,10,1) as $number){
	echo $number."<br/>";
}

$gen = (function(){
	
	yield 1;
	yield 2;
	yield 3;
	return 4;
	
})();

//返回 123
foreach($gen as $val){
	echo $val,PHP_EOL;
}
//返回4
echo $gen->getReturn(), PHP_EOL;


function gen()
{
    yield 1;
    yield 2;
    yield from gen2();
}

function gen2()
{
    yield 3;
    yield 4;
}

foreach (gen() as $val)
{
    echo $val, PHP_EOL;
}


//可以send一个yield
function printer(){
	while(true){
		$string = yield;
		echo $string;
	}
}

$printer =printer();
$printer->send("Hello World");

function nums() {
    for ($i = 0; $i < 5; ++$i) {
                //get a value from the caller
        $cmd = (yield $i);
        
        if($cmd == 'stop')
            return;//exit the function
        }     
}

$gen = nums();
foreach($gen as $v)
{
    if($v == 3)//we are satisfied
        $gen->send('stop');
    
    echo "{$v}\n";
}


/* 
 * 下面每一行是用分号分割的字段组合，第一个字段将被用作键名。
 */

$input = <<<'EOF'
1;PHP;Likes dollar signs
2;Python;Likes whitespace
3;Ruby;Likes blocks
EOF;

function input_parser($input) {
    foreach (explode("\n", $input) as $line) {
        $fields = explode(';', $line);
        $id = array_shift($fields);

        yield $id => $fields;
    }
}

foreach (input_parser($input) as $id => $fields) {
    echo "$id:\n";
    echo "    $fields[0]\n";
    echo "    $fields[1]\n";
}