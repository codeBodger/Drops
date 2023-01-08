<?php
	$auth = false;
	$keyHashFile = fopen("keys.hash", "r") or die("Unable to open file!");
	$keyFileHashList = explode("\n", fread($keyHashFile,filesize("keys.hash")));
	$key = $_POST["key"];
	$keyHash = hash("sha256", "$key");
	foreach ($keyFileHashList as $keyFileHash) {
		$auth = ($keyHash == $keyFileHash);
		if($auth) {
			$datafile = fopen("data.json", "w") or die("Unable to open file!");
			$data = $_POST["data"];
			fwrite($datafile, $data);
			fclose($datafile);
			break;
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
