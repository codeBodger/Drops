<?php
	$auth = false;

	$keyHashFile = fopen("keys.hash", "r") or die("Unable to open file!");
	$keyFileHashList = explode("\n", fread($keyHashFile,filesize("keys.hash")+1));
	fclose($keyHashFile);

	$key = $_POST["key"];
	$keyHash = hash("sha256", "$key");

	$newKey = hash("sha256", sprintf("%d%d%d%d", rand(), rand(), rand(), rand()));
	foreach ($keyFileHashList as $keyFileHash) {
		$auth = ($keyHash == $keyFileHash);
		if($auth) {
			$keyHashFile = fopen("keys.hash", "r") or die("Unable to open file!");
			$keyFileHashList = explode("\n", fread($keyHashFile,filesize("keys.hash")+1));
			fclose($keyHashFile);
			
			unset($keyFileHashList[array_search($keyHash, $keyFileHashList)]);
			
			$keyHashFile = fopen("keys.hash", "w") or die("Unable to open file!");
			fwrite($keyHashFile, "");
			fclose($keyHashFile);
			
			$keyHashFile = fopen("keys.hash", "a") or die("Unable to open file!");
			foreach ($keyFileHashList as $keyFileHash) {
				if ($keyFileHash == "") { continue; }
				fwrite($keyHashFile, "$keyFileHash\n");
			}

			$newKeyHash = hash("sha256", $newKey);
			fwrite($keyHashFile, "$newKeyHash");
			fclose($keyHashFile);
			
			break;
		}
	}
	if($auth) { echo $newKey; }
	else { echo "haha"; }
?>
