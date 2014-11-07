<?php /* Smarty version 2.6.9, created on 2009-06-21 13:48:11
         compiled from includes/favourites.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'includes/favourites.inc.tpl', 20, false),)), $this); ?>
<!-- the header -->
<div class="comments_header">
	<div class="comment_header_title">
		<div class="comment_header_comment_long">
			<?php echo $this->_config[0]['vars']['news']; ?>

		</div>
		<div class="comment_header_date">
			<?php echo $this->_config[0]['vars']['date']; ?>

		</div>
	</div>
</div>
<div class="header_separator"></div>

<!-- the content -->
<div class="comments_content" id="favourite_content">
	<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['favourites']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mysec']['show'] = true;
$this->_sections['mysec']['max'] = $this->_sections['mysec']['loop'];
$this->_sections['mysec']['step'] = 1;
$this->_sections['mysec']['start'] = $this->_sections['mysec']['step'] > 0 ? 0 : $this->_sections['mysec']['loop']-1;
if ($this->_sections['mysec']['show']) {
    $this->_sections['mysec']['total'] = $this->_sections['mysec']['loop'];
    if ($this->_sections['mysec']['total'] == 0)
        $this->_sections['mysec']['show'] = false;
} else
    $this->_sections['mysec']['total'] = 0;
if ($this->_sections['mysec']['show']):

            for ($this->_sections['mysec']['index'] = $this->_sections['mysec']['start'], $this->_sections['mysec']['iteration'] = 1;
                 $this->_sections['mysec']['iteration'] <= $this->_sections['mysec']['total'];
                 $this->_sections['mysec']['index'] += $this->_sections['mysec']['step'], $this->_sections['mysec']['iteration']++):
$this->_sections['mysec']['rownum'] = $this->_sections['mysec']['iteration'];
$this->_sections['mysec']['index_prev'] = $this->_sections['mysec']['index'] - $this->_sections['mysec']['step'];
$this->_sections['mysec']['index_next'] = $this->_sections['mysec']['index'] + $this->_sections['mysec']['step'];
$this->_sections['mysec']['first']      = ($this->_sections['mysec']['iteration'] == 1);
$this->_sections['mysec']['last']       = ($this->_sections['mysec']['iteration'] == $this->_sections['mysec']['total']);
?>
		<div id="favourites_<?php echo $this->_tpl_vars['favourites'][$this->_sections['mysec']['index']]['id']; ?>
" onmouseover="changebg('in','favourites_<?php echo $this->_tpl_vars['favourites'][$this->_sections['mysec']['index']]['id']; ?>
');" onmouseout="changebg('out', 'favourites_<?php echo $this->_tpl_vars['favourites'][$this->_sections['mysec']['index']]['id']; ?>
');" class="<?php if ($this->_sections['mysec']['iteration'] % 2 == 1): ?>favourite_single_gray<?php else: ?>favourite_single<?php endif; ?>">
			<div class="comments_single_padding">
				<div class="comment_header_comment_long" onclick="parent.location='details.php?id=<?php echo $this->_tpl_vars['favourites'][$this->_sections['mysec']['index']]['news_id']; ?>
'">
					<?php echo ((is_array($_tmp=$this->_tpl_vars['favourites'][$this->_sections['mysec']['index']]['newstitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>

				</div>
				<div class="comment_header_date" onclick="parent.location='details.php?id=<?php echo $this->_tpl_vars['favourites'][$this->_sections['mysec']['index']]['news_id']; ?>
'">
					<?php echo $this->_tpl_vars['favourites'][$this->_sections['mysec']['index']]['datetime']; ?>

				</div>
			</div>
		</div>
	<?php endfor; else: ?>
		<div class="comment_empty">
			<div class="comments_single_padding">
				<h3><?php echo $this->_config[0]['vars']['nosavednews']; ?>
</h3>
			</div>
		</div>
	<?php endif; ?>
</div>
<div class="header_separator_bottom"></div>

<!-- paging -->
<div class="comments_top_paging">
	<div class="comments_top_paging_padding">
		
		<!-- the paging -->
		<div class="dashboard_paging">
			<div class="dashboard_paging_padding">
				<ul>
					<li class="btn_first" id="news_paging_first"><a href="javascript:void(null);" onclick="paging('1');"></a></li>
					<li class="btn_previous" id="news_paging_previous"><a href="javascript:void(null);" onclick="paging('<?php echo $this->_tpl_vars['next']-1; ?>
');"></a></li>
					<li class="news_paging_number" id="news_paging_number"><?php if ($this->_tpl_vars['page'] == 0):  else:  echo $this->_tpl_vars['page'];  endif; ?></li>
					<li class="btn_next" id="news_paging_next"><a href="javascript:void(null);" onclick="paging('<?php echo $this->_tpl_vars['next']; ?>
');"></a></li>
					<li class="btn_last" id="news_paging_last"><a href="javascript:void(null);" onclick="paging('<?php echo $this->_tpl_vars['last']; ?>
');"></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>