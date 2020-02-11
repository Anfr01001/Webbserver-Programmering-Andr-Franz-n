<?php

	
	include"Connect.php";


		$sql= "SELECT * FROM products"; 
		$res = $dbh->prepare($sql);
		$res->execute();
		$result =$res->get_result();
	 
	
	if(isset($_POST['Product'])){
		
		$sql= "DELETE FROM products WHERE productID = ?"; 
		$res = $dbh->prepare($sql);
		$res->bind_param("s",$_POST['Product']);
		$res->execute();
		
		header("location:products.php");
	}
	
	mysqli_close($dbh);

?>


<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Ta bort produkt</title>
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
					 <form action="RemoveProducts.php" method="post">
					 <select name="Product">
					 
					 <?php
					while($row = $result->fetch_assoc()) {
						echo "<option value=";
						echo $row['productID'];
						echo ">";
						echo $row['name'];
						echo "</option>";
					}
					?>
					
					<input type="submit" value="Ta Bort">
					 
          </form>
				</section>
			</main>

    </div>
      <?php
	  require "../php/Footer.php";
	  ?>

	</body>
</html>
