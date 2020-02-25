<?php

	include"Connect.php";

	if (!isset($_SESSION['username'])){
		header("location:login.php");
	}

	$username = $_SESSION['username'];
	
	$kundID;
	
	$sql= "SELECT kundID FROM customers WHERE username=?"; 
	$res = $dbh->prepare($sql);
	$res->bind_param("s", $username);
	$res->execute();
	$result =$res->get_result();
	$row = $result->fetch_assoc();
	
	$kundID = $row["kundID"];

	if (isset ($_POST["produkt"])) {
		
		$order = $_POST["produkt"];
		foreach($order as $value) {
			$val = strval ($value); 
			$antal = 1;
			$temp = strval ($row["kundID"]);
			$sql="INSERT INTO orders(produktID,antal,kundID) VALUE(?,?,?)";
			$res = $dbh->prepare($sql);
			$res->bind_param("iii", $val, $antal, $temp);
			$res->execute();
		}
	}
	
	
	$sql= "SELECT * FROM orders WHERE kundID = ?"; 
	$res = $dbh->prepare($sql);
	$res->bind_param("i", $kundID);
	$res->execute();
	$result =$res->get_result();
	
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
					
					while($row = $result->fetch_assoc()) {
						
						$produktID = $row['produktID'];
						$sql= "SELECT * FROM products WHERE productID=?"; 
						$res1 = $dbh->prepare($sql);
						$res1->bind_param("i", $produktID);
						$res1->execute();
						$result1 =$res1->get_result();
						$row1 = $result1->fetch_assoc();
						
						echo "<tr><td>";
						echo $row1['name'];
						echo "</td><td>";
						echo $row1['description'];
						echo "</td><td>";
						echo "<img src='";
						echo $row1['picture'];
						echo "' alt='";
						echo $row1['description'];
						echo "'></td><td>";
						echo $row1['price'];
						echo "</td></tr>";
						
					}
					?>
					</form>	
					</tbody>
				</table>
	
	<?php
	  require "../php/Footer.php";
	?>
	</div>
  </body>
</html>