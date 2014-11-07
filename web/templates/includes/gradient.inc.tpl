<div id="gradient" class="gradient">
	<div id="gradient_wrapper" class="gradient_wrapper">
		{if $gradient_content}
			{include file="$gradient_content"}
		{else}
			<div class="gradient_wrapper_padding">
				<div class="gradient_wrapper_left">
					{$hometext}
				</div>
				<div class="gradient_wrapper_right">
					<a href="syndication.php?topic={$topic}" title="RSS 2.0"></a>
				</div>
			</div>
		{/if}
	</div>
</div>