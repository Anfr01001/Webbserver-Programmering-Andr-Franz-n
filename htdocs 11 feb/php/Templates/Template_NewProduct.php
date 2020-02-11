<?php

 if( isset($_POST['namn']) && isset($_POST['Beskrivning']) && isset($_POST['Pris']) ) { //isset($_POST['Bild'])
	
	$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Beskrivning = filter_input(INPUT_POST, 'Beskrivning', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$Pris = filter_input(INPUT_POST, 'Pris', FILTER_SANITIZE_NUMBER_INT);
	
	$Bild = "Temp";
	
	include"Connect.php";
	
	$target_dir = "bilder/"; 

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	
	
	

	 $sql="INSERT INTO products(name,description,price,picture) VALUE(?,?,?,?)";
	 $res = $dbh->prepare($sql);
	 $res->bind_param("ssis", $namn, $Beskrivning, $Pris, $target_file);
	 $res->execute();
	 
	
	
	mysqli_close($dbh);

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
					 <form action="NewProducts.php" method="post" enctype="multipart/form-data">
					 
			<p><label for="namn">Namn:</label>
            <input type="text" id="namn" name="namn"></p>

			<p><label for="Beskrivning">Beskrivning:</label>
            <input type="text" id="Beskrivning" name="Beskrivning"></p>		
			
			<p><label for="Pris">Pris:</label>
            <input type="number" id="Pris" name="Pris"></p>		
			
			<p><label for="Bild">Bild:</label>
            <input type="file" name="fileToUpload" id="fileToUpload"></p>	

            <p>
            <input type="submit" value="Skapa produkt">
            </p>
			
          </form>
				</section>
			</main>

    </div>
      <?php
	  require "../php/Footer.php";
	  ?>

	</body>
</html>
