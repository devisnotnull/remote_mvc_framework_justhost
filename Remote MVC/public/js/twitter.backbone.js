/*

	ALEX LEE BROWN
	JOB APPLICATION
	TWITTER BACKBONE.JS APPLICATION
	05/11/2012

*/

// WRAPPED IN JQUERY GOODNESS
(function ($) {
  
	// MODEL FOR TWEETS & ATTRS
	apimodel = Backbone.Model.extend({
		query: null,
		count: 20,
	});
	// INIT & CONTAIN TWEET COLLECTIONS MODELS
	apicollection = Backbone.Collection.extend({
		initialize: function (models, options) {
		  this.bind("add", options.view.addTweets);
		}
	});
  
  // APP VIEW 
  AppView = Backbone.View.extend({
	// PAIR WITH DOM OBJ BODY  
	el:  $('body')  ,
	//  INIT 
    initialize: function () {
		
    	this.apicollection = new apicollection( null, { view: this });

    },
	
	// EVENT STORE FOR BUTTONS
    events: {
		
		"submit #albrowndesign-api-form-get":  "apiget",
			
		"submit #albrowndesign-api-form-post":  "apipost",
		
		"submit #albrowndesign-api-form-put":  "apiput",
		
		"submit #albrowndesign-api-form-delete":  "apidelete"
	  
    },
	
	// IE BUG STOP FORM SUBMIT TO BACKUP PAGE
	apiget: function(e){ 
		
		if ($.browser.msie) e.returnValue = false;
		// BROWSER MODE SELECT
		if(e.preventDefault(e)) e.preventDefault(e);

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
  var appview = new AppView();
  
})(jQuery);