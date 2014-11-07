<?php /* Smarty version 2.6.9, created on 2009-06-20 18:48:28
         compiled from javascript/profilelogin.js.tpl */ ?>
<?php echo '
	
	<!-- call the source -->
	<script type="text/javascript" src="js/Sajax.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript"> 		
		// function to enable editing of profile
		function enable_editing()
		{
			// change the text
			change_text(\'show\');
			
			// enable form
			enable_form();
			
			// prepare form
			prepare_form(\'show\');
		}
		
		// function to change the text
		function change_text(action)
		{
			if(action == "show") {
				$(\'#edit_link\').css("display","none");
				$(\'#cancel_link\').css("display","inline");
			} else {
				$(\'#cancel_link\').css("display","none");
				$(\'#edit_link\').css("display","inline");
			}
		}
		
		// function to prepare form
		function prepare_form(action)
		{
			// hide the join date
			if(action == "show") {
				$(\'#joindate_sec\').hide("slow");
				$(\'#submitbutton_sec\').show("slow");
			} else {
				$(\'#submitbutton_sec\').hide("slow");
				$(\'#joindate_sec\').show("slow");
			}
		}
		
		// cancel editing
		function cancel_editing()
		{
			// change the text
			change_text(\'hide\');
			
			// enable form
			disable_form();
			
			// prepare form
			prepare_form(\'hide\');
		}
		
		// disabled editing
		function disabled_editing()
		{
			// change the text
			change_text(\'hide\');
			
			// disabled form
			disable_form();
			
			// hide button
			$(\'#submit_button\').css("display","none");
			
			// show the loading
			$(\'#loading_bar\').css("display","inline");
			
			setTimeout(\'something()\',1000);
		}
		
		function something()
		{
			// hide the loading
			$(\'#loading_bar\').css("display","none");
			
			// hide button
			prepare_form(\'hide\');
			
			$(\'#submit_button\').css("display","block");
		}

		// function to enable the form
		function enable_form()
		{
			// iterates and enable
			$("input").each(function() {
		    	$(this).removeAttr("disabled");
		    	$(this).addClass("profile_box_form_field_light");
		    });
		}
		
		// function to disabled the form
		function disable_form()
		{
			// iterates and disabled
			$("input").each(function() {
		    	$(this).attr("disabled","disabled");
		    	$(this).removeClass("profile_box_form_field_light");
		    });
		}
		
		// function to submit the form
		function post_profile()
		{
			// get the values
			var name = $("#name").attr("value");
			var location = $("#location").attr("value");
			var interest = $("#interest").attr("value");
			var email_public = $("#email_public").attr("value");
			
			// cleanup
			if(name == undefined) name = "";
			if(location == undefined) location = "";
			if(interest == undefined) interest = "";
			if(email_public == undefined) email_public = "";
			
			// sajax parameters
			sajax_asynchronous = false;
			
			// sajax uri
			sajax_uri = "profile.php";
			
			// place the request
			x_post_profile(name, location, interest, email_public, post_profileCallback);
		}
		
		// send the request
		function x_post_profile()
		{
			sajax_do_call("post_profile", x_post_profile.arguments);
		}
		
		// callback
		function post_profileCallback(val)
		{
			// at callback disable editing
			disabled_editing();
		}
	</script>
'; ?>