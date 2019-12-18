<?php
session_start();

if(empty($_SESSION['username'])){
	$h1 = "Min onlinebutik - Logga in";
	require "../php/Templates/Template_login.php";
} else {
	header("location:Inloggad.php");
}


?>