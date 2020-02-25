<?php

		require "Connect.php";

		$str = " ";
			
		if(isset($_SESSION['username'])) {
			$sql= "SELECT status FROM users WHERE username = ?"; 
			$res = $dbh->prepare($sql);
			$res->bind_param("s", $_SESSION['username']);
			$res->execute();
			$result =$res->get_result();
			$row2 = $result->fetch_assoc();	
		
			if ($row2['status'] > 1) {
				$str = <<<HTML
		 		<h2><a href="../../html/NewProducts.php">Ny produkt</a></h2>
				<h2><a href="../../html/RemoveProducts.php">Ta bort produkt</a></h2>         
HTML;
			}
			
		}
		
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

			<?php echo $str; ?>

			<table>
					<thead>
						<tr>
							<th>Namn</th>
							<th>Beskrivning</th>
							<th>Bild</th>
							<th>Pris</th>
							<th>Ska köpa</th>
							<!-- <th></th> -->
						</tr>
					</thead>
					<tbody>
					
					<form action="Varukorg.php" method="post">
					<?php
					while($row = $result->fetch_assoc()) {
						
						
						
						echo "<tr><td>";
						echo $row['name'];
						echo "</td><td>";
						echo $row['description'];
						echo "</td><td>";
						echo "<img src='";
						echo $row['picture'];
						echo "' alt='";
						echo $row['description'];
						echo "'></td><td>";
						echo $row['price'];
						echo "</td><td>";
						echo "<input type='checkbox' name='produkt[]' value='";
						echo $row['productID'];
						echo "'>";
						echo "</td></tr>";
						
						
						
					}
					?>
					
					<input type="submit" value="Köp">
					</form>	
					</tbody>
				</table>
			</section>
			
		</main>
	
	<?php
	  require "../php/Footer.php";
	?>
	</div>
  </body>
</html>