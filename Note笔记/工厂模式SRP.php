<?php
interface Db_Adapter{
	/**
	*数据库链接
	*@param $config数据库配置
	*@rerurn resource
	*/
	public function connect($config);
	
	/**
	*执行数据库查询
	*@param string $query数据库查询SQL字符串
	*@param mixed $handle连接对象
	*@return resource
	*/
	public function query($query,$handle);
	
}


//Mysql查询语
class Db_Adapter_Mysql implements Db_Adapter{
	
	private $_dbLink; //数据库链接字符串标志
	
	/**数据库链接函数
	*
	*@param $config数据库配置
	*@throws Db_Exception
	*@return resource*
	**/
	public function connect($config){
		if($this->_dbLink = @mysql_connect($config->host.(empty($config->prot)?" ":': '.$config->port),
			$config->user,$config->password,true)){
				if(@mysql_select_db($config->database,$this->_dbLink)){
					if($config->charset){
						mysql_query("SET NAMES '{$config->charset}'",$this->_dbLink);
					}
					return $this->_dbLink;
				}
			}
			
			/****数据库异常****/
			throw new Db_Exception(@mysql_error($this->_dbLink));
	}
	
	/**
	*执行数据库
	*@param string $query数据库查询SQL字符串
	*$param mixed $handle连接对象
	*@return resource
	**/
	public function query($query,$handle){
		if($resource = @mysql_query($query,$handle)){
			return $resource;
		}
	}

}


//slqite查询
class Db_Adapter_sqlite implements Db_Adapter{
	
	private $_dbLink; //数据库连接标志
	
	/**
	*数据库连接函数
	*@param $config 数据库配置
	*@throws Db_Exception
	*@return resource
	*/
	public function connect($config){
		if($this->_dbLink = sqlite_open($config->file,0666,$error)){
			return $this->_dbLink;
		}
		
		/**数据库异常*/
		throw new Db_Exception($error);
		
	}
	
	/***执行数据库查询
	*@param string $query 数据库查询SQL字符串
	*$param mixed $handle连接对象
	*$return resource
	**/
	public function query($query,$handle){
		if($resource = @slqite_query($query,$handle)){
			return $resource;
		}
	}
}


class sqlFactory{
	public static function factory($type){
		//寻找类的路径
		if(include_once 'Drive/'.$type.".php"){
			$classname = 'Db_Adapter_'.$type;
			return new $classname;
		}else{
			throw new Exception('Driver Not Found');
		}
	}
}

//调用
$db = sqlFactory::factory('MySQL');
$db = sqlFactory::factory('SQLite');
?>