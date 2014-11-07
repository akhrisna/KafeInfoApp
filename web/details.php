<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract News details page with comments.
 */

	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		// add news manager
		require_once ("../libs/Sajax/Sajax.php");
		
		// global variables
		global $templates;
		global $newslistamt;
		
		// initial variables
		$voted = array();
		$template = $templates['details'];
		$footer_template = "includes/footer.details.inc.tpl";
		$type = 'all';
		$cur_page = 'home';
		$topic = 'popular';
		
		// export the function for sajax
		$sajax_request_type = "POST";
		sajax_init();
		sajax_export("fetch_comments");
		sajax_export("add_comment");
		sajax_export("save_news");
		sajax_export("report_news");
		sajax_handle_client_request();
		
		// retreive the news id
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			header("Location:index.php");
			exit;
		}

		// get news details
		$newsdetails = fetch_newsdetails($id);
		
		// get te news info
		$newsinfo = fetch_newsinfo($newsdetails['user_id'], $id);
		
		// get the news comments
		$newscomments = fetch_comments($id, false);
		
		// parse the necessary variables
		$newslink = parse_url($newsdetails['link']);
		$newsinfo['date_posted'] = date("d M Y", strtotime($newsdetails['datetime']));
		
		// if the user login
		if($_SESSION['valid'] == true) {
			$voted = fetch_votedata($id);
			$smarty->assign('voted', $voted);
		}
		
		// check if the current news is on user favorite news list
		if(!check_favorite($id)) {
			$smarty->assign('favorite', "true");
		}
		
		// check if the current news is on user favorite news list
		if(!check_reported($id)) {
			$smarty->assign('reported', "true");
		}
	
		// pass variables to the template
		$smarty->assign('newsdetails', $newsdetails);
		$smarty->assign('newsinfo', $newsinfo);
		$smarty->assign('newslink', $newslink);
		$smarty->assign('newscomments', $newscomments);
		$smarty->assign('content_section', $template);
		$smarty->assign('footer_section', $footer_template);
		$smarty->assign('cur_page', $newsdetails['topic']);
		$smarty->assign('topic', $topic);
		$smarty->assign('type', $type);
		$smarty->assign('title_specific', $newsdetails['title']);
	}
	
	/** function to fetch the news details */
	function fetch_newsdetails($id)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get the news details
		$newsdetails = $newsManager->get_newsdetails($id);
		
		// return
		return $newsdetails;
	}
	
	/** funtion to retreive the news information */
	function fetch_newsinfo($userid, $id)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get the news information
		$newsinfo = $newsManager->get_newsinfo($userid, $id);
		
		// return
		return $newsinfo;
	}

	/** function to determine if the news is voted or not */
	function fetch_votedata($id)
	{
		// fetch the voted and buried news
		$votednews = $_SESSION['voteup'];
		$buriednews = $_SESSION['votedown'];
		
		// new array for holding datas
		$voted = array();
		
		// insert to array
		$votedarray = explode("|", $votednews);
		$buriedarray = explode("|", $buriednews);
		
		// loop through the news array and assign variables if the news voted
		if(!empty($votedarray)) {
			foreach($votedarray as $votedid) {
				if($id == $votedid) {
					$voted['up'] = "true";
				}
			}
		}
		
		// loop through the news array and assign variables if the news buried
		if(!empty($buriedarray)) {
			foreach($buriedarray as $burydid) {
				if($id == $burydid) {
					$voted['down'] = "true";
				}
			}
		}
		
		// return
		return $voted;
	}
	
	/** function to get the comments also with the username and id */
	function fetch_comments($id, $ajax=true)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		require_once ("../modules/usermanager/user.class.php");
		require_once ("../libs/Smarty/libs/Smarty.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		$userManager = new  UserManager();
		$smarty = new Smarty;
		$i = 0;
		
		// intialize smarty
		$smarty->template_dir = 'templates/';
		$smarty->compile_dir = 'templates_c/';
		
		// smarty languages
		$smarty->config_dir = "../modules/languagemanager";
		
		// grab the language selection in session
		if($_SESSION['language'] == "english")
		{
			 $smarty->config_load('en.conf');
			 $smarty->assign('language',"en");
		}
		else
		{
			$smarty->config_load('ina.conf');
			$smarty->assign('language',"ina");
		}
		
		// get the comments
		$newscomments = $newsManager->get_newscomments($id);
		
		// loop through the comments and fetch the username and id
		foreach($newscomments as $comments)
		{
			$userinfo = $userManager->get_infoid($comments['user_id']);
			$newscomments[$i]['datetime'] = date("d M Y H:i", strtotime($comments['datetime']));
			$newscomments[$i]['username'] = $userinfo['username'];
			$grav = generate_gravatar($userinfo['email']);
			$newscomments[$i]['avatar'] = $grav;
			$i++;
		}
		
		// check where the call come from
		if($ajax == true)
		{
			// assign variables to template
			$smarty->assign('newscomments', $newscomments);
			if($_SESSION['valid'] == true) {
				$smarty->assign('login', 'true');
			}
			// fetch the template and return
			return $smarty->fetch('includes/comments.inc.tpl');
		}
		else
		{
			// return
			return $newscomments;
		}
	}

	/** function to add a comment, called by ajax */
	function add_comment($comment, $newsid)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// check if user login
		if($_SESSION['valid'] == true) 
		{
			// send the comments to news manager
			if($newsManager->set_newscomments($comment, $newsid))
			{
				// return
				return true;
			}
			else
			{
				// return
				return false;
			}
		}
		else
		{
			// return
			return false;
		}
	}
	
	/** function to save the news */
	function save_news($newsid)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// check if user login
		if(($_SESSION['valid'] == true) && (check_favorite($newsid)))
		{
			// send the comments to news manager
			if($newsManager->set_newsfavorite($newsid))
			{
				// return
				return true;
			}
			else
			{
				// return
				return false;
			}
		}
		else
		{
			// return
			return false;
		}
	}
	
	/** function to report the news */
	function report_news($newsid)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// check if user login
		if(($_SESSION['valid'] == true) && (check_reported($newsid)))
		{
			// send the comments to news manager
			if($newsManager->set_newsreport($newsid))
			{
				// return
				return true;
			}
			else
			{
				// return
				return false;
			}
		}
		else
		{
			// return
			return false;
		}
	}
	
	/** function to check for favorites news */
	function check_favorite($newsid)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// check
		if($newsManager->check_newsfavorite($newsid))
		{
			// return
			return true;
		}
		else
		{
			// return
			return false;
		}
	}
	
	/** function to check for reported news */
	function check_reported($newsid)
	{
		// add news manager
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// check
		if($newsManager->check_newsreport($newsid))
		{
			// return
			return true;
		}
		else
		{
			// return
			return false;
		}
	}
	
	/** function to generate gravatar */
	function generate_gravatar($email) 
	{
		// gravatar settings
		$default = "http://kafeinfo.com/web/images/ic_thumb_small.gif";
		$size = 20;
		//You can construct your gravatar url with the following php code:
		$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email)."&amp;default=".urlencode($default)."&amp;size=".$size;
		//Once the gravatar URL is created, you can output it whenever you please:
		return $grav_url;
	}
?>