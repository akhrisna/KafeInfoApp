<!-- javascript section -->
{if $login}
	{include file="javascript/news.detailslogin.js.tpl"}
{else}
	{include file="javascript/news.details.js.tpl"}
{/if}

<!-- details -->
<div class="details">

	<!-- details top -->
	<div class="details_top"></div>
	
	<!-- details middle -->
	<div class="details_middle">
	
		<!-- news list section -->
		{if $login}
			{include file="includes/news.details.login.tpl"}
		{else}
			{include file="includes/news.details.tpl"}
		{/if}
	</div>
	
	<!-- details bottom -->
	<div class="details_bottom">
		
		<!-- footer text -->
		<div class="details_bottom_footer">
			<div class="details_bottom_footer_left">
				<div class="details_bottom_footer_left_padding">
					<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" target="_blank" title="Creative Commons License">Kafeinfo Bookmarking Sosial &copy; 2008.</a>
				</div>
			</div>
			<div class="details_bottom_footer_right">
				<div class="details_bottom_footer_right_padding">
					<a href="about.php" title="{#aboutkafeinfo#}">{#aboutkafeinfo#}</a> &nbsp; 
					<a href="http://blog.kafeinfo.com" title="{#developersblog#}">{#developersblog#}</a> &nbsp;
					{* if the user is logged in, set to logout *}
					{if $login == "true"}
						<a href="logout.php" title="{#logout#}">{#logout#}</a>
					{else}
						<a href="register.php" title="{#register#}">{#register#}</a>
					{/if}
				</div>
			</div>
		</div>
	</div>
</div>