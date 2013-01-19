<?php

	class controller_blog extends controller
	{
		
		public function __construct($controller, $model, $action){
			
			parent::__construct($controller, $model, $action);
			
			$this->model_grab('blog');
			
			
		}
		
		public function index()
		{
			
			$this->template_set('template_set', 'blog');
			$this->template_set('template_file', 'page');
			
			$this->template_set('page_title', 'Welcome To The Blog');
			$this->template_set('content', 'Welcome To The Blog');
			
			$this->template_set('loop', $this->model_blog->get_blog() );
			
		}
		
		
}
   