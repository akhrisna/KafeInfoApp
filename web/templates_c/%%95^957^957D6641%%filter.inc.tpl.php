<?php /* Smarty version 2.6.9, created on 2010-01-17 12:05:42
         compiled from includes/filter.inc.tpl */ ?>
<div id="filter" class="filter">
	<div class="filter_left float_left">
		<div class="filter_left_padding">
			<?php if ($this->_tpl_vars['q']): ?>
				<div class="search_results">
					<h3><?php echo $this->_config[0]['vars']['displayingsearch']; ?>
 <?php echo $this->_tpl_vars['q']; ?>
 (<?php echo $this->_tpl_vars['amt']; ?>
)</h3>
				</div>
			<?php else: ?>
				<div id="filter1" class="normalfilter <?php if ($this->_tpl_vars['type'] == 'all'): ?>filter_left_chosen<?php endif; ?>"><a href="?type=all" title="<?php echo $this->_config[0]['vars']['allmedia']; ?>
"><?php echo $this->_config[0]['vars']['allmedia']; ?>
</a></div>
				<div id="filter2" class="normalfilter <?php if ($this->_tpl_vars['type'] == 'news'): ?>filter_left_chosen<?php endif; ?>"><a href="?type=news" title="<?php echo $this->_config[0]['vars']['news']; ?>
"><?php echo $this->_config[0]['vars']['news']; ?>
</a></div>
				<div id="filter3" class="normalfilter <?php if ($this->_tpl_vars['type'] == 'video'): ?>filter_left_chosen<?php endif; ?>"><a href="?type=video" title="<?php echo $this->_config[0]['vars']['video']; ?>
"><?php echo $this->_config[0]['vars']['video']; ?>
</a></div>
				<div id="filter4" class="normalfilter <?php if ($this->_tpl_vars['type'] == 'image'): ?>filter_left_chosen<?php endif; ?>"><a href="?type=image" title="<?php echo $this->_config[0]['vars']['image']; ?>
"><?php echo $this->_config[0]['vars']['image']; ?>
</a></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="filter_right float_right">
		<div class="filter_right_padding">
			<div class="filter_right_en"><a href="index.php?lang=en" title="English"></a></div>
			<div class="filter_right_ina"><a href="index.php?lang=ina" title="Indonesia"></a></div>
		</div>
	</div>		
</div>