<?php

class router{
	
	public $controller = null;
	public $model = null;
	public $view = array('actions'	=>	array()); 
	private $start_time = null;
	
	
	function __construct(){
		
		$this->start_timer(10);
		
	}
	
	private function start_timer($decimalPlace){
		
	   $mtime = microtime(); 
	   $mtime = explode(" ",$mtime); 
	   $mtime = $mtime[1] + $mtime[0]; 
	   $this->start_time = $mtime; 
		
	}
		
	public function get_exec_time($decimalPlace){
		
	   $mtime = microtime(); 
	   $mtime = explode(" ",$mtime); 
	   $mtime = $mtime[1] + $mtime[0]; 
	   $endtime = $mtime; 
	   $totaltime = ($endtime - $this->start_time); 
	   
	   define('EXEC_TIMER',$totaltime); 
   
		}
		
	public function start(){
	
		if(!isset($_GET['url'])){
			$url = "home";
		}
		else{
			$url = $_GET['url'];
		}

		$urlArray = array();
		$urlArray = explode("/",$url);
		
		
		
		if(!isset($urlArray[0])){} 
		else $this->controller = $urlArray[0];
		array_shift($urlArray);
		
		if(!isset($urlArray[0])){}
		else $this->model = $urlArray[0];
		array_shift($urlArray);
		
		if(sizeof($urlArray) > 0){
			if(!isset($urlArray[0])){}
			$this->view['actions'] = $urlArray;
			array_shift($urlArray);
		}

	}
	
		
	public function load_required_files(){

			if(file_exists(BASE_ROOT.DS."view".DS."functions".DS.'functions.php')){
				require_once(BASE_ROOT.DS."view".DS."functions".DS.'functions.php');
			}
			if (file_exists(BASE_ROOT.DS."library".DS."cache.class.php")){
				require_once(BASE_ROOT.DS."library".DS."cache.class.php");
			}
			if (file_exists(BASE_ROOT.DS."library".DS."database.class.php")){
				require_once(BASE_ROOT.DS."library".DS."database.class.php");
			}
			if(file_exists(BASE_ROOT.DS."library".DS.'databaseinterface.class.php')){
				require_once(BASE_ROOT.DS."library".DS.'databaseinterface.class.php');
			}
			if (file_exists(BASE_ROOT.DS."library".DS."model.class.php")){
				require_once(BASE_ROOT.DS."library".DS."model.class.php");
				require_once(BASE_ROOT.DS."model".DS."model_session.php");
			}
			if (file_exists(BASE_ROOT.DS."library".DS."controller.class.php")){
				require_once(BASE_ROOT.DS."library".DS."controller.class.php");
			}
			if (file_exists(BASE_ROOT.DS."library".DS."template.class.php")){
				require_once(BASE_ROOT.DS."library".DS."template.class.php");
			}
			if (file_exists(BASE_ROOT.DS."library".DS."session.class.php")){
				require_once(BASE_ROOT.DS."library".DS."session.class.php");
			}

	
		}
		
		public function check_integrity(){
			
		if(!$this->controller){ $this->controller = "home"; }
			
			if(file_exists(BASE_ROOT.DS."controller".DS."controller_".$this->controller.".php")){
					
					require_once(BASE_ROOT.DS."controller".DS."controller_".$this->controller.".php");
					
					if($this->model){
						
						$controllerformat = "controller_".$this->controller;
						
						if (method_exists($controllerformat, $this->model)){ return true; }
						
						else {return false;}
						
					}
					
					else {
						return true;}
				}
			
			
		}
		
		public function load_controller_files(){
		
			if($this->check_integrity()){
				
				require_once(BASE_ROOT.DS."controller".DS."controller_".$this->controller.".php");
				
			}
				
			else if(file_exists(BASE_ROOT.DS."controller".DS."controller_error.php")){
				
					if(file_exists(BASE_ROOT.DS."model".DS."model_error.php")){
						$this->controller = "error";
						require_once(BASE_ROOT.DS."controller".DS."controller_error.php");
					}
			}
			else{
				echo "AN INTERNAL ERROR HAS OCCURED THAT CANNOT BE RECOVERED FROM";
				exit();
			}
			
			
		}
		
		private function __destruct(){
		
			$this->get_exec_time(10);
			
		}


}
