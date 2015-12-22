<?php
	function SMS_2($mobiles,$content){//谐和
		 $username=urlencode(trim('ceshi@ceshi'));//帐号
		 $password=urlencode(trim('0XafN0'));//密码
		 $mobiles=trim($mobiles);//收信人
		 $content=urlencode(iconv( "UTF-8", "gb2312//IGNORE" , trim($content)));//内容 
		 
		$post_data = array () ;
		$post_data ['account'] = $username;  //帳號
		$post_data ['passwd'] = $password;    //密碼
		$post_data ['mobiles'] = $mobiles;  //群发号码，多个号码以英文逗号分隔，号码总数不超过500个
		$post_data ['content'] = $content;   //短信内容，最大不超过600个字符。中英文字符均按一个字符计算
		$post_data ['expandno'] = "";       //拓展码，必须是数字字符串。若不需要拓展，则留空
		$post_data ['batchno'] = "";        //批次号，发送批次的唯一标识。用户可根据自己的业务规则定义批次号，批次号长度不能超过50个字符。若留空，则每次发送返回的批次号由接口生成，为36位的UUID字符串。
		$post_data ['digest'] = md5($post_data ['mobiles'].$post_data ['content']);          //数据认证，值为号码加内容的32位MD5，即MD5(mobiles + content)
		$url = 'http://124.172.243.56:8080/sms/sendsms.jsp';
		$o = "" ;
		foreach ($post_data as $k=>$v)
		{
			 $o.=$k."=".urlencode($v)."&";
		}
		$post_data = substr($o,0,-1) ;
		$ch = curl_init () ;
		curl_setopt ($ch,CURLOPT_POST,1) ;
		curl_setopt ($ch,CURLOPT_HEADER,0) ;
		curl_setopt ($ch,CURLOPT_URL,$url) ;
		//为了支持cookie
		curl_setopt ($ch,CURLOPT_COOKIEJAR,'cookie.txt');
		curl_setopt ($ch,CURLOPT_POSTFIELDS,$post_data);
		$result = curl_exec ($ch) ; 
	}
SMS_2($mobiles,$content);//调用函数_谐和

?>