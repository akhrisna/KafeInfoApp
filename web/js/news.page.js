
	// variables
	var deletedid; 
	
	// function to hover background
	function changebg(type, id) {
		if(type == 'in') {
			$("#"+id).addClass("background_green");
		} else {
			$("#"+id).removeClass("background_green");
		}
	}
	
	// function to paging
	function paging(topic, type, pagenumber)
	{
		if((pagenumber <= _last) && (pagenumber >= 1))
		{
			// go to top
			$('html, body').animate({scrollTop:0}, 'slow');
			
			// calculate the paging
			var page_next = parseInt(pagenumber) + 1;
			var page_previous = parseInt(pagenumber) - 1;
			var link_next = '<a onclick=paging(\''+topic+'\',\''+type+'\',\''+page_next+'\');></a>';
			var link_previous = '<a onclick=paging(\''+topic+'\',\''+type+'\',\''+page_previous+'\');></a>';
			
			// update the page number
			document.getElementById('news_paging_number').innerHTML = pagenumber;
			document.getElementById('news_paging_previous').innerHTML = link_previous;
			document.getElementById('news_paging_next').innerHTML = link_next;
			
			// sajax parameters
			sajax_asynchronous = true;
			
			// sajax uri
			sajax_uri = "newsaction.php";
			
			// place the request
			x_getcontent(topic, type, pagenumber, getcontentCallback);
		}
	}
	
	// function to place the call
	function x_getcontent() 
	{
		sajax_do_call("get_content", x_getcontent.arguments);
	}
	
	// callback
	function getcontentCallback(val)
	{	
		// set the news content
		document.getElementById('newscontent').innerHTML = val;
		init_anim();
	}
	
	// function to paging
	function pagingsearch(q, pagenumber)
	{
		if((pagenumber <= _last) && (pagenumber >= 1))
		{
			// go to top
			$('html, body').animate({scrollTop:0}, 'slow');
			
			// calculate the paging
			var page_next = parseInt(pagenumber) + 1;
			var page_previous = parseInt(pagenumber) - 1;
			var link_next = '<a onclick=pagingsearch(\''+q+'\',\''+page_next+'\');></a>';
			var link_previous = '<a onclick=pagingsearch(\''+q+'\',\''+page_previous+'\');></a>';
			
			// update the page number
			document.getElementById('news_paging_number').innerHTML = pagenumber;
			document.getElementById('news_paging_previous').innerHTML = link_previous;
			document.getElementById('news_paging_next').innerHTML = link_next;
			
			// sajax parameters
			sajax_asynchronous = true;
			
			// sajax uri
			sajax_uri = "newsaction.php";
			
			// place the request
			x_getcontentsearch(q, pagenumber, getcontentsearchCallback);
		}
	}
	
	// function to place the call
	function x_getcontentsearch() 
	{
		
		sajax_do_call("get_contentsearch", x_getcontentsearch.arguments);
	}
	
	// callback
	function getcontentsearchCallback(val)
	{
		// set the news content
		document.getElementById('newscontent').innerHTML = val;
		init_anim();
	}