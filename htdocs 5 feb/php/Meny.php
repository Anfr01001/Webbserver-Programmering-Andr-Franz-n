<?php

$HTML1 = <<<HTML
		<nav>
			<ul>
				<li><a href="index.php">Start</a></li>
				<li><a href="products.php">Produkter</a></li>
				<li><a href="sida3.php">Varusida 2</a></li>
				<li><a href="login.php">Logga in</a></li>
			</ul>
		</nav>             
HTML;

$HTML2 = <<<HTML
		<nav>
			<ul>
				<li><a href="index.php">Start</a></li>
				<li><a href="products.php">Produkter</a></li>
				<li><a href="sida3.php">Varusida 2</a></li>
				<li><a href="login.php">LoginInfo</a></li>
			</ul>
		</nav>             
HTML;


if (isset($_SESSION['username'])){
	echo $HTML2;
} else {
	echo $HTML1;
}

?>
		