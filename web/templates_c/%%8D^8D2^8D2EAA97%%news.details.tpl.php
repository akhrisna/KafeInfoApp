<?php /* Smarty version 2.6.9, created on 2009-06-20 19:28:26
         compiled from includes/news.details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'includes/news.details.tpl', 12, false),)), $this); ?>
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
					<div id="news_galli_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
">
						<?php echo $this->_tpl_vars['newsdetails']['galli']; ?>

					</div>
				</div>
			</div>
			
			<!-- the vote bar -->
			<div class="details_vote_up float_left" id="link_bar_up_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><a href="javascript:Tip('<?php echo $this->_config[0]['vars']['pleaseloginvotingup']; ?>
');" title="<?php echo $this->_config[0]['vars']['voteup']; ?>
"><?php echo $this->_config[0]['vars']['voteup']; ?>
</a></div>
			<div class="details_vote_down float_left" id="link_bar_down_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><a href="javascript:Tip('<?php echo $this->_config[0]['vars']['pleaseloginvotingdown']; ?>
');" style="margin-right:13px;" title="<?php echo $this->_config[0]['vars']['votedown']; ?>
"><?php echo $this->_config[0]['vars']['votedown']; ?>
</a></div>
			
			<!-- report news -->
			<div class="details_vote_information float_left"><a href="javascript:Tip('<?php echo $this->_config[0]['vars']['pleaseloginreport']; ?>
');" style="width:120px;" title="<?php echo $this->_config[0]['vars']['reportnewstext']; ?>
"><?php echo $this->_config[0]['vars']['reportnews']; ?>
</a></div>
		
			<!-- favorite news -->
			<div class="details_vote_favorite float_left"><a href="javascript:Tip('<?php echo $this->_config[0]['vars']['pleaseloginfavorite']; ?>
');" style="width:110px;" title="<?php echo $this->_config[0]['vars']['favoritenews']; ?>
"><?php echo $this->_config[0]['vars']['favoritenews']; ?>
</a></div>
		</div>
	</div>
</div>

<!-- news link -->
<div class="news_comments_info">
	<div class="news_comments_right_add">
		<a href="javascript:Tip('<?php echo $this->_config[0]['vars']['pleaselogincomment']; ?>
');" title="<?php echo $this->_config[0]['vars']['addcomments']; ?>
"><?php echo $this->_config[0]['vars']['addcomment']; ?>
</a>
	</div>
	<div class="news_comments_right_show">
		<div class="news_comments_right_show_padding">
			<a href="javascript:void(null);" onclick="reload_comments();" title="<?php echo $this->_config[0]['vars']['reloadcomment']; ?>
"><?php echo $this->_tpl_vars['newsinfo']['commentamount']; ?>
 <?php echo $this->_config[0]['vars']['commentsmall']; ?>
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