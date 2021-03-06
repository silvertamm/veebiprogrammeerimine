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
	$picsDir = "../../pics/";
	$picFiles = [];
	$picFileTypes = ["jpg", "jpeg", "png", "gif"];
	
	$allFiles = array_slice(scandir($picsDir), 2);
	
	foreach ($allFiles as $file){
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($fileType, $picFileTypes) == true){
			array_push($picFiles, $file);
		}
	}
	
	//var_dump($picFiles);
	$fileCount = count($picFiles);
	$picNumber = mt_rand(0, ($fileCount - 1));
	$picFile = $picFiles[$picNumber];
	
	$showSignedInName = showName();
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
	<h1>Tere! <span><?php echo $showSignedInName; ?></span></h1> 
	<p>Siin veebilehel pole teil midagi teha, kuna see veebileht on loodud õppetöö jaoks.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="usersInfo.php">Info kasutajate kohta</a></p>
	<p><a href="userIdeas.php">Head mõtted</a></p>
	<h2>Pilt ülikoolist</h2>
	<img src="<?php echo $picsDir .$picFile; ?>" alt="Tallinna ülikool">
	
</body>
</html>
