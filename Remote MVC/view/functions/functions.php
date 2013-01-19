<?php 

$def_template_vars = array(

	'page_title' 	=>	'Alex Brown PHP MVC Framework',
	'content'		=>	'PHP MVC Framework Tutorial'
	
	);
	
function default_var($varget){
	global $def_template_vars;
	return $def_template_vars[$varget];
}

function default_var_set($varset,$val){
	global $def_template_vars;
	$def_template_vars[$varset] === $val;
}

function get_pub_loc($pub_req){
	global $default_location_public;
	return $default_location_public[$pub_req];
}
function get_pri_loc($pri_req){
	global $default_location_private;
	return $default_location_private[$pri_req];
}

function get_header(){
	include_once(get_pri_loc('TEMPLATE').'header.php');	
}

function get_footer(){
	include_once(get_pri_loc('TEMPLATE').'footer.php');	
}

function get_title(){
	global $def_template_vars;
	
	echo $def_template_vars['page_title'];
}

function get_content(){
	global $def_template_vars;
	echo "CONTENT";
	echo $def_template_vars['content'];
}

function get_style_sheets(){
	echo '<link href="'.get_pub_loc('CSS').DS.'bootstrap.css" rel="stylesheet">';
	echo '<link href="'.get_pub_loc('CSS').DS.'style.css" rel="stylesheet">';
    echo '<link href="'.get_pub_loc('CSS').DS.'bootstrap-responsive.css" rel="stylesheet">';
}

function get_js(){
	
	echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>';
	echo '<script src="'.get_pub_loc('JS').DS.'jquery.js"></script>';
	echo '<script src="'.get_pub_loc('JS').DS.'bootstrap.min.js"></script>';

}

function admin_panel(){
	if(session::get_level() != null && session::get_user_name() != null){
		echo '<div class="navbar-inner" style="min-height:0; background:#CCCCCC; padding:5px 0;"><div class="container">';
			echo '<div style="float:left">Welcome Back - '.session::get_user_name().'</div>';
			echo '<div style="float:right">View Your Profile - <a href="'.BASE_PATH.'/user/profile/'.session::get_user_name().'">'.session::get_user_name().'</a>  - <a href="'.BASE_PATH.'/user/logout"> Logout</a></div>';
			echo '<div style="clear:both;"></div>';
		echo '</div></div>';
	}
}

function get_main_nav(){
	
	echo '<ul class="nav">';
	
	if(session::get_level() == 1){
		
		echo '<li><a href="/user">Profile</a></li>';
             print'
             <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Messages <b>[<span id="num_messages_unread"></span>]</b> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="message-nav-toggle">
						
     						
                        </ul>
                        
                      </li>
                      
             <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Requests <b>[<span id="num_requests_unread"></span>]</b> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="requests-nav-toggle">

     						
                        </ul>
                      </li>
                      
            	<li><a href="/user/friends">Friends</a></li>

            	<li><a href="/contact">Report An Error</a></li>
            	
            	';
		
	}
	if(session::get_level() == 2){
		
		echo '<li><a>STANDARD USER</a></li>';
		
	}
	if(session::get_level() == 3){
		
		echo '<li><a href="/user">Login</a></li>';
		echo '<li><a href="/user/register">Create Account</a></li>';
		echo '<li><a href="/contact">Contact Us</a></li>';
		
	}

	echo '</ul>';
	
}


function user_post_mod(){}

function user_message_mod(){}

