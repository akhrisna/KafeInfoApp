<?php /* Smarty version 2.6.9, created on 2010-01-17 11:06:39
         compiled from wrapper/news.wrap.tpl */ ?>
<!-- javascript section -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "javascript/news.js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- content section -->
<div id="content" class="content">
	<div class="content_left">
		<div class="content_left_padding">
		
			<!-- includes news listing -->
			<div id="newscontent">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "datagrid/news.grid.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
		</div>
	</div>
	
	<!-- the right content (link) -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<!-- bug fix -->
	<div class="mozillaBugFix"></div>
</div>