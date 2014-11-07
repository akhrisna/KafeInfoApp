{* load respective javascript if the user is login or not, and if its your profile or not*}
{if $login == "true"}
	{if $userinfo.id == $user.id}
		{include file="javascript/profilelogin.js.tpl"}
	{/if}
{/if}

<!-- profile page -->
<div class="profile">
	<div class="profile_padding">
	
		{* load templates depending if the user login or not *}
		{if $login == "true"}
			{if $userinfo.id == $user.id}
				{include file="includes/profilelogin.inc.tpl"}
			{else}
				{include file="includes/profile.inc.tpl"}
			{/if}
		{else}
			{include file="includes/profile.inc.tpl"}
		{/if}
	</div>
</div>