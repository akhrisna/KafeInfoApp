<div id="filter" class="filter">
	<div class="filter_left float_left">
		<div class="filter_left_padding">
			{if $q}
				<div class="search_results">
					<h3>{#displayingsearch#} {$q} ({$amt})</h3>
				</div>
			{else}
				<div id="filter1" class="normalfilter {if $type == 'all'}filter_left_chosen{/if}"><a href="?type=all" title="{#allmedia#}">{#allmedia#}</a></div>
				<div id="filter2" class="normalfilter {if $type == 'news'}filter_left_chosen{/if}"><a href="?type=news" title="{#news#}">{#news#}</a></div>
				<div id="filter3" class="normalfilter {if $type == 'video'}filter_left_chosen{/if}"><a href="?type=video" title="{#video#}">{#video#}</a></div>
				<div id="filter4" class="normalfilter {if $type == 'image'}filter_left_chosen{/if}"><a href="?type=image" title="{#image#}">{#image#}</a></div>
			{/if}
		</div>
	</div>
	<div class="filter_right float_right">
		<div class="filter_right_padding">
			<div class="filter_right_en"><a href="index.php?lang=en" title="English"></a></div>
			<div class="filter_right_ina"><a href="index.php?lang=ina" title="Indonesia"></a></div>
		</div>
	</div>		
</div>