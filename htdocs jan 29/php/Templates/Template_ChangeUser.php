<?php	
	
	$dbh = new mysqli("localhost","dbuser","qwe123","webbshop");

if (!$dbh){
	echo "Connection failed";
	exit;
}
		$username=$_SESSION['username'];	
		$sql= "SELECT * FROM customers INNER JOIN users ON customers.username = users.username  WHERE customers.username  = ? "; 
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
            <input type="text" id="user" name="username" Value= <?php echo $row['username']; ?> ></p>
			
			<p><label for="namn">Förnamn:</label>
            <input type="text" id="namn" name="namn" Value= <?php echo $row['FirstName']; ?> ></p>

			<p><label for="Efternamn">Efternamn:</label>
            <input type="text" id="Efternamn" name="Efternamn" Value= <?php echo $row['LastName']; ?> ></p>		

			<br>
			
			<p><label for="Postnummer"> Postnummer:</label>
            <input type="number" id="Postnummer" name="Postnummer" Value= <?php echo $row['Postnummer']; ?> ></p>				
			
			
			<p><label for="Stad">Postadress:</label>
            <input type="text" id="postadress" name="Postadress" Value= <?php echo $row['postadress']; ?> ></p>	

			<p><label for="Stad">Adress:</label>
            <input type="text" id="Adress" name="Adress" Value= <?php echo $row['adress']; ?> ></p>	
			
			<br>
			
			<p><label for="telefon">Telefon:</label>
            <input type="tel" id="tel" name="telefon" Value= <?php echo $row['telefon']; ?> ></p>
			
			<p><label for="mail">Email:</label>
            <input type="email" id="mail" name="Email" Value= <?php echo $row['email']; ?> ></p>
			
			<p><label for="password">password:</label>
            <input type="password" id="password" name="password" Value= <?php echo $row['password']; ?> ></p>
			
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
