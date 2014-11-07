<?php /* Smarty version 2.6.9, created on 2009-06-21 02:23:25
         compiled from register.tpl */ ?>
<?php echo '
	<script type="text/javascript">
		// function to check the register username and password
		function check_register()
		{
			// hide submit button and show loading bar
			document.getElementById(\'loading_bar\').style.display = \'inline\';
			document.getElementById(\'submit_button\').style.display = \'none\';
			
			// get variables
			var username = document.getElementById(\'username\').value;
			var password = document.getElementById(\'password\').value;
			var passwordagain = document.getElementById(\'passwordagain\').value;
			var email = document.getElementById(\'email\').value;
			
			// check if all fields are filled
			if((username == "") || (password == "") || (passwordagain == "") || (email == "")) {
				// send alert
				document.getElementById(\'register_box_alert\').innerHTML = \'';  echo $this->_config[0]['vars']['fillfield'];  echo '\';
				
				// show submit button and hide loading bar
				document.getElementById(\'loading_bar\').style.display = \'none\';
				document.getElementById(\'submit_button\').style.display = \'inline\';
			} 
			else 
			{
				// validate the email
				if(valid_email(email)) {
					// submit the form
					document.register_form.submit();
				} else {
					// send alert
					document.getElementById(\'register_box_alert\').innerHTML = \'';  echo $this->_config[0]['vars']['emailnotvalid'];  echo '\';
			
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
		
		// function to show information on field
		function showinfo(field,action)
		{
			// set the id
			var id = \'info_\'+field;
			if(action == "show") {
				document.getElementById(id).style.display = \'inline\';
			} else {
				document.getElementById(id).style.display = \'none\';
			}
		}
	</script>
'; ?>


<div class="register">

	<!-- the register icons -->
	<div class="register_ic">
		<a href="register.php" title="<?php echo $this->_config[0]['vars']['register']; ?>
">
			<?php if ($this->_tpl_vars['language'] == 'en'): ?>
				<img src="images/ic_register_en.png" alt="<?php echo $this->_config[0]['vars']['register']; ?>
" />
			<?php else: ?>
				<img src="images/ic_register_ina.png" alt="<?php echo $this->_config[0]['vars']['register']; ?>
" />
			<?php endif; ?>
		</a>
	</div>
	
	<!-- the register box -->
	<div class="register_box">
		
		<!-- the register text -->
		<div class="register_box_text">
			<div class="register_box_text_padding">
				<div id="register_box_alert">
					<?php if ($this->_tpl_vars['error']): ?>
						<span class="register_box_alert">
							<?php $_from = $this->_tpl_vars['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['errors']):
?>
								<?php echo $this->_config[0]['vars'][$this->_tpl_vars['errors']]; ?>
 <br/>
							<?php endforeach; endif; unset($_from); ?>
						</span>
					<?php else: ?>
						<?php echo $this->_config[0]['vars']['register_box_text']; ?>

					<?php endif; ?>
				</div>
			</div>
		</div>
		
		<!-- the register box -->
		<div class="register_box_form">
			<div class="register_box_form_padding">
				<form name="register_form" id="register_form" action="register.php" method="post">
					<div class="register_box_form_space">
						<div class="register_box_form_label"><?php echo $this->_config[0]['vars']['username']; ?>
 <span id="info_username" class="field_information"><?php echo $this->_config[0]['vars']['usernameinfo']; ?>
</span></div>
						<div class="register_box_form_field_left"></div>
							<input type="text" name="username" id="username" class="register_box_form_field_middle" onfocus="showinfo('username','show');" onblur="showinfo('username','hide');" value="<?php echo $this->_tpl_vars['form_value']['username']; ?>
"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<div class="register_box_form_space">
						<div class="register_box_form_label"><?php echo $this->_config[0]['vars']['password']; ?>
 <span id="info_password" class="field_information"><?php echo $this->_config[0]['vars']['passwordinfo']; ?>
</span></div>
						<div class="register_box_form_field_left"></div>
							<input type="password" name="password" id="password" class="register_box_form_field_middle" onfocus="showinfo('password','show');" onblur="showinfo('password','hide');" value="<?php echo $this->_tpl_vars['form_value']['password']; ?>
"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<div class="register_box_form_space">
						<div class="register_box_form_label"><?php echo $this->_config[0]['vars']['passwordagain']; ?>
</div>
						<div class="register_box_form_field_left"></div>
							<input type="password" name="passwordagain" id="passwordagain" class="register_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['passwordagain']; ?>
"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<div class="register_box_form_space">
						<div class="register_box_form_label"><?php echo $this->_config[0]['vars']['email']; ?>
</div>
						<div class="register_box_form_field_left"></div>
							<input type="text" name="email" id="email" class="register_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['email']; ?>
"/>
						<div class="register_box_form_field_right"></div>
					</div>
					<input type="hidden" name="register" value="true"/>
				</form>
			</div>
			
			<!-- the submit button -->
			<div class="register_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_register();" title="<?php echo $this->_config[0]['vars']['register']; ?>
"></a></span>
			</div>
		</div>
	</div>
	
	<!-- terms of use-->
	<div class="register_terms">
		<?php echo $this->_config[0]['vars']['registertermsofuse']; ?>

	</div>
</div>