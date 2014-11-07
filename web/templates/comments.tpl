{* load respective javascript if the user is login or not, and if its your profile or not*}
{if $login == "true"}
	{if $userinfo.id == $user.id}
		{include file="javascript/commentsdashboardlogin.js.tpl"}
	{else}
		{include file="javascript/commentsdashboard.js.tpl"}
	{/if}
{else}
	{include file="javascript/commentsdashboard.js.tpl"}
{/if}

<!-- profile page -->
<div class="comments">
	<div class="comments_padding">
	
		{* load templates depending if the user login or not *}
		{if $login == "true"}
			{if $userinfo.id == $user.id}
				{include file="includes/commentsdashboardlogin.inc.tpl"}
			{else}
				{include file="includes/commentsdashboard.inc.tpl"}
			{/if}
		{else}
			{include file="includes/commentsdashboard.inc.tpl"}
		{/if}
	</div>
</div>