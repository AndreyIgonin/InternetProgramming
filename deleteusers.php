<?php
  session_start();
	
  if(isset($_GET['id']))
  {
		$id = htmlspecialchars($_GET['id']);
		$db = mysql_connect("127.0.0.1", "root", "");
		if($db)
		{
			mysql_select_db("db_test", $db);
		
			$query = "DELETE FROM users WHERE id='$id'";
			
			$res = mysql_query($query, $db);
			
			header('location:/listusers.php');
			
		}
  }		


?>