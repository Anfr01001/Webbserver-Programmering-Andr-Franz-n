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
	  ?>
			
			<main> <!--Huvudinnehåll-->
				<section id="content">
					<h2>Varor</h2>
          
            <figure><img src="bilder/apple.jpg" alt="Grönt surt">
                <figcaption>Äpple 50
                  <p>
                    <a href="#">Köp</a>
                  </p>
                </figcation>
            </figure>
            <figure><img src="bilder/orange.jpg" alt="Orange söt">
                <figcaption>Apelsin 38
                  <p>
                    <a href="#">Köp</a>
                  </p>
                </figcation>
            </figure>
            <figure><img src="bilder/pear.jpg" alt="Gult saftigt">
                <figcaption>Päron 100
                  <p>
                    <a href="#">Köp</a>
                  </p>
                </figcation>
            </figure>
            <figure><img src="bilder/banana.jpg" alt="Gul böjd">
                <figcaption>Banan 30
                  <p>
                    <a href="#">Köp</a>
                  </p>
                </figcation>
            </figure>
            
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