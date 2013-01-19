<?php $rowcount = 1 ?>
<?php foreach($loop as $user):?>

	<?php if($rowcount == 1):?>
	
		<div class="row">
		
	<?php endif; ?>
	
		<div class="span2" style="overflow:hidden">
		
			<div><h3><a href="/user/profile/<?php echo $user['user_name'] ?>"><?php echo $user['user_name'] ?></a></h1></div>
			
				<?php if(file_exists(BASE_ROOT.'/public/img/'.$user['user_name'].'.jpg')){ ?>
				
					<img src="<?php echo BASE_PATH.'/public/img/'.$user['user_name'].'.jpg'?>" style="width:100%" />
				
				<?php }else{ ?>
				
				<img src="<?php echo BASE_PATH.'/public/img/profile.jpg'?>" style="width:100%" />

			<?php } ?>
			<div></div>
			<?php  if($user['user_name'] == session::session_username() ){?>
					<b>THIS IS YOU !</b>
			<?php }else{?>	
				<div><input type="button" value="Send Friend Request" class="btn btn-primary span2"/></div>
			<?php } ?>
		</div>
		

	
<?php if($rowcount == 6){
	echo '</div>';
	$rowcount = 1 ;}
else{$rowcount ++;}

?>

<?php endforeach; ?>

<script>
$(document).ready( function(){

	$('.gravatar-img-load').each(function(){

		var gravtar = $(this).attr('alt');
		var getvar = '/public/img/' + gravtar + '.jpg';


		
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
	 
		$(this).attr('src',getvar);
			
		}	
	});
	
})

</script>