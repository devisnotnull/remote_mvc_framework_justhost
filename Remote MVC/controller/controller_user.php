<?php

	class controller_user extends controller
	{
		
		public function __construct($controller, $model, $action){
			
			parent::__construct($controller, $model, $action);
			
			$this->model_grab('user'); 
			
			$this->template_set('user_unread_messages', $this->model_user->get_user_unread_messages(session::session_username()));
			
		}
		
		public function index(){
			
			if(session::get_level() == '3'){
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
				$this->template_set('template_file', 'all');
				
				$this->template_set('page_title', 'User Registration');
				$this->template_set('content', 'Welcome To The Login Page');
			
				$this->template_set('loop', $this->model_user->list_users());
				
			}	
		}
		
		public function admin(){
			
			$session = session::integrity_check();
			
			if($session != 1){
				
				$this->index();
			
				exit();
			}

			$this->template_set('template_set', 'user');
			$this->template_set('template_file', 'admin');
			
			$this->template_set('loop', $this->model_user->list_users(session::session_username()));
			$this->template_set('loop_profile', $this->model_user->get_user_blog(session::session_username()));
			
		
			
		}
		
		public function friends(){
			
			$this->template_set('template_set', 'user');
			$this->template_set('template_file', 'friends');
			
			$this->template_set('loop_friends', $this->model_user->get_user_friends(session::get_user_name()));
			
		}
		
		public function profile(){
			
			if(isset($_POST['yourmindtitle']) && isset($_POST['yourmindcontent'])){
			
				$this->model_user->post_user_wall(session::session_username(),'stump200',$_POST['yourmindtitle'],$_POST['yourmindcontent']);
			
			}
			
			$user_get = $this->model_user->list_users($this->_action['actions'][0]);
			
			if(sizeof($user_get) != 1){
				
				header("HTTP/1.0 404 Not Found");
				
				$this->template_set('template_set', 'user');
				$this->template_set('template_file', 'user_not_found');
				
			}
	
			else {
				
				$this->template_set('template_set', 'user');
				$this->template_set('template_file', 'profile');
				
				$this->template_set('loop', $user_get);
				$this->template_set('loop_profile', $this->model_user->get_user_blog($this->_action['actions'][0]));
				$this->template_set('loop_friends', $this->model_user->get_user_friends($this->_action['actions'][0]));
				
					if($this->_action['actions'][0] == session::session_username()){
					
						$this->template_set('loop_messages', $this->model_user->get_user_messages(session::session_username()));
						$this->template_set('loop_requests', $this->model_user->get_user_requests(session::session_username()));
					}
				
					$this->template_set('loop_the_wall', $this->model_user->get_user_posts($this->_action['actions'][0]));
					
					
				
			}
		
		}
		
		public function messages(){
			
			$this->template_set('template_set', 'user');
			$this->template_set('template_file', 'messages');
			
			$this->template_set('page_title', 'User Registration');
			$this->template_set('content', 'Welcome To The Register Page');
			
			if(isset($_POST['yourmindtitle']) && isset($_POST['yourmindcontent'])){
				
				$this->model_user->get_user_messages($userfrom,$userto,$messagetitle,$message);
				
				$this->template_set('loop_messages', $this->model_user->get_user_messages(session::session_username()));
				
			}
			
			$this->template_set('loop_messages', $this->model_user->get_user_messages(session::session_username()));
			
		}
		
		public function register(){
			
			$this->template_set('template_set', 'user');
			$this->template_set('template_file', 'register');
				
			$this->template_set('page_title', 'User Registration');
			$this->template_set('content', 'Welcome To The Register Page');
				
			$this->template_set('loop', 'hey');
		
		}
		
		public function logout(){
			
			session::ses_logout();
			header('location: /home ');
			
		}
		
		
}
   