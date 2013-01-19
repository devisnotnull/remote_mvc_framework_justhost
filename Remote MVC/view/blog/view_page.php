<?php 

foreach($loop as $blog_item): ?>
	
	<div class="row" style="margin-bottom:30px;">
		
		<div class="span2"><img src="<?php echo BASE_PATH.'/public/img/profile.jpg' ?>" class="gravatar-img-load" alt="stump200"/></div>
		<div class="span10">
			<div><h1><?php echo $blog_item['name'] ?></h1></div>
			<div><?php echo $blog_item['message'] ?></div>
			<div>Date Published - <?php echo $blog_item['date'] ?></div>
			<div><a href="/user/profile/<?php echo $blog_item['user'] ?>">Published By - <?php echo $blog_item['user'] ?></a></div>
		</div>
	</div>
<?php  endforeach; ?>

<script>
$(document).ready( function(){

	$('.gravatar-img-load').each(function(){

		var gravtar = $(this).attr('alt');
		
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
	 
		$(this).attr('src','http://www.gravatar.com/avatar/1409805ce5984ab2d6f8896444ee1464.png?s=300');
			
		}	
	});
	
})
</script>