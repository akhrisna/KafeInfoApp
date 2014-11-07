<?php

/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract MVC design pattern implementation for controller
 */

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
		 
	// display main.tpl as a base template
	if (main($smarty) !== false) 
		$smarty->display($main_template);

?>