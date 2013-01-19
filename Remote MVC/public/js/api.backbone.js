/*

	ALEX LEE BROWN
	ALBRONWDESIGn API BACKBONE.JS APPLICATION
	05/11/2012

*/


(function ($) {
  
	// MODEL FOR TWEETS & ATTRS
	apimodel = Backbone.Model.extend({
		
		defaults:	function(){
			
		},
		
		initialize: function() {
		
			alert("MODEL INIT");
		
		}
		
	});
	// INIT & CONTAIN TWEET COLLECTIONS MODELS
	apicollection = Backbone.Collection.extend({
		
		initialize: function() {
			
			alert("COLLECTION INIT");
		
		}
		
	});
  
  // APP VIEW 
  apiview = Backbone.View.extend({
	// PAIR WITH DOM OBJ BODY  
	el:  $('body')  ,
	//  INIT 
    initialize: function () {

		alert("VIEW INIT");

    },
	
	// EVENT STORE FOR BUTTONS
    events: {
		
		"submit #albrowndesign-api-form-get":  "apiget",
			
		"submit #albrowndesign-api-form-post":  "apipost",
		
		"submit #albrowndesign-api-form-put":  "apiput",
		
		"submit #albrowndesign-api-form-delete":  "apidelete"
	  
    },
	
	ajax : $.ajax({
		url: '/api/users.json',
		type: 'DELETE',
		success: function(result) {
			
						  $.each(result, function(key,tweet){
								  
								var tweet_img, tweet_from, tweet_text, tweet_date;
								alert(tweet_img);
								tweet_img = tweet.profile_image_url;
								tweet_from = tweet.from_user;
								if(!tweet.to_user){tweet_to = ''; }
								else{tweet_to = "@" + tweet.to_user; }
								tweet_text = tweet.text;
								tweet_date = tweet.created_at;
								  
								var tweetHTML = $("<li><div class='img'><img src='" + tweet_img + "' /></div>"
													 + "<div class='title'>" + tweet.from_user + "<span>" + tweet_to + "</span>" + "</div>"
													 + "<div class='content'>" + tweet.text + "</div>"
													 + "<div class='date'>" + tweet_date + "</div>" +
													 "</li>");
												 
								$('#tweets').append(tweetHTML);
			
							  });
							  
								}
	}),
	// IE BUG STOP FORM SUBMIT TO BACKUP PAGE
	apiget: function(e){ 
		if ($.browser.msie) e.returnValue = false;
		// BROWSER MODE SELECT
		if(e.preventDefault(e)) e.preventDefault(e);
		
		this.ajax()
		

	},
	apipost: function(e){ 
		
		if ($.browser.msie) e.returnValue = false;
		// BROWSER MODE SELECT
		if(e.preventDefault(e)) e.preventDefault(e);

	},
	apiput: function(e){ 
		
		if ($.browser.msie) e.returnValue = false;
		// BROWSER MODE SELECT
		if(e.preventDefault(e)) e.preventDefault(e);

	},
	apidelete: function(e){ 
		
		if ($.browser.msie) e.returnValue = false;
		// BROWSER MODE SELECT
		if(e.preventDefault(e)) e.preventDefault(e);

	},
	
	
  });
  
  //DECLARE NEW APPVIEW
  var apiview = new apiview();

  
})(jQuery);