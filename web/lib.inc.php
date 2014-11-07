<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Function library as a wrapper to the modules
 */

	/** function to switch the language */
	function switch_language($language)
	{
		// get required modules
		require_once ("../modules/sessionmanager/session.class.php");
		
		// new session instance
		$sessionManager = new  SessionManager();
		
		// check language and switch
		if($language == "ina") {
			$sessionManager->set_lang("indonesia");
		} else {
			$sessionManager->set_lang("english");
		}
		
		// redirect to index
		header("Location:index.php");
		exit;
	}
	
	/** function to get the paging data, return an array with offset, limit and page data. */
	function get_paging_data($numHits, $limit, $page) 
	{ 
	   // do the calculation
	   $numHits  = (int) $numHits; 
	   $limit    = max((int) $limit, 1); 
	   $page     = (int) $page; 
	   $numPages = ceil($numHits / $limit); 
	
	   $page = max($page, 1); 
	   $page = min($page, $numPages); 
	
	   $offset = ($page - 1) * $limit; 
	   $arr = array("offset" => $offset, "limit" => $limit, "numPages" => $numPages, "page" => $page);
	   
	   // return array
	   return $arr; 
	}
	
	/** function to get the amount of news */
	function get_amount_news($topic, $type, $userid=0)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// prepare query
		$query = prepare_query($topic, $type, "datetime", 0, 10);
		
		// get amount news
		if($userid == 0)
			$amountnews = $newsManager->get_amount_news($query['topic'], $query['next'], $query['type']);
		else
			$amountnews = $newsManager->get_amount_news($query['topic'], $query['next'], $query['type'], $userid);
			
		// return
		return $amountnews;
	}
	
	/***/
	function get_amt_search($searchterms)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// prepare query
		$amount = $newsManager->get_amount_search($searchterms);
		
		// return
		return $amount;
	}
	
	/***/
	function get_search($searchterms, $order, $start, $limit)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// prepare query
		$news = $newsManager->get_news_search($searchterms, $order, $start, $limit);
		
		// if the user login
		if($_SESSION['valid'] == true)
		{
			// fetch the voted and buried news
			$votednews = $_SESSION['voteup'];
			$buriednews = $_SESSION['votedown'];
			
			// new array for holding datas
			$n = array();
			$m = array();
			
			// insert to array
			$votedarray = explode("|", $votednews);
			$buriedarray = explode("|", $buriednews);
			
			// loop through the news array and assign variables if the news voted
			if(!empty($votedarray)) {
				foreach($news as $singlenews) {
					foreach($votedarray as $votedid) {
						if($singlenews['id'] == $votedid) {
							$singlenews['voted'] = "true";
						}
					}
					$n[] = $singlenews;
				}
			}
			
			// loop through the news array and assign variables if the news buried
			if(!empty($buriedarray)) {
				foreach($n as $singlenews) {
					foreach($buriedarray as $burydid) {
						if($singlenews['id'] == $burydid) {
							$singlenews['buried'] = "true";
						}
					}
					$m[] = $singlenews;
				}
			}
			
			// return news
			return $m;
		} 
		else
		{
			// return news
			return $news;
		}	
	}
	
	/** function to get the news */
	function get_news($topic, $type, $order, $start, $limit, $userid=0)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// prepare query
		$query = prepare_query($topic, $type, $order, $start, $limit); 
		
		// get news
		if($userid == 0)
			$news = $newsManager->get_news($query['topic'], $query['next'], $query['type'], $query['order'], $query['start'], $query['limit']);
		else
			$news = $newsManager->get_news($query['topic'], $query['next'], $query['type'], $query['order'], $query['start'], $query['limit'],$userid);
			
		// if the user login
		if($_SESSION['valid'] == true)
		{
			// fetch the voted and buried news
			$votednews = $_SESSION['voteup'];
			$buriednews = $_SESSION['votedown'];
			
			// new array for holding datas
			$n = array();
			$m = array();
			
			// insert to array
			$votedarray = explode("|", $votednews);
			$buriedarray = explode("|", $buriednews);
			
			// loop through the news array and assign variables if the news voted
			if(!empty($votedarray)) {
				foreach($news as $singlenews) {
					foreach($votedarray as $votedid) {
						if($singlenews['id'] == $votedid) {
							$singlenews['voted'] = "true";
						}
					}
					$n[] = $singlenews;
				}
			}
			
			// loop through the news array and assign variables if the news buried
			if(!empty($buriedarray)) {
				foreach($n as $singlenews) {
					foreach($buriedarray as $burydid) {
						if($singlenews['id'] == $burydid) {
							$singlenews['buried'] = "true";
						}
					}
					$m[] = $singlenews;
				}
			}
			
			// return news
			return $m;
		} 
		else
		{
			// return news
			return $news;
		}
	}
	
	/** function to get the comments */
	function get_usercomments_global($userid, $start, $limit)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get the comments
		$usercomments = $newsManager->get_usercomments($userid, $start, $limit);
		
		// loop and get the news information
		$i = 0;
		foreach($usercomments as $comment)
		{
			$newsinfo = $newsManager->get_newsdetails($comment['news_id']);
			$usercomments[$i]['newstitle'] = $newsinfo['title'];
			$usercomments[$i]['datetime'] = date("d M Y", strtotime($comment['datetime']));
			$i++;
		}
		
		// return
		return $usercomments;
	}
	
	/** function to get the amount of user news */
	function get_amount_user_comments($userid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get amount news
		$amountcomments = $newsManager->get_amount_user_comments($userid);
		
		// return
		return $amountcomments;
	}
	
	function get_amount_user_favourites($userid)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get amount news
		$amountfavourites = $newsManager->get_amount_user_favourites($userid);
		
		// return
		return $amountfavourites;
	}
	
	/** function to get the user favourites */
	function get_userfavourite_global($userid, $start, $limit)
	{
		// get required modules
		require_once ("../modules/newsmanager/news.class.php");
		
		// new session instance
		$newsManager = new  NewsManager();
		
		// get the comments
		$userfavourites = $newsManager->get_userfavourites($userid, $start, $limit);
		
		// loop and get the news information
		$i = 0;
		foreach($userfavourites as $favourite)
		{
			$newsinfo = $newsManager->get_newsdetails($favourite['news_id']);
			$userfavourites[$i]['newstitle'] = $newsinfo['title'];
			$userfavourites[$i]['datetime'] = date("d M Y", strtotime($favourite['datetime']));
			$i++;
		}
		
		// return
		return $userfavourites;
	}
	
	/** function to prepare the query */
	function prepare_query($topic, $type, $order, $start, $limit)
	{
		// requires the config
		require_once ("../config/template.inc.php");
		
		// global variables
		global $galli;
		
		// variables
		$query = array();
		
		// prepare the sql
		if($type == 'video') {
			$query['type'] = "WHERE type='video'";
		} elseif ($type == 'image') {
			$query['type']="WHERE type='gambar'";
		} elseif ($type == 'news') {
			$query['type'] = "WHERE type='berita'";
		} else {
			$query['type'] = "";	
		}
		
		// query patches
		if($type == "all")
			$query['next'] = "WHERE";
		else
			$query['next'] = "AND";
		
		// limits
		if($start <= 0)
			$query['start'] = 0;
		else
			$query['start'] = $start;
		$query['limit'] = $limit;
		
		// order
		$query['order'] = $order;
			
		// chose which one to show
		if($topic == 'all')
			$query['topic'] = "topic LIKE '%%' AND galli < $galli";
		elseif ($topic == 'popular')
			$query['topic'] = "topic LIKE '%%' AND galli >= $galli";
		elseif ($topic == 'user')
			$query['topic'] = "topic LIKE '%%'";
		elseif ($topic == 'technology')
			$query['topic'] = "topic LIKE '%technology%' AND galli >= $galli";
		elseif ($topic == 'sport')
			$query['topic'] = "topic LIKE '%sport%' AND galli >= $galli";
		elseif ($topic == 'celebrity')
			$query['topic'] = "topic LIKE '%celebrity%' AND galli >= $galli";
		elseif ($topic == 'musicfilm')
			$query['topic'] = "topic LIKE '%music%' AND galli >= $galli";
		elseif ($topic == 'health')
			$query['topic'] = "topic LIKE '%health%' AND galli >= $galli";
		elseif ($topic == 'socialpolitic')
			$query['topic'] = "topic LIKE '%politic%' AND galli >= $galli";
		elseif ($topic == 'world')
			$query['topic'] = "topic LIKE '%world%' AND galli >= $galli";
		elseif ($topic == 'business')
			$query['topic'] = "topic LIKE '%business%' AND galli >= $galli";
		elseif ($topic == 'offbeat')
			$query['topic'] = "topic LIKE '%offbeat%' AND galli >= $galli";
		elseif ($topic == 'other')
			$query['topic'] = "topic LIKE '%other%' AND galli >= $galli";
		
		// return 
		return $query;
	}
	
	
	/** function to logout, clear session */
	function logout()
	{
		// require session manager
		require_once ("../modules/sessionmanager/session.class.php");
		
		// new instance
		$sessionManager = new  SessionManager();
		
		// clear session and unset cookies
		$sessionManager->unset_session();
		$sessionManager->unset_cookies();
	}
	
	/** function to login using the user session */
	function login_cookie($username, $password)
	{
		/** requires the modules */
		require_once("../modules/sessionmanager/session.class.php");
		require_once("../modules/usermanager/user.class.php");
		
		// new instances
		$sessionManager = new  SessionManager();
		$userManager = new UserManager();
		
		// authenticate
		$status = $userManager->authenticate($username, $password, true);
		
		// check status
		if($status == 1)
		{	
			// get user information
			$userinfo = $userManager->get_info($username);
			
			// set login session
			$sessionManager->set_session($userinfo);
			
			// set login cookies
			$sessionManager->set_cookies();	
			
			// return
			return true;
		} 
		else 
		{
			// return
			return false;
		}
	}
	
	/** wrapper function to get the user information */
	function wrapper_get_userinfo($username)
	{
		/** requires the module */
		require_once("../modules/usermanager/user.class.php");
		
		// new instance
		$userManager = new UserManager();
		
		// get user information
		$userinfo = $userManager->get_info($username);
		
		// return
		return $userinfo;
	}
	
	/** function to validates email input */
	function valid_email($address)
	{
	  	 // check an email address is possibly valid
		if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $address))
			return true;
		else
			return false;
	}
	
	/** function to validates username input, avoid illegal characters */
	function check_character($username)
	{
		return !preg_match ("/[^A-z0-9]/", $username);
	}
	
	/** function to validates empty field input */
	function check_empty($field_value)
	{
		if (empty($field_value) || $field_value == "")
			return false;
		else
			return true;
	}
	
	/** function to check if the username exist */
	function check_username($username)
	{
		/** requires the modules */
		require_once("../modules/usermanager/user.class.php");
		
		// cleaning
		$username = clean_string($username);
		
		// new instance
		$userManager = new UserManager();
		
		// get user information
		$userinfo = $userManager->get_info($username);
		
		// return true if username found
		if($userinfo)
			return true;
		else
			return false;
		
	}
	
	/** function to check if the email exist */
	function check_email($email)
	{
		/** requires the modules */
		require_once("../modules/usermanager/user.class.php");
		
		// new instance
		$userManager = new UserManager();
		
		// get user information
		$userinfo = $userManager->get_info_email($email);
		
		// return true if username found
		if($userinfo)
			return true;
		else
			return false;
	}
	
	/** function to clear all html tags and slashes */
	function clean_string($oldstring)
	{
		// strips tags and add slashes
		$newstring = strip_tags($oldstring);
		$newstring = addslashes($newstring);
		
		// return
		return $newstring;
	}
	
	/** function to clear all html tags and slashes */
	function unclean_string($oldstring)
	{
		// strips tags and add slashes
		$newstring = stripslashes($oldstring);
		
		// return
		return $newstring;
	}
	
	/** function to generate the verification code */
	function get_verificationcode()
	{
		// randomize number
		$rand = rand(1000000, 99999);
		
		// return the value
		return $rand;
	}
	
	/** wrapper function to send confirmation registration email */
	function send_confirmation($emailto, $confirmationcode, $username, $password, $language)
	{
		// set initial variables
		$md5code = md5encrypt($confirmationcode);
		
		// check language
		if($language == "en")
		{
			$emailsender="noreply@kafeinfo.com";
			$emailsubject="Your registration at Kafeinfo Bookmarking Sosial";
			$emailmessage="Welcome to Kafeinfo $username,\n \nTo finish your registration in Kafeinfo, please copy the activation code below, and paste it on the activation form. \n \n".$confirmationcode."\n \nOr you can also click this below link.\n\nhttp://kafeinfo.com/web/activation.php?email=".$emailto."&ticket=".$md5code."\n\nYour username: ".$username."\nYour password: ".$password."\n \nThank you, \nKafeinfo Bookmarking Sosial.";
		}
		else
		{
			$emailsender="noreply@kafeinfo.com";
			$emailsubject="Verifikasi registrasi anda di Kafeinfo Bookmarking Sosial";
			$emailmessage="Selamat datang di Kafeinfo $username,\n \nUntuk melengkapi registrasi anda di Kafeinfo, silahkan copy kode verifikasi dibawah ini, dan masukkan di form aktivasi Kafeinfo. \n \n".$confirmationcode."\n \nAtau klik link dibawah ini.\n\nhttp://kafeinfo.com/web/activation.php?email=".$emailto."&ticket=".$md5code."\n\nUsername anda: ".$username."\nPassword anda: ".$password."\n \nTerima Kasih, \nKafeinfo Bookmarking Sosial.";
		}
		
		// send the email
		if(sendmail($emailto,$emailsender,$emailsubject,$emailmessage))
			return true;
		else
			return false;
	}
	
	/** wrapper function to send activation code */
	function send_activation($emailto, $confirmationcode, $language)
	{
		// set initial variables
		$md5code = md5encrypt($confirmationcode);
		
		// check language
		if($language == "en")
		{
			$emailsender="noreply@kafeinfo.com";
			$emailsubject="Your Kafeinfo Bookmarking Sosial activation code";
			$emailmessage="Welcome to Kafeinfo,\n \nTo finish your registration in Kafeinfo, please copy the activation code below, and paste it on the activation form. \n \n".$confirmationcode."\n \nOr you can also click this below link.\n\nhttp://kafeinfo.com/web/activation.php?email=".$emailto."&ticket=".$md5code."\n\nThank you, \nKafeinfo Bookmarking Sosial.";
		}
		else
		{
			$emailsender="noreply@kafeinfo.com";
			$emailsubject="Kode aktivasi anda di Kafeinfo Bookmarking Sosial";
			$emailmessage="Selamat datang di Kafeinfo,\n \nUntuk melengkapi registrasi anda di Kafeinfo, silahkan copy kode verifikasi dibawah ini, dan masukkan di form aktivasi Kafeinfo. \n \n".$confirmationcode."\n \nAtau klik link dibawah ini.\n\nhttp://kafeinfo.com/web/activation.php?email=".$emailto."&ticket=".$md5code."\n\nTerima Kasih, \nKafeinfo Bookmarking Sosial.";
		}
		
		// send the email
		if(sendmail($emailto,$emailsender,$emailsubject,$emailmessage))
			return true;
		else
			return false;
	}
	
	/** wrapper function to send acpasswordtivation code */
	function send_password($emailto, $newpassword, $username, $language)
	{
		// check language
		if($language == "en")
		{
			$emailsender="noreply@kafeinfo.com";
			$emailsubject="Your Kafeinfo Bookmarking Sosial new password";
			$emailmessage="Hi ".$username.",\n \nYour new password is:\n \n".$newpassword."\n \nYou can change your password later in your Kafeinfo Dashboard.\n\nThank you, \nKafeinfo Bookmarking Sosial.";
		}
		else
		{
			$emailsender="noreply@kafeinfo.com";
			$emailsubject="Password baru Kafeinfo Bookmarking Sosial";
			$emailmessage="Hai ".$username.",\n \nPassword baru anda adalah:\n \n".$newpassword."\n \nAnda dapat merubah password anda di Dashboard Kafeinfo.\n\nTerima Kasih, \nKafeinfo Bookmarking Sosial.";
		}
		
		// send the email
		if(sendmail($emailto,$emailsender,$emailsubject,$emailmessage))
			return true;
		else
			return false;
	}
	
	/** base function for sending email */
	function sendmail($emailTo,$emailFrom,$subject,$data) 
	{
		if($emailTo=="")
			return false;
		else {
			
			// set reply email
			$emailReply = "admin@kafeinfo.com";
			
			// common header
			$eol="\r\n";
			
			$headers .= 'From: Kafeinfo Bookmarking Sosial <'.$emailFrom.'>'.$eol;
			$headers .= 'Reply-To: Kafeinfo Bookmarking Sosial <'.$emailFrom.'>'.$eol;
			$headers .= 'Return-Path: Admin Kafeinfo <'.$emailReply.'>'.$eol;    // these two to set reply address
			$headers .= "X-Mailer: PHP v".phpversion().$eol;          // these two to help avoid spam-filters
			mail($emailTo,$subject,$data,$headers);
			return true;
		}
	}
	
	/** function to encrypt string or digits to md5 */
	function md5encrypt($input)
	{
		// encryption
		return md5($input);
	}
	
	/** function to activate an account */
	function activate_account($email, $ticket)
	{
		/** requires the modules */
		require_once("../modules/usermanager/user.class.php");
		
		// new instance
		$userManager = new UserManager();
		
		// get user information
		$userinfo = $userManager->get_info_email($email);
		
		// user exist
		if($userinfo)
		{
			// get db activation code
			$activationcode = (int) $userinfo['verification_code'];
			$activationcode = md5($activationcode);
			
			// match them
			if($activationcode == $ticket)
			{
				// do the activation
				if($userManager->activateuser($email))
				{
					// everything is gonna be alright
					return 3;
				}
				else
				{
					// something went wrong
					return 4;
				}
			}
			else
			{
				// activation code not match
				return 2;
			}
		}
		else
		{
			// no email found
			return 1;
		}
	}
	
	/** function to synchronize voting session and cookies */
	function synchronize_voting()
	{
		// this function synchronize the votes cookie and session
		if($_COOKIE['voteup'] != $_SESSION['voteup']) {
			 setcookie("voteup", $_SESSION['voteup'], time()+3600);
		}
		if($_COOKIE['votedown'] != $_SESSION['votedown']) {
			 setcookie("votedown", $_SESSION['votedown'], time()+3600);
		}
		
		// synchronize the votes session with cookie
		if($_SESSION['voteup'] == "")
			$_SESSION['voteup'] = $_COOKIE['voteup'];
		if($_SESSION['votedown'] == "")
			$_SESSION['votedown'] = $_COOKIE['votedown'];
	}
	
	/** function to get popular news */
	function get_popularnews($smarty)
	{
		// global connection 
		global $conn;
		$time = get_currenttime();
		
		// grab data from database
		$recordSet = null;
		$sql="SELECT * FROM news WHERE datetime >= DATE_SUB(CURDATE(),INTERVAL 7 DAY) ORDER BY galli DESC LIMIT 5";
		$recordSet = $conn->Execute($sql);
		if($recordSet->EOF) {
			return false; 
		} else {
			while (!$recordSet->EOF) {
				$news = $recordSet->fields;
				$newsList[]=$news;
				$recordSet->MoveNext();
			}
			$smarty->assign('popularnews',$newsList);
		}
	}

	// Function to show the latest news
	function get_latestnews($smarty)
	{
		// set variable
		$start = 0;
		$limit = 5;
		$order = 'datetime';
		$topic = 'all';
		$type = 'all';
		
		// retreive the upcoming news
		$news = get_news($topic,$type, $order, $start, $limit);
		$smarty->assign('latestnews',$news);
	}
	
	/** smarty function to remember the passed variables */
	function changeQuery($query, $key, $value) 
	{
	   return queryWithout2($query, $key)."&".urlencode($key)."=".urlencode($value);
	}
	
	function smarty_query($params)
	{
	   $query = urldecode($_SERVER["QUERY_STRING"]);
	   foreach ($params as $key => $value) {
	      $query = changeQuery($query, $key, $value);
	   }
	   return $query;
	}
	
	function queryWithout2($query, $wokey) 
	{
	   // the algorithms
	   $qstr = "";
	   $qa = explode("&", $query);
	   foreach ($qa as $qat) {
	      list ($key, $value) = explode("=", $qat);
	      if ($key != $wokey) {
	         if ($qstr)
	            $qstr .= "&";
	         //$qstr .= urlencode($key)."=".urlencode($value);
	         $qstr .= "$key=$value";
	      }
	   }
	   return $qstr;
	}
	
	/** function to get the paging data */
	function get_pagingdata($numHits, $limit, $page) 
	{ 
	   $numHits  = (int) $numHits; 
	   $limit    = max((int) $limit, 1); 
	   $page     = (int) $page; 
	   $numPages = ceil($numHits / $limit); 
	
	   $page = max($page, 1); 
	   $page = min($page, $numPages); 
	
	   $offset = ($page - 1) * $limit; 
	   $arr = array("offset" => $offset, "limit" => $limit, "numPages" => $numPages, "page" => $page);
	   
	   return $arr; 
	}
	
	/** function to parse tags */
	function parse_tags($tags) 
	{
		$healthy = array(",");
		$yummy   = array(" ");
	
		// the parsing function
		$newTags = str_replace($healthy, $yummy, $tags);
		return $newTags;
	}
	
	/** function to get the full url path */
	function get_url() 
	{
 		$pageURL = 'http';
 		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 		$pageURL .= "://";
 		if ($_SERVER["SERVER_PORT"] != "80") {
 			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 		} else {
  			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 		}
 		return $pageURL;
	}
	
	/** function to get the script name */
	function get_script()
	{
		$file = $_SERVER["SCRIPT_NAME"];
		$break = Explode('/', $file);
		$pfile = $break[count($break) - 1]; 
		return $pfile;
	}
	
	/** function to get the current time */
	function get_currenttime()
	{
		return date("Y-m-d H:i:s");
	}
?>