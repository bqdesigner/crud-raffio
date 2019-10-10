<?php
if(!$_SESSION['id_usuario']) {
	header('Location: login.php');
	exit();
}
?>