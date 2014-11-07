<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Comments page.
 */
 	/** requires the module */
	require_once("../modules/usermanager/user.class.php");

	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		// add news manager
		require_once ("../libs/Sajax/Sajax.php");
		
		// global variables
		global $templates;
		
		// initial variables
		$template = $templates['comments'];
		$template_gradient = "includes/static.gradientdashboard.tpl";
		$template_regular = "comments.tpl";
		$template_footer = "includes/footer.black.tpl";
		$page_name = "comments";
		$limit = 13;
		
		// export the function for sajax
		$sajax_request_type = "POST";
		sajax_init();
		sajax_export("delete_comment");
		sajax_handle_client_request();
		
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
				header("Location:comments.php?id=$uid");
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
		
		// get amount news
		$amountcomment = get_amount_user_comments($uid);
		$page = $_REQUEST['page'];
		
		// retreive the paging data
		$paging = get_pagingdata($amountcomment, $limit, $page);
		
		// get the user comments
		$comments = get_usercomments_global($uid,$paging['offset'], $paging['limit']);
		
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
		$smarty->assign('comments', $comments);
		$smarty->assign('userinfo', $userinfo);
		$smarty->assign('content_section', $template);
		$smarty->assign('regular_section', $template_regular);
		$smarty->assign('gradient_content',$template_gradient);
		$smarty->assign('regular_footer_section',$template_footer);
		$smarty->assign('staticpage',$page_name);
		$smarty->assign('last', $paging['numPages']);
		$smarty->assign('page', $paging['page']);
	}
	
	/** function to delete comments */
	function delete_comment($commentid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get the comments
		$comments = $newsManager->delete_comments($commentid);
	}
?>