<?php
	$database = "if17_tammsilv";
	
	function signUp($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){
		//ühendus andmebaasiga
	
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["$serverUsername"], $GLOBALS["$serverPassword"], $GLOBALS["$database)"];
		//käsk andmebaasile
		$stmt = $mysqli->prepare("INSERT INTO users (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string, tekst
		//i - integer, täisarv
		//d - decimal, ujukomaarv
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "Õnnestus!";
		} else {
			echo "Tekkis viga: " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}



	//sisestuse kontrollimise funktsioon
	function test_input($data){
		$data = trim($data); //eemaldab liigsed tühikud, TAB, reavahetuse jms
		$data = stripslashes($data); //eemaldab kaldkriipsud "\"
		$data = htmlspecialchars($data);
		return $data;
	}


?>