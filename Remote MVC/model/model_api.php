<?php
	
	class model_api extends model
	{
		
		public function __construct(){
			
			parent::__construct();
			
			return new model;
			
			
		}
		
		public function get_blog_page(){
			
			return $this->db_con->get('SELECT * FROM sticky');
			
		}
		
		
	}
	
	
?>