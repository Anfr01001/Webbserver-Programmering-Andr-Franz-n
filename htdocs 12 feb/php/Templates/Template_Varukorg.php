<?php

	include"Connect.php";

	$username = $_SESSION['username'];

	if (isset ($_POST["produkt"])) {
		$order = $_POST["produkt"];
	} else {
		echo "NOOOO";
	}
	
	$sql= "SELECT kundID FROM customers WHERE username=?"; 
	$res = $dbh->prepare($sql);
	$res->bind_param("s", $username);
	$res->execute();
	$result =$res->get_result();
	$row = $result->fetch_assoc();
	
	//var_dump($result);
	
	foreach($order as $value) {
	 $val = strval ($value); 
	 $antal = 1;
	 $temp = strval ($row["kundID"]);
	 $sql="INSERT INTO orders(produktID,antal,kundID) VALUE(?,?,?)";
	 $res = $dbh->prepare($sql);
	 $res->bind_param("iii", $val, $antal, $temp);
	 $res->execute();
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