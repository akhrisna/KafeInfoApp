<?php /* Smarty version 2.6.9, created on 2009-08-01 23:35:33
         compiled from getpassword.tpl */ ?>
<?php echo '
	<script type="text/javascript">
		// function to check the register username and password
		function check_getpassword()
		{
			// hide submit button and show loading bar
			document.getElementById(\'loading_bar\').style.display = \'inline\';
			document.getElementById(\'submit_button\').style.display = \'none\';
			
			// get variables
			var email = document.getElementById(\'email\').value;
			var username = document.getElementById(\'username\').value;
			
			// check if all fields are filled
			if((email == "") || (username == "")) {
				// send alert
				document.getElementById(\'getpassword_box_alert\').innerHTML = \'';  echo $this->_config[0]['vars']['fillfield'];  echo '\';
				
				// show submit button and hide loading bar
				document.getElementById(\'loading_bar\').style.display = \'none\';
				document.getElementById(\'submit_button\').style.display = \'inline\';
			} 
			else 
			{
				// validate the email
				if(valid_email(email)) {
					// submit the form
					document.getpassword_form.submit();
				} else {
					// send alert
					document.getElementById(\'getpassword_box_alert\').innerHTML = \'';  echo $this->_config[0]['vars']['emailnotvalid'];  echo '\';
			
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


<!-- The getpassword section -->
<div class="getpassword">
	
	<!-- The getpassword icons -->
	<div class="getpassword_ic">
		<a href="getpassword.php" title="<?php echo $this->_config[0]['vars']['getpassword']; ?>
">
			<?php if ($this->_tpl_vars['language'] == 'en'): ?>
				<img src="images/ic_getpassword_en.png" alt="<?php echo $this->_config[0]['vars']['getpassword']; ?>
" />
			<?php else: ?>
				<img src="images/ic_getpassword_ina.png" alt="<?php echo $this->_config[0]['vars']['getpassword']; ?>
" />
			<?php endif; ?>
		</a>
	</div>
	
	<!-- The getpassword box -->
	<div class="getpassword_box">
		
		<!-- The getpassword text -->
		<div class="getpassword_box_text">
			<div class="getpassword_box_text_padding">
				<?php if ($this->_tpl_vars['error']): ?>
					<span class="getpassword_box_alert">
						<?php $_from = $this->_tpl_vars['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['errors']):
?>
							<?php echo $this->_config[0]['vars'][$this->_tpl_vars['errors']]; ?>
 <br/>
						<?php endforeach; endif; unset($_from); ?>
					</span>
				<?php else: ?>
					<?php if ($this->_tpl_vars['message']): ?>
						<div id="getpassword_box_alert">
							<?php echo $this->_config[0]['vars'][$this->_tpl_vars['message']]; ?>

						</div>
					<?php else: ?>
						<div id="getpassword_box_alert">
							<?php echo $this->_config[0]['vars']['getpasswordtext']; ?>

						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		
		<!-- The getpassword box -->
		<div class="getpassword_box_form">
			<div class="getpassword_box_form_padding">
				<form name="getpassword_form" id="getpassword_form" action="getpassword.php" method="post">
					<div class="getpassword_box_form_space">
						<div class="getpassword_box_form_label"><?php echo $this->_config[0]['vars']['email']; ?>
</div>
						<div class="getpassword_box_form_field_left"></div>
							<input type="text" name="email" id="email" class="getpassword_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['email']; ?>
"/>
						<div class="getpassword_box_form_field_right"></div>
					</div>
					<div class="getpassword_box_form_space">
						<div class="getpassword_box_form_label"><?php echo $this->_config[0]['vars']['username']; ?>
</div>
						<div class="getpassword_box_form_field_left"></div>
							<input type="text" name="username" id="username" class="getpassword_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['username']; ?>
"/>
						<div class="getpassword_box_form_field_right"></div>
					</div>
					<input type="hidden" name="getpassword" value="true"/>
				</form>
			</div>
			
			<!-- The submit button -->
			<div class="getpassword_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_getpassword();" title="<?php echo $this->_config[0]['vars']['getpassword']; ?>
"></a></span>
			</div>
		</div>
	</div>
</div>