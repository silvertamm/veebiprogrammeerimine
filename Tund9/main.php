<?php
	require("functions.php");
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
	
	require("header.php");
?>

<body>
	<h1>Tere!</h1> 
	<p>Siin veebilehel pole teil midagi teha, kuna see veebileht on loodud õppetöö jaoks.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="usersInfo.php">Info kasutajate kohta</a></p>
	<p><a href="userIdeas.php">Head mõtted</a></p>
	<p><a href="photoupload.php">Fotode üleslaadimine</a></p>
	<h2>Pilt Tallinna ülikoolist</h2>
	<img src="<?php echo $picsDir .$picFile; ?>" alt="Tallinna ülikool">
	
<?php
		require("footer.php");
?>