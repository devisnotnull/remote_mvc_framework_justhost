<?php foreach($loop as $user):?>
	
	<div class="row">
		<div class="span3">
		
			<div><h1><?php echo $user['user_name'] ?></h1></div>
							<?php if(file_exists(BASE_ROOT.'/public/img/'.$user['user_name'].'.jpg')){ ?>
				
					<img src="<?php echo BASE_PATH.'/public/img/'.$user['user_name'].'.jpg'?>" style="width:100%" />
				
				<?php }else{ ?>
				
				<img src="<?php echo BASE_PATH.'/public/img/profile.jpg'?>" style="width:100%" />

			<?php } ?>
			
			<div style="padding:10px 0 5px 0;">User Email-Adress</div>
			<div class="pad-email" style="padding:5px 0 5px 0; margin:0; border-bottom:#CCCCCC 1px solid;"><?php echo $user['user_email']?></div>
			
			<div style="padding:10px 0 5px 0;">User Last Active</div>
			<div class="pad-email" style="padding:5px 0 5px 0; margin:0; border-bottom:#CCCCCC 1px solid;"><?php echo $user['user_last_date']?></div>
			
			<div style="padding:10px 0 5px 0;">Users Friends</div>
			<div class="pad-email" style="padding:5px 0 5px 0; margin:0; border-bottom:#CCCCCC 1px solid;">
				<?php $friend_count = 1 ?>
				<?php foreach($loop_friends as $friend):?>
					<?php if($friend_count == 1):?>
						
					<?php endif ?>
					
					<div style="width:32%; float:left"><img src="<?php echo BASE_PATH.'/public/img/'.$friend['friend_name'].'.jpg' ?>" style="width:100%" class="gravatar-img-load" /></div>
	
				<?php endforeach; ?>
				<div style="clear:both"></div>
			</div>
			
			
			
		</div>
		
		<div class="span9">
		
		<h3 style="border-bottom:#CCCCCC 1px solid; padding-bottom:10px;">Post To Your Wall</h3></h1>
		<form action="/user/profile/<?php echo $user['user_name']?>" method="post" name="newpost">
    
    	<div><input name="yourmindtitle" type="text" value="From : " class="span9" /></div>
        <div><textarea name="yourmindcontent" cols="" rows="" class="span9">Message : </textarea></div>
        <div><input name="yourmindsubmit" type="submit" class="btn" /></div>
    
    	</form>
		
		<div id="user_posts_wall">
		<?php foreach($loop_the_wall as $post): ?>
		<div class="alert alert-success">
			<div style="float:left; width:50px; padding:0 15px 15px 0;"><img src="<?php echo BASE_PATH.'/public/img/profile.jpg' ?>" class="gravatar-img-load"  /></div>
			<div><a><?php echo $post['user_from']?></a><?php echo $post['post_title']?></div>
			<div><?php echo $post['post_message']?></div>
			<div style="clear:both"></div>
		</div>
		<?php endforeach;?>
		</div>
		
		
		<h3 style="border-bottom:#CCCCCC 1px solid; padding-bottom:10px;">Your Blog Entries</h3>
		
			<?php if(sizeof($loop_profile) == 0) echo '<h1>NO ENTRIES</h1>' ?>
			<?php foreach($loop_profile as $userloop):?>
			<div class="row" style="margin-bottom:30px; padding-bottom:10px;">
			<div class="span2"><img src="<?php echo BASE_PATH.'/public/img/profile.jpg' ?>" class="gravatar-img-load"  /></div>
			<div class="span7"><div class="alert alert-info">
				<div><h4><?php echo $userloop['name'] ?></h4></div>
				<div><?php echo $userloop['message'] ?></div>
				<div>Created on - <?php echo $userloop['date'] ?></div>
				</br>
				</div>
			</div>
			</div>
			<?php endforeach; ?>
			
			
			<?php if(sizeof($loop_messages > 0)):?>
			<h3 style="border-bottom:#CCCCCC 1px solid; padding-bottom:10px;">Your Messages</h3>
			<?php foreach($loop_messages as $messageloop):?>
			<div class="row" style="margin-bottom:30px; padding-bottom:10px;">
				<div class="span1"><img src="<?php echo BASE_PATH.'/public/img/profile.jpg' ?>" class="gravatar-img-load"  /></div>
				<div class="span1"><img src="<?php echo BASE_PATH.'/public/img/profile.jpg' ?>" class="gravatar-img-load"  /></div>
				<div class="span7">
					<div>From : <?php echo $messageloop['user_from'] ?> </div>
					<div><b><?php echo $messageloop['message_title'] ?> </b></div>
					<div>From : <?php echo $messageloop['message'] ?> </div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
			
			
		</div>
	</div>
	
<?php endforeach; ?>

<script>

$(document).ready( function(){

	$('.gravatar-img-load').each(function(){

		var gravtar = $(this).attr('alt');
		var getvar = '/public/img/' + gravatar + '.jpg';


		
		if(gravtar == null){}
		else{
			$.ajax({
				url: 'http://en.gravatar.com/stump201.json',
				type: 'GET',
				success: function(data, textStatus, jqXHR) {
					$(viewItem).html('<pre>'+data+'</pre>')
					console.log(data);
				},
				error : function(result){
					
				}
			})
	 
		$(this).attr('src','getvar');
			
		}	
	});
	
})

</script>