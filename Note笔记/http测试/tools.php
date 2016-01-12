<?php
if($_POST['submit'] == "submit"){
	//echo ;
	$method = $_POST['type'];
	$url = $_POST['url'];
	$key = $_POST['key'];
	$value= $_POST['value'];
	$hkey= $_POST['hkey'];
	$hvalue= $_POST['hvalue'];
	$data = array();
	$header = array();
	foreach($key as $k=>$v){
		$data[$v] =$value[$k];
	}
	
	foreach($hkey as $k=>$v){
		$header[] =$v.$hvalue[$k];
	}
	//$_SERVER['REQUEST_METHOD'];
	$res = curl($method,$url,$data,$header);
	var_dump($res);
}
function curl($method=0,$url,$data,$header){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,$method);
	if($method == 1){
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
	}
	if(!empty($header)){
		 curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	}
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$server_return = curl_exec($ch);
	curl_close($ch);
	return $server_return;
}
?>
<html>
<head><title>Test Tools</title></head>
<body>
	<h1>Test Tools</h1>
	<form method="post" action="">
		<div>
			URL:<input name="url" value=""/>
			Method:<select name="type" id='type'>
				<option value="0">GET</option>
				<option value="1">POST</option>
			</select>
		</div>
		
		<div id='some' style="display:none">
			<h5>Param</h5><input type="button" id='add' value="Add"/>
			<div>key:<input name="key[]" />value:<input name="value[]" /></div>
		</div>
		<div id='header' style="display:">
			<h5>Header</h5><input type="button" id='head' value="Add"/>
			<div>key:<input name="hkey[]" />value:<input name="hvalue[]" /></div>
		</div>
		<div>
			
			<input type="submit" name='submit' value="submit"/>
		</div>
	</form>
</body>
</html>
<script type="text/javascript" src="jquery.min.js"></script>
<script>
$(function(){
	$("#type").change(function(){
		if($("#type").val() == 1){
			$("#some").show();
		}else{
			$("#some").hide();
		}
	})
	$("#add").click(function(){
		var html = '<div>key:<input name="key[]" />value:<input name="value[]" /></div>';
		$("#some").append(html);
	});
	$("#head").click(function(){
		var html = '<div>key:<input name="hkey[]" />value:<input name="hvalue[]" /></div>';
		$("#header").append(html);
	});
})

</script>