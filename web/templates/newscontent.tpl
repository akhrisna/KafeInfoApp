<!-- filter section -->
{if $filter_section}
	{include file="$filter_section"}
{/if}

<!-- news list section -->
{if $login}
	{include file="wrapper/news.login.wrap.tpl"}
{else}
	{include file="wrapper/news.wrap.tpl"}
{/if}

<!-- footer section -->
{if $footer_section}
	{include file="$footer_section"}
{/if}