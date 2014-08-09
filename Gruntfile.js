var rootPath = "wp-content/themes/theme",
	assetPath = rootPath + "/_assets";


module.exports = function(grunt) {
	grunt.initConfig({
		less: {
			development: {
				options: {
					compress: true,
					yuicompress: true,
					optimization: 10,
				},
				files: {
					// target.css file: source.less file
					rootPath + "/style.css": assetPath + "/css/main.less"
				}
			}
		},
		uglify: {
			my_target: {
				options: {
					sourceMap: true,
					beautify: true
				},
			    files: {
			    	// JS that fires just before the closing </body> tag goes in global
					"wp-content/themes/theme/_assets/js/output/global.min.js": [
						//assetPath + "/js/lib/underscore.js",
						//assetPath + "/js/lib/backbone.js",
						//assetPath + "/js/lib/fast-active.js",
						//assetPath + "/js/lib/fastclick.js",
						//assetPath + "/js/lib/jquery.transit.js",
						//assetPath + "/js/lib/fitvids.js",
						assetPath + "/js/main.js",
						
					],
					// JS that fires in wp_head goes in preload
					"wp-content/themes/theme/_assets/js/output/preload.min.js": [
		                assetPath + "/js/lib/modernizr.js",
		                //assetPath + "/js/lib/picturefill.js"
					]
		    	}
			}
		},
	    stripmq: {
	    	desktop: {
		        options: {
		            width: 1080,
		            type: 'screen'
		        },
	            files: {
	                'wp-content/themes/theme/style-desktop.css': ['wp-content/themes/theme/style.css']
	            }
	    	},
	    },
		watch: {
			styles: {
		    	files: [assetPath + "/css/**/*.less"], // which files to watch
		    	tasks: ["less", "stripmq"],
		    	options: {
		    		spawn: false
		    	}
		  	},
		  	scripts: {
		    	files: [assetPath + "/js/**/*.js"], // which files to watch
		    	tasks: ["uglify"],
		    	options: {
		      		spawn: false
		    	}
		  	}
		}
	});

	grunt.loadNpmTasks("grunt-contrib-less");
	grunt.loadNpmTasks("grunt-contrib-watch");
	grunt.loadNpmTasks("grunt-contrib-uglify");
	grunt.loadNpmTasks('grunt-stripmq');

	grunt.registerTask("default", ["watch"]);
};