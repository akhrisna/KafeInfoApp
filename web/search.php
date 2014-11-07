<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Search page.
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
		
		// prepare calling the library
		$start = 0;
		$limit = $newslistamt;
		$order = 'datetime';
		$page = $_REQUEST['page'];
		
		// if search is retreived
		if(isset($_GET['q']))
		{
			// save
			$searchterms = $_GET['q'];
		}
		
		// send latest news
		get_latestnews($smarty);
		
		// get popular news
		get_popularnews($smarty);
		
		// get amount news
		$amountnews = get_amt_search($searchterms);
		
		// retreive the paging data
		$paging = get_pagingdata($amountnews, $limit, $page);
		
		// get news
		$news = get_search($searchterms, $order, $paging['offset'], $paging['limit']);
		
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
		$smarty->assign('q', $searchterms);
		$smarty->assign('amt', $amountnews);
		$smarty->assign('last', $paging['numPages']);
		$smarty->assign('page', $paging['page']);
	}
?>