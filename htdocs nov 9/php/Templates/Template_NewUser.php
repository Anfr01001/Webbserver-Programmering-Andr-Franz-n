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

			<br>
			
			<p><label for="Stad">Stad:</label>
            <input type="text" id="Stad" name="Stad"></p>	

			<p><label for="Gata">Gata:</label>
            <input type="text" id="Gata" name="Gata"></p>	

			<p><label for="Husnummer">Husnummer:</label>
            <input type="number" id="Husnummer" name="Husnummer"></p>

			<p><label for="Postnummer"> Postnummer:</label>
            <input type="number" id="Postnummer" name="Postnummer"></p>				
			
			<br>
			
            <p><label for="user">Användarnamn:</label>
            <input type="text" id="user" name="username"></p>
			
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
