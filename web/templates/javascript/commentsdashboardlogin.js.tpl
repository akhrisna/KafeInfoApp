{literal}
	
	<!-- call the source -->
	<script type="text/javascript" src="js/Sajax.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript"> 
	
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
		
		// function to delete comment
		function delete_comment(commentid)
		{
			// confirm
			if(confirm('{/literal}{#deletecommentconfirmation#}{literal}')) 
			{
				// delete id
				deletedid = commentid;
				
				// sajax parameters
				sajax_asynchronous = false;
				
				// sajax uri
				sajax_uri = "comments.php";
				
				// place the request
				x_delete_comment(commentid, delete_commentCallback);
			}
		}
		
		// send the request
		function x_delete_comment()
		{
			sajax_do_call("delete_comment", x_delete_comment.arguments);
		}
		
		// callback
		function delete_commentCallback(val)
		{
			// bar id
			var bar_id = 'comment_'+deletedid;
			
			// hide
			$("#"+bar_id).fadeOut("slow");
		}
		
		// function to paging
		function paging(pagenumber)
		{
			if((pagenumber <= {/literal}{$last}{literal}) && (pagenumber >= 1))
			{
				// calculate the paging
				var page_next = parseInt(pagenumber) + 1;
				var page_previous = parseInt(pagenumber) - 1;
				var link_next = '<a onclick=paging(\''+page_next+'\');></a>';
				var link_previous = '<a onclick=paging(\''+page_previous+'\');></a>';
				
				// update the page number
				document.getElementById('news_paging_number').innerHTML = pagenumber;
				document.getElementById('news_paging_previous').innerHTML = link_previous;
				document.getElementById('news_paging_next').innerHTML = link_next;
				
				// get the userid
				var userid = {/literal}{$userinfo.id}{literal};
				
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
			sajax_do_call("get_usercomments_ajax", x_getcontent.arguments);
		}
		
		// callback
		function getcontentCallback(val)
		{
			// set the news content
			$("#comments_content").attr("innerHTML",val);
		}
	</script>
{/literal}