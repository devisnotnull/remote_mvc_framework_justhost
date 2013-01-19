<?php

class model {
	
	public $db_con;
	
	protected function __construct(){
		
		$this->db_con = db_i::__getInstance();
	
	}
	
	public function load_database(){
	
		
	}
	
	public function get_con(){
		return db_i::__getInstance();
	}
	
	public function map_table($table_name){
	
		$map_table = 'table';
		$this->__set($map_table, $table_name);
		
	}
	
	public function __set($name,$var){
		$this->$name = $var;
	}

} 