<?php /* Smarty version 2.6.9, created on 2010-06-11 13:41:23
         compiled from datagrid/news.login.grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'datagrid/news.login.grid.tpl', 16, false),array('modifier', 'truncate', 'datagrid/news.login.grid.tpl', 16, false),)), $this); ?>
<!-- news list -->
<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['news_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list']['show'] = true;
$this->_sections['list']['max'] = $this->_sections['list']['loop'];
$this->_sections['list']['step'] = 1;
$this->_sections['list']['start'] = $this->_sections['list']['step'] > 0 ? 0 : $this->_sections['list']['loop']-1;
if ($this->_sections['list']['show']) {
    $this->_sections['list']['total'] = $this->_sections['list']['loop'];
    if ($this->_sections['list']['total'] == 0)
        $this->_sections['list']['show'] = false;
} else
    $this->_sections['list']['total'] = 0;
if ($this->_sections['list']['show']):

            for ($this->_sections['list']['index'] = $this->_sections['list']['start'], $this->_sections['list']['iteration'] = 1;
                 $this->_sections['list']['iteration'] <= $this->_sections['list']['total'];
                 $this->_sections['list']['index'] += $this->_sections['list']['step'], $this->_sections['list']['iteration']++):
$this->_sections['list']['rownum'] = $this->_sections['list']['iteration'];
$this->_sections['list']['index_prev'] = $this->_sections['list']['index'] - $this->_sections['list']['step'];
$this->_sections['list']['index_next'] = $this->_sections['list']['index'] + $this->_sections['list']['step'];
$this->_sections['list']['first']      = ($this->_sections['list']['iteration'] == 1);
$this->_sections['list']['last']       = ($this->_sections['list']['iteration'] == $this->_sections['list']['total']);
?>
	<div class="news">
		<div class="news_top">
			<div class="news_top_padding">
				<?php if ($this->_tpl_vars['news_list'][$this->_sections['list']['index']]['screenshot'] != ""): ?>
					<?php if ($this->_tpl_vars['news_list'][$this->_sections['list']['index']]['screenshot'] != $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['link']): ?>
						<div class="news_top_thumbnail">
							<a href="<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['link']; ?>
" title="" target="_blank">
								<img src="<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['screenshot']; ?>
" alt="" class="news_image_thumbnail" />
							</a>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				<div class="news_top_paddinginside">
					<h3><a href="<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['link']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['news_list'][$this->_sections['list']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" target="_blank"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['news_list'][$this->_sections['list']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 90) : smarty_modifier_truncate($_tmp, 90)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></h3>
					<p class="news_listdescription">
						<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['news_list'][$this->_sections['list']['index']]['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

					</p>
				</div>
			</div>	
		</div>
		<div class="news_middle">
			<div class="news_middle_padding">
				<div class="news_middle_left float_left">
					<a href="details.php?id=<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
" title="<?php echo $this->_config[0]['vars']['viewcomment']; ?>
"><?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['commentamount']; ?>
 <?php echo $this->_config[0]['vars']['comments']; ?>
</a>
				</div>
				<div class="news_middle_right float_right">
					<a href="details.php?id=<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
" title="<?php echo $this->_config[0]['vars']['viewdetails']; ?>
"><?php echo $this->_config[0]['vars']['viewdetails']; ?>
</a>
				</div>
			</div>
		</div>
		<div class="news_bottom">
			<div class="news_bottom_padding">
				<div class="news_bottom_left float_left">
					<div class="news_voting float_left">
						<div class="float_left news_voting_text"><?php echo $this->_config[0]['vars']['vote']; ?>
</div> 
						<div class="news_voting_number float_left">
							<div id="news_galli_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
">
								<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['galli']; ?>

							</div>
						</div>
					</div>
					
										<?php if ($this->_tpl_vars['user']['id'] != $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['user_id']): ?>
					
												<?php if ($this->_tpl_vars['news_list'][$this->_sections['list']['index']]['voted'] == 'true'): ?>
							<div class="news_voted" id="link_bar_up_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><a href="javascript:void(null);" title="<?php echo $this->_config[0]['vars']['voted']; ?>
" id="bar_up_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><?php echo $this->_config[0]['vars']['voted']; ?>
</a></div>
						<?php else: ?>
							<div class="news_vote_up" id="link_bar_up_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><a href="javascript:voteup('<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
','bar_up_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
');" title="<?php echo $this->_config[0]['vars']['voteup']; ?>
" id="bar_up_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><?php echo $this->_config[0]['vars']['voteup']; ?>
</a></div>
						<?php endif; ?>
						
												<?php if ($this->_tpl_vars['news_list'][$this->_sections['list']['index']]['buried'] == 'true'): ?>
							<div class="news_voted" id="link_bar_down_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><a href="javascript:void(null);" title="<?php echo $this->_config[0]['vars']['buried']; ?>
" id="bar_down_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><?php echo $this->_config[0]['vars']['buried']; ?>
</a></div>
						<?php else: ?>
							<div class="news_vote_down" id="link_bar_down_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><a href="javascript:votedown('<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
','bar_down_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
');" title="<?php echo $this->_config[0]['vars']['votedown']; ?>
" id="bar_down_<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['id']; ?>
"><?php echo $this->_config[0]['vars']['votedown']; ?>
</a></div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="news_bottom_right float_right">
					<?php echo $this->_config[0]['vars']['postedby']; ?>
<a href="profile.php?id=<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['user_id']; ?>
" title="<?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['owner']; ?>
"> <?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['owner']; ?>
</a> <?php echo $this->_config[0]['vars']['at']; ?>
 <?php echo $this->_tpl_vars['news_list'][$this->_sections['list']['index']]['date_posted']; ?>
. 
				</div>
			</div>
		</div>
	</div>
<?php endfor; else: ?>
	<div class="news_empty">
		<div class="news_empty_padding">
			<h3><?php echo $this->_config[0]['vars']['nonews']; ?>
</h3>
		</div>
	</div>
<?php endif; ?>