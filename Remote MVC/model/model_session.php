<?php

class model_session extends model{
	
	protected function __construct(){
		parent::__construct();
	}
	
	public function auth_check($vars = array()){
		
		extract($vars);
		
		if(isset($user_name) && isset($user_session) && isset($user_ip)){
			
			$con = parent::get_con();
			
			$query_collect = $con->rowCount("SELECT * FROM users
													WHERE user_name = '$user_name'
													AND user_last_session = '$user_session'
													AND user_last_ip	= '$user_ip'");
		
			
			if($query_collect == 1) return true;
			else return false;
		
		}
		
		else return false;
	}
	
	public function auth_level($vars = array()){
		
		extract($vars);
		
		if(!isset($user_name, $user_session, $user_ip)){return false;}
		
		$con = parent::get_con();
	
		$query_collect = $con->query("SELECT user_access_level FROM users
				WHERE user_name = '$user_name'
				AND user_last_session = '$user_session'
				AND user_last_ip	= '$user_ip'");

		return $query_collect[0]['user_access_level'];
			
	}
	
}