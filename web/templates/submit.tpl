{* load respective javascript if the user is login or not, and if its your profile or not*}
{if $login == "true"}
	{include file="javascript/submit.js.tpl"}
{/if}

<!-- profile page -->
<div class="comments">
	<div class="comments_padding">
	
		{* load templates depending if the user login or not *}
		{if $login == "true"}
			{include file="includes/submit.inc.tpl"}
		{/if}
	</div>
</div>