<?php

/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract MVC design pattern implementation for controller
 */
 //	error_reporting(E_ALL);
//ini_set('display_errors', '1');

	// start session
	session_start();
	
	// required libraries and configuration
	require_once("../config/config.inc.php");
	require_once("../config/template.inc.php");
	require_once("../config/connect.php");
	require_once("../libs/Smarty/libs/Smarty.class.php");
	require_once("lib.inc.php");
	global $hometext;
	
	// intialize smarty
	$smarty = new Smarty;
	$smarty->template_dir = 'templates/';
	$smarty->compile_dir = 'templates_c/';
	
	// smarty languages
	$smarty->config_dir = "../modules/languagemanager";
	
	// check if login
	if($_SESSION['valid'] == "true")
	{
		// assign the login variable for template
		$smarty->assign('login', "true");
		
		// get user information
		$user = wrapper_get_userinfo($_SESSION['username']);
		$smarty->assign('user', $user);
		
		// synchronize votes session and votes cookies
		synchronize_voting();
	}
	else
	{
		// get the cookie and assign variable for login
		if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])) 
		{
			// grab variable from cookie
			$_SESSION['tempusername'] = $_COOKIE['cookname'];
			$_SESSION['temppassword'] = $_COOKIE['cookpass'];
			
			// if both of them are set
			if(isset($_SESSION['tempusername']) && isset($_SESSION['temppassword'])) 
			{
				// login function
				$login = login_cookie($_SESSION['tempusername'],$_SESSION['temppassword']);
				if($login) 
				{
					// assign variable login
					$smarty->assign('login', "true");
					
					// get user information
					$user = wrapper_get_userinfo($_SESSION['username']);
					$smarty->assign('user', $user);
				} 
				
				// unset session to avoid memory leaks
				unset($_SESSION['tempusername']);
				unset($_SESSION['temppassword']);
			}
		}
		else
		{
			// default redirect for webtv platform
			$pagename = get_script();
			$nexturl = get_url();
			
			// check
			if($pagename == "submit.php")
			{
				// set the direction on the cookie
				setcookie("nextpage", $nexturl, time()+3600);
				
				// redirect to the login page
				header("Location:login.php");
				break;
			}
		}
	}
	
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
		 
	
	// set header to be utf-8
	header("Content-Type: text/html; charset=$charset");
	$smarty->assign('meta_charset',$charset);
	
	// assign title, style and favicon page
	$smarty->assign('titlepage',$titlepage);
	$smarty->assign('stylepath',$stylepath);
	$smarty->assign('faviconpath',$faviconpath);
	
	// assign the basic template (links & footer)
	$smarty->assign('meta_section',$meta_template);
	$smarty->assign('header_section',$header_template);
	$smarty->assign('languages_section',$languages_template);
	$smarty->assign('logo_section',$logo_template);
	$smarty->assign('links_section',$links_template);
	$smarty->assign('gradient_section',$gradient_template);
	$smarty->assign('filter_section',$filter_template);
	$smarty->assign('footer_section',$footer_template);
	$smarty->assign('javascript_section',$javascript_template);
	$smarty->assign('stylesheets_section',$stylesheets_template);
	$smarty->assign('statistics_section',$statistics_template);
	$smarty->assign('paging_section',$paging_template);
	
	// assign smarty functions
	$smarty->register_function("query", "smarty_query");
	
	// text for homepage
	if($_SESSION['language'] == "english") {
		$random = (rand()%3);
		$smarty->assign('hometext', $hometext['en'][$random]);
	} else {
		$random = (rand()%3);
		$smarty->assign('hometext', $hometext['ina'][$random]);
	}
	
	// get the script name 
	$file = $_SERVER["SCRIPT_NAME"];
	$break = Explode('/', $file);
	$pfile = $break[count($break) - 1];
	$smarty->assign('location', $pfile);
	
	// display main.tpl as a base template
	if (main($smarty) !== false) 
		$smarty->display($main_template);

?>