<?php
	
	class model_user extends model
	{
		
		public function __construct(){
			
			parent::__construct();
			
			return new model;
			
		}
		
		public function check_username($username){
		
			
			if(!$username) return false;
			
			$query_collect = $this->db_con->rowCount("SELECT * FROM users WHERE user_name = '$username'");
			
			if($query_collect == 1)	return true;
			else return false; 	
			
		}
		
		public function login($vars = array()){
			

			if(!$this->check_username($vars['user_name'])) return false;
			
			print_r($vars);
			
			if (!isset($vars['user_name'])) return false;
			if (!isset($vars['user_password'])) return false;
			
			$user_name = $vars['user_name'];
			
			$pass_word = $vars['user_password'];
			
			$query = "SELECT * FROM users WHERE user_name = '$user_name' AND user_hash = '$pass_word'";
			
			if($this->db_con->rowCount($query) != 1) return false;
			
			$session_id = session_id();
			
			echo $session_id;
			
			$remote_addr = $_SERVER['REMOTE_ADDR'];
			
			$login_date = date("Y-m-d H:i:s");
			
			$query = "UPDATE users SET user_last_session = '$session_id', 
										user_last_ip = '$remote_addr', 
										user_last_date = '$login_date' 
										WHERE user_name = '$user_name';";
			
			$query_collect = $this->db_con->execAndCount($query);
						
			if($query_collect != 1) return false;
			
			return true;
			
		}
		
		public function register(){
		
		}
		
		public function single_user(){
		
			$this->db_con->query("SELECT user_name, user_email, user_gravatar, user_last_date FROM users WHERE user_name = '$username'");
			
		}
		
		public function list_users($username = null){
			
			if($username == null){
				
				return $query_collect = $this->db_con->query('SELECT user_name, user_last_date , user_email, user_gravatar FROM users');
				
			}
			else{
				
				return $query_collect = $this->db_con->query("SELECT user_name, user_last_date , user_email, user_gravatar FROM users WHERE user_name = '$username'");
				
			}
			
			
		}
		
		public function get_user_friends($username){
			
			return $query_collect = $this->db_con->query("SELECT * FROM users_friends WHERE user_name = '$username'");
			
		}
		
		public function get_user_requests($username){
			
			return $query_collect = $this->db_con->query("SELECT * FROM users_friends WHERE friend_name = '$username' ORDER BY known_since ASC LIMIT 0,5");
			
		}
		
		public function get_user_messages($username){
			
			return $query_collect = $this->db_con->query("SELECT * FROM messages WHERE user_to = '$username' ORDER BY message_date ASC LIMIT 0,5");
			
		}
		
		public function get_user_sent_messages($username){
				
			return $query_collect = $this->db_con->query("SELECT * FROM messages WHERE user_from = '$username' ORDER BY message_date DESC LIMIT 0,5");
				
		}
		
		public function get_user_posts($username){
			
			return $query_collect = $this->db_con->query("SELECT * FROM posts WHERE user_from = '$username' OR user_to = '$username'  ORDER BY post_date DESC LIMIT 0,10");
			
		}
		
		public function get_user_blog($username){
			
			return $query_collect = $this->db_con->query("SELECT * FROM sticky WHERE user = '$username'");
			
		}
		
		public function get_user_unread_messages($username){
				
			return $query_collect = $this->db_con->query("SELECT * FROM messages WHERE user_to = '$username' AND message_read = '0' ORDER BY message_date ASC LIMIT 0,5");
			
		}
		

		public function send_user_message($userfrom,$userto,$messagetitle,$message){
			
			$query_collect = $this->db_con->rowCount("INSERT INTO messages ( user_from, user_to, message_title, message) 
												VALUES ('$userfrom', '$userto', '$messagetitle', '$message');");
			
		}
		
		public function post_user_wall($userfrom,$userto = null,$messagetitle,$message){
			
			$query_collect = $this->db_con->query("INSERT INTO posts ( user_from, user_to, post_title, post_message)
					VALUES ('$userfrom', '$userto', '$messagetitle', '$message');");
			
		}
		
		public function get_num_unread_messages($username){
			
		}
	
	}
	
	
?>