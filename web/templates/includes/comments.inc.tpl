<!-- the comments -->
{section name='comment' loop=$newscomments}
	
	<!-- the comment block -->
	<div class="comments_block">
		<div class="comments_block_padding">
			<div class="comments_block_thumb">
				<img src='{$newscomments[comment].avatar}' alt='{$newscomments[comment].avatar}'/>
			</div>
			<div class="comments_block_name">
				<h4><a href='profile.php?id={$newscomments[comment].user_id}' title='{$newscomments[comment].username}'>{$newscomments[comment].username}</a></h4>
				<span><a href="#" onclick="rebuild_comments();">{$newscomments[comment].datetime}</a></span>
			</div>
			<div class="comments_block_content">
				{$newscomments[comment].comment}
			</div>
			
			<!-- clearance -->
			<div class="mozillaBugFix"></div>
		</div>
	</div>
{sectionelse}
	
	<!-- empty comments -->
	<div class="comments_empty" id="comments_empty">
		{#nocommentsyet#}
	</div>	
{/section}

{if $login == 'true'}

	<!--  add comments -->
	<div class="add_new_comments" id="add_new_comments">
		<div class="add_new_comments_header">
			<strong>{#addcomment#}</strong> - <span id="nohtmlcontent">{#nohtml#}</span>
		</div>
		<div class="add_new_comments_content">
			<textarea class="add_new_comments_textarea" id="comment_textarea" rows='20' cols='20'></textarea>	
		</div>
		<div class="add_new_comments_button">
			<a href="javascript:void(null);" title="{#send#}" onclick="send_comment();">{#send#}</a>
		</div>
	</div>
{/if}