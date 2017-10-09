<?php
	require("../../../functions.php");
	//kui pole sisse logitud, liigume login lehele
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}
	
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy(); //lõpetab sessiooni
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Silver Tamme Mängukoobas
	</title>
</head>
<body>
	
	<p>Siin veebilehel pole teil midagi teha, kuna see veebileht on loodud õppetöö jaoks.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="main.php">Pealeht</a></p>
	
	<table border="1" style="border-collapse: collapse;">
		<tr>
			<th>Eesnimi</th>
			<th>Perekonnanimi</th>
			<th>kasutajanimi</th>
		</tr>
		<tr>
			<td>Silver</td>
			<td>Tamm</td>
			<td>silvert@tlu.ee</td>
		</tr>	
	</table>
	
</body>
</html>
