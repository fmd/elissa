jQuery(document).ready(function( $ ) { 

		// Drop Menu
		function mainmenu(){
		$(".nav ul ").css({display: "none"}); // Opera Fix
		$(".nav li").hover(function(){
				$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(200);
				},function(){
				$(this).find('ul:first').css({visibility: "hidden"});
				});
		}
			
		mainmenu();
		
		// Fade Hover Links
		$(".entry-title a").hover(
		function() {
			$(this).animate({"opacity": ".7"}, "fast");
				},
			function() {
				$(this).animate({"opacity": "1"}, "fast");
		});
				
		// Remove Margins
		$(".flickrPhotos > li:nth-child(2n)").addClass('remove-margin');
		$('#sidebar > div').last().addClass('last-sidebar');
		
		// Sticky Sidebar
		$("#sticky").sticky({topSpacing:150,className:'sticky-side'});
		
		$(".lightbox").fancybox({
			'titlePosition'		: 'outside',
			'overlayColor'		: '#ddd',
			'overlayOpacity'	: 0.9,
			'titleShow'			: 'false',
			'speedIn' : '1400', 
			'speedOut' : '1400'
		});
		
		// Fade Icons
		$("img.a").hover(
			function() {
			$(this).stop().animate({"opacity": "0"}, "fast");
			},
			function() {
			$(this).stop().animate({"opacity": "1"}, "fast");
		});
		   
		
		//Fade widgets using custom function 
		$(window).scroll(function () { //Every time the user triggers a scroll event, run the code below
			
			var fadeOutFrom = 130; //Should be between 100 and 150 for the scribe theme
			
			$('.widget').each(function() { //Loop through all the widgets
											
				//Store the distance between the widget and the top of the window
				var offset = $(this).offset();
				var offsetTop = offset.top - $(window).scrollTop();			
						
			    //If the distance between the widget and the top of the window is 
			    //greater than the fadeOutFrom value, set the widget to be visible.
			    
				if (offsetTop > fadeOutFrom){
					$(this).css('opacity', 1);
					
				} else { 
				
					//Otherwise, set the widget's opacity to the distance from the top 
					//of the window as a fraction of the fadeOutFrom value.
				
					var newOpacity = (offsetTop / fadeOutFrom);
					$(this).css('opacity', newOpacity);
				}			    
			});
			
		});
					
});