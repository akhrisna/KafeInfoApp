<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract News list page.
 */
	/** requires the module */
	require_once("../modules/usermanager/user.class.php");
	
	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		// global variables
		global $templates;
		
		// initial variables
		$template = $templates['news'];
		$template_gradient = "includes/static.gradientdashboard.tpl";
		$template_regular = "news.tpl";
		$template_footer = "includes/footer.black.tpl";
		$page_name = "news";
		
		// get the userid
		if(isset($_GET[id]))
		{
			// save
			$uid = $_GET['id'];
			
			// new user instance
			$userManager = new UserManager();
			
			// request user information
			$userinfo = $userManager->get_infoid($uid);
		}
		else
		{
			// check if login
			if($_SESSION['valid'] == "true")
			{
				$uid = $_SESSION['id'];
				header("Location:news.php?id=$uid");
				exit;
			}
			
			// bounce to index
			header("Location:index.php");
			exit;
		}
		
		// unclean
		foreach($userinfo as $info) {
			$info = unclean_string($info);
		}
		
		// prepare variable for retreiving the news
		$topic = "user";
		$type = "all";
		$order = "datetime";
		$limit = 13;
		$page = $_REQUEST['page'];
		
		// get amount of news
		$amountnews = get_amount_news($topic,$type, $uid);
		
		// retreive the paging data
		$paging = get_pagingdata($amountnews, $limit, $page);
		
		// get the news
		$news = get_news($topic,$type, $order, $paging['offset'], $paging['limit'], $uid);
		
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
		$smarty->assign('news', $news);
		$smarty->assign('userinfo', $userinfo);
		$smarty->assign('uid', $uid);
		$smarty->assign('content_section', $template);
		$smarty->assign('regular_section', $template_regular);
		$smarty->assign('gradient_content',$template_gradient);
		$smarty->assign('regular_footer_section',$template_footer);
		$smarty->assign('staticpage',$page_name);
		$smarty->assign('last', $paging['numPages']);
		$smarty->assign('page', $paging['page']);
	}
?>