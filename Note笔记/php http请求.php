<?php
//HTTP协议
echo "<pre>";
print_r(get_headers("http://www.baidu.com"));

echo "file_get_contents";
$html = file_get_contents("http://www.baidu.com");
print_r($http_response_header);

echo "fopen";
$fp = fopen("http://www.baidu.com",'r');
print_r(stream_get_meta_data($fp));
fclose($fp);
?>