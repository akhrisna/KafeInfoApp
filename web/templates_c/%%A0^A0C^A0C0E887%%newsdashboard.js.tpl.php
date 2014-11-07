<?php /* Smarty version 2.6.9, created on 2009-06-20 19:54:18
         compiled from javascript/newsdashboard.js.tpl */ ?>
<?php echo '
	<!-- call the source -->
	<script type="text/javascript" src="js/Sajax.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript"> 
		
		// variables
		var deletedid; 
		
		// function to hover background
		function changebg(type, id) {
			if(type == \'in\') {
				$("#"+id).addClass("background_blue");
			} else {
				$("#"+id).removeClass("background_blue");
			}
		}
		
		
		// function to paging
		function paging(pagenumber)
		{
			if((pagenumber <= ';  echo $this->_tpl_vars['last'];  echo ') && (pagenumber >= 1))
			{
				// calculate the paging
				var topic = \'user\';
				var type = \'all\';
				var uid = \'';  echo $this->_tpl_vars['uid'];  echo '\';
				var page_next = parseInt(pagenumber) + 1;
				var page_previous = parseInt(pagenumber) - 1;
				var link_next = \'<a onclick=paging(\\\'\'+page_next+\'\\\');></a>\';
				var link_previous = \'<a onclick=paging(\\\'\'+page_previous+\'\\\');></a>\';
				
				// update the page number
				document.getElementById(\'news_paging_number\').innerHTML = pagenumber;
				document.getElementById(\'news_paging_previous\').innerHTML = link_previous;
				document.getElementById(\'news_paging_next\').innerHTML = link_next;
				
				// sajax parameters
				sajax_asynchronous = false;
				
				// sajax uri
				sajax_uri = "newsaction.php";
				
				// place the request
				x_getcontent(topic, type, pagenumber, uid, getcontentCallback);
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
			document.getElementById(\'comments_content\').innerHTML = val;
		}
	</script>
'; ?>