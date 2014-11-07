{literal}
	
	<!-- call the source -->
	<script type="text/javascript" src="js/Sajax.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript"> 
		
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
			var voted = {/literal}'{#voted#}'{literal};
			$("#"+linkbar).addClass("details_voted");
			$("#"+linkbar).attr("disabled", 'true');
			$("#"+barid).attr("href", 'javascript:void(null);');
			$("#"+barid).attr("innerHTML", voted);
			$("#"+gallibar).attr("innerHTML", newsgalli);
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
			var buried = {/literal}'{#buried#}'{literal};
			$("#"+linkbar).addClass("details_voted");
			$("#"+linkbar).attr("disabled", 'true');
			$("#"+barid).attr("href", 'javascript:void(null);');
			$("#"+barid).attr("innerHTML", buried);
			$("#"+gallibar).attr("innerHTML", newsgalli);
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
			$("#newscontent").attr("innerHTML",val);
		}
		
		// function to voteup
		function reload_comments()
		{
			// replace the current loading with the new value from the callback
			$("#news_comments_content").attr("innerHTML", "<div class='comments_empty'><img src='images/ic_loading3.gif' alt='loading'/></div>");
			
			// set timeout before fetching the data
			setTimeout('rebuild_comments()',1000);
		}
		
		function rebuild_comments()
		{	
			// sajax parameters
			sajax_asynchronous = false;
			
			// sajax uri
			sajax_uri = "details.php";
			
			// get the variables
			var newsid = {/literal}{$newsdetails.id}{literal};
			
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
		
		// function to show the comment
		function show_commentbox() 
		{
			// hide the no comment yet text
			$("#comments_empty").hide("slow");
			
			// replace the current loading with the new value from the callback
			$("#add_new_comments").show("slow");
		}
		
		// function to send the comments
		function send_comment()
		{
			// sajax parameters
			sajax_asynchronous = false;
			
			// sajax uri
			sajax_uri = "details.php";
			
			// get the value
			var comment = $("#comment_textarea").attr("value");

			// check
			if((comment == "") || (comment == undefined))
			{
				// show notification
				$("#comment_textarea").css("border", "1px solid #f05e6f");
				$("#nohtmlcontent").attr("innerHTML","{/literal}{#pleasefillcomment#}{literal}");
				$("#nohtmlcontent").css("color", "#f05e6f");
			}
			else 
			{
				// revert
				$("#comment_textarea").css("border", "1px solid #DCD069");
				
				// get the variables
				var newsid = {/literal}{$newsdetails.id}{literal};
				
				// place the request
				x_send_comment(comment, newsid, send_commentCallback);
			}
		}
		
		// send the request
		function x_send_comment()
		{
			sajax_do_call("add_comment", x_send_comment.arguments);
		}
		
		// send comment callback
		function send_commentCallback(val)
		{
			// hide
			$("#add_new_comments").hide("slow");
			
			// reload comment
			reload_comments();
			
			// get the amount of current comment
			var cmtamt = $("#comment_amt").attr("innerHTML");
			$("#comment_amt").attr("innerHTML",Number(cmtamt)+1);
		}
		
		// function to report news
		function report_news()
		{
			// get the variables
			var newsid = {/literal}{$newsdetails.id}{literal};
			
			// sajax parameters
			sajax_asynchronous = false;
			
			// sajax uri
			sajax_uri = "details.php";
			
			// place the request
			x_report_news(newsid, report_newsCallback);
		}
		
		// place the request
		function x_report_news()
		{
			sajax_do_call("report_news", x_report_news.arguments);
		}
		
		// send comment callback
		function report_newsCallback(val)
		{
			// do the actions
			var reported = {/literal}'{#reported#}'{literal};
			$("#report_bar").addClass("reported_voted");
			$("#report_bar").attr("disabled", 'true');
			$("#report_link").attr("href", 'javascript:void(null);');
			$("#report_link").attr("innerHTML", reported);
		}
		
		// function to save news
		function save_news()
		{
			// get the variables
			var newsid = {/literal}{$newsdetails.id}{literal};
			
			// sajax parameters
			sajax_asynchronous = false;
			
			// sajax uri
			sajax_uri = "details.php";
			
			// place the request
			x_save_news(newsid, save_newsCallback);
		}
		
		// send the request
		function x_save_news()
		{
			sajax_do_call("save_news", x_save_news.arguments);
		}
		
		// send comment callback
		function save_newsCallback(val)
		{
			// do the actions
			var saved = {/literal}'{#saved#}'{literal};
			$("#favorite_bar").addClass("favorite_voted");
			$("#favorite_bar").attr("disabled", 'true');
			$("#favorite_link").attr("href", 'javascript:void(null);');
			$("#favorite_link").attr("innerHTML", saved);
		}
	</script>
{/literal}