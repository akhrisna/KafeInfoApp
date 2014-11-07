<?php /* Smarty version 2.6.9, created on 2009-06-25 14:37:42
         compiled from datagrid/comment.grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'datagrid/comment.grid.tpl', 5, false),)), $this); ?>
<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<div id="comment_<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['id']; ?>
" onmouseover="changebg('in','comment_<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['id']; ?>
');" onmouseout="changebg('out', 'comment_<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['id']; ?>
');" class="<?php if ($this->_sections['mysec']['iteration'] % 2 == 1): ?>comment_single_gray<?php else: ?>comment_single<?php endif; ?>">
		<div class="comments_single_padding">
			<div class="comment_header_comment" onclick="parent.location='details.php?id=<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['news_id']; ?>
'">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['comment'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 65) : smarty_modifier_truncate($_tmp, 65)); ?>

			</div>
			<div class="comment_header_news" onclick="parent.location='details.php?id=<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['news_id']; ?>
'">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['newstitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 65) : smarty_modifier_truncate($_tmp, 65)); ?>

			</div
			<div class="comment_header_date" onclick="parent.location='details.php?id=<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['news_id']; ?>
'">
					<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec']['index']]['datetime']; ?>

			</div>
		</div>
	</div>
<?php endfor; else: ?>
	<div class="comment_empty">
		<div class="comments_single_padding">
			<h3><?php echo $this->_config[0]['vars']['nocomments']; ?>
</h3>
		</div>
	</div>
<?php endif; ?>