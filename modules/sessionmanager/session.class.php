<?php

/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Class to control the session (login, destroy etc)
 */
 
	/** requires the database setup */
	if($_SERVER["DOCUMENT_ROOT"] == "/home/web/snl242676") {
		require_once ($_SERVER["DOCUMENT_ROOT"]."/config/connect.php");
		require_once ($_SERVER["DOCUMENT_ROOT"]."/config/config.inc.php");
	} else {
		require_once ($_SERVER["DOCUMENT_ROOT"]."/workspace/ki/config/connect.php");
		require_once ($_SERVER["DOCUMENT_ROOT"]."/workspace/ki/config/config.inc.php");
	}
	
	/** session manager class start */
	class SessionManager
	{	
		/** function to check if the user is logged in */
		function is_loggedin()
		{
			// return true if the session is valid
			if($_SESSION['valid'] == true)
				return true;
			else 
				return false;
		}
		
		/** function to set session */
		function set_session($userinfo)
		{
			// set the session
			$valid=true;
			$_SESSION['username'] = $userinfo['username'];
			$_SESSION['password'] = $userinfo['password'];
			$_SESSION['valid'] = $valid;
			$_SESSION['role'] = $userinfo['role'];
			$_SESSION['id'] = $userinfo['id'];
		}
		
		/** function to unset session variables */
		function unset_session()
		{
			// do the unset and set session valid to false
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['id']);
			unset($_SESSION['role']);
			$_SESSION['valid'] = false;
			
			// destroy session
			session_destroy();
		}
		
		/** function to set cookie */
		function set_cookies() 
		{
			// set the cookie
			setcookie("cookname", $_SESSION['username'], time()+60*60*24*100, "/");
		    setcookie("cookpass", (string)$_SESSION['password'], time()+60*60*24*100, "/");
		    if(!$_COOKIE['voteup'])
		    	setcookie("voteup", "", time()+60*60*24*100, "/");
		    
		    if(!$_COOKIE['votedown'])
		    setcookie("votedown", "", time()+60*60*24*100, "/");
		}
		
		/** function to unset cookies */
		function unset_cookies()
		{
			// do the unset
			if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass']))
			{
				setcookie("cookname", "", time()-60*60*24*100, "/");
				setcookie("cookpass", "", time()-60*60*24*100, "/");
			}
		}
		
		/** function to set language in session */
		function set_lang($lang)
		{
			// set the language
			$_SESSION['language'] = $lang;
		}
	}
?>