<?php /* Smarty version 2.6.9, created on 2010-01-17 11:17:18
         compiled from includes/navigation.inc.tpl */ ?>
<!-- script to check the login -->
<?php echo '
	<script type="text/javascript">
		// function to check the login username and password
		function check_login()
		{
			var username = $(\'#username\').attr(\'value\');
			var password = $(\'#password\').attr(\'value\');
			if(is_empty(username)) {
				alert(\'';  echo $this->_config[0]['vars']['fillallfield'];  echo '\');
				$(\'#username\').focus();
			} else if (is_empty(password)) {
				alert(\'';  echo $this->_config[0]['vars']['fillallfield'];  echo '\');
				$(\'#password\').focus();
			} else {
				document.login_form.submit();
			}
		}
		
		// function to toggle login box
		function toggleloginbox()
		{
			$(\'#loginbox\').slideToggle(\'600\');
		}
	</script>
'; ?>


<!-- the right navigation -->
<div class="navigation">
	<div class="navigation_register">
		<a href="register.php" title="<?php echo $this->_config[0]['vars']['yourregister']; ?>
"><?php echo $this->_config[0]['vars']['yourregister']; ?>
</a>
	</div>
	<div class="navigation_loginbox" id="loginbox" style="display:none;">
		<div class="navigation_loginbox_top"></div>
		<div class="navigation_loginbox_content">
			<div class="navigation_loginbox_content_padding">
				<form name="login_form" action="login.php" method="post">
					
					<!-- the username -->
					<div class="navigation_loginbox_content_username">
						<div class="lbl_username">
							<?php echo $this->_config[0]['vars']['username']; ?>

						</div>
						<div class="input_loginbox_left"></div>
						<input type="text" name="username" id="username" class="input_loginbox"/>
						<div class="input_loginbox_right"></div>
					</div>
					
					<!-- the password -->
					<div class="navigation_loginbox_content_password">
						<div class="lbl_username">
							<?php echo $this->_config[0]['vars']['password']; ?>

						</div>
						<div class="input_loginbox_left"></div>
						<input type="password" name="password" id="password" class="input_loginbox"/>
						<div class="input_loginbox_right"></div>
					</div>
					
					<!-- bug fix -->
					<div class="mozillaBugFix"></div>
					
					<!-- the button -->
					<div class="navigation_loginbox_content_submit">
						<input type="hidden" name="login" value="true"/>
						<a href="javascript:void(null);" title="<?php echo $this->_config[0]['vars']['login']; ?>
" onclick="check_login();"><?php echo $this->_config[0]['vars']['login']; ?>
</a>
					</div>
				</form>
				
				<!-- bug fix -->
				<div class="mozillaBugFix"></div>
			</div>
		</div>
		<div class="navigation_loginbox_bottom"></div>
	</div>
	<div class="navigation_login">
		<a href="javascript:toggleloginbox();" title="<?php echo $this->_config[0]['vars']['LOGIN']; ?>
"><?php echo $this->_config[0]['vars']['LOGIN']; ?>
</a>
	</div>
</div>