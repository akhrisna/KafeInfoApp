<!-- news details login -->
<div class="news_details">
	<div class="news_details_top"></div>
	<div class="news_details_middle">
		<div class="news_details_middle_padding">
			{if $newsdetails.screenshot != ""}
				<div class="news_details_middle_screenshot">
					<img src="{$newsdetails.screenshot}" alt="{$newsdetails.title}" class="news_image_thumbnail"/>
				</div>
			{/if}
			<div class="news_details_middle_news">
				<h3><a href="{$newsdetails.link}" title="{$newsdetails.title|escape}" target="_blank">{$newsdetails.title|escape}</a></h3>
				<span>
					 {#by#} <a href="profile.php?id={$newsdetails.user_id}" title="{$newsinfo.owner}">{$newsinfo.owner}</a>, {$newsinfo.date_posted}.
				</span>
				<p>
					<span class="color_gray">{$newslink.host|escape}</span> - {$newsdetails.description|escape}
				</p>
			</div>
		</div>
		
		<!-- mozilla bug -->
		<div class="mozillaBugFix"></div>
	</div>
	<div class="news_details_bottom">
		<div class="news_details_bottom_padding">
			<div class="news_voting float_left">
				<div class="float_left details_voting_text">{#vote#}</div> 
				<div class="details_voting_number float_left">
					<div id="news_galli_{$newsdetails.id}">
						{$newsdetails.galli}
					</div>
				</div>
			</div>
			{* dont show the voting button if the news is yours *}
			{if $user.id != $newsdetails.user_id}
			
				<!-- the vote up bar -->
				{if $voted.up == "true"}
					<div class="details_voted float_left" id="link_bar_up_{$newsdetails.id}"><a href="javascript:void(null);" title="{#voteup#}">{#voted#}</a></div>
				{else}
					<div class="details_vote_up float_left" id="link_bar_up_{$newsdetails.id}"><a href="javascript:voteup('{$newsdetails.id}','bar_up_{$newsdetails.id}');" title="{#voteup#}" id="bar_up_{$newsdetails.id}">{#voteup#}</a></div>
				{/if}
				
				<!-- the vote down bar -->
				{if $voted.down == "true"}
					<div class="details_voted float_left"  id="link_bar_down_{$newsdetails.id}"><a href="javascript:void(null);" style="margin-right:13px;" title="{#votedown#}">{#buried#}</a></div>
				{else}
					<div class="details_vote_down float_left" id="link_bar_down_{$newsdetails.id}"><a style="margin-right:13px;" href="javascript:votedown('{$newsdetails.id}','bar_down_{$newsdetails.id}');" id="bar_down_{$newsdetails.id}" title="{#votedown#}">{#votedown#}</a></div>
				{/if}
			{/if}
			
			<!-- report news -->
			{if $reported != "true"}
				<div class="details_vote_information float_left" id="report_bar"><a href="javascript:report_news();" style="width:110px;" title="{#reportnewstext#}" id="report_link">{#reportnews#}</a></div>
			{else}
				<div class="details_vote_information reported_voted float_left" id="report_bar"><a href="javascript:void(null);" style="width:110px;" title="{#reported#}" id="report_link">{#reported#}</a></div>
			{/if}
			
			<!-- favorite news -->
			{if $favorite != "true"}
				<div class="details_vote_favorite float_left" id="favorite_bar"><a href="javascript:save_news();" style="width:110px;" title="{#favoritenews#}" id="favorite_link">{#favoritenews#}</a></div>
			{else}
				<div class="details_vote_favorite favorite_voted float_left"><a href="javascript:void(null);" style="width:110px;" title="{#saved#}">{#saved#}</a></div>
			{/if}
		</div>
	</div>
</div>

<!-- news link -->
<div class="news_comments_info">
	<div class="news_comments_right_add">
		<a href="javascript:show_commentbox();" title="{#addcomments#}">{#addcomment#}</a>
	</div>
	<div class="news_comments_right_show">
		<div class="news_comments_right_show_padding">
			<a href="#" onclick="reload_comments();" title="{#reloadcomment#}"><span id="comment_amt">{$newsinfo.commentamount}</span> {#commentsmall#}</a>
		</div>
	</div>
	
	<!-- mozilla bug -->
	<div class="mozillaBugFix"></div>
</div>

<!-- news comments -->
<div class="news_comments">
	<div class="news_comments_top"></div>
	<div class="news_comments_middle">
		<div class="news_comments_middle_padding" id="news_comments_content">
			
			<!-- comments content -->
			{include file="includes/comments.inc.tpl"}
		</div>
	</div>
	<div class="news_comments_bottom"></div>
</div>