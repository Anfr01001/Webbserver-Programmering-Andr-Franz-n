<?php

//Fixa så att det man inte ändrar på stannar som samma

include"Connect.php";

	$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Efternamn = filter_input(INPUT_POST, 'Efternamn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$Postadress = filter_input(INPUT_POST, 'Postadress', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	//$Postnummer= filter_input(INPUT_POST, 'Postnummer', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$Adress = filter_input(INPUT_POST, 'Adress', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$telefon = filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);


session_start();

$username=$username=$_SESSION['username'];;

$sql= "UPDATE customers SET FirstName=?, LastName=?, postadress=?, telefon=?, adress=? WHERE username=?;"; 
$res = $dbh->prepare($sql);
$res->bind_param("ssssss", $namn,$Efternamn,$Postadress,$telefon,$Adress,$username);
$res->execute();

?>