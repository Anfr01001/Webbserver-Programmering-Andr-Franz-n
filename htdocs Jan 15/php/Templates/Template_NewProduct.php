<?php

 if( isset($_POST['namn']) && isset($_POST['Beskrivning']) && isset($_POST['Pris']) && isset($_POST['Bild'])) {
	
	$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Beskrivning = filter_input(INPUT_POST, 'Beskrivning', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Pris = filter_input(INPUT_POST, 'Pris', FILTER_SANITIZE_NUMBER_INT);
	
	$Bild = filter_input(INPUT_POST, 'Bild', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	include"Connect.php";
	

	 $sql="INSERT INTO products(name,description,price,picture) VALUE(?,?,?,?)";
	 $res = $dbh->prepare($sql);
	 $res->bind_param("ssis", $namn, $Beskrivning, $Pris, $Bild);
	 $res->execute();
	 
	
	
	mysqli_close($dbh);

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
					 <form action="NewProducts.php" method="post">
					 
			<p><label for="namn">Namn:</label>
            <input type="text" id="namn" name="namn"></p>

			<p><label for="Beskrivning">Beskrivning:</label>
            <input type="text" id="Beskrivning" name="Beskrivning"></p>		
			
			<p><label for="Pris">Pris:</label>
            <input type="number" id="Pris" name="Pris"></p>		
			
			<p><label for="Bild">Bild:</label>
            <input type="text" id="Bild" name="Bild"></p>	

            <p>
            <input type="submit" value="Skapa produkt">
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
