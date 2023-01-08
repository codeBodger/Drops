<?php
	$auth = false;
	$keyHashFile = fopen("keys.hash", "r") or die("Unable to open file!");
	$keyFileHashList = explode("\n", fread($keyHashFile,filesize("keys.hash")));
	fclose($keyHashFile);

	$keyHashFile = fopen("keys.hash", "w") or die("Unable to open file!");
	fwrite($keyHashFile, "");
	fclose($keyHashFile);

	$keyHashFile = fopen("keys.hash", "a") or die("Unable to open file!");
	
	$key = $_POST["key"];
	$keyHash = hash("sha256", "$key");
	foreach ($keyFileHashList as $keyFileHash) {
		if($keyHash == $keyFileHash) {
			$auth = true;
			$datafile = fopen("data.json", "w") or die("Unable to open file!");
			$data = $_POST["data"];
			fwrite($datafile, $data);
			fclose($datafile);

			fwrite($keyHashFile, "$keyFileHash\n");
		}
		else {
			$keyFileHash = explode(" ", $keyFileHash)[0];
			if($keyHash == $keyFileHash) {
				fwrite($keyHashFile, "$keyFileHash\n");
				echo "retry";
				continue;
			}
			if ($keyFileHash == "") { continue; }
			fwrite($keyHashFile, "$keyFileHash templock\n");
		}
	}
	if($auth) { echo "success"; }
	else { echo "haha"; }

	fclose($keyHashFile);

	// function console_echo($str) {
	//	 $csl = fopen("console.log", "a") or die("Unable to open file!");
	//	 fwrite($csl, "$str\n");
	//	 fclose($csl);
	// }
?>
