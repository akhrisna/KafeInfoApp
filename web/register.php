<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Register page.
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
		$template = $templates['register'];
		$template_gradient = "includes/blank.gradient.tpl";
		$template_regular = "register.tpl";
		$template_footer = "includes/footer.black.tpl";
		if($_SESSION['language'] == "english") {
			$language = "en";
		} else {
			$language = "ina";
		} 
		
		// if variables are posted
		if(isset($_POST['register']))
		{
			// retreive variables
			$username = $_POST['username'];
			$password = $_POST['password'];
			$passwordagain = $_POST['passwordagain'];
			$email = $_POST['email'];
			
			// initialize variables
			$error = array();
			$i = 0;
			
			// check variables posted for blank fields
			if((!check_empty($username)) || (!check_empty($password)) || (!check_empty($passwordagain)) || (!check_empty($email))) {
				$error[$i] = "fillfield";
				$i++;
			}
			
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
			
			// check both password
			if($password != $passwordagain) {
				$error[$i] = "passworddifferent";
				$i++;
			}
			
			// check password length
			if(strlen($password) < 5) {
				$error[$i] = "passwordlength";
				$i++;
			}
			
			// check username database
			if(check_username($username))
			{
				$error[$i] = "usernameexist";
				$i++;
			}
			
			// check email database
			if(check_email($email))
			{
				$error[$i] = "emailexist";
				$i++;
			}
			
			// if there are no error
			if(empty($error))
			{
				// get verification code
				$verificationcode = get_verificationcode();

				// new usermanager instance
				$userManager = new UserManager();
					
				// add new user
				if($userManager->new_user($username,$password,$email,$verificationcode,'false'))
				{
					// send confirmation email
					if(send_confirmation($email, $verificationcode, $username, $password, $language))
					{
						// go to the activation and pass message
						header("Location: activation.php?message=activatenow");
						exit;
					}
					else
					{
						// set error
						$error[$i] = "sendemailfailed";
						$i++;
						
						// pass the error message
						$smarty->assign('error', $error);
					}
				}
				else
				{
					// set error
					$error[$i] = "adduserfailed";
					$i++;
					
					// pass the error message
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