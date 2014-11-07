<?php /* Smarty version 2.6.9, created on 2009-11-24 03:48:43
         compiled from datagrid/newsdashboard.grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'datagrid/newsdashboard.grid.tpl', 5, false),)), $this); ?>
<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<div id="news_<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
" onmouseover="changebg('in','news_<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
');" onmouseout="changebg('out', 'news_<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
');" class="<?php if ($this->_sections['mysec']['iteration'] % 2 == 1): ?>news_single_gray<?php else: ?>news_single<?php endif; ?>">
		<div class="comments_single_padding">
			<div class="comment_header_comment_long" onclick="parent.location='details.php?id=<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
'">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['news'][$this->_sections['mysec']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>

			</div>
			<div class="comment_header_date" onclick="parent.location='details.php?id=<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
'">
				<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['date_posted']; ?>

			</div>
		</div>
	</div>
<?php endfor; endif; ?>