<?php

/* 

	ALBROWNDESIGN DATABASE BASE CLASS
	vesrsion V2.0
	PDO Prefrence method
	Must be used as part of V2 MVC Framework

*/

class database_instance{
	
	private static $db_instance;
	
	private static $pdo_instance;
	
		private function __construct(){
		
			self::connect();
	
		}
		
		/*
		 * 	@function 			__getInstance		Singleton Method Returns instance
		* 	@description 		Implements Singelton Returns Instance Object
		* 	@params 			None
		* 	@return 			return Instance;
		*/
		public static function __getInstance(){
			
			if(!self::$db_instance) self::$db_instance = new database_instance;
			return self::$db_instance;
			
		}
		
		/*
		 * 	@function 			connect		 To Connect To A Database Object This Method Must Be Called,
		 * 	@description 		An Array Should Be Passed To Overide Defaults 
		 * 	@params 			function connect(array($Server_name, $Database_name, $Database_user, $Database_password))
		 * 	@return 			return value True;
		 */
		
		public static function connect($connection_options = null){
			
			global $database_default;
			// Make Database Config Global Scope Options Avaliable.
			
			$dbConnString = "mysql:host=" . $database_default['DEFAULT_SERVER'] . 
							"; dbname=" . $database_default['DEFAULT_DB'];
			
			try {
				
				self::$pdo_instance = new PDO($dbConnString, 
												$database_default['DEFAULT_USERNAME'],
												$database_default['DEFAULT_PASSWORD']);
				return true;
				
			} catch (PDOException $e) {
				
				echo $e;
				die();
				
			}
		}
		
		public static function query($querystring){
			
			$hey = self::$pdo_instance->query($querystring);
			$main = $hey->fetchAll(PDO::FETCH_ASSOC);
			
			return $main;
			
		}
		
		public static function rowCount($querystring){
				
			$main = self::$pdo_instance->prepare($querystring);
			$main->execute();
			
			return $main->rowCount();
				
		}
		
		public static function execAndCount($querystring){
			
				return self::$pdo_instance->exec($querystring);
			
		}


		private function __clone(){}
		private function __destruct(){
			
			self::$db_connection_var = null;
			
		}
		
	};