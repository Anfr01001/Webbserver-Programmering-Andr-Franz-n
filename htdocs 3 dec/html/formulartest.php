<?php

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
	echo "Användaren finns inte!!!";
} else {
	if($row['password']==$password){
		echo "Användaren är inloggad!!!";
		session_start();
		$_SESSION['username'] = $username; 
		header("location:Inloggad.php");
	} else {
	echo "Felaktigt lösenord haha";
	}
}
?>