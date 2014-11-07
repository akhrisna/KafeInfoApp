	
	// function to check empty
	function is_empty(field) {
		if((field == undefined) || (field == "")) {
			return true;
		} else {
			return false;
		}
	}
	
	// on page ready
	$(document).ready(function() {
		$('#link1 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link1').addClass('chosen'); });
		$('#link2 a').click(function(){ $('.normallink').removeClass('chosen');$('#link2').addClass('chosen'); });
		$('#link3 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link3').addClass('chosen'); });
		$('#link4 a').click(function(){  $('.normallink').removeClass('chosen'); $('#link4').addClass('chosen'); });
		$('#link5 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link5').addClass('chosen'); });
		$('#link6 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link6').addClass('chosen'); });
		$('#link7 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link7').addClass('chosen'); });
		$('#link8 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link8').addClass('chosen'); });
		$('#link9 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link9').addClass('chosen'); });
		$('#link10 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link10').addClass('chosen'); });
		$('#link11 a').click(function(){ $('.normallink').removeClass('chosen'); $('#link11').addClass('chosen'); });
		
		$('#filter1 a').click(function(){ $('.normalfilter').removeClass('filter_left_chosen'); $('#filter1').addClass('filter_left_chosen'); });
		$('#filter2 a').click(function(){ $('.normalfilter').removeClass('filter_left_chosen'); $('#filter2').addClass('filter_left_chosen'); });
		$('#filter3 a').click(function(){ $('.normalfilter').removeClass('filter_left_chosen'); $('#filter3').addClass('filter_left_chosen'); });
		$('#filter4 a').click(function(){ $('.normalfilter').removeClass('filter_left_chosen'); $('#filter4').addClass('filter_left_chosen');  });
		
		init_anim();
	});
	
	// initialize animation
	function init_anim() {
		$('.news').hover(function(){ $('.news_listdescription',this).animate({ opacity:1 },200); },function(){ $('.news_listdescription',this).animate({ opacity:0.7 },200); });
		$('.newsthumb').hover(function(){ $('.news_listdescription',this).animate({ opacity:1 },200); },function(){ $('.news_listdescription',this).animate({ opacity:0.7 },200); });
	}
	
	function highlightthis(barid) {
		$('.static1').removeClass('gradient_link_chosen'); 
		$('#'+barid).addClass('gradient_link_chosen');
	}

