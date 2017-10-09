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

	//kas vajutati mõtte salvestamise nuppu
	if(isset($_POST["ideaBtn"])){
		if(isset($_POST["userIdea"]) and isset ($_POST["ideaColor"]) and !empty($_POST["userIdea"]) and !empty($_POST["ideaColor"])){
			echo $_POST["ideaColor"];
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Silver Tamm Mängukoobas
	</title>
</head>
<body>
	
	<p>Siin veebilehel pole teil midagi teha, kuna see veebileht on loodud õppetöö jaoks.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="usersInfo.php">Info kasutajate kohta</a></p>
	
</body>
</html>
