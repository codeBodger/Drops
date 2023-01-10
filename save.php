<?php
	$auth = false;
	$email = $_POST["email"];

	if(file_exists("${email}_password.hash")) {
		$keyHashFile = fopen("${email}_keys.hash", "r") or die("Unable to open file!");
		$keyFileHashList = explode("\n", fread($keyHashFile,filesize("${email}_keys.hash")));
		fclose($keyHashFile);
	
		$keyHashFile = fopen("${email}_keys.hash", "w") or die("Unable to open file!");
		fwrite($keyHashFile, "");
		fclose($keyHashFile);
	
		$keyHashFile = fopen("${email}_keys.hash", "a") or die("Unable to open file!");
		
		$key = $_POST["key"];
		$keyHash = hash("sha256", "$key");
		foreach ($keyFileHashList as $keyFileHash) {
			if($keyHash == $keyFileHash) {
				$auth = true;
				$datafile = fopen("${email}_data.json", "w") or die("Unable to open file!");
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
	}
	else { echo "haha"; }

	// function console_echo($str) {
	//	 $csl = fopen("console.log", "a") or die("Unable to open file!");
	//	 fwrite($csl, "$str\n");
	//	 fclose($csl);
	// }
?>
