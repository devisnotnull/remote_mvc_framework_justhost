<?php 

include_once('database.class.php');

class apiDbWrapper extends database{

	private static $api_db_wrapper_instance;
	
	private $main_db;
	
	private function __construct(){
		
		$this->main_db = parent::__constuct; 
	}
	
	public static function getInstance(){
		
		if(!self::$api_db_wrapper_instance) self::$api_db_wrapper_instance = new apiDbWrapper;
		return self::$api_db_wrapper_instance;
		
	}
}