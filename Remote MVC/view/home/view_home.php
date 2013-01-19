<h1>Home Page</h1>
<div class="row">
<form action="/api/user" method="get" id="albrowndesign-api-form-get" class="span12">
	<input name="get_request_api" type="text" class="span9" />
	<input name="get_request_api" type="submit" class="btn btn-primary" value="GET REQUEST" />
</form>
</div>
<div class="row">
<form action="/api/user" method="post" id="albrowndesign-api-form-post" class="span12">
	<input name="post_request_api" type="text"  class="span9"/>
	<input name="post_request_api" type="submit" class="btn btn-primary" value="POST REQUEST"  />
</form>
</div>
<div class="row">
<form action="/api/user" method="put" id="albrowndesign-api-form-put" class="span12">
	<input name="put_request_api" type="text"  class="span9"/>
	<input name="" type="submit" class="btn btn-primary" value="PUT REQUEST" />
</form>
</div>
<div class="row">
<form action="/api/user" method="delete" id="albrowndesign-api-form-delete" class="span12">
	<input name="delete_request_api" type="text" class="span9"  />
	<input name="GET REQUEST" type="submit" class="btn btn-primary" value="GET REQUEST" />
</form>
</div>
<div class="apiguide"  style="clear:both;"></div>

<script>

var req = {
	
	events	:	function(apiguide){
			
		var $this = this; 
		
		$('form').submit( function(e){e.preventDefault()})
		
		$('#albrowndesign-api-form-get').submit(function(){ $this.getRequest(apiguide) })
		$('#albrowndesign-api-form-post').submit(function(){ $this.postRequest(apiguide) })
		$('#albrowndesign-api-form-put').submit(function(){ $this.putRequest(apiguide) })
		$('#albrowndesign-api-form-delete').submit(function(){ $this.deleteRequest(apiguide) })
		
			
	},
	
	getRequest : function(viewItem){ 
		$.ajax({
			url: '/api/user',
			type: 'GET',
			success: function(data, textStatus, jqXHR) {
				$(viewItem).html('<pre>'+data+'</pre>')
				console.log(data)
			},
			error : function(result){
				alert('error')
			}
		})
	 },
	postRequest : function(viewItem){ 
		$.ajax({
			url: '/api/user',
			type: 'POST',
			success: function(data, textStatus, jqXHR) {
				$(viewItem).html(data)
				console.log(data)
			},
			error : function(result){
				alert('error')
			}
		})
	},
	deleteRequest : function(viewItem){ 
		$.ajax({
			url: '/api/user',
			type: 'DELETE',
			success: function(data, textStatus, jqXHR) {
				$(viewItem).html(data)
				console.log(data)
			},
			error : function(result){
				alert('error')
			}
		})
	 },
	putRequest : function(viewItem){ 
			$.ajax({
			url: '/api/user',
			type: 'PUT',
			success: function(data, textStatus, jqXHR) {
				$(viewItem).html(data)
				console.log(data)
			},
			error : function(result){
				alert('error')
			}
		})
	 }

}

req.events('.apiguide')


</script>