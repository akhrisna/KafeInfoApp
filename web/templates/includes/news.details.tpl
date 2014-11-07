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
					<div id="news_galli_{$news_list[list].id}">
						{$newsdetails.galli}
					</div>
				</div>
			</div>
			
			<!-- the vote bar -->
			<div class="details_vote_up float_left" id="link_bar_up_{$news_list[list].id}"><a href="javascript:Tip('{#pleaseloginvotingup#}');" title="{#voteup#}">{#voteup#}</a></div>
			<div class="details_vote_down float_left" id="link_bar_down_{$news_list[list].id}"><a href="javascript:Tip('{#pleaseloginvotingdown#}');" style="margin-right:13px;" title="{#votedown#}">{#votedown#}</a></div>
			
			<!-- report news -->
			<div class="details_vote_information float_left"><a href="javascript:Tip('{#pleaseloginreport#}');" style="width:120px;" title="{#reportnewstext#}">{#reportnews#}</a></div>
		
			<!-- favorite news -->
			<div class="details_vote_favorite float_left"><a href="javascript:Tip('{#pleaseloginfavorite#}');" style="width:110px;" title="{#favoritenews#}">{#favoritenews#}</a></div>
		</div>
	</div>
</div>

<!-- news link -->
<div class="news_comments_info">
	<div class="news_comments_right_add">
		<a href="javascript:Tip('{#pleaselogincomment#}');" title="{#addcomments#}">{#addcomment#}</a>
	</div>
	<div class="news_comments_right_show">
		<div class="news_comments_right_show_padding">
			<a href="javascript:void(null);" onclick="reload_comments();" title="{#reloadcomment#}">{$newsinfo.commentamount} {#commentsmall#}</a>
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