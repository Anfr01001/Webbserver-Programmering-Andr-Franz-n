<?php
	
	if(empty($_POST['username']) || empty($_POST['password'])) {
		echo "EJ ifylld";
		header("Location:login.php");
	}

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $username;

	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	echo $password;

?>