<?php
class session extends model_session {
	
	private static $_sessionid;
	private static  $_sessionusername = null;
	private static $_sessionremoteip;
	private static $_userlevel;
	
	private static $session_instance;
	
	protected  function __construct(){
			
		self::startSession();

	}
	
	public static function __getInstance(){
		
		if(!self::$session_instance) self::$session_instance = new session;
		return self::$session_instance;
		
	}

	private static function startSession(){ 
	
		session_start();
		
		global $session_default;
	
		self::$_userlevel = 3;
		
		self::$_sessionid = session_id();
		self::$_sessionremoteip = $_SERVER['REMOTE_ADDR'];
		
		if(isset($_SESSION['user_name']))	self::$_sessionusername = $_SESSION['user_name']; 
		
		
		if(self::$_sessionusername){
			
			if(parent::auth_check(array(	'user_name'	=>	self::$_sessionusername,
											'user_session'	=>	self::$_sessionid ,
											'user_ip'	=>	self::$_sessionremoteip))){ 
				
				self::$_userlevel = parent::auth_level(array(	'user_name'	=>	self::$_sessionusername,
																'user_session'	=>	self::$_sessionid ,
																'user_ip'	=>	self::$_sessionremoteip));		
								
			}
			else{	
				
				self::ses_logout(); }
			 
		}
		else{  } 
	

	}
	
	public static function get_level(){ 
	
		return self::$_userlevel; 
	}
	public static function get_user_name(){ return self::$_sessionusername; }
	
	
	/***********************
	
	***********************/
	
	public static function ses_login($username){
	
		  		$_SESSION['user_name'] = $username;
		  		header('Location: /user');
	
		  		
	}
	public static function session_username(){	
		return self::$_sessionusername;
	}
	
	public static function integrity_check(){
		
		$vars = array(	'user_name'		=>	self::$_sessionusername,
						'user_session'	=>	self::$_sessionid,
						'user_ip'		=>	self::$_sessionremoteip);
		
		$authkey = self::auth_level($vars);
		
		if($authkey == null){return false;}
		
		else if($authkey == 1){return true;}
		
	}
	
	/***********************
	
	***********************/
	
	public static function ses_logout(){
		
		session_regenerate_id();
		
		foreach ($_SESSION as $var => $val) {
			  $_SESSION[$var] = null;
		  }
		session_unset();
		session_destroy();

         
		
	}
}