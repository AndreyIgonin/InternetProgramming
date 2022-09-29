<?php
    session_start();
	if(isset($_GET['logout']) && $_GET['logout']=='yes')
	{
		unset($_SESSION['auth']);
		header('Location: /auth.php ');
	}
?>
