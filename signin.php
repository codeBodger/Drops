<?php
	$email = $_POST["email"];

	if(file_exists("${email}_password.hash")) {
		$pswdfile = fopen("${email}_password.hash", "r") or die("Unable to open file!");
		$pswdfilehash = fread($pswdfile,filesize("${email}_password.hash"));
		fclose($pswdfile);
		
		$pswd = $_POST["pswd"];
		$pswdhash = hash("sha256", $pswd);
		if ("$pswdhash" == "$pswdfilehash") {
			$newKey = hash("sha256", sprintf("%d%d%d%d", rand(), rand(), rand(), rand()));
			$newKeyHash = hash("sha256", $newKey);
			
			$keyHashFile = fopen("${email}_keys.hash", "a") or die("Unable to open file!");
			fwrite($keyHashFile, "\n$newKeyHash");
			fclose($keyHashFile);
			
			echo $newKey;
		}
		else { echo "haha"; }
	}
	else { echo "signup"; }
?>