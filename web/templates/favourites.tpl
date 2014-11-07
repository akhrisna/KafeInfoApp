{* load respective javascript if the user is login or not, and if its your profile or not*}
{if $login == "true"}
	{if $userinfo.id == $user.id}
		{include file="javascript/favouriteslogin.js.tpl"}
	{else}
		{include file="javascript/favourites.js.tpl"}
	{/if}
{else}
	{include file="javascript/favourites.js.tpl"}
{/if}

<!-- profile page -->
<div class="comments">
	<div class="comments_padding">
	
		{* load templates depending if the user login or not *}
		{if $login == "true"}
			{if $userinfo.id == $user.id}
				{include file="includes/favouriteslogin.inc.tpl"}
			{else}
				{include file="includes/favourites.inc.tpl"}
			{/if}
		{else}
			{include file="includes/favourites.inc.tpl"}
		{/if}
	</div>
</div>