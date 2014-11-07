<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Submit news page.
 */
	/** call sajax */
	require_once ("../libs/Sajax/Sajax.php");
	
	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		// global variables
		global $templates;
		
		// initial variables
		$template = $templates['submit'];
		$template_gradient = "includes/static.gradientdashboard.tpl";
		$template_regular = "edit.tpl";
		$template_footer = "includes/footer.black.tpl";
		$page = "news";
		$newsuserid = "";
		
		// export the function for sajax
		$sajax_request_type = "POST";
		sajax_init();
		sajax_export("edit_news");
		sajax_handle_client_request();
		
		// check if login
		if(($_SESSION['valid'] == "true")&&(isset($_GET['id'])))
		{
			// userid
			$uid = $_SESSION['id'];
			
			// new user instance
			$userManager = new UserManager();
			
			// request user information
			$userinfo = $userManager->get_infoid($uid);
			
			// get newsid
			$newsid = $_GET['id'];
			
			// get news information
			$newsdetails = get_newsdetails($newsid);
			$newsuserid = $newsdetails['user_id'];
			
			// check
			if($uid != $newsuserid) {
				header("Location:index.php");
				exit;
			}
		}
		else
		{
			header("Location:index.php");
			exit;
		}
		
		// unclean
		foreach($userinfo as $info) {
			$info = unclean_string($info);
		}
		
		// pass variables to the template
		$smarty->assign('userinfo', $userinfo);
		$smarty->assign('newsdetails', $newsdetails);
		$smarty->assign('content_section', $template);
		$smarty->assign('regular_section', $template_regular);
		$smarty->assign('gradient_content',$template_gradient);
		$smarty->assign('regular_footer_section',$template_footer);
		$smarty->assign('staticpage',$page);
	}
	
	/** function to submit news */
	function edit_news($newsid, $newslink, $newstitle, $newsdescription, $newskeywords, $newsscreenshots, $newstopic, $newstype, $news_userid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// remove tags (no html allowed)
		$uid = $_SESSION['id'];
		$newsscreenshots = strip_tags($newsscreenshots);
		$newslink = strip_tags($newslink);
		$newslink = fix_news($newslink);
		$newstitle = strip_tags($newstitle);
		$description = strip_tags($description);
		$tags = strip_tags($tags);

		// parse the tags
		$newskeywords = parse_tags($newskeywords);
		
		// check
		if($news_userid == $uid)
		{
			// new session instance
			$newsManager = new  NewsManager();
			
			// get the comments
			$news_exist = $newsManager->check_news_edit($newslink, $newsid);
			if($news_exist) {
				return 1; // news exist
			} else {
				$status = $newsManager->update_news($newsid, $newslink, $newstitle, $newsdescription, $newskeywords, $newsscreenshots, $newstopic, $newstype);
				if($status) {
					return 2; // everything is ok
				} else {
					return 3; // something is wrong
				}
			}
		}
		else
		{
			return 3;
		}
	}
	
	/** function to fix news */
	function fix_news($link)
	{
		// substring
		$rest = substr($link, 0, 4); 
		$rest = strtolower($rest);
		
		// check
		if($rest != "http") {
			$link = "http://".$link;
		}
		
		// return
		return $link;
	}
	
	/** function to get news details */
	function get_newsdetails($newsid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get the comments
		$newsdetails = $newsManager->get_newsdetails($newsid);
		
		// return
		return $newsdetails;
	}
?>