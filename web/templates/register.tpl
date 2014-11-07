{literal}
	<script type="text/javascript">
		// function to check the register username and password
		function check_register()
		{
			// hide submit button and show loading bar
			document.getElementById('loading_bar').style.display = 'inline';
			document.getElementById('submit_button').style.display = 'none';
			
			// get variables
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			var passwordagain = document.getElementById('passwordagain').value;
			var email = document.getElementById('email').value;
			
			// check if all fields are filled
			if((username == "") || (password == "") || (passwordagain == "") || (email == "")) {
				// send alert
				document.getElementById('register_box_alert').innerHTML = '{/literal}{#fillfield#}{literal}';
				
				// show submit button and hide loading bar
				document.getElementById('loading_bar').style.display = 'none';
				document.getElementById('submit_button').style.display = 'inline';
			} 
			else 
			{
				// validate the email
				if(valid_email(email)) {
					// submit the form
					document.register_form.submit();
				} else {
					// send alert
					document.getElementById('register_box_alert').innerHTML = '{/literal}{#emailnotvalid#}{literal}';
			
					// show submit button and hide loading bar
					document.getElementById('loading_bar').style.display = 'none';
					document.getElementById('submit_button').style.display = 'inline';
				}
			}
		}
		
		// function to check email
		function valid_email(email)
		{
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (filter.test(email)) {
				return true;
			}
			return false;
		}
		
		// function to show information on field
		function showinfo(field,action)
		{
			// set the id
			var id = 'info_'+field;
			if(action == "show") {
				document.getElementById(id).style.display = 'inline';
			} else {
				document.getElementById(id).style.display = 'none';
			}
		}
	</script>
{/literal}

<div class="register">

	<!-- the register icons -->
	<div class="register_ic">
		<a href="register.php" title="{#register#}">
			{if $language == "en"}
				<img src="images/ic_register_en.png" alt="{#register#}" />
			{else}
				<img src="images/ic_register_ina.png" alt="{#register#}" />
			{/if}
		</a>
	</div>
	
	<!-- the register box -->
	<div class="register_box">
		
		<!-- the register text -->
		<div class="register_box_text">
			<div class="register_box_text_padding">
				<div id="register_box_alert">
					{if $error}
						<span class="register_box_alert">
							{foreach from=$error item=errors}
								{$smarty.config.$errors} <br/>
							{/foreach}
						</span>
					{else}
						{#register_box_text#}
					{/if}
				</div>
			</div>
		</div>
		
		<!-- the register box -->
		<div class="register_box_form">
			<div class="register_box_form_padding">
				<form name="register_form" id="register_form" action="register.php" method="post">
					<div class="register_box_form_space">
						<div class="register_box_form_label">{#username#} <span id="info_username" class="field_information">{#usernameinfo#}</span></div>
						<div class="register_box_form_field_left"></div>
							<input type="text" name="username" id="username" class="register_box_form_field_middle" onfocus="showinfo('username','show');" onblur="showinfo('username','hide');" value="{$form_value.username}"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<div class="register_box_form_space">
						<div class="register_box_form_label">{#password#} <span id="info_password" class="field_information">{#passwordinfo#}</span></div>
						<div class="register_box_form_field_left"></div>
							<input type="password" name="password" id="password" class="register_box_form_field_middle" onfocus="showinfo('password','show');" onblur="showinfo('password','hide');" value="{$form_value.password}"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<div class="register_box_form_space">
						<div class="register_box_form_label">{#passwordagain#}</div>
						<div class="register_box_form_field_left"></div>
							<input type="password" name="passwordagain" id="passwordagain" class="register_box_form_field_middle" value="{$form_value.passwordagain}"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<div class="register_box_form_space">
						<div class="register_box_form_label">{#email#}</div>
						<div class="register_box_form_field_left"></div>
							<input type="text" name="email" id="email" class="register_box_form_field_middle" value="{$form_value.email}"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<input type="hidden" name="register" value="true"/>
				</form>
			</div>
			
			<!-- the submit button -->
			<div class="register_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_register();" title="{#register#}"></a></span>
			</div>
		</div>
	</div>
	
	<!-- terms of use-->
	<div class="register_terms">
		{#registertermsofuse#}
	</div>
</div>