<?php /* Smarty version 2.6.9, created on 2009-06-20 18:44:18
         compiled from detailscontent.tpl */ ?>
<!-- javascript section -->
<?php if ($this->_tpl_vars['login']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "javascript/news.detailslogin.js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  else: ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "javascript/news.details.js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

<!-- details -->
<div class="details">

	<!-- details top -->
	<div class="details_top"></div>
	
	<!-- details middle -->
	<div class="details_middle">
	
		<!-- news list section -->
		<?php if ($this->_tpl_vars['login']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/news.details.login.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/news.details.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
	</div>
	
	<!-- details bottom -->
	<div class="details_bottom">
		
		<!-- footer text -->
		<div class="details_bottom_footer">
			<div class="details_bottom_footer_left">
				<div class="details_bottom_footer_left_padding">
					<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" target="_blank" title="Creative Commons License">Kafeinfo Bookmarking Sosial &copy; 2008.</a>
				</div>
			</div>
			<div class="details_bottom_footer_right">
				<div class="details_bottom_footer_right_padding">
					<a href="about.php" title="<?php echo $this->_config[0]['vars']['aboutkafeinfo']; ?>
"><?php echo $this->_config[0]['vars']['aboutkafeinfo']; ?>
</a> &nbsp; 
					<a href="http://blog.kafeinfo.com" title="<?php echo $this->_config[0]['vars']['developersblog']; ?>
"><?php echo $this->_config[0]['vars']['developersblog']; ?>
</a> &nbsp;
										<?php if ($this->_tpl_vars['login'] == 'true'): ?>
						<a href="logout.php" title="<?php echo $this->_config[0]['vars']['logout']; ?>
"><?php echo $this->_config[0]['vars']['logout']; ?>
</a>
					<?php else: ?>
						<a href="register.php" title="<?php echo $this->_config[0]['vars']['register']; ?>
"><?php echo $this->_config[0]['vars']['register']; ?>
</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>