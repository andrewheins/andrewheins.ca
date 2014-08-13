/*
 * Scripts in this file run before the </body> tag
 */

 

/* ==========================================================================
   Namespaces
   ========================================================================== */

var Site = Site || {};
	Site.Views = {};
	Site.Collections = {};
	Site.Models = {};



/* ==========================================================================
   Backbone Init
   ========================================================================== */
   
Site.Models.ViewState = Backbone.Model.extend();



/*
 * Extend backbone to provide _super function to more easily handle cases where 
 * we are extending our views
 */
 
Backbone.View.prototype._super = function(funcName) {
    return this.constructor.__super__[funcName].apply(this, _.rest(arguments));
}
	
	
/* ==========================================================================
   Utilities
   Site-wide utility functions
   ========================================================================== */

Site.utilities = {

	capitalizeFirstLetter: function(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	},
	
    underscoreToCamelCase: function(string) {
        return string.replace(/_([a-z])/g, function (g) { return g[1].toUpperCase(); });
    },
    
    underscoreToMethodName: function(string) {
        return Site.utilities.capitalizeFirstLetter(Site.utilities.underscoreToCamelCase(string));
    },
    
    isIE8: function() {
        return $("html").hasClass("ie8");
    },
    
    isIE9: function() {
        return $("html").hasClass("ie9");
    },
    
    probablyMobile: function() {
        return $(window).width() <= 640 && Modernizr.touch;
    },
    
    lockScrolling: function() {
        $("body").css("overflow", "hidden").on("touchmove.lockedscrolling", function(e){ e.preventDefault(); });
    },
    
    unlockScrolling: function() {
        $("body").css("overflow", "auto").off(".lockedscrolling");
    },
    
    forceRepaint: function() {
        $("body").addClass("force-repaint").removeClass("force-repaint");
    },
    
    forceTwoDigits: function(n) {
        return n > 9 ? "" + n: "0" + n;
    },
    
    utcDateString: function(date) {
        return Site.utilities.forceTwoDigits(date.getUTCDate()) + "/" + Site.utilities.forceTwoDigits((date.getUTCMonth() + 1)) + "/" + date.getUTCFullYear();
    }
    
}



/* ==========================================================================
   Site Scripts
   ========================================================================== */

$(function() {

    /*
     * GENERAL Scripts
     * We automatically load scripts and run them for standard ui elements that 
     * the user is likely to see during their visit. 
     * These are the bundled scripts that come with every pageload.
     */

	/*
	$(".class").each(function() {
		
		var $this = $(this);
		
		Modernizr.load({
			load: "/wp-content/themes/your_theme_slug/_assets/js/output/file.min.js",
			complete: function() {
				var obj = new Site.Views.Thing({
					"el" : $this
				});
			}
		});
		
	});
	*/



    /*
     * CONDITIONAL Scripts
     * These are objects where we only want to load their scripts if they are going 
     * to be present on the page, either becuase they are rare or becuase their 
     * scripts are heavy.
     */
        


    /*
     * UTILITES
     * Plugin and lib calls
     */    

    // $(".article").fitVids();

});