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
					<div class="news_vote_up float_left" id="link_bar_up_{$news_list[list].id}"><a href="javascript:Tip('{#pleaseloginvotingup#}');" title="{#voteup#}">{#voteup#}</a></div>
					<div class="news_vote_down float_left" id="link_bar_down_{$news_list[list].id}"><a href="javascript:Tip('{#pleaseloginvotingdown#}');" title="{#votedown#}">{#votedown#}</a></div>
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