<?php /* Smarty version 2.6.9, created on 2009-06-20 18:47:47
         compiled from includes/footer.inc.tpl */ ?>
<div id="footer" class="footer">
	<div class="footer_top">
		<div class="footer_top_paging">
			<div class="footer_top_paging_padding">
				<!-- paging section -->
				<?php if ($this->_tpl_vars['paging_section']): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['paging_section']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="footer_bottom">
		<div class="footer_left">
			<div class="footer_left_padding">
				<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" target="_blank" title="Creative Commons License">Kafeinfo Bookmarking Sosial &copy; 2008.</a>
			</div>
		</div>
		<div class="footer_right">
			<div class="footer_right_padding">
				<a href="about.php" title="<?php echo $this->_config[0]['vars']['aboutkafeinfo']; ?>
"><?php echo $this->_config[0]['vars']['aboutkafeinfo']; ?>
</a>  &nbsp;
				<a href="http://blog.kafeinfo.com" title="<?php echo $this->_config[0]['vars']['developersblog']; ?>
"><?php echo $this->_config[0]['vars']['developersblog']; ?>
</a>  &nbsp;
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