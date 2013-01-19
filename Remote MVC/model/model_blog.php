<?php
	
	class model_blog extends model
	{
		
		public function __construct(){
			
			parent::__construct();
			
			return new model;
			
			
		}
		
		public function get_blog(){
			
			return $this->db_con->get("SELECT * FROM sticky");
			
		}
		
		
	}
	
	
?>