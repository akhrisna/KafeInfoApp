<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract All news actions for AJAX calls, vote, bury etc.
 */

	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** main function */
	function main($smarty)
	{
		/** get AJAX library */
		require_once ("../libs/Sajax/Sajax.php");
		
		// global variables
		global $user;
		global $configurationManager;
		
		// export the function for sajax
		$sajax_request_type = "POST";
		sajax_init();
		sajax_export("voteup");
		sajax_export("votedown");
		sajax_export("get_content");
		sajax_export("delete_news");
		sajax_export("get_contentsearch");
		sajax_export("get_usercomments_ajax");
		sajax_handle_client_request();
		
		if($_GET['test'])
		{
			voteup(14, "bar_up_14");
		}
	}
	
	/** function to vote news called with ajax */
	function voteup($newsid, $barid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		$ret = array();
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get news details
		$new_vote = $newsManager->set_vote($newsid,"up");
		
		// prepare variables
		$ret[0] = $newsid;
		$ret[1] = $barid;
		$ret[2] = $new_vote;
		
		// add to cookies
		insert_voteupsession($newsid);
		
		// return variable
		return $ret;
	}
	
	/** function to bury news called with ajax */
	function votedown($newsid, $barid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		$ret = array();
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get news details
		$new_vote = $newsManager->set_vote($newsid,"down");
		
		// prepare variables
		$ret[0] = $newsid;
		$ret[1] = $barid;
		$ret[2] = $new_vote;
		
		// add too cookies
		insert_votedownsession($newsid);
		
		// return variable
		return $ret;
	}
	
	/** function to insert voted news to session */
	function insert_voteupsession($newsid)
	{
		// if session has been set, get the variables
		if(isset($_SESSION['voteup']))
		{
			// retreive votingup from session
			$votingup = $_SESSION['voteup'];
			
			// build the variable
			if($votingup == "")
				$votingup = $newsid;
			else
				$votingup = $votingup."|".$newsid;
				
			// insert back to session
			$_SESSION['voteup'] = $votingup;
		}
		else
		{
			// insertto session
			$_SESSION['voteup'] = $newsid;
		}
	}
	
	/** function to insert bury news to session */
	function insert_votedownsession($newsid)
	{
		// if session has been set, get the variables
		if(isset($_SESSION['votedown']))
		{
			// retreive votingup from session
			$votingdown = $_SESSION['votedown'];
			
			// build the variable
			if($votingdown == "")
				$votingdown = $newsid;
			else
				$votingdown = $votingdown."|".$newsid;
				
			// insert back to session
			$_SESSION['votedown'] = $votingdown;
		}
		else
		{
			// insert to session
			$_SESSION['votedown'] = $newsid;
		}
	}
	
	/** function to get the content called with ajax */
	function get_content($topic, $type, $page, $userid=0)
	{
		// global variables
		global $smarty;
		global $newslistamt;
		
		// initialize variable
		if($userid == 0) {
			$limit = $newslistamt;
			$order = 'datetime';
		} else {
			$limit = 13;
			$order = 'datetime';
		}
		
		// get amount news
		if($userid == 0)
			$amountnews = get_amount_news($topic,$type);
		else
			$amountnews = get_amount_news($topic,$type, $userid);
		
		// retreive the paging data
		$paging = get_pagingdata($amountnews, $limit, $page);
		
		// retreive the popular news
		if($userid == 0)
			$news = get_news($topic, $type, $order, $paging['offset'], $paging['limit']);
		else
			$news = get_news($topic, $type, $order, $paging['offset'], $paging['limit'], $userid);
		
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
		
		// check
		if($userid == 0)
		{
			// assign the news content to the template
			$smarty->assign('news_list', $news);
			
			// fetch the template
			if($_SESSION['valid'] == "true")
				return $smarty->fetch("datagrid/news.login.grid.tpl");
			else
				return $smarty->fetch("datagrid/news.grid.tpl");
		}
		else
		{
			// assign the news content to the template
			$smarty->assign('news', $news);
			
			// fetch the template
			if($_SESSION['valid'] == "true") {
				if($userid == $_SESSION['id']) {
					return $smarty->fetch("datagrid/newsdashboard.login.grid.tpl");
				} else {
					return $smarty->fetch("datagrid/newsdashboard.grid.tpl");
				}
			} else {
				return $smarty->fetch("datagrid/newsdashboard.grid.tpl");
			}
		}
	}
	
	/** function to get the content called with ajax */
	function get_contentsearch($q, $page)
	{
		// global variables
		global $smarty;
		global $newslistamt;
		
		// get amount
		$limit = $newslistamt;
		$order = 'datetime';
		$amountnews = get_amt_search($q);
		
		// retreive the paging data
		$paging = get_pagingdata($amountnews, $limit, $page);
		
		// get news
		$news = get_search($q, $order, $paging['offset'], $paging['limit']);
		
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
		
		// assign the news content to the template
		$smarty->assign('news_list', $news);
		$smarty->assign('q', $q);
		
		// fetch the template
		if($_SESSION['valid'] == "true")
			return $smarty->fetch("datagrid/news.login.grid.tpl");
		else
			return $smarty->fetch("datagrid/news.grid.tpl");
	
	}
	
	/** function to get the comments called with ajax */
	function get_usercomments_ajax($userid, $page)
	{
		// global variables
		global $smarty;
		
		// variables
		$limit = 13;
		
		// get amount news
		$commentnews = get_amount_user_comments($userid);
		
		// retreive the paging data
		$paging = get_pagingdata($commentnews, $limit, $page);
		
		// retreive the comments
		$comments = get_usercomments_global($userid, $paging['offset'], $paging['limit']);
		
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
		
		// fetch the template
		if($_SESSION['valid'] == "true")
			if($userid == $_SESSION['id']) {
				return $smarty->fetch("datagrid/comment.login.grid.tpl");
			} else {
				return $smarty->fetch("datagrid/comment.grid.tpl");
			}
		else
			return $smarty->fetch("datagrid/comment.grid.tpl");
	}
	
	/** function to get the comments called with ajax */
	function get_userfavourites_ajax($userid, $page)
	{
		// global variables
		global $smarty;
		
		// variables
		$limit = 13;
		
		// get amount news
		$amountfavourites = get_amount_user_favourites($userid);
		
		// retreive the paging data
		$paging = get_pagingdata($amountfavourites, $limit, $page);
		
		// retreive the comments
		$favourites = get_userfavourite_global($userid, $paging['offset'], $paging['limit']);
		
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
		$smarty->assign('favorites', $favourites);
		
		// fetch the template
		if($_SESSION['valid'] == "true")
			if($userid == $_SESSION['id']) {
				return $smarty->fetch("datagrid/favourite.login.grid.tpl");
			} else {
				return $smarty->fetch("datagrid/favourite.grid.tpl");
			}
		else
			return $smarty->fetch("datagrid/favourite.grid.tpl");
	}
	
	/** function to delete news */
	function delete_news($newsid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		$result = $newsManager->delete_news($newsid);
		
		// check
		if($result)
			return 1;
		else
			return 2;
	}
?>