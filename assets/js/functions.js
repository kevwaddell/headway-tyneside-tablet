(function($){
		
		var event_type = 'touchstart';
				
		$(document).ready(function(){	
			
			// Top Navigation functions
			// Disable link action on top level links with children
			
			$('body').on(event_type,'#main-nav-btn', function(){
				
				$(this).toggleClass('active');
				$('.content-area').toggleClass('nav-open nav-closed');
				$('.top-nav').toggleClass('nav-open nav-closed');		
				return false;
			
			});
			
			$('body').on(event_type, '.menu-item-has-children > a', function(){
				$(this).next().toggleClass('menu-open');
				
				return false;
			});
			
		});
	
		$(window).bind('load',function(){
						
		});
		
		
})(window.jQuery);