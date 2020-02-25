<?php
	$str="";
	if (isset ($_GET['value'])){
		$value=$_GET['value'];
		
		if($value==1){
			$str="Felaktig användare";
		}
		elseif($value==2){
			$str="Felaktigt Lösenord";
		}
		elseif($value==3){
			$str="Du har loggat ut";
		}
	}
?>

<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
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
					 <form action="formulartest.php" method="post">
            <p><label for="user">Användarnamn:</label>
            <input type="text" id="user" name="username"></p>
            <p><label for="pwd">Lösenord:</label>
            <input type="password" id="pwd" name="password"></p>
            <p>
            <input type="submit" value="Logga in">
            </p>
          </form>
		  <p><?php echo $str ?> </p>
          <p class="create"><a href="../../html/NewUser.php">Skapa användare</a></p>
				</section>
			</main>

    </div>
      <?php
	  require "../php/Footer.php";
	  ?>

	</body>
</html>
