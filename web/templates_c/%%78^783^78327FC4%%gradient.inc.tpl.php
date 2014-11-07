<?php /* Smarty version 2.6.9, created on 2009-06-20 18:44:18
         compiled from includes/gradient.inc.tpl */ ?>
<div id="gradient" class="gradient">
	<div id="gradient_wrapper" class="gradient_wrapper">
		<?php if ($this->_tpl_vars['gradient_content']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['gradient_content']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<div class="gradient_wrapper_padding">
				<div class="gradient_wrapper_left">
					<?php echo $this->_tpl_vars['hometext']; ?>

				</div>
				<div class="gradient_wrapper_right">
					<a href="syndication.php?topic=<?php echo $this->_tpl_vars['topic']; ?>
" title="RSS 2.0"></a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>