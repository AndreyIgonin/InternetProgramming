<?php
    $title = "Мои работы";
	require_once('header.php');
	
	$login = "";
	$pass = htmlspecialchars( $_POST['pass_auth'] );
	$error = "";
	
	if(isset($_POST['login_auth']))
		$login = htmlspecialchars( $_POST['login_auth'] );
	
//	print_r($_POST);
	if(!empty($login))
	{
		if( empty($pass) ) {
			
			$error = "Пароль не может быть пустым";
		}
		else
			$_SESSION['auth'] = true;
	}
?>

</div>

<?php if(!isset($_SESSION['auth'])): ?>

	<div>
		<div class='error'> <?= $error ?> </div>
		<form action="auth.php" method="post">
			<label>Логин</label> <input type='text' placeholder='Введите логин' name='login_auth' value='<?=$login?>' required> <br>
			<label>Пароль</label> <input type='password' placeholder='Пароль' name='pass_auth' required> <br>
			<input type='submit' value='Авторизоваться'>
		</form>
	</div>

<?php else: ?>
       
	<div> 
		<a href="/2021/exit.phpt.php?logout=yes"> ВЫХОД </a>
	</div>	
 
<?php endif; ?>
<div>

<?php	
	require_once('footer.php');
	
?>	
