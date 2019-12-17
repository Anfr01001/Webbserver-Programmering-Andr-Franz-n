<?php

 if( isset($_POST['namn']) && isset($_POST['Efternamn']) && isset($_POST['Stad']) isset($_POST['Gata']) && isset($_POST['Husnummer']) && isset($_POST['Postnummer']) && isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['mail'])) {
	
	$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Efternamn = filter_input(INPUT_POST, 'Efternamn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Postnummer = filter_input(INPUT_POST, 'Postnummer', FILTER_SANITIZE_NUMBER_INT);
	
	$Postadress = filter_input(INPUT_POST, 'postadress', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$telefon = filter_input(INPUT_POST, 'Telefon', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL,FILTER_FLAG_STRIP_LOW);
	
	include"Connect.php";
	
	sql="SELECT * FROM users WHERE username=? OR email=?";
	$res = $dbh->prepare($sql);
	$res->bind_param("ss", $username, $mail);
	$res->execute();
	$result =$res->get_result();
	$row = $result->fetch_assoc();
	
	//kolla om en anvädare med samma email eller username finns
	if($row !== 0){
	
	}else {
	 $status = 1;
	 sql="INSERT INTO users(username,email,password,status) VALUE(?,?,?,?)";
	 $res = $dbh->prepare($sql);
	 $res->bind_param("sssi", $username, $mail, $pwd, $status);
	 $res->execute();
	 
	 sql="INSERT INTO customers(username,FirstName,LastName,Postnummer, Postadress, telefon, adress) VALUE(?,?,?,?,?,?,?)";
	 $res = $dbh->prepare($sql);
	 $res->bind_param("sssisss", $username, $namn, $Efternamn,$Postnummer,$Postadress,$telefon, $adress);
	 $res->execute();
	}
	
	mysql_close($dbh)

 }
?>


<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
		 <link rel="stylesheet" href="../../html/css/stilmall.css">
	</head>
  <body id="login">
    <div id="wrapper">

      
      <?php
	  require "../php/Header.php";
	  require "../php/Meny.php";
	  ?>
		
			<main> <!--Huvudinnehåll-->
				<section>
					 <form action="SkapaNyAnvändare.php" method="post">
					 
			<p><label for="namn">Förnamn:</label>
            <input type="text" id="namn" name="namn"></p>

			<p><label for="Efternamn">Efternamn:</label>
            <input type="text" id="Efternamn" name="Efternamn"></p>		
			
			<p><label for="Telefon">Telefon:</label>
            <input type="text" id="Telefon" name="Telefon"></p>		

			<br>
			
			<p><label for="postadress">postadress:</label>
            <input type="text" id="postadress" name="postadress"></p>	

			<p><label for="adress">adress:</label>
            <input type="text" id="adress" name="adress"></p>	


			<p><label for="Postnummer"> Postnummer:</label>
            <input type="number" id="Postnummer" name="Postnummer"></p>				
			
			<br>
			
            <p><label for="username">Användarnamn:</label>
            <input type="text" id="username" name="username"></p>
			
            <p><label for="pwd">Lösenord:</label>
            <input type="password" id="pwd" name="password"></p>
			
			<p><label for="mail">Mailaddress:</label>
            <input type="email" id="mail" name="mailadress"></p>
			
            <p>
            <input type="submit" value="Skapa användare">
            </p>
			
          </form>
				</section>
			</main>

    </div>
      <?php
	  require "../php/Footer.php";
	  ?>

	</body>
</html>
