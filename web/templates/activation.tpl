{literal}
	<script type="text/javascript">
		// function to check the input and submit the form
		function check_activation()
		{
			// hide submit button and show loading bar
			document.getElementById('loading_bar').style.display = 'inline';
			document.getElementById('submit_button').style.display = 'none';
			
			// get variables
			var email = document.getElementById('email').value;
			var activationcode = document.getElementById('activationcode').value;
			
			// check if all fields are filled
			if((email == "") || (activationcode == "")) {
				// send alert
				document.getElementById('activation_box_alert').innerHTML = '{/literal}{#fillfield#}{literal}';
				
				// show submit button and hide loading bar
				document.getElementById('loading_bar').style.display = 'none';
				document.getElementById('submit_button').style.display = 'inline';
			} 
			else 
			{
				// validate the email
				if(valid_email(email)) {
					// submit the form
					document.activation_form.submit();
				} else {
					// send alert
					document.getElementById('activation_box_alert').innerHTML = '{/literal}{#emailnotvalid#}{literal}';
			
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

<!-- The activation section -->
<div class="activation">
	
	<!-- The activation icons -->
	<div class="activation_ic">
		<a href="activation.php" title="{#activation#}">
			{if $language == "en"}
				<img src="images/ic_activation_en.png" alt="{#activation#}" />
			{else}
				<img src="images/ic_activation_ina.png" alt="{#activation#}" />
			{/if}
		</a>
	</div>
	
	<!-- The activation box -->
	<div class="activation_box">
		
		<!-- The activation text -->
		<div class="activation_box_text">
			<div class="activation_box_text_padding">
				{if $error}
					<span class="activation_box_alert">
						{foreach from=$error item=errors}
							{$smarty.config.$errors} <br/>
						{/foreach}
					</span>
				{else}
					{if $message}
						<div id="activation_box_alert">
							{$smarty.config.$message}
						</div>
					{else}
						<div id="activation_box_alert">
							{#activatefirst#}
						</div>
					{/if}
				{/if}
			</div>
		</div>
		
		<!-- The activation box -->
		<div class="activation_box_form">
			<div class="activation_box_form_padding">
				<form name="activation_form" id="activation_form" action="activation.php" method="post">
					<div class="activation_box_form_space">
						<div class="activation_box_form_label">{#email#}</div>
						<div class="activation_box_form_field_left"></div>
							<input type="text" name="email" id="email" class="activation_box_form_field_middle" value="{$form_value.email}"/>
						<div class="activation_box_form_field_right"></div>
					</div>
					<div class="activation_box_form_space">
						<div class="activation_box_form_label">{#activationcode#}</div>
						<div class="activation_box_form_field_left"></div>
							<input type="text" name="activationcode" id="activationcode" class="activation_box_form_field_middle" value="{$form_value.activationcode}"/>
						<div class="activation_box_form_field_right"></div>
					</div>
					<input type="hidden" name="activation" value="true"/>
				</form>
			</div>
			
			<!-- The submit button -->
			<div class="activation_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_activation();" title="{#activation#}"></a></span>
			</div>
		</div>
	</div>
	
	<!-- terms of use-->
	<div class="register_terms">
		{#activationinfo#}
	</div>
</div>