<?php

		require "Connect.php";
		
		$sql= "SELECT * FROM products"; 
		$res = $dbh->prepare($sql);
		$res->execute();
		$result =$res->get_result();
		
?>

<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>Produkter</title>
		 <link rel="stylesheet" href="../../html/css/stilmall.css">
	</head>
  <body id="sida3">
    <div id="wrapper">

      
      <?php
	  require "../php/Header.php";
	  require "../php/Meny.php";
	  require "../php/Varor.php"
	  ?>
			
			<main> <!--Huvudinnehåll-->
				<section id="content">
					<h2>Varor</h2>
					<h2><a href="../../html/NewProducts.php">Ny produkt</a></h2>
			<?php		
			while($row = $result->fetch_assoc()) {
				echo "<figure><img src='";
				echo $row['picture'];
				echo "' alt='";
				echo $row['description'];
				echo"' > <figcaption>";
				echo $row['name'];
				echo " ";
				echo $row['price'];
				echo "<p> <a href='#'>Köp</a> </p> </figcation> </figure>";
			}
          ?>
		 
				</section>
				
				<aside id="aside">
				   <p>News</p>
				</aside>
			</main>
		</div>
		<!--Egen fil -->
      <?php
	  require "../php/Footer.php";
	  ?>
  
  </body>
</html>