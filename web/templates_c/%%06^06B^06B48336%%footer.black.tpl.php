<?php /* Smarty version 2.6.9, created on 2009-06-20 18:48:28
         compiled from includes/footer.black.tpl */ ?>
<div id="footer_black" class="footer_black">
	<div class="footer_black_left">
		<div class="footer_black_left_padding">
			<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" target="_blank" title="Creative Commons License">Kafeinfo Bookmarking Sosial &copy; 2008.</a>
		</div>
	</div>
	<div class="footer_black_right">
		<div class="footer_black_right_padding">
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