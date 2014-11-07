<?php /* Smarty version 2.6.9, created on 2009-06-21 00:05:44
         compiled from submit.tpl */ ?>
<?php if ($this->_tpl_vars['login'] == 'true'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "javascript/submit.js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

<!-- profile page -->
<div class="comments">
	<div class="comments_padding">
	
				<?php if ($this->_tpl_vars['login'] == 'true'): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/submit.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
	</div>
</div>