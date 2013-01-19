<?php

	class controller_api extends controller
	{
		
		public function __construct($controller, $model, $action){
			
			parent::__construct($controller, $model, $action);
			
			$this->model_grab('api'); 
			
			$this->model_grab('blog');
			
			$this->model_grab('user');
			
		}
		
		public function index(){
			
			$this->template_set('display', false);
		
		}
		
		public function message(){	
			
			header('Content-Type: application/json');
			
			$this->template_set('display', false);
			
			$urlArray = explode("?",$_SERVER['REQUEST_URI']);
			
			$urlSec = explode("&",$urlArray[1]);
			
			$output_json = array();
			$searchfilters = array('search_filters' => array());
			$results = array('search_results'	=>	array());
			$error_array = array('errors'	=>	array());

			foreach ($urlSec as $item){
				
				$urlSec = explode("=", $item);
				
				$searchfilters['search_filters'][$urlSec[0]] = $urlSec[1];
			
			}

			if($_SERVER['REQUEST_METHOD'] == 'GET'){
				
				if(isset($searchfilters['search_filters']['username']) && isset($searchfilters['search_filters']['type'])){
					
					$userpass = $this->model_user->get_user_unread_messages($searchfilters['search_filters']['username']); 
					
					if(sizeof($userpass) == 0){ 
						$error_array['errors']['description'] = 'message not found';
						$error_array['errors']['code'] = '200';
						echo json_encode($error_array);
					}
					
					else{ echo json_encode($userpass); }
	
				}
				
				else{
					
						$error_array['errors']['description'] = 'message not found';
						$error_array['errors']['code'] = '200';
						echo json_encode($error_array);
					
				}
			}
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){}
			if($_SERVER['REQUEST_METHOD'] == 'PUT'){}
			if($_SERVER['REQUEST_METHOD'] == 'DELETE'){}
			
			
			
		}
		
		public function wall(){
				
			header('Content-Type: application/json');
				
			$this->template_set('display', false);
				
			$urlArray = explode("?",$_SERVER['REQUEST_URI']);
				
			$urlSec = explode("&",$urlArray[1]);
				
			$output_json = array();
			$searchfilters = array('search_filters' => array());
			$results = array('search_results'	=>	array());
			$error_array = array('errors'	=>	array());
		
			foreach ($urlSec as $item){
		
				$urlSec = explode("=", $item);
		
				$searchfilters['search_filters'][$urlSec[0]] = $urlSec[1];
					
			}
		
			if($_SERVER['REQUEST_METHOD'] == 'GET'){
		
				if(isset($searchfilters['search_filters']['username'])){
						
					$userpass = $this->model_user->get_user_posts($searchfilters['search_filters']['username']);
						
					if(sizeof($userpass) == 0){
						$error_array['errors']['description'] = 'user not found';
						$error_array['errors']['code'] = '100';
						echo json_encode($error_array);
					}
						
					else{ echo json_encode($userpass); }
		
				}
		
				else{
						
					$error_array['errors']['description'] = 'user not found';
					$error_array['errors']['code'] = '100';
					echo json_encode($error_array);
						
				}
			}
				
			if($_SERVER['REQUEST_METHOD'] == 'POST'){}
			if($_SERVER['REQUEST_METHOD'] == 'PUT'){}
			if($_SERVER['REQUEST_METHOD'] == 'DELETE'){}
				
				
				
		}
		
		public function requests(){
		
			header('Content-Type: application/json');
		
			$this->template_set('display', false);
		
			$urlArray = explode("?",$_SERVER['REQUEST_URI']);
		
			$urlSec = explode("&",$urlArray[1]);
		
			$output_json = array();
			$searchfilters = array('search_filters' => array());
			$results = array('search_results'	=>	array());
			$error_array = array('errors'	=>	array());
		
			foreach ($urlSec as $item){
		
				$urlSec = explode("=", $item);
		
				$searchfilters['search_filters'][$urlSec[0]] = $urlSec[1];
					
			}
		
			if($_SERVER['REQUEST_METHOD'] == 'GET'){
		
				if(isset($searchfilters['search_filters']['username'])){
		
					$userpass = $this->model_user->get_user_requests($searchfilters['search_filters']['username']);
		
					if(sizeof($userpass) == 0){
						$error_array['errors']['description'] = 'user not found';
						$error_array['errors']['code'] = '100';
						echo json_encode($error_array);
					}
		
					else{ echo json_encode($userpass); }
		
				}
		
				else{
		
					$error_array['errors']['description'] = 'user not found';
					$error_array['errors']['code'] = '100';
					echo json_encode($error_array);
		
				}
			}
		
			if($_SERVER['REQUEST_METHOD'] == 'POST'){}
			if($_SERVER['REQUEST_METHOD'] == 'PUT'){}
			if($_SERVER['REQUEST_METHOD'] == 'DELETE'){}
		
		
		
		}
		
		public function user(){	
			
			header('Content-Type: application/json');
			
			$this->template_set('display', false);
			
			$urlArray = explode("?",$_SERVER['REQUEST_URI']);
			
			$urlSec = explode("&",$urlArray[1]);
			
			$output_json = array();
			$searchfilters = array('search_filters' => array());
			$results = array('search_results'	=>	array());
			$error_array = array('errors'	=>	array());

			foreach ($urlSec as $item){
				
				$urlSec = explode("=", $item);
				
				$searchfilters['search_filters'][$urlSec[0]] = $urlSec[1];
			
			}

			if($_SERVER['REQUEST_METHOD'] == 'GET'){
				
				if(isset($searchfilters['search_filters']['username'])){
					
					$userpass = $this->user_get($searchfilters['search_filters']['username']);
					
					if(sizeof($userpass) != 1){ 
						$error_array['errors']['description'] = 'user not found';
						$error_array['errors']['code'] = '100';
						echo json_encode($error_array);
					}
					
					else{ echo json_encode($userpass); }
	
				}
				
				else{
					
					echo json_encode($this->user_get());
					
				}
			}
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){}
			if($_SERVER['REQUEST_METHOD'] == 'PUT'){}
			if($_SERVER['REQUEST_METHOD'] == 'DELETE'){}
			
			
			
		}
		
		public function blog(){
			
			header('Content-Type: application/json');
			
			$this->template_set('display', false);
			
			$output = $this->model_blog->get_blog();
			
			print_r(json_encode($output));

		}
		
		private function blog_delete(){}
		private function blog_update(){}
		
		private function user_get($username = null){
			
			if($username == null){ return $this->model_user->list_users(); }
			else{ return $this->model_user->list_users($username); }
			
		}
		
		private function user_delete(){}
		private function user_new(){}
		

		

		
}
   