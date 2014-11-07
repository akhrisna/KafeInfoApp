<?php /* Smarty version 2.6.9, created on 2009-06-20 20:48:45
         compiled from includes/profile.inc.tpl */ ?>
<div class="profile_box">
	<div class="profile_box_padding">
		<div class="profile_box_text">
			<div class="profile_box_text_top">
				<div class="profile_box_text_top_padding"></div>
			</div>
			<div class="profile_box_text_bottom">
				<h2><?php echo $this->_tpl_vars['userinfo']['username']; ?>
</h2>
			</div>
		</div>
		<div class="profile_box_form">
			<div class="profile_box_form_padding">
				<div class="login_box_form_space">
					<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['name']; ?>
</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['name']; ?>
"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['location']; ?>
</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['location']; ?>
"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['interest']; ?>
</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['interest']; ?>
"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['publicemail']; ?>
</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['email_public']; ?>
"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['joindate']; ?>
</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="<?php if ($this->_tpl_vars['userinfo']['joinDate'] == "0000-00-00 00:00:00"): ?>Beta Tester<?php else:  echo $this->_tpl_vars['userinfo']['joinDate'];  endif; ?>"/>
					<div class="login_box_form_field_right"></div>
				</div>
			</div>
		</div>
		<div class="profile_box_bottom">
		
		</div>
	</div>
</div>