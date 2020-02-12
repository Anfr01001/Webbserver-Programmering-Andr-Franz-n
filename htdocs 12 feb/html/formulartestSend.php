<?php

session_start();

include"Connect.php";
	$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Efternamn = filter_input(INPUT_POST, 'Efternamn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$Postadress = filter_input(INPUT_POST, 'Postadress', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$Postnummer= filter_input(INPUT_POST, 'Postnummer', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$Adress = filter_input(INPUT_POST, 'Adress', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$telefon = filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$Password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Password = password_hash($Password, PASSWORD_DEFAULT);
	

session_start();

$username=$_SESSION['username'];

$sql= "UPDATE customers SET FirstName=?, LastName=?,Postnummer=? , postadress=?, telefon=?, adress=? WHERE username=?;"; 
$res = $dbh->prepare($sql);
$res->bind_param("ssissss", $namn,$Efternamn,$Postnummer,$Postadress,$telefon,$Adress,$username);
$res->execute();

$sql= "UPDATE users SET email=?, password=? WHERE username=?;"; 
$res = $dbh->prepare($sql);
$res->bind_param("sss",$Email,$Password, $username);
$res->execute();

header("location:index.php");

?>