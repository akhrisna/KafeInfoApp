{section name="mysec" loop=$news}
	<div id="news_{$news[mysec].id}" onmouseover="changebg('in','news_{$news[mysec].id}');" onmouseout="changebg('out', 'news_{$news[mysec].id}');" class="{if $smarty.section.mysec.iteration mod 2 == 1}news_single_gray{else}news_single{/if}">
		<div class="comments_single_padding">
			<div class="comment_header_comment_long" onclick="parent.location='details.php?id={$news[mysec].id}'">
				{$news[mysec].title|truncate:100}
			</div>
			<div class="comment_header_date" onclick="parent.location='details.php?id={$news[mysec].id}'">
				{$news[mysec].date_posted}
			</div>
			<div class="comment_header_action">
				<a href="javascript:delete_news('{$news[mysec].id}');" title='{#deletenews#}'><img src='images/ic_delete.png' alt='{#deletenews#}' class="action_icon"/></a>
				<a href="edit.php?id={$news[mysec].id}" title='{#editnews#}'><img src='images/ic_edit.png' alt='{#editnews#}' class="action_icon"/></a>
			</div>
		</div>
	</div>
{/section}