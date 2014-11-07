<?php /* Smarty version 2.6.9, created on 2010-06-11 14:35:19
         compiled from javascript/edit.js.tpl */ ?>
<?php echo '
	<!-- call the source -->
	<script type="text/javascript" src="js/Sajax.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript"> 
	
		// var
		var newsuserid = "';  echo $this->_tpl_vars['newsdetails']['user_id'];  echo '";
		var _notifscreenshot = "';  echo $this->_config[0]['vars']['removescreenshot'];  echo '";
		
		// load
		$(document).ready(function(){
			$(\'#checkboxscreenshot\').click(function(){
				if($(\'#checkboxscreenshot\').is(\':checked\')) {
					$(\'#screenshotpath\').slideDown(\'slow\');
				} else {
					var screenshotval = $(\'#newsscreenshots\').attr(\'value\');
					if(screenshotval != "http://image.path.jpg") {
						if(confirm(_notifscreenshot)) {
							$(\'#screenshotpath\').slideUp(\'slow\');
							$(\'#newsscreenshots\').attr(\'value\',"http://image.path.jpg");
							$(\'#newsscreenshots\').attr(\'class\',\'input_title_blue_gray\');
						} else {
							$(\'#screenshotpath\').slideUp(\'slow\');
						}
					} else {
						$(\'#screenshotpath\').slideUp(\'slow\');
					}
				}
			});
			$(\'#newsscreenshots\').focus(function(){
				if($(\'#newsscreenshots\').attr(\'value\') == "http://image.path.jpg") {
					$(\'#newsscreenshots\').attr(\'value\',\'\');
					$(\'#newsscreenshots\').attr(\'class\',\'input_title_blue\');
				}
			});
			$(\'#newsscreenshots\').blur(function(){
				if($(\'#newsscreenshots\').attr(\'value\') == "") {
					$(\'#newsscreenshots\').attr(\'value\',\'http://image.path.jpg\');
					$(\'#newsscreenshots\').attr(\'class\',\'input_title_blue_gray\');
				}
			});
		});
		
		// function to switch page
		function go_page(page)
		{
			// check data
			var status = get_data(page);
			
			// check
			if(status) 
			{
				// if
				if(page == 3) 
				{
					edit_news();
				} 
				else
				{
					// build
					var bar = \'submit\'+page;
					
					// do
					hide_section();
					
					// show
					$("#"+bar).show("slow");
				}
			}
		}
		
		// function to hide section 
		function hide_section()
		{
			$(".submit_form").each(function(){
				$(this).css("display", "none");
				//$(this).hide("slow");
			});
		}
		
		// function to gather data
		function get_data(page)
		{
			// switch
			if(page == 2) 
			{
				// get status
				var status = check_field(\'newslink\');
				var status2 = check_field(\'newstitle\');
				var status3 = check_field(\'newsdescription\');
				
				if(((status == true)&&(status2 == true))&&(status3 == true))
					return true;
				else
					return false;
			} else if (page == 3) {
				// get status
				var status = check_field(\'newstopic\');
				var status2 = check_field(\'newstype\');
				
				// check
				if((status == true)&&(status2 == true))
					return true;
				else
					return false;
			} else if (page == 4) {
				return true;
			}
		}
		
		// function to check field
		function check_field(id)
		{
			// get value
			var error = "false";
			var newsid = $("#"+id).attr("value");
			
			// check
			if(newsid == undefined) {
				show_error(id);
				error = "true";
			} else {
				if(!check_empty(newsid)) {
					show_error(id);
					error = "true";
				} else {
					hide_error(id);
				}
			}
			
			// return
			if(error == "false") {
				return true;
			} else {
				return false;
			}
		}
		
		// function to show error
		function show_error(id) 
		{
			// construct
			var not = "notification_"+id;
			var fieldempty = "';  echo $this->_config[0]['vars']['fieldempty'];  echo '";

			// notification
			$("#"+not).attr("innerHTML",fieldempty)
		}
	
		// function to show error
		function hide_error(id) 
		{
			// construct
			var not = "notification_"+id;

			// notification
			$("#"+not).css("display","none")
		}
		
		// check empty
		function check_empty(field)
		{
			if ((field.length == 0) || (field == " ")) {
				return false;
     		} else {
     			return true;
     		}
		}
		
		// function annoy people that are looking at my script! ha..ha..
		function edit_news()
		{
			// hide the current section
			$("#submit2_section").css("display","none");
			$("#submit2_section_loader").css("display","inline");
			
			// get all value
			var newsid = $("#newsid").attr("value");
			var newslink = $("#newslink").attr("value");
			var newstitle = $("#newstitle").attr("value");
			var newsdescription = $("#newsdescription").attr("value");
			var newskeywords = $("#newskeywords").attr("value");
			var newsscreenshots = $("#newsscreenshots").attr("value");
			var newstopic = $("#newstopic").attr("value");
			var newstype = $("#newstype").attr("value");
			
			// cleanup
			if(newskeywords == undefined) newskeywords = "";
			if((newsscreenshots == undefined) || (newsscreenshots == "http://image.path.jpg") || (newsscreenshots == newslink) || (newsscreenshots == newstitle) || (newsscreenshots == newsdescription)) {
				newsscreenshots = "";
			}
			
			// prepare ajax call
			sajax_asynchronous = false;
			
			// sajax uri
			sajax_uri = "edit.php";
			
			// place the request
			x_edit_news(newsid, newslink, newstitle, newsdescription, newskeywords, newsscreenshots, newstopic, newstype, newsuserid, edit_newsCallback);
		}
		
		// place the request
		function x_edit_news()
		{
			sajax_do_call("edit_news", x_edit_news.arguments);
		}
		
		// submit news callback
		function edit_newsCallback(val)
		{
			// retreive the callback
			if(val == 1) {
				show_notification_global(\'duplicate\');
			} else if (val == 2) {
				show_notification_global(\'success\');
			} else if(val == 3) {
				show_notification_global(\'tryagain\');
			}
		}
		
		// function to show notification
		function show_notification_global(action)
		{
			$("#submit2_section_loader").css("display","none");
			
			// check the action
			 if(action == "duplicate") 
			 {
				// assign text			 	
			 	var big_text = \'';  echo $this->_config[0]['vars']['duplicatefound'];  echo '\';
			 	var small_text = \'';  echo $this->_config[0]['vars']['tryagain'];  echo '\';
			 	
			 	// assign
			 	$("#ic_notification").attr("innerHTML","<img src=\'images/ic_warning.png\'/>");
			 	$("#ic_notification_text").attr("innerHTML",big_text);
			 	$("#ic_notification_text_small").attr("innerHTML",small_text);
			 	$("#submit4").show("slow");
			 
			 } 
			 else if(action == "success") 
			 {
			 	// assign text
			 	var big_text = \'';  echo $this->_config[0]['vars']['newsupdated'];  echo '\';
			 	var small_text = \'';  echo $this->_config[0]['vars']['redirecttodashboard'];  echo '\';
			 	
			 	// assign
			 	$("#ic_notification").attr("innerHTML","<img src=\'images/ic_success.png\'/>");
			 	$("#ic_notification_text").attr("innerHTML",big_text);
			 	$("#ic_notification_text_small").attr("innerHTML",small_text);
			 	$("#submit4").show("slow");
			 	
			 	// settimeout
			 	setTimeout("parent.location=\'news.php\'",5000);
			 } 
			 else if(action == "tryagain") 
			 {
			 	// assign text
			 	var big_text = \'';  echo $this->_config[0]['vars']['somethingiswrong'];  echo '\';
			 	var small_text = \'';  echo $this->_config[0]['vars']['tryagain'];  echo '\';
			 	
			 	// assign
			 	$("#ic_notification").attr("innerHTML","<img src=\'images/ic_try.png\'/>");
			 	$("#ic_notification_text").attr("innerHTML",big_text);
			 	$("#ic_notification_text_small").attr("innerHTML",small_text);
			 	$("#submit4").show("slow");
			 }
		}
	</script>
'; ?>