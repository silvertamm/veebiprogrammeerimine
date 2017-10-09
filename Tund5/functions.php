<?php
	$database = "if17_tammsilv";
	
	//alustame sessiooni
	session_start();
	
	function signIn($email, $password){
		$notice = "";
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, email, password FROM users WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb);
		$stmt->execute();
		
		//kui vähemalt üks tulemus
		if ($stmt->fetch()){
			if($password == $passwordFromDb){
				$notice = "Sisselogitud!";
				
				//lähen pealehele
				header("Location: main.php");
				exit();
			} else {
				$notice = "Vale salasõna!";
			}
		} else {
			$notice = "Sellise e-positga kasutajat pole olemas!";
		}
		
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	
	function signUp($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){
		//ühendus andmebaasiga
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//käsk andmebaasile
		$stmt = $mysqli->prepare("INSERT INTO users (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string, tekst
		//i - integer, täisarv
		//d - decimal, ujukomaarv
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga: " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}



	//sisestuse kontrollimise funktsioon
	function test_input($data){
		$data = trim($data);//liigsed tühikud, TAB, reavahetuse jms
		$data = stripslashes($data);//eemaldab kaldkriipsud "\"
		$data = htmlspecialchars($data);
		return $data;
	}


?>