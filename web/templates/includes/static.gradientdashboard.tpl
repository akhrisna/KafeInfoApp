<div class="link_static">
	<div class="link_static_left float_left">
		<div class="link_static_left_padding">
			{if $language == "en"}
				<span class="color_orange">{$userinfo.username}'s</span> Dashboard
			{else}
				Dashboard <span class="color_orange">{$userinfo.username}</span></a>
			{/if}
		</div>
	</div>
	<div class="link_static_right_long float_right">
		<div class="link_static_right_padding">
			<ul>
				{* if this the user is looking at his/her own profile, show the submit *}
				{if $userinfo.id == $user.id}
					<li {if $staticpage == "tools"}class="gradient_link_chosen"{/if}><a href="tools.php">{#tools#}</a></li>
					<li {if $staticpage == "submit"}class="gradient_link_chosen"{/if}><a href="submit.php" title="{#submitnews#}">{#submitnews#}</a></li>
				{/if}
				<li {if $staticpage == "news"}class="gradient_link_chosen"{/if}><a href="news.php?id={$userinfo.id}" title="{#news#}">{#news#}</a></li>
				<li {if $staticpage == "comments"}class="gradient_link_chosen"{/if}><a href="comments.php?id={$userinfo.id}" title="{#comments#}">{#comments#}</a></li>
				<li {if $staticpage == "favourites"}class="gradient_link_chosen"{/if}><a href="favourites.php?id={$userinfo.id}" title="{#favorites#}">{#favorites#}</a></li>
				<li {if $staticpage == "profile"}class="gradient_link_chosen"{/if}><a href="profile.php?id={$userinfo.id}" title="{#profile#}">{#profile#}</a></li>
			</ul>
		</div>
	</div>
</div>