<div id="footer_black" class="footer_black">
	<div class="footer_black_left">
		<div class="footer_black_left_padding">
			<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" target="_blank" title="Creative Commons License">Kafeinfo Bookmarking Sosial &copy; 2008.</a>
		</div>
	</div>
	<div class="footer_black_right">
		<div class="footer_black_right_padding">
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