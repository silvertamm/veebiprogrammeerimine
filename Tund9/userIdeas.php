<?php
	require("functions.php");
	
	$notice = "";	
	
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
		
		if(isset($_POST["userIdea"]) and isset($_POST["ideaColor"]) and !empty($_POST["userIdea"]) and !empty($_POST["ideaColor"])){
			//echo $_POST["ideaColor"];
			$notice = saveIdea(test_input($_POST["userIdea"]), $_POST["ideaColor"]);
		}
	}
	
	$ideas = readAllIdeas();
	
	require("header.php");

?>

	<h1>Silver Tamm</h1>
	<p>Siin veebilehel pole teil midagi teha, kuna see veebileht on loodud õppetöö jaoks.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="main.php">Pealeht</a></p>
	<h2>Head mõtted</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Hea mõte: </label>
		<input name="userIdea" type="text">
		<br>
		<label>Mõttega seostuv värv: </label>
		<input name="ideaColor" type="color">
		<br>
		<input name="ideaBtn" type="submit" value="Salvesta mõte!"><span><?php echo $notice; ?></span>
		
	<h2>Minu toredad mõtted: </h2>
	<div style="width: 40%">
			<?php echo $ideas; ?>
	</div>
		
		
	</form>

<?php
		require("footer.php");
?>

