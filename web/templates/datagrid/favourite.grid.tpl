{section name="mysec" loop=$favourites}
	<div id="favourites_{$favourites[mysec].id}" onmouseover="changebg('in','favourites_{$favourites[mysec].id}');" onmouseout="changebg('out', 'favourites_{$favourites[mysec].id}');" class="{if $smarty.section.mysec.iteration mod 2 == 1}favourite_single_gray{else}favourite_single{/if}">
		<div class="comments_single_padding" onclick="parent.location='details.php?id={$favourites[mysec].news_id}'">
			<div class="comment_header_comment_long">
				{$favourites[mysec].newstitle|truncate:100}
			</div>
			<div class="comment_header_date" onclick="parent.location='details.php?id={$favourites[mysec].news_id}'">
				{$favourites[mysec].datetime}
			</div>
		</div>
	</div>
{sectionelse}
	<div class="comment_empty">
		<div class="comments_single_padding">
			<h3>{#nosavednews#}</h3>
		</div>
	</div>
{/section}