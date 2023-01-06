<?php
	$keyHashFile = fopen("keys.hash", "r") or die("Unable to open file!");
	$keyFileHashList = explode("\n", fread($keyHashFile,filesize("keys.hash")));
	fclose($keyHashFile);

	$key = $_POST["key"];
	$keyHash = hash("sha256", $key);
	unset($keyFileHashList[array_search($keyHash, $keyFileHashList)]);
	
	$keyHashFile = fopen("keys.hash", "w") or die("Unable to open file!");
	fwrite($keyHashFile, "");
	fclose($keyHashFile);
	
	$keyHashFile = fopen("keys.hash", "a") or die("Unable to open file!");
	foreach ($keyFileHashList as $keyFileHash) {
		fwrite($keyHashFile, "\n$keyFileHash");
		echo $keyFileHash;
	}
	fclose($keyHashFile);
?>
