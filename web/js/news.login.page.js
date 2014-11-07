	
	// function to voteup
	function voteup(newsid, barid)
	{
		// sajax parameters
		sajax_asynchronous = false;
		
		// sajax uri
		sajax_uri = "newsaction.php";
		
		// place the request
		x_voteup(newsid, barid, voteupCallback);
	}
	
	// function to place the call
	function x_voteup() 
	{
		sajax_do_call("voteup", x_voteup.arguments);
	}
	
	// callback
	function voteupCallback(val)
	{
		disable_link_up(val);
	}
	
	// function to disable link after voting
	function disable_link_up(val)
	{
		// get the callback result
		var newsid = val[0];
		var barid = val[1];
		var newsgalli = val[2];
		
		// assembled the ids
		var linkbar = 'link_'+barid;
		var gallibar = 'news_galli_'+newsid;
		
		// do the actions
		var voted = _voted;
		document.getElementById(linkbar).className = 'news_voted';
		document.getElementById(linkbar).disabled = 'true';
		document.getElementById(barid).href = 'javascript:void(null);';
		document.getElementById(barid).innerHTML = voted;
		document.getElementById(gallibar).innerHTML = newsgalli;
	}
	
	// function to votedown
	function votedown(newsid, barid)
	{
		// sajax parameters
		sajax_asynchronous = false;
		
		// sajax uri
		sajax_uri = "newsaction.php";
		
		// place the request
		x_votedown(newsid, barid, votedownCallback);
	}
	
	// function to place the call
	function x_votedown() 
	{
		sajax_do_call("votedown", x_votedown.arguments);
	}
	
	// callback
	function votedownCallback(val)
	{
		disable_link_down(val);
	}
	
	// function to disable link after voting
	function disable_link_down(val)
	{
		// get the callback result
		var newsid = val[0];
		var barid = val[1];
		var newsgalli = val[2];
		
		// assembled the ids
		var linkbar = 'link_'+barid;
		var gallibar = 'news_galli_'+newsid;
		
		// do the actions
		var buried = _buried;
		document.getElementById(linkbar).className = 'news_voted';
		document.getElementById(linkbar).disabled = 'true';
		document.getElementById(barid).href = 'javascript:void(null);';
		document.getElementById(barid).innerHTML = buried;
		document.getElementById(gallibar).innerHTML = newsgalli;
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