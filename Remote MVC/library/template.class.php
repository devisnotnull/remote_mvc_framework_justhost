<?php
class template {

		protected $variables = array();
		
		protected $_controller;
		
		protected $_action;
		
		public function __construct() {
		
		
		}

		/** Set Variables **/
		
		 
		public function set($name,$value) {
		
			$this->variables[$name] = $value;
		}
		
		/** Display Template **/
		
		public function render() {
			
			extract($this->variables);
			
			if(isset($display) && $display == false){ }
			
			else{
				
				if(isset($template_header)){include_once(BASE_ROOT.DS.'view'.DS.$template_header.DS.'header.php');}
				else{include_once(BASE_ROOT.DS.'view'.DS.'default'.DS.'header.php');}
				
				if(isset($template_set)){include_once(BASE_ROOT.DS.'view'.DS.$template_set.DS.'view_'.$template_file.'.php');}
				else{include_once(BASE_ROOT.DS.'view'.DS.'default'.DS.'page.php');}
				
				if(isset($template_footer)){include_once(BASE_ROOT.DS.'view'.DS.$template_footer.DS.'footer.php');}
				else{include_once(BASE_ROOT.DS.'view'.DS.'default'.DS.'header.php');}
			
			}
		}
		
		 
		
}