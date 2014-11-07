<!-- the paging -->
<div class="news_paging">
	<div class="news_paging_padding">
		{if $q}
			<ul>
				<li class="btn_first" id="news_paging_first"><a href="javascript:void(null);" onclick="pagingsearch('{$q}','1');"></a></li>
				<li class="btn_previous" id="news_paging_previous"><a href="javascript:void(null);" onclick="pagingsearch('{$q}','{$next-1}');"></a></li>
				<li class="news_paging_number" id="news_paging_number">{if $page == 0}{else}{$page}{/if}</li>
				<li class="btn_next" id="news_paging_next"><a href="javascript:void(null);" onclick="pagingsearch('{$q}','{$next}');"></a></li>
				<li class="btn_last" id="news_paging_last"><a href="javascript:void(null);" onclick="pagingsearch('{$q}','{$last}');"></a></li>
			</ul>
		{else}
			<ul>
				<li class="btn_first" id="news_paging_first"><a href="javascript:void(null);" onclick="paging('{$topic}','{$type}','1');"></a></li>
				<li class="btn_previous" id="news_paging_previous"><a href="javascript:void(null);" onclick="paging('{$topic}','{$type}','{$next-1}');"></a></li>
				<li class="news_paging_number" id="news_paging_number">{if $page == 0}{else}{$page}{/if}</li>
				<li class="btn_next" id="news_paging_next"><a href="javascript:void(null);" onclick="paging('{$topic}','{$type}','{$next}');"></a></li>
				<li class="btn_last" id="news_paging_last"><a href="javascript:void(null);" onclick="paging('{$topic}','{$type}','{$last}');"></a></li>
			</ul>
		{/if}
	</div>
</div>