<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Login page.
 */
 
	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		/** requires the modules */
		require_once("../modules/sessionmanager/session.class.php");
		require_once("../modules/usermanager/user.class.php");
		
		// global variables & variables
		global $templates;
		$template = $templates['login'];
		$template_gradient = "includes/blank.gradient.tpl";
		$template_regular = "login.tpl";
		$template_footer = "includes/footer.black.tpl";
		
		// new session instance
		$sessionManager = new  SessionManager();
		$login = $sessionManager->is_loggedin();
		
		// check if the user is login
		if($login) 
		{	
			// redirect to homepage
			header("Location: index.php");
		} 
		else 
		{
			// message passed
			if(isset($_REQUEST['message']))
			{
				// pass to template
				$msg = $_REQUEST['message'];
				$smarty->assign('message', $msg);
			}
			
			
			// check if the variables is passed
			if(isset($_POST['login'])) 
			{
				// retreive variables
				$error = array();
				$i = 0;
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				// check variables posted for blank fields
				if((!check_empty($username)) || (!check_empty($password))) {
					$error[$i] = "fillfield";
					$i++;
				}
				
				// check username posted for strange characters
				if(!check_character($username)) {
					$error[$i] = "usernamecharacter";
					$i++;
				}
				
				// if there are no error proceed with authentication
				if(empty($error))
				{
					// new usermanager instance
					$userManager = new UserManager();
					
					// authenticate user
					$status = $userManager->authenticate($username, $password);
					if($status == "1") 
					{
						
						// get user information
						$userinfo = $userManager->get_info($username);
						
						// set login session
						$sessionManager->set_session($userinfo);
						
						// set login cookies
						$sessionManager->set_cookies();
						
						// check if next page is stored
						if(($_COOKIE['nextpage']) && ($_COOKIE['nextpage'] != ""))
						{
							// everything is alright, redirect to home
							$nextpage = $_COOKIE['nextpage'];
							
							// clear the cookie
							setcookie("nextpage", "", time() - 3600);
							
							// redirect
							header("Location: $nextpage");
							exit;
						}
						else 
						{
							// redirect to index
							header("Location: index.php");
							exit;
						}
					} 
					elseif($status == "4") 
					{
						// if the account is not activate yet
						header("Location: activation.php");
						exit;
					}
					elseif($status == "3") 
					{
						// if the username is not found
						$error[$i] = "usernamenotfound";
						$i++;
					}
					elseif($status == "2") 
					{
						// if the account is not activate yet
						$error[$i] = "wrongpassword";
						$i++;
					}
				}
				
				// assign to template
				$smarty->assign('error', $error);
			}
			
			// pass form variables
			$smarty->assign('form_value', $_REQUEST);
			
			// pass the template
			$smarty->assign('content_section', $template);
			$smarty->assign('regular_section', $template_regular);
			$smarty->assign('gradient_content',$template_gradient);
			$smarty->assign('regular_footer_section',$template_footer);
		}
	}
?>