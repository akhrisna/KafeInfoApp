<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Terms of use page.
 */
	
	/** requesting the user manager */
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
		$template = $templates['profile'];
		$template_gradient = "includes/static.gradientdashboard.tpl";
		$template_regular = "profile.tpl";
		$template_footer = "includes/footer.black.tpl";
		$page = "profile";
		
		// export the function for sajax
		$sajax_request_type = "POST";
		sajax_init();
		sajax_export("post_profile");
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
			
			// parse the userinfo
			$userinfo['joinDate'] = date("d M Y", strtotime($userinfo['joinDate']));
		}
		else
		{
			// check if login
			if($_SESSION['valid'] == "true")
			{
				$uid = $_SESSION['id'];
				header("Location:profile.php?id=$uid");
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
		
		// pass variables to the template
		$smarty->assign('userinfo', $userinfo);
		$smarty->assign('content_section', $template);
		$smarty->assign('regular_section', $template_regular);
		$smarty->assign('gradient_content',$template_gradient);
		$smarty->assign('regular_footer_section',$template_footer);
		$smarty->assign('staticpage',$page);
	}
	
	/** function to post profile */
	function post_profile($name, $location, $interest, $email_public)
	{
		/** requires the modules */
		require_once("../modules/usermanager/user.class.php");
		
		// new usermanager instance
		$userManager = new UserManager();
		
		// cleanup
		$name = clean_string($name);
		$location = clean_string($location);
		$interest = clean_string($interest);
		
		// post
		$userManager->edit_info($name,'', $location, $interest, $email_public);
	}
?>