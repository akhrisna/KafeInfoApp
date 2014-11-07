<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract RSS Syndication page.
 */
 
 	/** start the session by requesting the controller */
	require_once("syndication.inc.php");
	require_once("lib.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		// get the topic
		if(isset($_GET['topic'])) 
		{	
			$topic = $_GET['topic'];
		} else {
			$topic = "popular";
		}
		
		// prepare the variables
		$type = 'all';
		$order = 'datetime';
		$link = 'http://www.kafeinfo.com/web/details.php?id=';
		
		// grab the assets
		$news = get_news($topic,$type, $order, 0, 20);
		
		// pass it to template
		$smarty->assign('news',$news);
		$smarty->assign('link',$link);
	}
 
?>