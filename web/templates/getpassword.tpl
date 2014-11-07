{literal}
	<script type="text/javascript">
		// function to check the register username and password
		function check_getpassword()
		{
			// hide submit button and show loading bar
			document.getElementById('loading_bar').style.display = 'inline';
			document.getElementById('submit_button').style.display = 'none';
			
			// get variables
			var email = document.getElementById('email').value;
			var username = document.getElementById('username').value;
			
			// check if all fields are filled
			if((email == "") || (username == "")) {
				// send alert
				document.getElementById('getpassword_box_alert').innerHTML = '{/literal}{#fillfield#}{literal}';
				
				// show submit button and hide loading bar
				document.getElementById('loading_bar').style.display = 'none';
				document.getElementById('submit_button').style.display = 'inline';
			} 
			else 
			{
				// validate the email
				if(valid_email(email)) {
					// submit the form
					document.getpassword_form.submit();
				} else {
					// send alert
					document.getElementById('getpassword_box_alert').innerHTML = '{/literal}{#emailnotvalid#}{literal}';
			
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
	</script>
{/literal}

<!-- The getpassword section -->
<div class="getpassword">
	
	<!-- The getpassword icons -->
	<div class="getpassword_ic">
		<a href="getpassword.php" title="{#getpassword#}">
			{if $language == "en"}
				<img src="images/ic_getpassword_en.png" alt="{#getpassword#}" />
			{else}
				<img src="images/ic_getpassword_ina.png" alt="{#getpassword#}" />
			{/if}
		</a>
	</div>
	
	<!-- The getpassword box -->
	<div class="getpassword_box">
		
		<!-- The getpassword text -->
		<div class="getpassword_box_text">
			<div class="getpassword_box_text_padding">
				{if $error}
					<span class="getpassword_box_alert">
						{foreach from=$error item=errors}
							{$smarty.config.$errors} <br/>
						{/foreach}
					</span>
				{else}
					{if $message}
						<div id="getpassword_box_alert">
							{$smarty.config.$message}
						</div>
					{else}
						<div id="getpassword_box_alert">
							{#getpasswordtext#}
						</div>
					{/if}
				{/if}
			</div>
		</div>
		
		<!-- The getpassword box -->
		<div class="getpassword_box_form">
			<div class="getpassword_box_form_padding">
				<form name="getpassword_form" id="getpassword_form" action="getpassword.php" method="post">
					<div class="getpassword_box_form_space">
						<div class="getpassword_box_form_label">{#email#}</div>
						<div class="getpassword_box_form_field_left"></div>
							<input type="text" name="email" id="email" class="getpassword_box_form_field_middle" value="{$form_value.email}"/>
						<div class="getpassword_box_form_field_right"></div>
					</div>
					<div class="getpassword_box_form_space">
						<div class="getpassword_box_form_label">{#username#}</div>
						<div class="getpassword_box_form_field_left"></div>
							<input type="text" name="username" id="username" class="getpassword_box_form_field_middle" value="{$form_value.username}"/>
						<div class="getpassword_box_form_field_right"></div>
					</div>
					<input type="hidden" name="getpassword" value="true"/>
				</form>
			</div>
			
			<!-- The submit button -->
			<div class="getpassword_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_getpassword();" title="{#getpassword#}"></a></span>
			</div>
		</div>
	</div>
</div>