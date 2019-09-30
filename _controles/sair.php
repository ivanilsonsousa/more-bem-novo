<?php
	session_start();
	unset($_SESSION['idforn']);
	header("location: ../index.php");
?>