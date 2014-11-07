<?php /* Smarty version 2.6.9, created on 2009-06-21 02:27:10
         compiled from activation.tpl */ ?>
<?php echo '
	<script type="text/javascript">
		// function to check the input and submit the form
		function check_activation()
		{
			// hide submit button and show loading bar
			document.getElementById(\'loading_bar\').style.display = \'inline\';
			document.getElementById(\'submit_button\').style.display = \'none\';
			
			// get variables
			var email = document.getElementById(\'email\').value;
			var activationcode = document.getElementById(\'activationcode\').value;
			
			// check if all fields are filled
			if((email == "") || (activationcode == "")) {
				// send alert
				document.getElementById(\'activation_box_alert\').innerHTML = \'';  echo $this->_config[0]['vars']['fillfield'];  echo '\';
				
				// show submit button and hide loading bar
				document.getElementById(\'loading_bar\').style.display = \'none\';
				document.getElementById(\'submit_button\').style.display = \'inline\';
			} 
			else 
			{
				// validate the email
				if(valid_email(email)) {
					// submit the form
					document.activation_form.submit();
				} else {
					// send alert
					document.getElementById(\'activation_box_alert\').innerHTML = \'';  echo $this->_config[0]['vars']['emailnotvalid'];  echo '\';
			
					// show submit button and hide loading bar
					document.getElementById(\'loading_bar\').style.display = \'none\';
					document.getElementById(\'submit_button\').style.display = \'inline\';
				}
			}
		}
		
		// function to check email
		function valid_email(email)
		{
			var filter = /^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/;
			if (filter.test(email)) {
				return true;
			}
			return false;
		}
	</script>
'; ?>


<!-- The activation section -->
<div class="activation">
	
	<!-- The activation icons -->
	<div class="activation_ic">
		<a href="activation.php" title="<?php echo $this->_config[0]['vars']['activation']; ?>
">
			<?php if ($this->_tpl_vars['language'] == 'en'): ?>
				<img src="images/ic_activation_en.png" alt="<?php echo $this->_config[0]['vars']['activation']; ?>
" />
			<?php else: ?>
				<img src="images/ic_activation_ina.png" alt="<?php echo $this->_config[0]['vars']['activation']; ?>
" />
			<?php endif; ?>
		</a>
	</div>
	
	<!-- The activation box -->
	<div class="activation_box">
		
		<!-- The activation text -->
		<div class="activation_box_text">
			<div class="activation_box_text_padding">
				<?php if ($this->_tpl_vars['error']): ?>
					<span class="activation_box_alert">
						<?php $_from = $this->_tpl_vars['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['errors']):
?>
							<?php echo $this->_config[0]['vars'][$this->_tpl_vars['errors']]; ?>
 <br/>
						<?php endforeach; endif; unset($_from); ?>
					</span>
				<?php else: ?>
					<?php if ($this->_tpl_vars['message']): ?>
						<div id="activation_box_alert">
							<?php echo $this->_config[0]['vars'][$this->_tpl_vars['message']]; ?>

						</div>
					<?php else: ?>
						<div id="activation_box_alert">
							<?php echo $this->_config[0]['vars']['activatefirst']; ?>

						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		
		<!-- The activation box -->
		<div class="activation_box_form">
			<div class="activation_box_form_padding">
				<form name="activation_form" id="activation_form" action="activation.php" method="post">
					<div class="activation_box_form_space">
						<div class="activation_box_form_label"><?php echo $this->_config[0]['vars']['email']; ?>
</div>
						<div class="activation_box_form_field_left"></div>
							<input type="text" name="email" id="email" class="activation_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['email']; ?>
"/>
						<div class="activation_box_form_field_right"></div>
					</div>
					<div class="activation_box_form_space">
						<div class="activation_box_form_label"><?php echo $this->_config[0]['vars']['activationcode']; ?>
</div>
						<div class="activation_box_form_field_left"></div>
							<input type="text" name="activationcode" id="activationcode" class="activation_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['activationcode']; ?>
"/>
						<div class="activation_box_form_field_right"></div>
					</div>
					<input type="hidden" name="activation" value="true"/>
				</form>
			</div>
			
			<!-- The submit button -->
			<div class="activation_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_activation();" title="<?php echo $this->_config[0]['vars']['activation']; ?>
"></a></span>
			</div>
		</div>
	</div>
	
	<!-- terms of use-->
	<div class="register_terms">
		<?php echo $this->_config[0]['vars']['activationinfo']; ?>

	</div>
</div>