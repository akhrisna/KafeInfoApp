<?php

	/**
	 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
	 * @copyright Copyright: Kafeinfo Bookmarking Sosial 2009.
	 */

	/** settings based on server */
	if($_SERVER["DOCUMENT_ROOT"] == "/home/web/snl242676") 
	{
		// This is the live environment
		$dbhost = "localhost";
		$dbname = "kafeinfo";
		$dblogin = "root";
		$dbpasswd = "root";
		
		// This is the live environment
		$adodbLocation = "../libs/adodb";
	} 
	else 
	{
		// This is the development environment
		$dbhost = "localhost";
		$dbname = "kafeinfo";
		$dblogin = "root";
		$dbpasswd = "root";
		
		// This is the development environment
		$adodbLocation = $_SERVER["DOCUMENT_ROOT"]."/workspace/ki/libs/adodb";
	}
?>