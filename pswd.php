<?php
	$email = $_POST["email"];

	if(file_exists("${email}_password.hash")) { echo "exists"; }
	else {
		$pswd = $_POST["pswd"];
		$pswdHash = hash("sha256", $pswd);
		
		$pswdFile = fopen("${email}_password.hash", "w") or die("Unable to open file!");
		fwrite($pswdFile, $pswdHash);
		fclose($pswdFile);

		$keyHashFile = fopen("${email}_keys.hash", "w") or die("Unable to open file!");
		fwrite($keyHashFile, "");
		fclose($keyHashFile);
		
		$keyHashFile = fopen("${email}_data.json", "w") or die("Unable to open file!");
		fwrite($keyHashFile, "");
		fclose($keyHashFile);
		
		echo "success";
	}

	// function console_echo($str) {
	// 	 $csl = fopen("console.log", "a") or die("Unable to open file!");
	// 	 fwrite($csl, "$str\n");
	// 	 fclose($csl);
	// }
?>