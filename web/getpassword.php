<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Get password page.
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
		$template = $templates['getpassword'];
		$template_gradient = "includes/blank.gradient.tpl";
		$template_regular = "getpassword.tpl";
		$template_footer = "includes/footer.black.tpl";
		if($_SESSION['language'] == "english") {
			$language = "en";
		} else {
			$language = "ina";
		} 
		
		// if variables are passed from the form
		if(isset($_POST['getpassword']))
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
				// get the user data
				$userManager = new UserManager();
				$data = $userManager->get_info_email($email);
				
				// check if user exist
				if($data)
				{
					// match
					if($data['username'] == $username)
					{
						// get new password
						$newpassword = get_verificationcode();
						$newpassword = "ak".$newpassword."kh";
						$md5password = md5($newpassword);
						
						// set new password
						$userManager->edit_password($md5password,$data['id']);
						
						// send email with new password
						send_password($data['email'], $newpassword, $data['username'], $language);
						
						// message
						$messagesuccess = "passwordsent";
						$smarty->assign('message', $messagesuccess);
					}
					else
					{
						// show error
						$error[$i] = "usernamenotmatch";
						$smarty->assign('error', $error);
					}
				}
				else
				{
					// show error
					$error[$i] = "usernotfound";
					$smarty->assign('error', $error);
				}
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