<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Health page.
 */

	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		// global variables
		global $templates;
		global $newslistamt;
		
		// initial variables
		$template = $templates['newslist'];
		$type = 'all';
		$cur_page = 'health';
		$topic = 'health';
		
		// the type of media requested
		if(isset($_REQUEST['type'])) {
			$type_sent = $_REQUEST['type'];
			if($type_sent == 'video')
				$type = 'video';
			elseif ($type_sent == 'image')
				$type = 'image';
			elseif ($type_sent == 'news')
				$type = 'news';
			else
				$type = 'all';
		}
		
		// prepare calling the library
		$start = 0;
		$limit = $newslistamt;
		$order = 'datetime';
		$page = $_REQUEST['page'];
		
		// get amount news
		$amountnews = get_amount_news($topic,$type);
		
		// retreive the paging data
		$paging = get_pagingdata($amountnews, $limit, $page);
		
		// retreive the upcoming news
		$news = get_news($topic,$type, $order, $paging['offset'], $paging['limit']);
		
		// send latest news
		get_latestnews($smarty);
		
		// get popular news
		get_popularnews($smarty);
		
		// calculate the variable to be passed
		$page = $paging['page'];
		if ($page == 1)
			$smarty->assign('previous', "");
		else            
			$smarty->assign('previous', $page-1);
		if ($page == $paging['numPages']) 
			$smarty->assign('next', "");
		else           
			$smarty->assign('next', $page+1);
		
		// pass variables to the template
		$smarty->assign('news_list', $news);
		$smarty->assign('content_section', $template);
		$smarty->assign('cur_page', $cur_page);
		$smarty->assign('topic', $topic);
		$smarty->assign('type', $type);
		$smarty->assign('last', $paging['numPages']);
		$smarty->assign('page', $paging['page']);
	}

?>