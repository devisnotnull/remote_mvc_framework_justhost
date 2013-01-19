<?php
	
	class model_sticky extends model
	{
	
		public function get_sticky_database(){
		
			return $this->_dbconnect->get_sticky();
			
		}
	}
	
	
?>