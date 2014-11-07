<?php /* Smarty version 2.6.9, created on 2010-06-11 10:25:31
         compiled from javascript/newslogin.js.tpl */ ?>
<?php echo '
	<!-- call the source -->
	<script type="text/javascript" src="js/Sajax.js"></script>
	<script type="text/javascript" src="js/news.login.page.js"></script>
	<script type="text/javascript"> 
		var _voted = '; ?>
'<?php echo $this->_config[0]['vars']['voted']; ?>
'<?php echo ';
		var _buried = '; ?>
'<?php echo $this->_config[0]['vars']['buried']; ?>
'<?php echo ';
		var _last = ';  echo $this->_tpl_vars['last'];  echo ';
	</script>
'; ?>