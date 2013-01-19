<?php

class scanPath{
	
	private $pathscan = null;
	
	public function __construct($path){
		
		$this->pathscan === $path;
		$this->scanDir();
	}
	
	public function scanDir(){
	
		$dir    = 	$this->pathscan ;
		$files1 = 	scandir($dir);
		print_r($files1);
		
	}
	
}