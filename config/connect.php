<?php
	
	/**
	 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
	 * @copyright Copyright: Kafeinfo Bookmarking Sosial 2009.
	 */
	 
	/** settings based on server */
	if($_SERVER["DOCUMENT_ROOT"] == "/home/web/snl242676") 
	{
		// This is the live environment
		require_once("config.inc.php");
		require_once("../libs/adodb/adodb.inc.php");
	} 
	else 
	{
		// This is the development environment
		require_once( $_SERVER["DOCUMENT_ROOT"]."/workspace/ki/config/config.inc.php");
		require_once( $_SERVER["DOCUMENT_ROOT"]."/workspace/ki/libs/adodb/adodb.inc.php");
	}
	
	
	// Master (original) database
	$conn = &ADONewConnection('mysql');
	if ($dbhost == "" ||	$dblogin == "" ||	$dbpasswd == "" || $dbname == "" || !$conn->Connect($dbhost, $dblogin, $dbpasswd, $dbname)) 
	{
		header("Location:../maintenance/maintenance.html");
		exit;
	}
?>
