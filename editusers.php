<?php
	if(isset($_POST['sub']))
	{
		$login = htmlspecialchars($_POST['login']);
		$id = htmlspecialchars($_POST['id']);
		$db = mysql_connect("127.0.0.1", "root", "");
		if($db)
		{
			mysql_select_db("db_test", $db);
			$query = "UPDATE users SET login='$login' WHERE id='$id'";
		
			
			$res = mysql_query($query, $db);
			if(!$res)
				echo mysql_error($db);
			else
			{
				mysql_close($db);
				header('location:/listusers.php');	
			}
		}
		
	}
	

    $title = "Редактирование пользователя";
	require_once('header.php');
	require_once('/core/functions.php');
	
	if(isset($_GET['id']))
    {
		$id = htmlspecialchars($_GET['id']);
		$db = mysql_connect("127.0.0.1", "root", "");
		if($db)
		{
			mysql_select_db("db_test", $db);
		
			$query = "SELECT * FROM users WHERE id='$id'";
			
			$res = mysql_query($query, $db);
			
			if($item = mysql_fetch_array($res))
			{
				$fio = $item['fio'];
				$login = $item['login'];
				$group = $item['group'];
				$birthday = $item['birthday'];
			?>

			<div>
				<h1><?=$title?></h1>
				<form action="editusers.php" method="post">
					<input type='hidden' name='id' value='<?=$_GET['id']?>'>
					<label>ФИО</label> <input type='text' placeholder='Фамилия Имя Отчество' name='fio' value='<?=$fio?>'> <br>
					<label>Группа</label> <input type='text' placeholder='Учебная группа' value='<?=$group?>' name='group' > <br>
					<label>Дата рождения</label> <input type='date' name='birthday' '<?=$birthday?>' placeholder='Дата рождения' > <br>
				
					<label><?=LEGEND_LOGIN?></label> <input type='text' placeholder='логин' value='<?=$login?>' name='login'> <br>
					<label>Пароль</label> <input type='password' placeholder='Пароль' name='pass' > <br>
					<label>Пароль повторно</label> <input type='password' placeholder='Пароль повторно' name='pass_req' > <br>
					
					
					<input type='submit' name='sub' value='Изменить'>
				</form>
			</div>
				
			<?php	
				mysql_close($db);
			}else
			{?>
				Пользваотель не найден, либо вы не имеете право его редактироать.
			<?php }
		}	
				
	}	


	require_once('footer.php');
	
?>	