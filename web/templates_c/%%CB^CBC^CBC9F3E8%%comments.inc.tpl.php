<?php /* Smarty version 2.6.9, created on 2009-06-20 18:44:18
         compiled from includes/comments.inc.tpl */ ?>
<!-- the comments -->
<?php unset($this->_sections['comment']);
$this->_sections['comment']['name'] = 'comment';
$this->_sections['comment']['loop'] = is_array($_loop=$this->_tpl_vars['newscomments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['comment']['show'] = true;
$this->_sections['comment']['max'] = $this->_sections['comment']['loop'];
$this->_sections['comment']['step'] = 1;
$this->_sections['comment']['start'] = $this->_sections['comment']['step'] > 0 ? 0 : $this->_sections['comment']['loop']-1;
if ($this->_sections['comment']['show']) {
    $this->_sections['comment']['total'] = $this->_sections['comment']['loop'];
    if ($this->_sections['comment']['total'] == 0)
        $this->_sections['comment']['show'] = false;
} else
    $this->_sections['comment']['total'] = 0;
if ($this->_sections['comment']['show']):

            for ($this->_sections['comment']['index'] = $this->_sections['comment']['start'], $this->_sections['comment']['iteration'] = 1;
                 $this->_sections['comment']['iteration'] <= $this->_sections['comment']['total'];
                 $this->_sections['comment']['index'] += $this->_sections['comment']['step'], $this->_sections['comment']['iteration']++):
$this->_sections['comment']['rownum'] = $this->_sections['comment']['iteration'];
$this->_sections['comment']['index_prev'] = $this->_sections['comment']['index'] - $this->_sections['comment']['step'];
$this->_sections['comment']['index_next'] = $this->_sections['comment']['index'] + $this->_sections['comment']['step'];
$this->_sections['comment']['first']      = ($this->_sections['comment']['iteration'] == 1);
$this->_sections['comment']['last']       = ($this->_sections['comment']['iteration'] == $this->_sections['comment']['total']);
?>
	
	<!-- the comment block -->
	<div class="comments_block">
		<div class="comments_block_padding">
			<div class="comments_block_thumb">
				<img src='<?php echo $this->_tpl_vars['newscomments'][$this->_sections['comment']['index']]['avatar']; ?>
' alt='<?php echo $this->_tpl_vars['newscomments'][$this->_sections['comment']['index']]['avatar']; ?>
'/>
			</div>
			<div class="comments_block_name">
				<h4><a href='profile.php?id=<?php echo $this->_tpl_vars['newscomments'][$this->_sections['comment']['index']]['user_id']; ?>
' title='<?php echo $this->_tpl_vars['newscomments'][$this->_sections['comment']['index']]['username']; ?>
'><?php echo $this->_tpl_vars['newscomments'][$this->_sections['comment']['index']]['username']; ?>
</a></h4>
				<span><a href="#" onclick="rebuild_comments();"><?php echo $this->_tpl_vars['newscomments'][$this->_sections['comment']['index']]['datetime']; ?>
</a></span>
			</div>
			<div class="comments_block_content">
				<?php echo $this->_tpl_vars['newscomments'][$this->_sections['comment']['index']]['comment']; ?>

			</div>
			
			<!-- clearance -->
			<div class="mozillaBugFix"></div>
		</div>
	</div>
<?php endfor; else: ?>
	
	<!-- empty comments -->
	<div class="comments_empty" id="comments_empty">
		<?php echo $this->_config[0]['vars']['nocommentsyet']; ?>

	</div>	
<?php endif; ?>

<?php if ($this->_tpl_vars['login'] == 'true'): ?>

	<!--  add comments -->
	<div class="add_new_comments" id="add_new_comments">
		<div class="add_new_comments_header">
			<strong><?php echo $this->_config[0]['vars']['addcomment']; ?>
</strong> - <span id="nohtmlcontent"><?php echo $this->_config[0]['vars']['nohtml']; ?>
</span>
		</div>
		<div class="add_new_comments_content">
			<textarea class="add_new_comments_textarea" id="comment_textarea" rows='20' cols='20'></textarea>	
		</div>
		<div class="add_new_comments_button">
			<a href="javascript:void(null);" title="<?php echo $this->_config[0]['vars']['send']; ?>
" onclick="send_comment();"><?php echo $this->_config[0]['vars']['send']; ?>
</a>
		</div>
	</div>
<?php endif; ?>