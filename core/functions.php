<?php
function validateUser()
{
	global $fio;
	if(isset($_POST['fio']) && !empty($_POST['fio']))
		$fio = htmlspecialchars($_POST['fio']);

}
?>