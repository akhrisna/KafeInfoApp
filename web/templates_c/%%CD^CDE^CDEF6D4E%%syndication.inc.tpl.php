<?php /* Smarty version 2.6.9, created on 2009-06-20 21:39:34
         compiled from datagrid/syndication.inc.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>

<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/">
	<channel>
		<title>Kafeinfo Bookmarking Sosial</title>
		<description>Kafeinfo Bookmarking Sosial News.</description>
		<link>http://www.kafeinfo.com</link>
		<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mysec']['show'] = true;
$this->_sections['mysec']['max'] = $this->_sections['mysec']['loop'];
$this->_sections['mysec']['step'] = 1;
$this->_sections['mysec']['start'] = $this->_sections['mysec']['step'] > 0 ? 0 : $this->_sections['mysec']['loop']-1;
if ($this->_sections['mysec']['show']) {
    $this->_sections['mysec']['total'] = $this->_sections['mysec']['loop'];
    if ($this->_sections['mysec']['total'] == 0)
        $this->_sections['mysec']['show'] = false;
} else
    $this->_sections['mysec']['total'] = 0;
if ($this->_sections['mysec']['show']):

            for ($this->_sections['mysec']['index'] = $this->_sections['mysec']['start'], $this->_sections['mysec']['iteration'] = 1;
                 $this->_sections['mysec']['iteration'] <= $this->_sections['mysec']['total'];
                 $this->_sections['mysec']['index'] += $this->_sections['mysec']['step'], $this->_sections['mysec']['iteration']++):
$this->_sections['mysec']['rownum'] = $this->_sections['mysec']['iteration'];
$this->_sections['mysec']['index_prev'] = $this->_sections['mysec']['index'] - $this->_sections['mysec']['step'];
$this->_sections['mysec']['index_next'] = $this->_sections['mysec']['index'] + $this->_sections['mysec']['step'];
$this->_sections['mysec']['first']      = ($this->_sections['mysec']['iteration'] == 1);
$this->_sections['mysec']['last']       = ($this->_sections['mysec']['iteration'] == $this->_sections['mysec']['total']);
?>
			<item>
				<title><![CDATA[<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['title']; ?>
]]></title>
				<description><![CDATA[<?php echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['description']; ?>
 <a href='<?php echo $this->_tpl_vars['link'];  echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
'>View</a>]]></description>
				<link><?php echo $this->_tpl_vars['link'];  echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
</link>
				<guid><?php echo $this->_tpl_vars['link'];  echo $this->_tpl_vars['news'][$this->_sections['mysec']['index']]['id']; ?>
</guid>
			</item>
		<?php endfor; endif; ?>
	</channel>
</rss>