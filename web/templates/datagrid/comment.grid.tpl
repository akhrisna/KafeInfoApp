{section name="mysec" loop=$comments}
	<div id="comment_{$comments[mysec].id}" onmouseover="changebg('in','comment_{$comments[mysec].id}');" onmouseout="changebg('out', 'comment_{$comments[mysec].id}');" class="{if $smarty.section.mysec.iteration mod 2 == 1}comment_single_gray{else}comment_single{/if}">
		<div class="comments_single_padding">
			<div class="comment_header_comment" onclick="parent.location='details.php?id={$comments[mysec].news_id}'">
				{$comments[mysec].comment|truncate:65}
			</div>
			<div class="comment_header_news" onclick="parent.location='details.php?id={$comments[mysec].news_id}'">
				{$comments[mysec].newstitle|truncate:65}
			</div
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