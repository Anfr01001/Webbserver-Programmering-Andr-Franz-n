<?php	
	
	$dbh = new mysqli("localhost","dbuser","qwe123","webbshop");

if (!$dbh){
	echo "Connection failed";
	exit;
}
		$username=$_SESSION['username'];	
		$sql= "SELECT * FROM customers WHERE username=?"; 
		$res = $dbh->prepare($sql);
		$res->bind_param("s", $username);
		$res->execute();
		$result =$res->get_result();
		$row = $result->fetch_assoc();
	
?>


<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
		 <link rel="stylesheet" href="../../html/css/stilmall.css">
	</head>
  <body >
    <div >

      
      <?php
	  require "../php/Header.php";
	  require "../php/Meny.php";
	  ?>
	  
<main> <!--Huvudinnehåll-->
				<section>
					 <form action="formulartestSend.php" method="post">
					 
			<p><label for="user">Användarnamn:</label>
            <input type="text" id="user" name="username" placeholder= <?php echo $row['username']; ?> ></p>
			
			<p><label for="namn">Förnamn:</label>
            <input type="text" id="namn" name="namn" placeholder= <?php echo $row['FirstName']; ?> ></p>

			<p><label for="Efternamn">Efternamn:</label>
            <input type="text" id="Efternamn" name="Efternamn" placeholder= <?php echo $row['LastName']; ?> ></p>		

			<br>
			
			<p><label for="Postnummer"> Postnummer:</label>
            <input type="number" id="Postnummer" name="Postnummer" placeholder= <?php echo $row['Postnummer']; ?> ></p>				
			
			
			<p><label for="Stad">Postadress:</label>
            <input type="text" id="postadress" name="Postadress" placeholder= <?php echo $row['postadress']; ?> ></p>	

			<p><label for="Stad">Adress:</label>
            <input type="text" id="Adress" name="Adress" placeholder= <?php echo $row['adress']; ?> ></p>	
			
			<br>
			
			<p><label for="mail">Telefon:</label>
            <input type="tel" id="tel" name="telefon" placeholder= <?php echo $row['telefon']; ?> ></p>
			
            <p>
            <input type="submit" value="Ändra">
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
