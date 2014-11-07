<div class="profile_box">
	<div class="profile_box_padding">
		<div class="profile_box_text">
			<div class="profile_box_text_top">
				<div class="profile_box_text_top_padding"></div>
			</div>
			<div class="profile_box_text_bottom">
				<h2>{$userinfo.username}</h2>
			</div>
		</div>
		<div class="profile_box_form">
			<div class="profile_box_form_padding">
				<div class="login_box_form_space">
					<div class="login_box_form_label">{#name#}</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="{$userinfo.name}"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label">{#location#}</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="{$userinfo.location}"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label">{#interest#}</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="{$userinfo.interest}"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label">{#publicemail#}</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="{$userinfo.email_public}"/>
					<div class="login_box_form_field_right"></div>
				</div>
				<div class="login_box_form_space">
					<div class="login_box_form_label">{#joindate#}</div>
					<div class="login_box_form_field_left"></div>
						<input type="text" name="username" id="username" disabled="true" class="login_box_form_field_middle" value="{if $userinfo.joinDate == "0000-00-00 00:00:00"}Beta Tester{else}{$userinfo.joinDate}{/if}"/>
					<div class="login_box_form_field_right"></div>
				</div>
			</div>
		</div>
		<div class="profile_box_bottom">
		
		</div>
	</div>
</div>