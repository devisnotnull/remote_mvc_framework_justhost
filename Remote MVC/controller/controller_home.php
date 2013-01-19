<?php

	class controller_home extends controller
	{

		
		public function index()
		{
			
			$this->template_set('page_type', 'static');
			
			$this->template_set('template_set', 'home');
			$this->template_set('template_file', 'home');
			
			$this->template_set('page_title', 'Welcome To The Home Page');
			$this->template_set('content', 'Welcome To The Home Page !');
		}
		
		
}
   