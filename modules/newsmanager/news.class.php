<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract Class to control the news (get, update, delete)
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
	class NewsManager
	{	
		/** function to get the news */
		function get_news($query_topic, $query_next, $query_type, $query_order, $query_start, $query_limit, $userid=0)
		{
			// global connection (db)
			global $conn;
			
			// empty container and variables needed
			$news = array();
			$record_set = null;

			// sql command
			if($userid == 0)
				$sql = "SELECT * FROM news $query_type $query_next $query_topic ORDER BY $query_order DESC LIMIT $query_start, $query_limit";
			else
				$sql = "SELECT * FROM news $query_type $query_next $query_topic AND user_id=$userid ORDER BY $query_order DESC LIMIT $query_start, $query_limit";
			
			// get news (execute)
			$record_set = $conn->Execute($sql);
			
			// if there are results
			if(!$record_set->EOF) 
			{
				// loop through all the news
				while (!$record_set->EOF) 
				{
					// get the news from object
					$single_news = $record_set->fields;
					
					// for each news, get the additional information
					$newsinfo = $this->get_newsinfo($single_news['user_id'],$single_news['id']);
					
					// for each news, parse the date posted
					$single_news['date_posted'] = date("d M Y", strtotime($single_news['datetime']));
					
					// save the info to the original array
					$single_news['owner'] = $newsinfo['owner'];
					
					// save the info to the original array
					$single_news['commentamount'] = $newsinfo['commentamount'];
					
					$news[] = $single_news;
					$record_set->MoveNext();
				}
			}

			// return the news
			return $news;
		}
		
		/** function to post news */
		function post_news($newslink, $newstitle, $newsdescription, $newskeywords, $newsscreenshots, $newstopic, $newstype)
		{
			// global connection (db)
			global $conn;		
			
			// get the user id
			$id = $_SESSION['id'];
			$datetime = $this->get_currenttime();
			
			// sql 
			$sql="INSERT INTO news(id,title,description,tags,source,link,user_id,type,topic,datetime,galli,screenshot) VALUES('','$newstitle','$newsdescription','$newskeywords','','$newslink','$id','$newstype','$newstopic','$datetime','1','$newsscreenshots')";
			if($conn->Execute($sql))
				return true;
			else
				return false;
		}
		
		/** function to delete news */
		function delete_news($newsid)
		{
			// global connection (db)
			global $conn;		
			
			// get the user id
			$id = $_SESSION['id'];
			$datetime = $this->get_currenttime();
			
			// sql 
			$sql="DELETE FROM news WHERE id='$newsid' AND user_id='$id'";
			if($conn->Execute($sql))
				return true;
			else
				return false;
		}
		
		/** function to delete favourites */
		function delete_favourites($newsid)
		{
			// global connection (db)
			global $conn;		
			
			// sql 
			$sql="DELETE FROM favorite WHERE news_id='$newsid'";
			if($conn->Execute($sql))
				return true;
			else
				return false;
		}
		
		/** function to delete favourites */
		function delete_reported($newsid)
		{
			// global connection (db)
			global $conn;		
			
			// sql 
			$sql="DELETE FROM reported WHERE news_id='$newsid'";
			if($conn->Execute($sql))
				return true;
			else
				return false;
		}
		
		/** function to check news */
		function check_news($newslink)
		{
			// global connection (db)
			global $conn;
			
			//Grab data from database
			$recordSet = null;
			$sql="SELECT * FROM news WHERE link LIKE '$newslink'";
			$recordSet = $conn->Execute($sql);
			if($recordSet->EOF)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		/** function to check news while editing */
		function check_news_edit($newslink, $newsid)
		{
			// global connection (db)
			global $conn;
			
			//Grab data from database
			$recordSet = null;
			$sql="SELECT * FROM news WHERE id!='$newsid' AND link LIKE '$newslink'";
			$recordSet = $conn->Execute($sql);
			if($recordSet->EOF)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		/** function to get amount of searched news */
		function get_amount_search($searchterms)
		{
			// global connection (db)
			global $conn;
	
			// empty container and variables needed
			$record = null;
			
			// sql command
			$sql = "SELECT count(*) as cnt FROM news WHERE title LIKE '%$searchterms%' OR description LIKE '%$searchterms%' LIMIT 1";
			
			// get news (execute)
			$record = $conn->Execute($sql);
			
			// get the value
			$data = $record->fields;
			$newsamount = $data['cnt'];
			
			// return
			return $newsamount;
		}
		
		/***/
		function get_news_search($searchterms, $order, $start, $limit)
		{
			// global connection (db)
			global $conn;
			
			// empty container and variables needed
			$news = array();
			$record_set = null;

			// sql command
			$sql = "SELECT * FROM news WHERE title LIKE '%$searchterms%' OR description LIKE '%$searchterms%' ORDER BY $order DESC LIMIT $start, $limit";
			
			// get news (execute)
			$record_set = $conn->Execute($sql);
			
			// if there are results
			if($record_set) 
			{
				// loop through all the news
				while (!$record_set->EOF) 
				{
					// get the news from object
					$single_news = $record_set->fields;
					
					// for each news, get the additional information
					$newsinfo = $this->get_newsinfo($single_news['user_id'],$single_news['id']);
					
					// for each news, parse the date posted
					$single_news['date_posted'] = date("d M Y", strtotime($single_news['datetime']));
					
					// save the info to the original array
					$single_news['owner'] = $newsinfo['owner'];
					
					// save the info to the original array
					$single_news['commentamount'] = $newsinfo['commentamount'];
					
					$news[] = $single_news;
					$record_set->MoveNext();
				}
			}
			
			// return
			return $news;
		}
		
		/** function to edit news */
		function update_news($newsid, $newslink, $newstitle, $newsdescription, $newskeywords, $newsscreenshots, $newstopic, $newstype)
		{
			// global connection (db)
			global $conn;
			
			//Grab data from database
			$recordSet = null;
			$sqlupdate = "UPDATE news SET title='$newstitle', description='$newsdescription', tags='$newskeywords', link='$newslink',screenshot='$newsscreenshots',topic='$newstopic', type='$newstype' WHERE id=$newsid LIMIT 1";
			if($conn->Execute($sqlupdate))
				return true;
			else
				return false;
		}
		
		/** function to get the amount of news */
		function get_amount_news($query_topic, $query_next, $query_type, $userid=0)
		{
			// global connection (db)
			global $conn;

			// empty container and variables needed
			$record = null;
			
			// sql command
			if($userid == 0)
				$sql = "SELECT count(*) as cnt FROM news $query_type $query_next $query_topic LIMIT 1";
			else
				$sql = "SELECT count(*) as cnt FROM news $query_type $query_next $query_topic AND user_id=$userid LIMIT 1";
			
			// get news (execute)
			$record = $conn->Execute($sql);
			
			// get the value
			$data = $record->fields;
			$newsamount = $data['cnt'];
			
			// return
			return $newsamount;
		}
		
		/** function to retreive the news information */
		function get_newsinfo($userid, $newsid)
		{
			// global connection (db)
			global $conn;
			
			// empty container and variables needed
			$newsinformation = array();
			$record_news = null;
			
			// sql command to get the owner username
			$sqlowner = "SELECT username FROM user WHERE id=$userid LIMIT 1";

			// get news (execute)
			$record_news = $conn->Execute($sqlowner);
			
			// if there are results
			if(!$record_news->EOF) 
			{
				// get info
				$data = $record_news->fields;
				$newsdata['owner'] = $data['username'];
			}
			
			// sql command to get the amount of comment
			$sqlcomment = "SELECT count(*) as cnt FROM comments WHERE news_id=$newsid LIMIT 1";

			// get news (execute)
			$record_comment = $conn->Execute($sqlcomment);
			
			// if there are results
			if(!$record_comment->EOF) 
			{
				// get info
				$datacomment = $record_comment->fields;
				$newsdata['commentamount'] = $datacomment['cnt'];
			}
			
			// return variables
			return $newsdata;
		}
		
		/** function to retreive the single news information */
		function get_newsdetails($newsid)
		{
			// global connection (db)
			global $conn;
			
			// empty container and variables needed
			$newsdetails = array();
			$record_news = null;
			
			// sql command to get the owner username
			$sql = "SELECT * FROM news WHERE id=$newsid";

			// get news (execute)
			$record_news = $conn->Execute($sql);
			
			// if there are results
			if(!$record_news->EOF) 
			{
				while (!$record_news->EOF) 
				{
					$newsdetails = $record_news->fields;
					$record_news->MoveNext();
				}
			}
	
			// return variables
			return $newsdetails;
		}
		
		/** function to vote the news up */
		function set_vote($newsid, $type)
		{
			// global connection (db)
			global $conn;
			
			// get the vote amount
			$vote_array = $this->get_newsdetails($newsid);
			$current_vote = (int) $vote_array['galli'];
			$datetime = $this->get_currenttime();
			
			// check for the owner
			$owner_id = (int) $vote_array['user_id'];
			
			// cannot vote for his/her own news
			if($_SESSION['id'] != $owner_id)
			{
				if(($_SESSION['id'] == 3) || ($_SESSION['id'] == 154)) {
					// superadmin
					if($type == "up")
						$new_vote = $current_vote + 4;
					elseif($type == "down")
						$new_vote = $current_vote - 1;
				} else {
					// add the vote
					if($type == "up")
						$new_vote = $current_vote + 1;
					elseif($type == "down")
						$new_vote = $current_vote - 1;
				}
				
				// set new vote to database
				$sqlupdate="UPDATE news SET galli='$new_vote' WHERE id=$newsid LIMIT 1";
				$conn->Execute($sqlupdate);
			}
			else
			{
				$new_vote = $current_vote;
			}
			
			// return variables
			return $new_vote;
		}
		
		/** function to get the news comments */
		function get_newscomments($id)
		{
			// global connection (db)
			global $conn;
			
			// empty container and variables needed
			$newscomment = array();
			$comments = array();
			$record_news = null;
			
			// sql command to get the owner username
			$sql = "SELECT * FROM comments WHERE news_id=$id ORDER BY datetime";

			// get news (execute)
			$record_news = $conn->Execute($sql);
			
			// if there are results
			if(!$record_news->EOF) 
			{
				while (!$record_news->EOF) 
				{
					$newscomment = $record_news->fields;
					$comments[] = $newscomment;
					$record_news->MoveNext();
				}
			}
	
			// return variables
			return $comments;
		}
		
		/** function to get the user comments */
		function get_usercomments($uid, $start, $limit)
		{
			// global connection (db)
			global $conn;
			
			// empty container and variables needed
			$newscomment = array();
			$comments = array();
			$record_news = null;
			
			// sql command to get the owner username
			$sql = "SELECT * FROM comments WHERE user_id=$uid ORDER BY datetime DESC LIMIT $start,$limit ";

			// get news (execute)
			$record_news = $conn->Execute($sql);
			
			// if there are results
			if($record_news) 
			{
				while (!$record_news->EOF) 
				{
					$newscomment = $record_news->fields;
					$comments[] = $newscomment;
					$record_news->MoveNext();
				}
			}
	
			// return variables
			return $comments;
		}
		
		/** function to get the amount of comments per user */
		function get_amount_user_comments($userid)
		{
			// global connection (db)
			global $conn;

			// empty container and variables needed
			$record = null;
			
			// sql command
			$sql = "SELECT count(*) as cnt FROM comments where user_id=$userid LIMIT 1";
			
			// get news (execute)
			$record = $conn->Execute($sql);
			
			// get the value
			$data = $record->fields;
			$commentamount = $data['cnt'];
			
			// return
			return $commentamount;
		}
		
		/** function to get the user favourites */
		function get_userfavourites($userid, $start, $limit)
		{
			// global connection (db)
			global $conn;
			
			// empty container and variables needed
			$favourite = array();
			$favourites = array();
			$record_news = null;
			
			// sql command to get the owner username
			$sql = "SELECT * FROM favorite WHERE user_id=$userid ORDER BY datetime DESC LIMIT $start,$limit ";

			// get news (execute)
			$record_news = $conn->Execute($sql);
			
			// if there are results
			if($record_news) 
			{
				while (!$record_news->EOF) 
				{
					$favourite = $record_news->fields;
					$favourites[] = $favourite;
					$record_news->MoveNext();
				}
			}
	
			// return variables
			return $favourites;
		}
		
		/** function to get the amount of user favprites */
		function get_amount_user_favourites($userid)
		{
			// global connection (db)
			global $conn;

			// empty container and variables needed
			$record = null;
			
			// sql command
			$sql = "SELECT count(*) as cnt FROM favorite where user_id=$userid LIMIT 1";
			
			// get news (execute)
			$record = $conn->Execute($sql);
			
			// get the value
			$data = $record->fields;
			$favoriteamount = $data['cnt'];
			
			// return
			return $favoriteamount;
		}
		
		/** function to insert comment to news */
		function set_newscomments($comment, $newsid)
		{
			// global connection (db)
			global $conn;
			
			// strip html tags
			$comment = strip_tags($comment);
			
			// get userid and variables needed
			$id = $_SESSION['id'];
			$datetime = $this->get_currenttime();
		
			// sql syntax
			$sql="INSERT INTO comments(id,news_id,ipaddress,datetime,comment,user_id) VALUES('','$newsid','','$datetime','$comment','$id')";
			if($conn->Execute($sql))
				return true;
			else
				return false;	
		}
		
		/** function to delete comments */
		function delete_comments($commentid)
		{
			// global connection (db)
			global $conn;
			
			// get userid
			$id = $_SESSION['id'];
		
			// sql syntax
			$sql="DELETE FROM comments WHERE id=$commentid AND user_id=$id";
			if($conn->Execute($sql))
				return true;
			else
				return false;	
		}
		
		/** function to delete favourites */
		function delete_favourite($favouriteid)
		{
			// global connection (db)
			global $conn;
			
			// get userid
			$id = $_SESSION['id'];
		
			// sql syntax
			$sql="DELETE FROM favorite WHERE id=$favouriteid AND user_id=$id";
			if($conn->Execute($sql))
				return true;
			else
				return false;	
		}
		
		/** function to save news */
		function set_newsfavorite($newsid)
		{
			// global connection (db)
			global $conn;
			
			// get userid and variables needed
			$id = $_SESSION['id'];
			$datetime = $this->get_currenttime();
		
			// sql syntax
			$sql="INSERT INTO favorite(id,user_id,news_id,datetime) VALUES('','$id','$newsid','$datetime')";
			if($conn->Execute($sql))
				return true;
			else
				return false;	
		}
		
		/** function to report news */
		function set_newsreport($newsid)
		{
			// global connection (db)
			global $conn;
			
			// get userid and variables needed
			$id = $_SESSION['id'];
			$datetime = $this->get_currenttime();
		
			// sql syntax
			$sql="INSERT INTO reported(id,user_id,news_id,reason,description,datetime) VALUES('','$id','$newsid','','','$datetime')";
			if($conn->Execute($sql))
				return true;
			else
				return false;	
		}
		
		/** function to get the saved news */
		function get_newsfavorite()
		{
			// global connection (db)
			global $conn;
			
			// get userid and variables needed
			$id = $_SESSION['id'];
			$favorites = array();
			$record_favorite = null;
		
			// sql command to get the owner username
			$sql = "SELECT * FROM favorite WHERE user_id=$id ORDER BY datetime";

			// get news (execute)
			$record_favorite = $conn->Execute($sql);
			
			// if there are results
			if(!$record_favorite->EOF) 
			{
				while (!$record_favorite->EOF) 
				{
					$favorite = $record_news->fields;
					$favorites[] = $favorite;
					$record_favorite->MoveNext();
				}
			}
	
			// return variables
			return $favorites;
		}
		
		/** function to check if he/she already has favorites news */
		function check_newsfavorite($newsid)
		{
			// function to check favorite
			global $conn;
			
			// get the userid
			$id = $_SESSION['id'];

			// check data from database		
			$recordSet = null;
			$sql="SELECT * FROM favorite WHERE news_id='$newsid' AND user_id='$id'";
			$recordSet = $conn->Execute($sql);
			if($recordSet->EOF)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		/** function to check if he/she already has favorites news */
		function check_newsreport($newsid)
		{
			// function to check favorite
			global $conn;

			// check data from database		
			$recordSet = null;
			$sql="SELECT * FROM reported WHERE news_id='$newsid'";
			$recordSet = $conn->Execute($sql);
			if($recordSet->EOF)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		// function to serialized date
		function get_currenttime()
		{
			return date("Y-m-d H:i:s");
		}
	}

?>