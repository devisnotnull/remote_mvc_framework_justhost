<?php

class db_i
{
	
	public static $db_interface_instance = null;
	
	public static $db_main;
	
		
	private function __construct(){
	
		self::$db_main = database_instance::__getInstance();
		
		
	}
	
	private function __clone(){}
		
		/*
		 * 	@function 			__getInstance		Singleton Method Returns instance
		* 	@description 		Implements Singelton Returns Instance Object
		* 	@params 			None
		* 	@return 			return Instance;
		*/
	public static function __getInstance(){
	
		if(!self::$db_interface_instance) self::$db_interface_instance = new db_i;
		return self::$db_interface_instance;
		
	}

	public static function set($table,$vars){
			
		if(!$table || !$vars) return false;
				
	}

	public static function get($query){
		return self::query($query);
	}

	public static function update($table,$vars){
			
		if(!$table || !$vars) return false;

	}

	public static function delete($table,$vars){
			
		if(!$table || !$vars) return false;

	}
	
	public static function query($query){
		
		return self::$db_main->query($query);
		
	}
	
	public static function rowCount($query){
	
		return self::$db_main->rowCount($query);
		
	}
	
	public static function execAndCount($query){
		
		return self::$db_main->execAndCount($query);
	}

}


?>