$(function(){
    
    'use strict';
    /* Adding Sticky Navigation */
	$(".union-info").waypoint(function(direction) {
		if(direction=="down") {
			$("nav").addClass('sticky-nav');
		}
		else {
			$("nav").removeClass('sticky-nav');
		}
	}); 
    /* Animation on Scroll */
    $(".union-info").waypoint(function(direction) {
        $(".union-info").addClass('animate__animated animate__fadeIn');
    }, {
        offset:'50%'
    }); 

    $(".js--services-section").waypoint(function(direction) {
        $(".js--service-box").addClass('animate__animated animate__zoomIn');
    }, {
        offset:'50%'
    }); 

});

