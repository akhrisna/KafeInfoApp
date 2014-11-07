<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
		<!-- meta section -->
		{if $meta_section}
			{include file="$meta_section"}
		{/if}
				
		<!-- stylesheets section -->
		{if $stylesheets_section}
			{include file="$stylesheets_section"}
		{/if}
		
		<!-- javascript section -->
		{if $javascript_section}
			{include file="$javascript_section"}
		{/if}						
			
		<!-- title -->
		<title>{$titlepage}{if $title_specific} - {$title_specific}{/if}</title>
	</head>
	<body>
		<!-- wrapper -->
		<div id="wrapper" class="wrapper">

			<!-- header section -->
			{if $header_section}
				{include file="$header_section"}
			{/if}
			
			<!-- link section -->
			{if $links_section}
				{include file="$links_section"}
			{/if}
			
			<!-- gradient section -->
			{if $gradient_section}
				{include file="$gradient_section"}
			{/if}
			
			<!-- content section -->
			{if $content_section}
				{include file="$content_section"}
			{/if}
		</div>
	</body>
	{literal}
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		try {
			var pageTracker = _gat._getTracker("UA-9318409-1");
			pageTracker._trackPageview();
		} catch(err) {} 
	</script>
	{/literal}
</html>