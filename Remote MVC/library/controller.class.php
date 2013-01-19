<?php
	
	class controller
	{
		
		protected	$_controller;
		protected	$_model;
		protected	$_action;
		protected	$_accesslevel = GUEST_LEVEL_STRING;
		protected 	$_template;
		protected	$_session;
		
		public function __construct($controller,$model,$action){
			
			$this->_session = session::__getInstance();
			
			$this->_controller = $controller;
			
			$this->_action = $action;
			
			$this->_template = new Template();
			
		}
		/*
		 * 
		 * @
		 * 
		 */
		public function model_grab($model_name){
			
			$model_name = 'model_'.$model_name;
			
			if(file_exists(BASE_ROOT.DS.'model'.DS.$model_name.'.php')){
				include_once(BASE_ROOT.DS.'model'.DS.$model_name.'.php');
				$this->__set($model_name, new $model_name);
			}
			else{ 
				echo "MODEL NOT FOUND";
				
			}
			
		}
		
		public function template_set($name,$value)
		{
			$this->_template->set($name,$value);
		}
		
		public function __set($name,$var){
			$this->$name = $var;
		}
		

		function __destruct(){
			$this->_template->render();
			exit();
		}

	}

 