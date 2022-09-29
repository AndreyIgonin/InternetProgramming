<?php
  session_start();
	
  if(isset($_GET['userout']))
  {
	  $_SESSION["AUTH"] = false;
  }
	
  if(!isset($_SESSION["AUTH"]) || $_SESSION["AUTH"]!=true)
  {
	if(isset($_POST['login']))
	{
		$login1 = htmlspecialchars($_POST['login']);
		$pass1 = htmlspecialchars($_POST['pass']);
		
		$db = mysql_connect("127.0.0.1", "root", "");
		if($db)
		{
			mysql_select_db("db_test", $db);
		
			$query = "SELECT * FROM users WHERE login='$login1' and pass=MD5($pass1)";
			
			$res = mysql_query($query, $db);
			
			if($res && ($item = mysql_fetch_array($res)))
			{	
				$_SESSION["AUTH"] = true;
			}
			mysql_close($db);			

			if($_SESSION["AUTH"])
				header('location: /index.php');//Требует улучшения адрес
			else
				header('location: /auth.php?error=users');
		}
		else
			echo "Ошибка подключения к БД";
		
	}
	else
		header('location: /auth.php');
  }


?>