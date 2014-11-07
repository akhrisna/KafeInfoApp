<?php /* Smarty version 2.6.9, created on 2009-08-01 10:08:56
         compiled from includes/static.gradientdashboard.tpl */ ?>
<div class="link_static">
	<div class="link_static_left float_left">
		<div class="link_static_left_padding">
			<?php if ($this->_tpl_vars['language'] == 'en'): ?>
				<span class="color_orange"><?php echo $this->_tpl_vars['userinfo']['username']; ?>
's</span> Dashboard
			<?php else: ?>
				Dashboard <span class="color_orange"><?php echo $this->_tpl_vars['userinfo']['username']; ?>
</span></a>
			<?php endif; ?>
		</div>
	</div>
	<div class="link_static_right_long float_right">
		<div class="link_static_right_padding">
			<ul>
								<?php if ($this->_tpl_vars['userinfo']['id'] == $this->_tpl_vars['user']['id']): ?>
					<li <?php if ($this->_tpl_vars['staticpage'] == 'tools'): ?>class="gradient_link_chosen"<?php endif; ?>><a href="tools.php"><?php echo $this->_config[0]['vars']['tools']; ?>
</a></li>
					<li <?php if ($this->_tpl_vars['staticpage'] == 'submit'): ?>class="gradient_link_chosen"<?php endif; ?>><a href="submit.php" title="<?php echo $this->_config[0]['vars']['submitnews']; ?>
"><?php echo $this->_config[0]['vars']['submitnews']; ?>
</a></li>
				<?php endif; ?>
				<li <?php if ($this->_tpl_vars['staticpage'] == 'news'): ?>class="gradient_link_chosen"<?php endif; ?>><a href="news.php?id=<?php echo $this->_tpl_vars['userinfo']['id']; ?>
" title="<?php echo $this->_config[0]['vars']['news']; ?>
"><?php echo $this->_config[0]['vars']['news']; ?>
</a></li>
				<li <?php if ($this->_tpl_vars['staticpage'] == 'comments'): ?>class="gradient_link_chosen"<?php endif; ?>><a href="comments.php?id=<?php echo $this->_tpl_vars['userinfo']['id']; ?>
" title="<?php echo $this->_config[0]['vars']['comments']; ?>
"><?php echo $this->_config[0]['vars']['comments']; ?>
</a></li>
				<li <?php if ($this->_tpl_vars['staticpage'] == 'favourites'): ?>class="gradient_link_chosen"<?php endif; ?>><a href="favourites.php?id=<?php echo $this->_tpl_vars['userinfo']['id']; ?>
" title="<?php echo $this->_config[0]['vars']['favorites']; ?>
"><?php echo $this->_config[0]['vars']['favorites']; ?>
</a></li>
				<li <?php if ($this->_tpl_vars['staticpage'] == 'profile'): ?>class="gradient_link_chosen"<?php endif; ?>><a href="profile.php?id=<?php echo $this->_tpl_vars['userinfo']['id']; ?>
" title="<?php echo $this->_config[0]['vars']['profile']; ?>
"><?php echo $this->_config[0]['vars']['profile']; ?>
</a></li>
			</ul>
		</div>
	</div>
</div>