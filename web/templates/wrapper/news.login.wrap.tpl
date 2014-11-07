<!-- javascript -->
{include file="javascript/newslogin.js.tpl"}

<!-- content section -->
<div id="content" class="content">
	<div class="content_left">
		<div class="content_left_padding">
			
			<!-- includes news listing -->
			<div id="newscontent">
				{include file="datagrid/news.login.grid.tpl"}
			</div>
		</div>
	</div>
	
	<!-- the right content (link) -->
	{include file="navigation.tpl"}
	
	<!-- bug fix -->
	<div class="mozillaBugFix"></div>
</div>