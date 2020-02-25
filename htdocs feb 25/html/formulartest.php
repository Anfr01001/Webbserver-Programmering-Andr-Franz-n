<?php

session_start();

if(empty($_POST['username']) || empty($_POST['password'])) {
	// Ej ifyllda fält
	
header("location:login.php");
}
include"Connect.php";

$username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

$sql= "SELECT password FROM users WHERE username=?"; 
$res = $dbh->prepare($sql);
$res->bind_param("s", $username);
$res->execute();
$result =$res->get_result();
$row = $result->fetch_assoc();

if(!$row) {
	//echo "Användaren finns inte!!!";
	//$_GET['value'] = '1';
	header("location:login.php?value=1");
} else {
	if(password_verify($password, $row['password'])){
		//echo "Användaren är inloggad!!!";
		
		session_start();
		$_SESSION['username'] = $username; 
		header("location:Inloggad.php");
	} else {
	header("location:login.php?value=2");
	//echo "Felaktigt lösenord haha";
	}
}
?>