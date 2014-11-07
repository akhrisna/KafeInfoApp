<?php /* Smarty version 2.6.9, created on 2009-06-20 18:44:18
         compiled from includes/header.inc.tpl */ ?>
<div id="header" class="header">
	<div id="header_wrapper" class="header_wrapper">
		
		<!-- logo section -->
		<?php if ($this->_tpl_vars['logo_section']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['logo_section']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		
		<!-- the search section -->
		<div class="search">
			<div class="search_padding">
				<form name="searchform" method="get" action="search.php">
					<div class="search_left"></div>
					<input type="text" class="input_search" name="q" value="<?php echo $this->_tpl_vars['q']; ?>
"/>
					<div class="search_right"></div>
					<a href="javascript:document.searchform.submit();" title="<?php echo $this->_config[0]['vars']['search']; ?>
"></a>
				</form>
			</div>
		</div>
	</div>
</div>