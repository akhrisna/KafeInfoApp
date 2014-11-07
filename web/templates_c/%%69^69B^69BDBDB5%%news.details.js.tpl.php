<?php /* Smarty version 2.6.9, created on 2009-06-20 19:28:26
         compiled from javascript/news.details.js.tpl */ ?>
<?php echo '

	<!-- call the source -->
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/Sajax.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript"> 
		
		// function to voteup
		function reload_comments()
		{
			// replace the current loading with the new value from the callback
			$("#news_comments_content").attr("innerHTML", "<div class=\'comments_empty\'><img src=\'images/ic_loading3.gif\' alt=\'loading\'/></div>");
			
			// set timeout before fetching the data
			setTimeout(\'rebuild_comments()\',1000);
		}
		
		function rebuild_comments()
		{	
			// sajax parameters
			sajax_asynchronous = false;
			
			// sajax uri
			sajax_uri = "details.php";
			
			// get the variables
			var newsid = ';  echo $this->_tpl_vars['newsdetails']['id'];  echo ';
			
			// place the request
			x_rebuild_comments(newsid, rebuild_commentsCallback);
		}
		
		// send the request
		function x_rebuild_comments()
		{
			sajax_do_call("fetch_comments", x_rebuild_comments.arguments);
		}
		
		// the fetch comment callback
		function rebuild_commentsCallback(val)
		{
			// replace the current loading with the new value from the callback
			$("#news_comments_content").attr("innerHTML", val);
		}
	</script>
'; ?>