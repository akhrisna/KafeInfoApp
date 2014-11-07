<?php /* Smarty version 2.6.9, created on 2009-06-20 18:48:40
         compiled from javascript/favouriteslogin.js.tpl */ ?>
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
				$("#"+id).addClass("background_orange");
			} else {
				$("#"+id).removeClass("background_orange");
			}
		}
		
		// function to delete comment
		function delete_favourite(favouriteid)
		{
			// confirm
			if(confirm(\'';  echo $this->_config[0]['vars']['deletefavouriteconfirmation'];  echo '\')) 
			{
				// delete id
				deletedid = favouriteid;
				
				// sajax parameters
				sajax_asynchronous = false;
				
				// sajax uri
				sajax_uri = "favourites.php";
				
				// place the request
				x_delete_favourite(favouriteid, delete_favouriteCallback);
			}
		}
		
		// send the request
		function x_delete_favourite()
		{
			sajax_do_call("delete_favourite", x_delete_favourite.arguments);
		}
		
		// callback
		function delete_favouriteCallback(val)
		{
			// bar id
			var bar_id = \'favourites_\'+deletedid;
			
			// hide
			$("#"+bar_id).fadeOut("slow");
		}
		
		// function to paging
		function paging(pagenumber)
		{
			if((pagenumber <= ';  echo $this->_tpl_vars['last'];  echo ') && (pagenumber >= 1))
			{
				// calculate the paging
				var page_next = parseInt(pagenumber) + 1;
				var page_previous = parseInt(pagenumber) - 1;
				var link_next = \'<a onclick=paging(\\\'\'+page_next+\'\\\');></a>\';
				var link_previous = \'<a onclick=paging(\\\'\'+page_previous+\'\\\');></a>\';
				
				// update the page number
				document.getElementById(\'news_paging_number\').innerHTML = pagenumber;
				document.getElementById(\'news_paging_previous\').innerHTML = link_previous;
				document.getElementById(\'news_paging_next\').innerHTML = link_next;
				
				// get the userid
				var userid = ';  echo $this->_tpl_vars['userinfo']['id'];  echo ';
				
				// sajax parameters
				sajax_asynchronous = false;
				
				// sajax uri
				sajax_uri = "newsaction.php";
				
				// place the request
				x_getcontent(userid, pagenumber, getcontentCallback);
			}
		}
		
		// function to place the call
		function x_getcontent() 
		{
			sajax_do_call("get_userfavourites_ajax", x_getcontent.arguments);
		}
		
		// callback
		function getcontentCallback(val)
		{
			// set the news content
			$("#favourite_content").attr("innerHTML",val);
		}
	</script>
'; ?>