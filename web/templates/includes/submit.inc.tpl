<!-- the header -->
<div class="submit_header">
	<div class="submit_header_padding">
		{#submitnewsnow#}
	</div>
</div>

<!-- the box -->
<div class="submit_box">
	<div class="submit_box_padding" id="submit_section">
		
		<!-- first page -->
		<div id="submit1" class="submit_form">
			
			<!-- news link -->
			<div>
				<div class="label_title" id="label_newslink">
					{#newslink#} 
					<span class="notification" id="notification_newslink"></span>
				</div>
				<div class="input_title_left"></div>
				<input type="text" name="newslink" id="newslink" class="input_title" value="{$link}"/>
				<div class="input_title_right"></div>
			</div>
			<div class="mozillaBugFix"></div>
			
			<!-- space -->
			<div style="padding-left:20px;">
				
				<!-- title -->
				<div style="margin-top:20px;">
					<div class="label_title_small" id="label_newstitle">
						{#newstitle#}
						<span class="notification" id="notification_newstitle"></span>
					</div>
					<div class="input_title_left_blue"></div>
					<input type="text" name="newstitle" id="newstitle" class="input_title_blue" value="{$title}"/>
					<div class="input_title_right_blue"></div>
				</div>
				<div class="mozillaBugFix"></div>
				
				<!-- description -->
				<div style="margin-top:10px;">
					<div class="label_title_small" id="label_newsdescription">
						{#newsdescription#}
						<span class="notification" id="notification_newsdescription"></span>
					</div>
					<div class="textarea_title_left_blue_x" style="float:left; background-position:bottom;"></div>
					<textarea class="textarea_title_blue_x" name="newsdescription" id="newsdescription" style="float:left;"/></textarea>
					<div class="textarea_title_right_blue_x"  style="float:left;"></div>
				</div>
				<div class="mozillaBugFix"></div>
			</div>
			
			<!-- the submit button -->
			<div style="margin-left:150px;">
				<div class="next_button">
					<a href="javascript:void(null);" onclick="go_page('2');" title="{#next#}"></a>
				</div>
			</div>
			
			<div class="mozillaBugFix"></div>
		</div>
		
		<!-- second page -->
		<div id="submit2"  class="submit_form" style="display:none;">
			<div id="submit2_section">
				<div style="padding-left:20px;">
				
					<!-- keywords -->
					<div>
						<div class="label_title_small">{#newskeywords#}</div>
						<div class="textarea_title_left_blue_x" style="float:left; background-position:bottom;"></div>
						<textarea class="textarea_title_blue_x" name="newskeywords" id="newskeywords"  style="float:left; height:50px;"/></textarea>
						<div class="textarea_title_right_blue_x"  style="float:left;"></div>
					</div>
					<div class="mozillaBugFix"></div>
					
					<!-- topic and type -->
					<div style="margin-top:10px;">
					
						<!-- topic -->
						<div style="float:left; margin-right:9px; display:inline;">
							<div class="label_title_small">
								{#newstopic#}
								<span class="notification" id="notification_newstopic"></span>
							</div>
							<div style="margin-top:2px;">
								<select name="newstopic" id="newstopic" class="select_submit">
							      <option value="" selected="selected">{#pleasechoose#}</option>
							      <option value="technology">{#technology#}</option>
							      <option value="sports">{#sports#}</option>
							      <option value="health">{#health#}</option>
							      <option value="world">{#world#}</option>
							      <option value="business">{#business#}</option>
							      <option value="offbeat">{#comedy#}</option>
							      <option value="politic">{#socialpolitic#}</option>
							      <option value="music">{#musicfilm#}</option>
							      <option value="other">{#other#}</option>
							    </select>			
							</div>
						</div>
						
						<!-- type -->
						<div>
							<div class="label_title_small">
								{#newstype#}
								<span class="notification" id="notification_newstype"></span>
							</div>
							<div style="margin-top:2px;">
								<select name="newstype" id="newstype" class="select_submit">
							      <option value="" selected="selected">{#pleasechoose#}</option>
							      <option value="berita">{#news#}</option>
							      <option value="gambar">{#image#}</option>
							      <option value="video">{#video#}</option>
							    </select>			
							</div>
						</div>
						
						<!-- screenshots link -->
						<div style="margin-top:10px;">
							<input type="checkbox" class="checkboxscreenshot" id="checkboxscreenshot"/>
							<div class="label_title_small">{#newsusescreenshots#}</div>
							<div id="screenshotpath" class="screenshotpath" style="display:none;">
								<div class="input_title_left_blue"></div>
								<input type="text" name="newsscreenshots" id="newsscreenshots" class="input_title_blue_gray" value="http://image.path.jpg"/>
								<div class="input_title_right_blue"></div>
							</div>
						</div>
						<div class="mozillaBugFix"></div>
					</div>
				</div>
				
				<!-- the submit button -->
				<div>
					<div class="submit_box_button">
						<a href="javascript:void(null);" onclick="go_page('3');" title="{#next#}"></a>
					</div>
				</div>
			</div>
			
			<!-- submit loader-->
			<div id="submit2_section_loader" style="display:none;">
				<div class='center_loader'><img src='images/ic_submit_loader.gif'/></div>
			</div>
			<div class="mozillaBugFix"></div>
		</div>
		
		<!-- fourth page -->
		<div id="submit4"  class="submit_form" style="display:none;">
			<div class="ic_notification" id="ic_notification"></div>
			<div class="padding_notification">
				<span class="ic_notification_text" id="ic_notification_text"></span><br/>
				<span class="color_gray" id="ic_notification_text_small"></span>
			</div>
		</div>
		<div class="mozillaBugFix"></div>
	</div>
</div>
<div class="submit_box_bottom"></div>