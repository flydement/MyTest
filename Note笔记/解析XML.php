<?php
$str = '<?xml version="1.0" encoding="UTF-8"?>
<recipe>
		<listitem>
			<quantity>1q</quantity>
			<itemdescription>1i</itemdescription>
		</listitem>
		<listitem>
			<quantity>2q</quantity>
			<itemdescription>2i</itemdescription>
		</listitem>
		<listitem>
			<quantity>3q</quantity>
			<itemdescription>3i</itemdescription>
		</listitem>
</recipe>';
echo "<pre>";
$s = simplexml_load_string($str);
print_r($s);
$c=0;
//对象转数组
function simplexml_obj2array($obj,$c){
	if(count($obj)>1){

		$result = $keys =array();

		foreach($obj as $key =>$value){
			isset($keys[$key])?($keys[$key]+=1):($keys[$key]=1);
			if($keys[$key]==1){
				$result[$key] = simplexml_obj2array($value,$c++);	
			}elseif($keys[$key] == 2){
				$result[$key] = array($result[$key],simplexml_obj2array($value,$c++));
			}elseif($keys[$key]>2){
				$result[$key][] = simplexml_obj2array($value,$c++);	
			}

		}
		return $result;
	}elseif(count($obj) == 0){
		return (string) $obj;
	}
}
echo "<pre>";
print_r(simplexml_obj2array($s,0));
echo "</pre>";
//print_r(simplexml_obj2array($s,0));
?>