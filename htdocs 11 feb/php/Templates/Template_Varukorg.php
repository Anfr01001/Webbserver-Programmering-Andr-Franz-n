<?php

	if (isset ($_POST["produkt"])) {
		$order = $_POST["produkt"];
		var_dump($_POST["produkt"]);
	} else {
		echo "NOOOO";
	}
	
	foreach($order as $value) {
		
	}
			
?>


<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>Varukorg</title>
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
			
	

	
	<?php
	  require "../php/Footer.php";
	?>
	</div>
  </body>
</html>