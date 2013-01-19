<?php
	class controller_error extends controller
	{
		
	
		public function index()
		{
			
			$this->template_set('page_type', 'static');
			
			$this->template_set('template_set', 'error');
			$this->template_set('template_file', 'error');
			
			$this->template_set('page_title', 'ERROR');
			$this->template_set('content', 'ERROR');
			
			
		}
		
	}
?>