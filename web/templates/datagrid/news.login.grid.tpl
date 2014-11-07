<!-- news list -->
{section name=list loop=$news_list}
	<div class="news">
		<div class="news_top">
			<div class="news_top_padding">
				{if $news_list[list].screenshot!=""}
					{if $news_list[list].screenshot != $news_list[list].link}
						<div class="news_top_thumbnail">
							<a href="{$news_list[list].link}" title="" target="_blank">
								<img src="{$news_list[list].screenshot}" alt="" class="news_image_thumbnail" />
							</a>
						</div>
					{/if}
				{/if}
				<div class="news_top_paddinginside">
					<h3><a href="{$news_list[list].link}" title="{$news_list[list].title|escape}" target="_blank">{$news_list[list].title|truncate:90|escape}</a></h3>
					<p class="news_listdescription">
						{$news_list[list].description|truncate:200|escape}
					</p>
				</div>
			</div>	
		</div>
		<div class="news_middle">
			<div class="news_middle_padding">
				<div class="news_middle_left float_left">
					<a href="details.php?id={$news_list[list].id}" title="{#viewcomment#}">{$news_list[list].commentamount} {#comments#}</a>
				</div>
				<div class="news_middle_right float_right">
					<a href="details.php?id={$news_list[list].id}" title="{#viewdetails#}">{#viewdetails#}</a>
				</div>
			</div>
		</div>
		<div class="news_bottom">
			<div class="news_bottom_padding">
				<div class="news_bottom_left float_left">
					<div class="news_voting float_left">
						<div class="float_left news_voting_text">{#vote#}</div> 
						<div class="news_voting_number float_left">
							<div id="news_galli_{$news_list[list].id}">
								{$news_list[list].galli}
							</div>
						</div>
					</div>
					
					{* dont show the voting button if the news is yours *}
					{if $user.id != $news_list[list].user_id}
					
						{* disable voting if news is voted *}
						{if $news_list[list].voted == "true"}
							<div class="news_voted" id="link_bar_up_{$news_list[list].id}"><a href="javascript:void(null);" title="{#voted#}" id="bar_up_{$news_list[list].id}">{#voted#}</a></div>
						{else}
							<div class="news_vote_up" id="link_bar_up_{$news_list[list].id}"><a href="javascript:voteup('{$news_list[list].id}','bar_up_{$news_list[list].id}');" title="{#voteup#}" id="bar_up_{$news_list[list].id}">{#voteup#}</a></div>
						{/if}
						
						{* disable bury if news id buried *}
						{if $news_list[list].buried == "true"}
							<div class="news_voted" id="link_bar_down_{$news_list[list].id}"><a href="javascript:void(null);" title="{#buried#}" id="bar_down_{$news_list[list].id}">{#buried#}</a></div>
						{else}
							<div class="news_vote_down" id="link_bar_down_{$news_list[list].id}"><a href="javascript:votedown('{$news_list[list].id}','bar_down_{$news_list[list].id}');" title="{#votedown#}" id="bar_down_{$news_list[list].id}">{#votedown#}</a></div>
						{/if}
					{/if}
				</div>
				<div class="news_bottom_right float_right">
					{#postedby#}<a href="profile.php?id={$news_list[list].user_id}" title="{$news_list[list].owner}"> {$news_list[list].owner}</a> {#at#} {$news_list[list].date_posted}. 
				</div>
			</div>
		</div>
	</div>
{sectionelse}
	<div class="news_empty">
		<div class="news_empty_padding">
			<h3>{#nonews#}</h3>
		</div>
	</div>
{/section}