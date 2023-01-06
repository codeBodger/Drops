<?php
	$keyHashFile = fopen("keys.hash", "a") or die("Unable to open file!");
	$newKey = hash("sha256", sprintf("%d%d%d%d", rand(), rand(), rand(), rand()));
	$newKeyHash = hash("sha256", $newKey);
	if(file_exists("password.hash")) {
		$pswdfile = fopen("password.hash", "r") or die("Unable to open file!");
		$pswdfilehash = fread($pswdfile,filesize("password.hash"));
		$pswd = $_POST["pswd"];
		$pswdhash = hash("sha256", "$pswd\n");
		if ("$pswdhash  -\n" == "$pswdfilehash") {
			fwrite($keyHashFile, "\n$newKeyHash");
			echo $newKey;
		}
		else { echo "haha"; }
		fclose($pswdfile);
	}
	else { echo "haha"; }
	fclose($keyHashFile);
?>