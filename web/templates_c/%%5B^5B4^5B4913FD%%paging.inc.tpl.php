<?php /* Smarty version 2.6.9, created on 2009-06-20 18:47:47
         compiled from includes/paging.inc.tpl */ ?>
<!-- the paging -->
<div class="news_paging">
	<div class="news_paging_padding">
		<?php if ($this->_tpl_vars['q']): ?>
			<ul>
				<li class="btn_first" id="news_paging_first"><a href="javascript:void(null);" onclick="pagingsearch('<?php echo $this->_tpl_vars['q']; ?>
','1');"></a></li>
				<li class="btn_previous" id="news_paging_previous"><a href="javascript:void(null);" onclick="pagingsearch('<?php echo $this->_tpl_vars['q']; ?>
','<?php echo $this->_tpl_vars['next']-1; ?>
');"></a></li>
				<li class="news_paging_number" id="news_paging_number"><?php if ($this->_tpl_vars['page'] == 0):  else:  echo $this->_tpl_vars['page'];  endif; ?></li>
				<li class="btn_next" id="news_paging_next"><a href="javascript:void(null);" onclick="pagingsearch('<?php echo $this->_tpl_vars['q']; ?>
','<?php echo $this->_tpl_vars['next']; ?>
');"></a></li>
				<li class="btn_last" id="news_paging_last"><a href="javascript:void(null);" onclick="pagingsearch('<?php echo $this->_tpl_vars['q']; ?>
','<?php echo $this->_tpl_vars['last']; ?>
');"></a></li>
			</ul>
		<?php else: ?>
			<ul>
				<li class="btn_first" id="news_paging_first"><a href="javascript:void(null);" onclick="paging('<?php echo $this->_tpl_vars['topic']; ?>
','<?php echo $this->_tpl_vars['type']; ?>
','1');"></a></li>
				<li class="btn_previous" id="news_paging_previous"><a href="javascript:void(null);" onclick="paging('<?php echo $this->_tpl_vars['topic']; ?>
','<?php echo $this->_tpl_vars['type']; ?>
','<?php echo $this->_tpl_vars['next']-1; ?>
');"></a></li>
				<li class="news_paging_number" id="news_paging_number"><?php if ($this->_tpl_vars['page'] == 0):  else:  echo $this->_tpl_vars['page'];  endif; ?></li>
				<li class="btn_next" id="news_paging_next"><a href="javascript:void(null);" onclick="paging('<?php echo $this->_tpl_vars['topic']; ?>
','<?php echo $this->_tpl_vars['type']; ?>
','<?php echo $this->_tpl_vars['next']; ?>
');"></a></li>
				<li class="btn_last" id="news_paging_last"><a href="javascript:void(null);" onclick="paging('<?php echo $this->_tpl_vars['topic']; ?>
','<?php echo $this->_tpl_vars['type']; ?>
','<?php echo $this->_tpl_vars['last']; ?>
');"></a></li>
			</ul>
		<?php endif; ?>
	</div>
</div>