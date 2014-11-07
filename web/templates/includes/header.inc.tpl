<div id="header" class="header">
	<div id="header_wrapper" class="header_wrapper">
		
		<!-- logo section -->
		{if $logo_section}
			{include file="$logo_section"}
		{/if}
		
		<!-- the search section -->
		<div class="search">
			<div class="search_padding">
				<form name="searchform" method="get" action="search.php">
					<div class="search_left"></div>
					<input type="text" class="input_search" name="q" value="{$q}"/>
					<div class="search_right"></div>
					<a href="javascript:document.searchform.submit();" title="{#search#}"></a>
				</form>
			</div>
		</div>
	</div>
</div>