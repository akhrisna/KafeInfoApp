<?php /* Smarty version 2.6.9, created on 2009-06-20 18:48:28
         compiled from includes/profilelogin.inc.tpl */ ?>
<div class="profile_box">
	<div class="profile_box_padding">
		<div class="profile_box_text">
			<div class="profile_box_text_top">
				<div class="profile_box_text_top_padding">
					<a href='javascript:enable_editing();' id="edit_link"><?php echo $this->_config[0]['vars']['edit']; ?>
</a>
					<a href='javascript:cancel_editing();' style="display:none;" id="cancel_link"><?php echo $this->_config[0]['vars']['cancel']; ?>
</a>
				</div>
			</div>
			<div class="profile_box_text_bottom">
				<h2><?php echo $this->_tpl_vars['userinfo']['username']; ?>
</h2>
			</div>
		</div>
		<form id="profile_form">
			<div class="profile_box_form">
				<div class="profile_box_form_padding">
					<div class="login_box_form_space">
						<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['name']; ?>
</div>
						<div class="login_box_form_field_left"></div>
							<input type="text" name="name" id="name" disabled="true" class="profile_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['name']; ?>
"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<div class="login_box_form_space">
						<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['location']; ?>
</div>
						<div class="login_box_form_field_left"></div>
							<input type="text" name="location" id="location" disabled="true" class="profile_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['location']; ?>
"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<div class="login_box_form_space">
						<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['interest']; ?>
</div>
						<div class="login_box_form_field_left"></div>
							<input type="text" name="interest" id="interest" disabled="true" class="profile_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['interest']; ?>
"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<div class="login_box_form_space">
						<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['publicemail']; ?>
</div>
						<div class="login_box_form_field_left"></div>
							<input type="text" name="email_public" id="email_public" disabled="true" class="profile_box_form_field_middle" value="<?php echo $this->_tpl_vars['userinfo']['email_public']; ?>
"/>
						<div class="login_box_form_field_right"></div>
					</div>
					<div class="login_box_form_space" id="joindate_sec">
						<div class="login_box_form_label"><?php echo $this->_config[0]['vars']['joindate']; ?>
</div>
						<div class="login_box_form_field_left"></div>
							<input type="text" name="joinDate" id="joinDate" disabled="true" class="profile_box_form_field_middle" value="<?php if ($this->_tpl_vars['userinfo']['joinDate'] == "0000-00-00 00:00:00"): ?>Beta Tester<?php else:  echo $this->_tpl_vars['userinfo']['joinDate'];  endif; ?>"/>
						<div class="login_box_form_field_right"></div>
					</div>
				</div>
				
				<!-- The submit button -->
				<div class="login_box_form_button" id="submitbutton_sec"  style="display:none;">
					<span id="loading_bar" style="display:none;"><img src="images/ic_loading2.gif" alt="loading"/></span>
					<span id="submit_button"><a href="javascript:void(null);" onclick="post_profile();" title="<?php echo $this->_config[0]['vars']['login']; ?>
"></a></span>
				</div>
			</div>
			<div class="profile_box_bottom">
			
			</div>
		</form>
	</div>
</div>