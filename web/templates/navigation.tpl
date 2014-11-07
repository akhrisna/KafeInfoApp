{literal}
	<script type="text/javascript">
		function toggle_sidecontent(type) {
			if(type == "popular") {
				$('#content_popularnews').slideToggle('600');
			} else {
				$('#content_latestnews').slideToggle('600');
			}
		}
	</script>
{/literal}

<!-- distinguish if user is login or not -->
<div class="content_right">
	<div class="content_right_padding">
		{if $login}
			{include file="includes/navigationlogin.inc.tpl"}
		{else}
			{include file="includes/navigation.inc.tpl"}
		{/if}
		
		<!-- the popular news -->
		<div class="content_side">
			<div class="content_side_top"><a href="javascript:toggle_sidecontent('popular');" title="{#topnews#}">{#topnews#}</a></div>
			<div class="content_side_middle" id="content_popularnews">
				<div class="navigation_loginbox_top"></div>
				<div class="content_side_middle_padding">
					{section name='mysec' loop=$popularnews}
						<div {if $smarty.section.mysec.iteration == 1}class="content_side_inner_top"{elseif $smarty.section.mysec.iteration == 5}class="content_side_inner_bottom"{else}class="content_side_inner"{/if}>
							<a href='details.php?id={$popularnews[mysec].id}'>{$popularnews[mysec].title|truncate:54}</a>
						</div>
					{sectionelse}
						<div class="content_side_empty">
							{#newsnotfound#}.
						</div>
					{/section}
				</div>
				<div class="navigation_loginbox_bottom"></div>
			</div>
			<div class="content_side_bottom"></div>
		</div>
		
		<!-- the newest news -->
		<div class="content_side">
			<div class="content_side_top"><a href="javascript:toggle_sidecontent('new');" title="{#newnews#}">{#newnews#}</a></div>
			<div class="content_side_middle" id="content_latestnews">
				<div class="navigation_loginbox_top"></div>
				<div class="content_side_middle_padding">
					{section name='mysec' loop=$latestnews}
						<div {if $smarty.section.mysec.iteration == 1}class="content_side_inner_top"{elseif $smarty.section.mysec.iteration == 5}class="content_side_inner_bottom"{else}class="content_side_inner"{/if}>
							<a href='details.php?id={$latestnews[mysec].id}'>{$latestnews[mysec].title|truncate:54}</a>
						</div>
					{sectionelse}
						<div class="content_side_empty">
							{#newsnotfound#}.
						</div>
					{/section}
				</div>
				<div class="navigation_loginbox_bottom"></div>
			</div>
			<div class="content_side_bottom"></div>
		</div>
		
		<!-- <a href='http://www.bubuawards.com/' target='_blank' title="Bubu Awards Participant"><img src='images/ic_bubu.gif' alt='bubu awards' style="margin-top:10px; margin-left:1px;"/></a> -->
	</div>
</div>