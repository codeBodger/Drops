<?php
	$auth = false;
	$email = $_POST["email"];

	if(file_exists("${email}_password.hash")) {
		$keyHashFile = fopen("${email}_keys.hash", "r") or die("Unable to open file!");
		$keyFileHashList = explode("\n", fread($keyHashFile,filesize("${email}_keys.hash")+1));
		fclose($keyHashFile);
	
		$key = $_POST["key"];
		$keyHash = hash("sha256", "$key");
	
		$newKey = hash("sha256", sprintf("%d%d%d%d", rand(), rand(), rand(), rand()));
		foreach ($keyFileHashList as $keyFileHash) {
			$keyFileHash = explode(" ", $keyFileHash)[0];
			$auth = ($keyHash == $keyFileHash);
			if($auth) {
				$keyHashFile = fopen("${email}_keys.hash", "r") or die("Unable to open file!");
				$keyFileHashList = explode("\n", fread($keyHashFile,filesize("${email}_keys.hash")+1));
				fclose($keyHashFile);
				
				unset($keyFileHashList[array_search($keyHash, $keyFileHashList)]);
				
				$keyHashFile = fopen("${email}_keys.hash", "w") or die("Unable to open file!");
				fwrite($keyHashFile, "");
				fclose($keyHashFile);
				
				$keyHashFile = fopen("${email}_keys.hash", "a") or die("Unable to open file!");
				foreach ($keyFileHashList as $keyFileHash) {
					if ($keyFileHash == "") { continue; }
					fwrite($keyHashFile, "$keyFileHash templock\n");
				}
	
				$newKeyHash = hash("sha256", $newKey);
				fwrite($keyHashFile, "$newKeyHash");
				fclose($keyHashFile);
				
				break;
			}
		}
		if($auth) { echo $newKey; }
		else { echo "haha"; }
	}
	else { echo "haha"; }
?>
