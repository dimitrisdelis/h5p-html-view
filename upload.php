<?php

rmdir("tmp"); //we remove any previous folders with temporary content that may exist
mkdir("tmp"); //we create a temporary directory for content
$target_dir = "tmp/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //we check to see if file has .h5p extension

if($FileType == "h5p") {
    echo "File is h5p";
	echo "<br>";
    $uploadOk = 1;
}else{
	echo "File is not h5p";
	echo "<br>";
	$uploadOk = 0;
}
if ($uploadOk != 0){ // we unzip file to the tmp directory
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	

	$zip = new ZipArchive;
	$res = $zip->open($target_file);
	if ($res === TRUE) {
	$zip->extractTo('tmp');
	$zip->close();
	unlink($target_file) or die("Couldn't delete file");
	echo 'file unziped';
	} else {
	echo 'error';
	}
	header("location: validateFileStructure.php");
}


?>
