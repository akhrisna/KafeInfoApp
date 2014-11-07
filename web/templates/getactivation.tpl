{literal}
	<script type="text/javascript">
		// function to check the register username and password
		function check_getactivation()
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
				document.getElementById('getactivation_box_alert').innerHTML = '{/literal}{#fillfield#}{literal}';
				
				// show submit button and hide loading bar
				document.getElementById('loading_bar').style.display = 'none';
				document.getElementById('submit_button').style.display = 'inline';
			} 
			else 
			{
				// validate the email
				if(valid_email(email)) {
					// submit the form
					document.getactivation_form.submit();
				} else {
					// send alert
					document.getElementById('getactivation_box_alert').innerHTML = '{/literal}{#emailnotvalid#}{literal}';
			
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

<!-- The getactivation section -->
<div class="getactivation">
	
	<!-- The getactivation icons -->
	<div class="getactivation_ic">
		<a href="getactivation.php" title="{#getactivation#}">
			{if $language == "en"}
				<img src="images/ic_getactivation_en.png" alt="{#getactivation#}" />
			{else}
				<img src="images/ic_getactivation_ina.png" alt="{#getactivation#}" />
			{/if}
		</a>
	</div>
	
	<!-- The getactivation box -->
	<div class="getactivation_box">
		
		<!-- The getactivation text -->
		<div class="getactivation_box_text">
			<div class="getactivation_box_text_padding">
				{if $error}
					<span class="getactivation_box_alert">
						{foreach from=$error item=errors}
							{$smarty.config.$errors} <br/>
						{/foreach}
					</span>
				{else}
					{if $message}
						<div id="getactivation_box_alert">
							{$smarty.config.$message}
						</div>
					{else}
						<div id="getactivation_box_alert">
							{#getactivationtext#}
						</div>
					{/if}
				{/if}
			</div>
		</div>
		
		<!-- The getactivation box -->
		<div class="getactivation_box_form">
			<div class="getactivation_box_form_padding">
				<form name="getactivation_form" id="getactivation_form" action="getactivation.php" method="post">
					<div class="getactivation_box_form_space">
						<div class="getactivation_box_form_label">{#email#}</div>
						<div class="getactivation_box_form_field_left"></div>
							<input type="text" name="email" id="email" class="getactivation_box_form_field_middle" value="{$form_value.email}"/>
						<div class="getactivation_box_form_field_right"></div>
					</div>
					<div class="getactivation_box_form_space">
						<div class="getactivation_box_form_label">{#username#}</div>
						<div class="getactivation_box_form_field_left"></div>
							<input type="text" name="username" id="username" class="getactivation_box_form_field_middle" value="{$form_value.username}"/>
						<div class="getactivation_box_form_field_right"></div>
					</div>
					<input type="hidden" name="getactivation" value="true"/>
				</form>
			</div>
			
			<!-- The submit button -->
			<div class="getactivation_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_getactivation();" title="{#getactivation#}"></a></span>
			</div>
		</div>
	</div>
</div>