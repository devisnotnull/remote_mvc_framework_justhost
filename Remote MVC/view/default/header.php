<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<!--<script language="javascript" src="https://raw.github.com/documentcloud/backbone/master/backbone.js"></script>-->
    <script language="javascript" src="https://raw.github.com/documentcloud/underscore/master/underscore-min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    
	<?php get_style_sheets(); ?>
	<?php get_js(); ?>
    <style>
    
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="public/favicon/ico/favicon.ico">

  </head>

  <body>

  	<?php admin_panel() ?>
	<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Custom PHP MVC Framework</a>
          <div class="nav-collapse collapse pull-right">
			<?php get_main_nav() ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <script>
$(document).ready( function(){
			$('#num_messages_unread').html('<img src="/public/img/loading.gif />"');

			$.ajax({
				url: 'http://www.mvc.albrowndesign.com/api/message?username=stump200&type=all',
				type: 'GET',
				success: function(data, textStatus, jqXHR) {
					$('#num_messages_unread').html(data.length);
					$.each(data,function(key,value){
						
						
						$('#message-nav-toggle').append('<li><a>'+this.message_title+'</a></li>');
						
						});
				},
				error : function(result){
					
				}
			})

				$.ajax({
				url: 'http://www.mvc.albrowndesign.com/api/wall?username=stump200',
				type: 'GET',
				success: function(data, textStatus, jqXHR) {
					$('#num_messages_unread').html(data.length);
					$.each(data,function(key,value){
						
						
						$('#user_posts_wall').append('<div>POSAt</div>');
						
						});
				},
				error : function(result){
					
				}
			})

				$.ajax({
				url: 'http://www.mvc.albrowndesign.com/api/requests?username=stump200',
				type: 'GET',
				success: function(data, textStatus, jqXHR) {
					$('#num_requests_unread').html(data.length);
					$.each(data,function(key,value){
						
						
						$('#requests-nav-toggle').append('<div>POSAt</div>');
						
						});
				},
				error : function(result){
					
				}
			})
			
	
	
})

</script>
    
    
    <div class="container" style="margin-top:20px;">


