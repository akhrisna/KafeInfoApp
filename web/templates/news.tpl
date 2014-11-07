{* load respective javascript if the user is login or not, and if its your profile or not*}
{if $login == "true"}
	{if $userinfo.id == $user.id}
		{include file="javascript/newsdashboard.login.js.tpl"}
	{else}
		{include file="javascript/newsdashboard.js.tpl"}
	{/if}
{else}
	{include file="javascript/newsdashboard.js.tpl"}
{/if}

<!-- profile page -->
<div class="comments">
	<div class="comments_padding">
	
		{* load templates depending if the user login or not *}
		{if $login == "true"}
			{if $userinfo.id == $user.id}
				{include file="includes/newslogin.inc.tpl"}
			{else}
				{include file="includes/news.inc.tpl"}
			{/if}
		{else}
			{include file="includes/news.inc.tpl"}
		{/if}
	</div>
</div>