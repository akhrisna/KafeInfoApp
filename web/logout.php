<?php
	/**
	 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
	 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
	 * @abstract Logout page.
	 */
	
	/** initialize session */
	session_start();
	
	/** requires the function library */
	require_once("lib.inc.php");
	
	/** do the logout and redirect back to index */
	logout();
	header("Location: index.php");
	exit;
	
?>