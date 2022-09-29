<?php include_once('header.php') ?>
<?php
	
  if(isset($_GET['userout']))
  {
	  $_SESSION["AUTH"] = false;
  }
	
  if(!isset($_SESSION["AUTH"]) || $_SESSION["AUTH"]!=true)
  {
	  ?>
	  <table>
		<tr> <td> id </td><td> Имя </td> <td> Логин</td><td>  День рождения </td> <td> Действия </td></tr>
	  <?php
	
		$db = mysql_connect("127.0.0.1", "root", "");
		if($db)
		{
			mysql_select_db("db_test", $db);
		
			$query = "SELECT * FROM users";
			
			$res = mysql_query($query, $db);
			
			while($item = mysql_fetch_array($res))
			{	
				?>
				<tr>
					<td> <?=$item['id']?> </td>
					<td> <?=$item['name']?> </td> 
					<td> <?=$item['login']?> </td>
					<td> <?=$item['birthday']?> </td> 
					<td> 
						<a href='/2021/editusers.phps.php?id=<?=$item['>Редактировать</a>
						<a onClick="javascript: return confirm('Удалить пользователя '+<?=$item['id']?>);"
					  	   href='/2021/deleteusers.phps.php?id=<?=$item['>Удалить</a>
					</td>
				</tr>
				<?php
			}
			mysql_close($db);			

		}
		else
			echo "Ошибка подключения к БД";
		
	?> </table> <?php	
  }


?>
<?php require_once('footer.php') ?>
