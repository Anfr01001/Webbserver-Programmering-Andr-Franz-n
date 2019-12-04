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
			<?php		
			foreach($varor as $vara) {
				echo "<figure><img src='";
				echo $vara[2];
				echo "' alt='";
				echo $vara[1];
				echo"' > <figcaption>";
				echo $vara[0];
				echo " ";
				echo $vara[3];
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