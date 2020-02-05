<?php

	session_start();
	
	if(empty($_POST['namn']) || empty($_POST['Efternamn']) || empty($_POST['Stad']) || empty($_POST['Gata']) || empty($_POST['Husnummer']) || empty($_POST['Postnummer']) || empty($_POST['username']) || empty($_POST['mailadress']) ) {
		echo "EJ ifylld";
		header("Location:NewUser.php");
	}

	$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $namn;
	
	$Stad = filter_input(INPUT_POST, 'Stad', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $Stad;
	
	$Gata = filter_input(INPUT_POST, 'Gata', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $Gata;
	
	$Husnummer = filter_input(INPUT_POST, 'Husnummer', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $Husnummer;

	$Postnummer = filter_input(INPUT_POST, 'Postnummer', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $Postnummer;	
	
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $username;
	
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $password;
	
	$mailadress = filter_input(INPUT_POST, 'mailadress', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $mailadress;
	
	

?>