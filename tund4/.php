<?php
	//muutujad
	$myName = "Silver";
	$myFamilyName = "Tamm";
	$monthNamesEt = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
	
	//echo $monthNamesEt[3];
	$monthNow = $monthNamesEt[date("n") - 1];
	
	$hourNow = date("H");
	
	$schoolDayStart = date("d.m.Y") ." " ."8.15";
	//echo $schoolDayStart;
	$schoolBegin = strtotime($schoolDayStart);
	//echo $schoolBegin;
	$timeNow = strtotime("now");
	//echo ($timeNow - $schoolBegin);
	
	$minutesPassed = round(($timeNow - $schoolBegin) / 60);
	//echo $minutesPassed;
	
	//echo $hourNow;
	//võrdlen kellaaega ja annan hinngu, mis päeva osaga on tegemist (<   >   ==   >=  <=  !=  )
	$partOfDay = "";
	if ( $hourNow < 8 ){
		$partOfDay = "varajane hommik";
	}
	//echo $partOfDay;
	if ( $hourNow >= 8 and $hourNow < 16 ) {
		$partOfDay = "koolipäev";
	}
	if ( $hourNow >= 16 ) {
		$partOfDay = "vaba aeg";
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
	<h1>
	<?php
		echo $myName ." " .$myFamilyName;
	?>
	</h1>
	<p>Siin veebilehel pole teil midagi teha, kuna see veebileht on loodud õppetöö jaoks</p>
	<?php
		echo "<p>Täna on ";
		echo date("d. ") .$monthNow .date(" Y") .", käes on " .$partOfDay;
		echo ".</p>";
		echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .".</p>";
	
	?>
</body>
</html>