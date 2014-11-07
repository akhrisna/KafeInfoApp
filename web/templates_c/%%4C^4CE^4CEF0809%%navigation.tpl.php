<?php /* Smarty version 2.6.9, created on 2009-08-01 11:10:44
         compiled from navigation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'navigation.tpl', 30, false),)), $this); ?>
<?php echo '
	<script type="text/javascript">
		function toggle_sidecontent(type) {
			if(type == "popular") {
				$(\'#content_popularnews\').slideToggle(\'600\');
			} else {
				$(\'#content_latestnews\').slideToggle(\'600\');
			}
		}
	</script>
'; ?>


<!-- distinguish if user is login or not -->
<div class="content_right">
	<div class="content_right_padding">
		<?php if ($this->_tpl_vars['login']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/navigationlogin.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/navigation.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		
		<!-- the popular news -->
		<div class="content_side">
			<div class="content_side_top"><a href="javascript:toggle_sidecontent('popular');" title="<?php echo $this->_config[0]['vars']['topnews']; ?>
"><?php echo $this->_config[0]['vars']['topnews']; ?>
</a></div>
			<div class="content_side_middle" id="content_popularnews">
				<div class="navigation_loginbox_top"></div>
				<div class="content_side_middle_padding">
					<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['popularnews']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<div <?php if ($this->_sections['mysec']['iteration'] == 1): ?>class="content_side_inner_top"<?php elseif ($this->_sections['mysec']['iteration'] == 5): ?>class="content_side_inner_bottom"<?php else: ?>class="content_side_inner"<?php endif; ?>>
							<a href='details.php?id=<?php echo $this->_tpl_vars['popularnews'][$this->_sections['mysec']['index']]['id']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['popularnews'][$this->_sections['mysec']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 54) : smarty_modifier_truncate($_tmp, 54)); ?>
</a>
						</div>
					<?php endfor; else: ?>
						<div class="content_side_empty">
							<?php echo $this->_config[0]['vars']['newsnotfound']; ?>
.
						</div>
					<?php endif; ?>
				</div>
				<div class="navigation_loginbox_bottom"></div>
			</div>
			<div class="content_side_bottom"></div>
		</div>
		
		<!-- the newest news -->
		<div class="content_side">
			<div class="content_side_top"><a href="javascript:toggle_sidecontent('new');" title="<?php echo $this->_config[0]['vars']['newnews']; ?>
"><?php echo $this->_config[0]['vars']['newnews']; ?>
</a></div>
			<div class="content_side_middle" id="content_latestnews">
				<div class="navigation_loginbox_top"></div>
				<div class="content_side_middle_padding">
					<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['latestnews']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<div <?php if ($this->_sections['mysec']['iteration'] == 1): ?>class="content_side_inner_top"<?php elseif ($this->_sections['mysec']['iteration'] == 5): ?>class="content_side_inner_bottom"<?php else: ?>class="content_side_inner"<?php endif; ?>>
							<a href='details.php?id=<?php echo $this->_tpl_vars['latestnews'][$this->_sections['mysec']['index']]['id']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['latestnews'][$this->_sections['mysec']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 54) : smarty_modifier_truncate($_tmp, 54)); ?>
</a>
						</div>
					<?php endfor; else: ?>
						<div class="content_side_empty">
							<?php echo $this->_config[0]['vars']['newsnotfound']; ?>
.
						</div>
					<?php endif; ?>
				</div>
				<div class="navigation_loginbox_bottom"></div>
			</div>
			<div class="content_side_bottom"></div>
		</div>
		
		<!-- <a href='http://www.bubuawards.com/' target='_blank' title="Bubu Awards Participant"><img src='images/ic_bubu.gif' alt='bubu awards' style="margin-top:10px; margin-left:1px;"/></a> -->
	</div>
</div>