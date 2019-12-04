<?php	
	
	$dbh = new mysqli("localhost","dbuser","qwe123","webbshop");

if (!$dbh){
	echo "Connection failed";
	exit;
}
		$username=$_SESSION['username'];	
		$sql= "SELECT * FROM customers WHERE username=?"; 
		$res = $dbh->prepare($sql);
		$res->bind_param("s", $username);
		$res->execute();
		$result =$res->get_result();
		$row = $result->fetch_assoc();
	
?>


<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
		 <link rel="stylesheet" href="../../html/css/stilmall.css">
	</head>
  <body >
    <div >

      
      <?php
	  require "../php/Header.php";
	  require "../php/Meny.php";
	  ?>
	  
	  <table>
  <tr>
	<th>Username</th>
    <th>Namn</th>
    <th>Efternamn</th>
    <th>Postnummer</th>
	<th>Postadress</th>
	<th>Telefon</th>
	<th>adress</th>
  </tr>

	  
	
<?php
	echo "<tr>";
	
	echo "<td>";
	echo $row['username'];
	echo "</td>";
	
	echo "<td>";
	echo $row['FirstName'];
	echo "</td>";
	
	echo "<td>";
	echo $row['LastName'];
	echo "</td>";
	
	echo "<td>";
	echo $row['Postnummer'];
	echo "</td>";
	
	echo "<td>";
	echo $row['postadress'];
	echo "</td>";
	
	echo "<td>";
	echo $row['telefon'];
	echo "</td>";
	
	echo "<td>";
	echo $row['adress'];
	echo "</td>";
	
	echo "</tr>";
	?>
	
	<a href="../../html/ChangeUser.php">Skapa användare</a>

    </div>
      <?php
	  require "../php/Footer.php";
	  ?>

	</body>
</html>
