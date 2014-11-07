<?php /* Smarty version 2.6.9, created on 2010-06-11 13:43:49
         compiled from includes/submit.inc.tpl */ ?>
<!-- the header -->
<div class="submit_header">
	<div class="submit_header_padding">
		<?php echo $this->_config[0]['vars']['submitnewsnow']; ?>

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
					<?php echo $this->_config[0]['vars']['newslink']; ?>
 
					<span class="notification" id="notification_newslink"></span>
				</div>
				<div class="input_title_left"></div>
				<input type="text" name="newslink" id="newslink" class="input_title" value="<?php echo $this->_tpl_vars['link']; ?>
"/>
				<div class="input_title_right"></div>
			</div>
			<div class="mozillaBugFix"></div>
			
			<!-- space -->
			<div style="padding-left:20px;">
				
				<!-- title -->
				<div style="margin-top:20px;">
					<div class="label_title_small" id="label_newstitle">
						<?php echo $this->_config[0]['vars']['newstitle']; ?>

						<span class="notification" id="notification_newstitle"></span>
					</div>
					<div class="input_title_left_blue"></div>
					<input type="text" name="newstitle" id="newstitle" class="input_title_blue" value="<?php echo $this->_tpl_vars['title']; ?>
"/>
					<div class="input_title_right_blue"></div>
				</div>
				<div class="mozillaBugFix"></div>
				
				<!-- description -->
				<div style="margin-top:10px;">
					<div class="label_title_small" id="label_newsdescription">
						<?php echo $this->_config[0]['vars']['newsdescription']; ?>

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
					<a href="javascript:void(null);" onclick="go_page('2');" title="<?php echo $this->_config[0]['vars']['next']; ?>
"></a>
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
						<div class="label_title_small"><?php echo $this->_config[0]['vars']['newskeywords']; ?>
</div>
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
								<?php echo $this->_config[0]['vars']['newstopic']; ?>

								<span class="notification" id="notification_newstopic"></span>
							</div>
							<div style="margin-top:2px;">
								<select name="newstopic" id="newstopic" class="select_submit">
							      <option value="" selected="selected"><?php echo $this->_config[0]['vars']['pleasechoose']; ?>
</option>
							      <option value="technology"><?php echo $this->_config[0]['vars']['technology']; ?>
</option>
							      <option value="sports"><?php echo $this->_config[0]['vars']['sports']; ?>
</option>
							      <option value="health"><?php echo $this->_config[0]['vars']['health']; ?>
</option>
							      <option value="world"><?php echo $this->_config[0]['vars']['world']; ?>
</option>
							      <option value="business"><?php echo $this->_config[0]['vars']['business']; ?>
</option>
							      <option value="offbeat"><?php echo $this->_config[0]['vars']['comedy']; ?>
</option>
							      <option value="politic"><?php echo $this->_config[0]['vars']['socialpolitic']; ?>
</option>
							      <option value="music"><?php echo $this->_config[0]['vars']['musicfilm']; ?>
</option>
							      <option value="other"><?php echo $this->_config[0]['vars']['other']; ?>
</option>
							    </select>			
							</div>
						</div>
						
						<!-- type -->
						<div>
							<div class="label_title_small">
								<?php echo $this->_config[0]['vars']['newstype']; ?>

								<span class="notification" id="notification_newstype"></span>
							</div>
							<div style="margin-top:2px;">
								<select name="newstype" id="newstype" class="select_submit">
							      <option value="" selected="selected"><?php echo $this->_config[0]['vars']['pleasechoose']; ?>
</option>
							      <option value="berita"><?php echo $this->_config[0]['vars']['news']; ?>
</option>
							      <option value="gambar"><?php echo $this->_config[0]['vars']['image']; ?>
</option>
							      <option value="video"><?php echo $this->_config[0]['vars']['video']; ?>
</option>
							    </select>			
							</div>
						</div>
						
						<!-- screenshots link -->
						<div style="margin-top:10px;">
							<input type="checkbox" class="checkboxscreenshot" id="checkboxscreenshot"/>
							<div class="label_title_small"><?php echo $this->_config[0]['vars']['newsusescreenshots']; ?>
</div>
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
						<a href="javascript:void(null);" onclick="go_page('3');" title="<?php echo $this->_config[0]['vars']['next']; ?>
"></a>
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