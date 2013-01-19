<?php

class apiSessionWrapper{

	private static $api_session_wrapper_instance;
	
	private function __contruct(){}
	
	private static function getInstance(){
		
		if(!self::$api_session_wrapper_instance) self::$api_session_wrapper_instance = new apiSessionWrapper;
		return self::$api_session_wrapper_instance;
		
		}

}