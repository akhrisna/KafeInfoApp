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
		$template = $templates['tools'];
		$template_gradient = "includes/static.gradientdashboard.tpl";
		$template_regular = "tools.tpl";
		$template_footer = "includes/footer.black.tpl";
		$page = "tools";
		
		// check if login
		if($_SESSION['valid'] == "true")
		{
			// userid
			$uid = $_SESSION['id'];
			
			// new user instance
			$userManager = new UserManager();
 			// request user information       
			$userinfo = $userManager->get_infoid($uid);
		}
		else
		{
			header("Location:login.php");
			exit;
		}
				
		// pass variables to the template
		$smarty->assign('userinfo', $userinfo);
		$smarty->assign('content_section', $template);
		$smarty->assign('regular_section', $template_regular);
		$smarty->assign('gradient_content',$template_gradient);
		$smarty->assign('regular_footer_section',$template_footer);
		$smarty->assign('staticpage',$page);
	}
?>