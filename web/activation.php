<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Activation page.
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
		$template_regular = "activation.tpl";
		$template_footer = "includes/footer.black.tpl";
		
		// initialize variables
		$error = array();
		$i = 0;
		
		// message passed
		if(isset($_REQUEST['message']))
		{
			// pass to template
			$msg = $_REQUEST['message'];
			$smarty->assign('message', $msg);
		}
		
		// if variables are posted
		if((isset($_GET['ticket'])) || (isset($_POST['activation'])))
		{
			// get the variables if its from email
			if(isset($_GET['ticket']))
			{
				$code = $_GET['ticket'];
				$email = $_GET['email'];
			}
			elseif(isset($_POST['activation'])) // get variables from activation form
			{
				$code = $_POST['activationcode'];
				$code = md5($code);
				$email = $_POST['email'];
			}
			
			// check email posted
			if(!valid_email($email)) {
				$error[$i] = "emailinvalid";
				$i++;
			}
			
			// if there are no error
			if(empty($error))
			{
				// do the activation
				$status = activate_account($email, $code);
				
				// no email found in the database
				if($status == 1)
				{
					$error[$i] = "norecordemail";
					$i++;
				}
				elseif($status == 2) // wrong activation code
				{
					$error[$i] = "wrongactivationcode";
					$i++;
				}
				elseif($status == 4) // something went wrong
				{
					$error[$i] = "pleasetryagain";
					$i++;
				}
				elseif($status == 3) // account activated
				{
					header("Location:login.php?message=accountactivated");
					exit;
				}
				
				// pass the error message
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