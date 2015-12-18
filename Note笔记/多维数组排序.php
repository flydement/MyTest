<?php
echo "<pre>";
 $data = json_decode('{"code":"1000","message":"查询成功","data":[{"price":"1.38","size":"10.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF3306460050882900aI"},{"price":"2.3","size":"30","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF3082336535954100cG"},{"price":"4.6","size":"70","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF46471288366495003e"},{"price":"9.2","size":"150","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF110570353738460031"},{"price":"13.8","size":"500","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF6373498141093500jf"},{"price":"23.0","size":"1024","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF8975023142183900Cf"},{"price":"32.2","size":"2048","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF6596843639033600fx"},{"price":"46.0","size":"3072","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF923324884111920062"},{"price":"59.8","size":"4096","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF131306214187650064"},{"price":"82.8","size":"6144","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF82930851426636003W"},{"price":"1.38","size":"10","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF0440778933412300K5"},{"price":"128.8","size":"11264.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF2006580533140200Bu"},{"price":"2.3","size":"30.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF98469491769045009d"},{"price":"4.6","size":"70.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF02464683274495004t"},{"price":"9.2","size":"150.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF355840570784970016"},{"price":"13.8","size":"500.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF7062407708310100ET"},{"price":"23.0","size":"1024.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF9095385772196700v4"},{"price":"32.2","size":"2048.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF1288001808121200zI"},{"price":"46.0","size":"3072.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF1827934330149300GU"},{"price":"59.8","size":"4096.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF8939972878812900zq"},{"price":"82.8","size":"6144.00","validity":"一个月","effective":"0","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF77986971058441002b"},{"price":"128.8","size":"11264","validity":"一个月","effective":"2","flowmodel":"2G/3G/4G","range":"0","carrier":"1","province":"广东","prodNum":"PF6834220043443100PM"}]}');
$res  = $data->data;
$s = Array
(
    "0" => 10.00,
    "1" => 30,
    "2" => 70,
    "3" => 150,
    "4" => 500,
    "5" => 1024,
    "6" => 2048,
    "7" => 3072,
    "8" => 4096,
    "9" => 6144,
    "10" => 10,
    "11" => 11264.00,
    "12" => 30.00,
    "13" => 70.00,
    "14" => 150.00,
    "15" => 500.00,
    "16" => 1024.00,
    "17" => 2048.00,
    "18" => 3072.00,
    "19" => 4096.00,
    "20" => 6144.00,
    "21" => 11264
);


$s1 = Array
(
    "0" => array(10.00,'a'),
    "1" => array(30,'b'),
    "2" => array(70,'c'),
    "3" => array(150,'d'),
    "4" => array(500,'e'),
    "5" => array(1024,'f'),
    "6" => array(2048,'g'),
    "7" => array(3072,'h'),
    "8" => array(4096,'i'),
    "9" => array(6144,'j'),
    "10" => array(10,'k'),
    "11" => array(11264.00,'l'),
    "12" => array(30.00,'m'),
    "13" => array(70.00,'n'),
    "14" => array(150.00,'o'),
    "15" => array(500.00,'p'),
    "16" => array(1024.00,'q'),
    "17" => array(2048.00,'r'),
    "18" => array(3072.00,'s'),
    "19" => array(4096.00,'t'),
    "20" => array(6144.00,'u'),
    "21" => array(11264,'v')
);
		array_multisort($s,SORT_NUMERIC,SORT_ASC,$s1); 
print_r($s1);
 ?>