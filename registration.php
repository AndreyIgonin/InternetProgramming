<?php
    $title = "Регистрация пользователя";
	require_once('header.php');
	require_once('/core/functions.php');
	
	if(isset($_POST['sub']))
		validateUser();
?>

<div>
	<h1><?=$title?></h1>
	<form action="registration.php" method="post">
		<label>ФИО</label> <input type='text' placeholder='Фамилия Имя Отчество' name='fio' required value='<?=$fio?>'> <br>
		<label>Группа</label> <input type='text' placeholder='Учебная группа' name='group' required> <br>
		<label>Дата рождения</label> <input type='date' name='birthday' placeholder='Дата рождения' required> <br>
	
		<label><?=LEGEND_LOGIN?></label> <input type='text' placeholder='<?=LOGIN?>' name='login' required> <br>
		<label>Пароль</label> <input type='password' placeholder='Пароль' name='pass' required> <br>
		<label>Пароль повторно</label> <input type='password' placeholder='Пароль повторно' name='pass_req' required> <br>
		
		
		<input type='submit' name='sub' value='Зарегестироваться'>
	</form>
</div>

<?php	
	require_once('footer.php');
	
?>	