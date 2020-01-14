
<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>Produkter</title>
		 <link rel="stylesheet" href="../../html/css/stilmall2.css">
  </head>
  <body id="produkter">
    <div class="wrapper">
			<!--Egen fil -->
			
      <?php
	  require "../php/Header.php";
	  require "../php/Meny.php";
	  require "../php/Varor.php"
	  ?>
			
	
		<main> <!--Huvudinnehåll-->
			<section id="content">
				<h2>Varor</h2>
			<table>
					<thead>
						<tr>
							<th>Namn</th>
							<th>Beskrivning</th>
							<th>Bild</th>
							<th>Pris</th>
							<!-- <th></th> -->
						</tr>
					</thead>
					<tbody>
					
					<?php
					foreach($varor as $vara) {
						echo "<tr><td>";
						echo $vara[0];
						echo "</td><td>";
						echo $vara[1];
						echo "</td><td>";
						echo "<img src='";
						echo $vara[2];
						echo "' alt='";
						echo $vara[1];
						echo "'></td><td>";
						echo $vara[3];
						echo "</td></tr>";
						
					}
					?>
						
					</tbody>
				</table>
			</section>
			<a href="../../html/NewProduct.php">Ny produkt</a>
		</main>
	
	<?php
	  require "../php/Footer.php";
	?>
	</div>
  </body>
</html>