				<div class="row">
				
				<div class="hero-unit">
				  <h1>Lets Be Social !</h1>
				  <p>Here Are Your Friends</p>
				  <p>
				    <a class="btn btn-primary btn-large">
				      Find More Friends ..
				    </a>
				  </p>
				</div>
								
				<?php $friend_count = 1 ?>
				<?php foreach($loop_friends as $friend):?>
					<?php if($friend_count == 1):?>
						
					<?php endif ?>
					
					<div class="span2"><img src="<?php echo BASE_PATH.'/public/img/'.$friend['friend_name'].'.jpg' ?>" style="width:100%" class="gravatar-img-load" />
					<div><?php echo $friend['friend_name'] ?></div></div>
	
				<?php endforeach; ?>
				
				</div>