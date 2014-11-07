<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Get activation code page.
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
		$template = $templates['getactivation'];
		$template_gradient = "includes/blank.gradient.tpl";
		$template_regular = "getactivation.tpl";
		$template_footer = "includes/footer.black.tpl";
		if($_SESSION['language'] == "english") {
			$language = "en";
		} else {
			$language = "ina";
		} 
		
		// if variables are passed from the form
		if(isset($_POST['getactivation']))
		{
			// get the variables
			$email = $_POST['email'];
			$username = $_POST['username'];
			
			// initialize variables
			$error = array();
			$i = 0;
			
			// check username posted for strange characters
			if(!check_character($username)) {
				$error[$i] = "usernamecharacter";
				$i++;
			}
			
			// check email posted
			if(!valid_email($email)) {
				$error[$i] = "emailinvalid";
				$i++;
			}
			
			// if there are no error
			if(empty($error))
			{
				// new usermanager instance
				$userManager = new UserManager();
				
				// get user information
				$user_information = $userManager->get_info_email($email);
				
				// if the user is exist
				if($user_information)
				{
					// get the username
					$username_db = $user_information['username'];
					
					// check username
					if($username != $username_db)
					{
						// user not exist
						$error[$i] = "usernamedifferent";
						$i++;
					}
					else
					{
						// get activation code
						$activationcode = $user_information['verification_code'];
						
						// send the activation code
						send_activation($email,$activationcode,$language);
						
						// go to the activation and pass message
						header("Location: activation.php?message=getactivationsuccess");
						exit;
					}
				}
				else
				{
					// user not exist
					$error[$i] = "usernotfound";
					$i++;
				}
				
				// assign to template
				$smarty->assign('error', $error);
			}
			else
			{
				// pass the error message
				$smarty->assign('error', $error);
			}
		}
		
		// pass form variables
		$smarty->assign('form_value', $_REQUEST);
		
		// pass the template
		$smarty->assign('content_section', $template);
		$smarty->assign('regular_section', $template_regular);
		$smarty->assign('gradient_content',$template_gradient);
		$smarty->assign('regular_footer_section',$template_footer);
	}

?>