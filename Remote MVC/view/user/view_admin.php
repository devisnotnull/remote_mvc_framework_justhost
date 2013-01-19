<?php foreach($loop as $user):?>

	<div class="row">
		<div class="span3">
		
			<div><h1><?php echo $user['user_name'] ?></h1></div>
			
			<?php if($user['user_gravatar'] == null): ?>
				<img src="<?php echo BASE_PATH.'/public/img/profile.jpg'?>" />
			<?php endif; ?>
			
			<?php if($user['user_gravatar']): ?>
				<img src="<?php echo $user['user_gravatar'] ?>?s=300" />
			<?php endif; ?>
			
			<div></div>
			<div  class="pad-email"><?php echo $user['user_email']?></div>			
		</div>
		
		<div class="span9"><h1>This Is Your Profile !</h1></div>
	</div>
	
<?php endforeach; ?>