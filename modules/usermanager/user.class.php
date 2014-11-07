<?php

/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Class to control the user
 */
 
 	/** requires the database setup */
	if($_SERVER["DOCUMENT_ROOT"] == "/home/web/snl242676") {
		require_once ($_SERVER["DOCUMENT_ROOT"]."/config/connect.php");
		require_once ($_SERVER["DOCUMENT_ROOT"]."/config/config.inc.php");
	} else {
		require_once ($_SERVER["DOCUMENT_ROOT"]."/workspace/ki/config/connect.php");
		require_once ($_SERVER["DOCUMENT_ROOT"]."/workspace/ki/config/config.inc.php");
	}
 
 	/** user manager class start */
	class UserManager
	{
		/** function to authenticate the user (1=success, 2=wrong password, 3=username not found) */
		function authenticate($username, $password, $fromcookie = false)
		{
			// encrypt the password with md5 and remove possibility of html tags and addslashes
			$username = strip_tags($username);
			$username = addslashes($username);
			
			// check password
			if($fromcookie == false)
				$password = md5($password);
			
			// get the user info
			$userinfo = $this->get_info($username);
			if($userinfo)
			{
				// check activation
				if(!$this->check_activation($username))
				{
					// return 4 if the account is not activates
					return 4;
				}
				
				// check the password
				if($password != $userinfo['password'])
				{
					// return 2 if the password is wrong
					return 2;
				}
				else
				{
					// success, return 1
					return 1;
				}
			}
			else
			{
				// username not found, return 3
				return 3;
			}
		}
		
		/** function to check the user account activation */
		function check_activation($username)
		{
			// set the global variables
			global $conn;
			
			// grab data from database
			$recordSet = null;
			$sql = "SELECT status FROM user WHERE username='$username' LIMIT 1";
			$recordSet = $conn->Execute($sql);
			while (!$recordSet->EOF) 
			{
				$user = $recordSet->fields;
				$status = $user['status'];
				$recordSet->MoveNext();
			}
			
			// return true or false
			if($status == "false")
				return false;
			else
				return true;
		}
		
		/** function to get the user information */
		function get_info($username)
		{
			// set the global variables and variables
			global $conn;
			$userinfo = array();
			
			// get the userdata from database
			$record = null;
			$sql = "SELECT * FROM user WHERE username LIKE '$username'";
			$record = $conn->Execute($sql);
			if($record->EOF)
			{
				// no username found in database
				return false; 
			}
			else
			{
				// while the record is not empty
				while (!$record->EOF) 
				{
					$userinfo = $record->fields;
					$record->MoveNext();
				}
				
				// return the userinfo array
				return $userinfo;
			}
		}
		
		/** function to get the user information based on his/her id */
		function get_infoid($id)
		{
			// set the global variables and variables
			global $conn;
			$userinfo = array();
			
			// get the userdata from database
			$record = null;
			$sql = "SELECT * FROM user WHERE id=$id";
			$record = $conn->Execute($sql);
			if($record->EOF)
			{
				// no username found in database
				return false; 
			}
			else
			{
				// while the record is not empty
				while (!$record->EOF) 
				{
					$userinfo = $record->fields;
					$record->MoveNext();
				}
				
				// return the userinfo array
				return $userinfo;
			}
		}
		
		/** function to get the user information using the email*/
		function get_info_email($email)
		{
			// set the global variables and variables
			global $conn;
			$userdata = array();
			
			// get the userdata from database
			$record = null;
			$sql = "SELECT * FROM user WHERE email LIKE '$email'";
			$record = $conn->Execute($sql);
			if($record->EOF)
			{
				// no username found in database
				return false; 
			}
			else
			{
				// while the record is not empty
				while (!$record->EOF) 
				{
					$userdata = $record->fields;
					$record->MoveNext();
				}
				
				// return the userinfo array
				return $userdata;
			}
		}
		
		/** function to edit user profile */
		function edit_info($name,$website,$location,$interest,$email_public) 
		{
			// global connection
			global $conn;
			
			// prepare the data
			$id=$_SESSION['id'];
			
			// sql command
			$sqlupdate="UPDATE user SET name='$name',location='$location',interest='$interest',email_public='$email_public',website='$website' WHERE user.id=$id LIMIT 1";
			$conn->Execute($sqlupdate);
		}
		
		/** function to edit user password */
		function edit_password($md5password,$id=null) 
		{
			// global connection
			global $conn;
			
			// prepare the data
			if($id == null) {
				$id = $_SESSION['id'];
			}
			
			// sql command
			$sqlupdate="UPDATE user SET password='$md5password' WHERE user.id='$id' LIMIT 1";
			$conn->Execute($sqlupdate);
		}
		
		/** function to insert new user */
		function new_user($username,$password,$email,$verification_code,$status)
		{
			// global connection
			global $conn;
			
			// prepare the data
			$passwordMD5 = md5($password);
			$ipaddress = $_SERVER['REMOTE_ADDR'];
			$datetime = date("Y-m-d H:i:s");
			
			// sql command
			$sql = "INSERT INTO user(id,username,password,email,ipaddress,role,verification_code,status,joinDate) VALUES('','$username','$passwordMD5','$email','$ipaddress','user','$verification_code','$status','$datetime')";
			if($conn->Execute($sql))
				return true;
			else
				return false;
		}
		
		/** function to delete user */
		function delete_user($userid)
		{
			// global connection
			global $conn;
			
			// delete the user
			$recordSet = null;
			$sql = "DELETE FROM user WHERE id=$userid LIMIT 1";
			$recordSet = $conn->Execute($sql);
		}
		
		
		/** function to ban user */
		function ban_user($userid,$ipaddress,$reason) 
		{
			// global connection
			global $conn;
			
			// prepare the data
			$datetime = date("Y-m-d H:i:s");
			
			// delete the favorite
			$recordSet = null;
			$sql = "INSERT INTO ban(id,ipaddress,user_id,reason,datetime) VALUES('','$ipaddress','$userId','$reason','$datetime')";
			$recordSet = $conn->Execute($sql);
		}
		
		/** function to un-ban user */
		function unban_user($userid) 
		{
			// global connection
			global $conn;
			
			// delete the user
			$recordSet = null;
			$sql = "DELETE FROM ban WHERE user_id=$userid LIMIT 1";
			$recordSet = $conn->Execute($sql);
		}
		
		/** function to activate user account */
		function activateuser($email)
		{
			// global connection
			global $conn;
			
			// prepare the data
			$id=$_SESSION['id'];
			
			// sql command
			$sqlupdate="UPDATE user SET status='true' WHERE user.email LIKE '$email' LIMIT 1";
			if($conn->Execute($sqlupdate))
				return true;
			else
				return false;
		}
	} 
?>