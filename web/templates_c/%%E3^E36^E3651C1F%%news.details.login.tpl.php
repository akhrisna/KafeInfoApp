<?php /* Smarty version 2.6.9, created on 2009-06-20 18:44:18
         compiled from includes/news.details.login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'includes/news.details.login.tpl', 12, false),)), $this); ?>
<!-- news details login -->
<div class="news_details">
	<div class="news_details_top"></div>
	<div class="news_details_middle">
		<div class="news_details_middle_padding">
			<?php if ($this->_tpl_vars['newsdetails']['screenshot'] != ""): ?>
				<div class="news_details_middle_screenshot">
					<img src="<?php echo $this->_tpl_vars['newsdetails']['screenshot']; ?>
" alt="<?php echo $this->_tpl_vars['newsdetails']['title']; ?>
" class="news_image_thumbnail"/>
				</div>
			<?php endif; ?>
			<div class="news_details_middle_news">
				<h3><a href="<?php echo $this->_tpl_vars['newsdetails']['link']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['newsdetails']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['newsdetails']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></h3>
				<span>
					 <?php echo $this->_config[0]['vars']['by']; ?>
 <a href="profile.php?id=<?php echo $this->_tpl_vars['newsdetails']['user_id']; ?>
" title="<?php echo $this->_tpl_vars['newsinfo']['owner']; ?>
"><?php echo $this->_tpl_vars['newsinfo']['owner']; ?>
</a>, <?php echo $this->_tpl_vars['newsinfo']['date_posted']; ?>
.
				</span>
				<p>
					<span class="color_gray"><?php echo ((is_array($_tmp=$this->_tpl_vars['newslink']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span> - <?php echo ((is_array($_tmp=$this->_tpl_vars['newsdetails']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				</p>
			</div>
		</div>
		
		<!-- mozilla bug -->
		<div class="mozillaBugFix"></div>
	</div>
	<div class="news_details_bottom">
		<div class="news_details_bottom_padding">
			<div class="news_voting float_left">
				<div class="float_left details_voting_text"><?php echo $this->_config[0]['vars']['vote']; ?>
</div> 
				<div class="details_voting_number float_left">
					<div id="news_galli_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
">
						<?php echo $this->_tpl_vars['newsdetails']['galli']; ?>

					</div>
				</div>
			</div>
						<?php if ($this->_tpl_vars['user']['id'] != $this->_tpl_vars['newsdetails']['user_id']): ?>
			
				<!-- the vote up bar -->
				<?php if ($this->_tpl_vars['voted']['up'] == 'true'): ?>
					<div class="details_voted float_left" id="link_bar_up_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
"><a href="javascript:void(null);" title="<?php echo $this->_config[0]['vars']['voteup']; ?>
"><?php echo $this->_config[0]['vars']['voted']; ?>
</a></div>
				<?php else: ?>
					<div class="details_vote_up float_left" id="link_bar_up_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
"><a href="javascript:voteup('<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
','bar_up_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
');" title="<?php echo $this->_config[0]['vars']['voteup']; ?>
" id="bar_up_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
"><?php echo $this->_config[0]['vars']['voteup']; ?>
</a></div>
				<?php endif; ?>
				
				<!-- the vote down bar -->
				<?php if ($this->_tpl_vars['voted']['down'] == 'true'): ?>
					<div class="details_voted float_left"  id="link_bar_down_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
"><a href="javascript:void(null);" style="margin-right:13px;" title="<?php echo $this->_config[0]['vars']['votedown']; ?>
"><?php echo $this->_config[0]['vars']['buried']; ?>
</a></div>
				<?php else: ?>
					<div class="details_vote_down float_left" id="link_bar_down_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
"><a style="margin-right:13px;" href="javascript:votedown('<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
','bar_down_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
');" id="bar_down_<?php echo $this->_tpl_vars['newsdetails']['id']; ?>
" title="<?php echo $this->_config[0]['vars']['votedown']; ?>
"><?php echo $this->_config[0]['vars']['votedown']; ?>
</a></div>
				<?php endif; ?>
			<?php endif; ?>
			
			<!-- report news -->
			<?php if ($this->_tpl_vars['reported'] != 'true'): ?>
				<div class="details_vote_information float_left" id="report_bar"><a href="javascript:report_news();" style="width:110px;" title="<?php echo $this->_config[0]['vars']['reportnewstext']; ?>
" id="report_link"><?php echo $this->_config[0]['vars']['reportnews']; ?>
</a></div>
			<?php else: ?>
				<div class="details_vote_information reported_voted float_left" id="report_bar"><a href="javascript:void(null);" style="width:110px;" title="<?php echo $this->_config[0]['vars']['reported']; ?>
" id="report_link"><?php echo $this->_config[0]['vars']['reported']; ?>
</a></div>
			<?php endif; ?>
			
			<!-- favorite news -->
			<?php if ($this->_tpl_vars['favorite'] != 'true'): ?>
				<div class="details_vote_favorite float_left" id="favorite_bar"><a href="javascript:save_news();" style="width:110px;" title="<?php echo $this->_config[0]['vars']['favoritenews']; ?>
" id="favorite_link"><?php echo $this->_config[0]['vars']['favoritenews']; ?>
</a></div>
			<?php else: ?>
				<div class="details_vote_favorite favorite_voted float_left"><a href="javascript:void(null);" style="width:110px;" title="<?php echo $this->_config[0]['vars']['saved']; ?>
"><?php echo $this->_config[0]['vars']['saved']; ?>
</a></div>
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- news link -->
<div class="news_comments_info">
	<div class="news_comments_right_add">
		<a href="javascript:show_commentbox();" title="<?php echo $this->_config[0]['vars']['addcomments']; ?>
"><?php echo $this->_config[0]['vars']['addcomment']; ?>
</a>
	</div>
	<div class="news_comments_right_show">
		<div class="news_comments_right_show_padding">
			<a href="#" onclick="reload_comments();" title="<?php echo $this->_config[0]['vars']['reloadcomment']; ?>
"><span id="comment_amt"><?php echo $this->_tpl_vars['newsinfo']['commentamount']; ?>
</span> <?php echo $this->_config[0]['vars']['commentsmall']; ?>
</a>
		</div>
	</div>
	
	<!-- mozilla bug -->
	<div class="mozillaBugFix"></div>
</div>

<!-- news comments -->
<div class="news_comments">
	<div class="news_comments_top"></div>
	<div class="news_comments_middle">
		<div class="news_comments_middle_padding" id="news_comments_content">
			
			<!-- comments content -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/comments.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
	<div class="news_comments_bottom"></div>
</div>