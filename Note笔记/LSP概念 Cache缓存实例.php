<?php
abstract class Cache{
	
	/**
	*设置一个缓存变量
	*
	*@param String $key 缓存Key
	*@param mixed $value 缓存内容
	*@param int $expire 缓存时间（秒）
	*@return bollean 是否缓存成功 
	*/
	public abstract function set($key,$value,$expire = 60);
	
	/**
	*获取一个已经缓存的变量
	*@param String $key 缓存Key
	*@return mixed 缓存内容
	*/
	public abstract function get($key);
	
	/**
	*删除一个已经缓存的变量
	*@return boolean 是否删除成功
	*/
	public abstract function del($key);
	
	/**
	*删除全部缓存变量
	*@return boolean 是否删除成功
	**/
	public abstract function delAll();
	
	/**
	*检测是否存在对应的缓存
	*/
	public abstract function has($key);
}
?>