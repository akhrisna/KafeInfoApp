{literal}
	<script type="text/javascript">
		// function to check the login username and password
		function check_login()
		{
			// hide submit button and show loading bar
			document.getElementById('loading_bar').style.display = 'inline';
			document.getElementById('submit_button').style.display = 'none';
			
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			if((username == "") || (password == "")) 
			{
				// send alert
				document.getElementById('login_box_alert').innerHTML = '{/literal}{#fillallfield#}{literal}';
				
				// show submit button and hide loading bar
				document.getElementById('loading_bar').style.display = 'none';
				document.getElementById('submit_button').style.display = 'inline';
			} else {
				// submit the form
				document.login_form.submit();
			}
		}
	</script>
{/literal}

<!-- The login section -->
<div class="login">
	
	<!-- The login icons -->
	<div class="login_ic">
		<a href="login.php" title="{#login#}"><img src="images/ic_login.png" alt="{#login#}" /></a>
	</div>
	
	<!-- The login box -->
	<div class="login_box">
		
		<!-- The login text -->
		<div class="login_box_text">
			<div class="login_box_text_padding">
				{if $error}
					<span class="login_box_alert">
						{foreach from=$error item=errors}
							{$smarty.config.$errors} <br/>
						{/foreach}
					</span>
				{else}
					{if $message}
						<div id="login_box_alert">
							{$smarty.config.$message}
						</div>
					{else}
						<div id="login_box_alert">
							{#login_box_text#}
						</div>
					{/if}
				{/if}
			</div>
		</div>
		
		<!-- The login box -->
		<div class="login_box_form">
			<div class="login_box_form_padding">
				<form name="login_form" id="login_form" action="login.php" method="post">
					<div class="login_box_form_space">
						<div class="login_box_form_label">Username</div>
						<div class="login_box_form_field_left"></div>
							<input type="text" name="username" id="username" class="login_box_form_field_middle" value="{$form_value.username}"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<div class="login_box_form_space">
						<div class="login_box_form_label">Password</div>
						<div class="login_box_form_field_left"></div>
							<input type="password" name="password" id="password" class="login_box_form_field_middle" value="{$form_value.password}"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<input type="hidden" name="login" value="true"/>
				</form>
			</div>
			
			<!-- The submit button -->
			<div class="login_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_login();" title="{#login#}"></a></span>
			</div>
		</div>
	</div>
</div>