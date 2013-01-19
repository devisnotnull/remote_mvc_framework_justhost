<?php

	class controller_admin extends controller
	{
		
		public function __construct($controller, $model, $action){
			
			parent::__construct($controller, $model, $action);
			
			$this->model_grab('admin'); 
			
			
		}
		
		public function index(){
			
			if(session::get_level() == null){
					if(isset($_POST['username'])){
						if(isset($_POST['userpassword'])){
							if($this->model_user->login(array(
														'user_name'	=>	$_POST['username'],
														'user_password'	=>	$_POST['userpassword'])
									)){
								$this->_session->ses_login($_POST['username']);
							}
						}
					}
					
					$this->template_set('template_set', 'user');
					$this->template_set('template_file', 'login');
					
					$this->template_set('page_title', 'User Registration');
					$this->template_set('content', 'Welcome To The Login Page');
					
					
			}
			else{
				
				$this->template_set('template_set', 'user');
				$this->template_set('template_file', 'profile');
				
				$this->template_set('page_title', 'User Registration');
				$this->template_set('content', 'Welcome To The Login Page');
				
			}	
		}
	
		
}
   