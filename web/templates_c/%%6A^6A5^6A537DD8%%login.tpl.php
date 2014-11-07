<?php /* Smarty version 2.6.9, created on 2009-06-21 02:35:42
         compiled from login.tpl */ ?>
<?php echo '
	<script type="text/javascript">
		// function to check the login username and password
		function check_login()
		{
			// hide submit button and show loading bar
			document.getElementById(\'loading_bar\').style.display = \'inline\';
			document.getElementById(\'submit_button\').style.display = \'none\';
			
			var username = document.getElementById(\'username\').value;
			var password = document.getElementById(\'password\').value;
			if((username == "") || (password == "")) 
			{
				// send alert
				document.getElementById(\'login_box_alert\').innerHTML = \'';  echo $this->_config[0]['vars']['fillallfield'];  echo '\';
				
				// show submit button and hide loading bar
				document.getElementById(\'loading_bar\').style.display = \'none\';
				document.getElementById(\'submit_button\').style.display = \'inline\';
			} else {
				// submit the form
				document.login_form.submit();
			}
		}
	</script>
'; ?>


<!-- The login section -->
<div class="login">
	
	<!-- The login icons -->
	<div class="login_ic">
		<a href="login.php" title="<?php echo $this->_config[0]['vars']['login']; ?>
"><img src="images/ic_login.png" alt="<?php echo $this->_config[0]['vars']['login']; ?>
" /></a>
	</div>
	
	<!-- The login box -->
	<div class="login_box">
		
		<!-- The login text -->
		<div class="login_box_text">
			<div class="login_box_text_padding">
				<?php if ($this->_tpl_vars['error']): ?>
					<span class="login_box_alert">
						<?php $_from = $this->_tpl_vars['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['errors']):
?>
							<?php echo $this->_config[0]['vars'][$this->_tpl_vars['errors']]; ?>
 <br/>
						<?php endforeach; endif; unset($_from); ?>
					</span>
				<?php else: ?>
					<?php if ($this->_tpl_vars['message']): ?>
						<div id="login_box_alert">
							<?php echo $this->_config[0]['vars'][$this->_tpl_vars['message']]; ?>

						</div>
					<?php else: ?>
						<div id="login_box_alert">
							<?php echo $this->_config[0]['vars']['login_box_text']; ?>

						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		
		<!-- The login box -->
		<div class="login_box_form">
			<div class="login_box_form_padding">
				<form name="login_form" id="login_form" action="login.php" method="post">
					<div class="login_box_form_space">
						<div class="login_box_form_label">Username</div>
						<div class="login_box_form_field_left"></div>
							<input type="text" name="username" id="username" class="login_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['username']; ?>
"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<div class="login_box_form_space">
						<div class="login_box_form_label">Password</div>
						<div class="login_box_form_field_left"></div>
							<input type="password" name="password" id="password" class="login_box_form_field_middle" value="<?php echo $this->_tpl_vars['form_value']['password']; ?>
"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<input type="hidden" name="login" value="true"/>
				</form>
			</div>
			
			<!-- The submit button -->
			<div class="login_box_form_button">
				<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
				<span id="submit_button"><a href="javascript:void(null);" onclick="check_login();" title="<?php echo $this->_config[0]['vars']['login']; ?>
"></a></span>
			</div>
		</div>
	</div>
</div>