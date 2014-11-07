<!-- the header -->
<div class="comments_header">
	<div class="comment_header_title">
		<div class="comment_header_comment">
			{#comments#}
		</div>
		<div class="comment_header_news">
			{#news#}
		</div>
		<div class="comment_header_date">
			{#date#}
		</div>
	</div>
</div>
<div class="header_separator"></div>

<!-- the content -->
<div class="comments_content" id="comments_content">
	{section name="mysec" loop=$comments}
		<div id="comment_{$comments[mysec].id}" onmouseover="changebg('in','comment_{$comments[mysec].id}');" onmouseout="changebg('out', 'comment_{$comments[mysec].id}');" class="{if $smarty.section.mysec.iteration mod 2 == 1}comment_single_gray{else}comment_single{/if}">
			<div class="comments_single_padding">
				<div class="comment_header_comment" onclick="parent.location='details.php?id={$comments[mysec].news_id}'">
					{$comments[mysec].comment|truncate:65}
				</div>
				<div class="comment_header_news" onclick="parent.location='details.php?id={$comments[mysec].news_id}'">
					{$comments[mysec].newstitle|truncate:65}
				</div>
				<div class="comment_header_date" onclick="parent.location='details.php?id={$comments[mysec].news_id}'">
					{$comments[mysec].datetime}
				</div>
			</div>
		</div>
	{sectionelse}
		<div class="comment_empty">
			<div class="comments_single_padding">
				<h3>{#nocomments#}</h3>
			</div>
		</div>
	{/section}
</div>
<div class="header_separator_bottom"></div>

<!-- paging -->
<div class="comments_top_paging">
	<div class="comments_top_paging_padding">
		
		<!-- the paging -->
		<div class="dashboard_paging">
			<div class="dashboard_paging_padding">
				<ul>
					<li class="btn_first" id="news_paging_first"><a href="javascript:void(null);" onclick="paging('1');"></a></li>
					<li class="btn_previous" id="news_paging_previous"><a href="javascript:void(null);" onclick="paging('{$next-1}');"></a></li>
					<li class="news_paging_number" id="news_paging_number">{if $page == 0}{else}{$page}{/if}</li>
					<li class="btn_next" id="news_paging_next"><a href="javascript:void(null);" onclick="paging('{$next}');"></a></li>
					<li class="btn_last" id="news_paging_last"><a href="javascript:void(null);" onclick="paging('{$last}');"></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>