
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
					<div>Date Recieved : <?php echo $messageloop['message_date'] ?> </div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
	


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