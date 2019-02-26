<?php

/*
Here we validate whether the file has the correct Structure
We're expecting to see the file have : 
1) A content directory
2) A FontAwesome directory
3) A H5P. directory
4) A h5p.json file

Furtheremore we need : 
5) The content directory to have a content.json file
6) The FontAwesome directory to have a library.json file
7) The H5P. directory to have a library.json file
8) The H5P. directory to have a semantics.json file

If all of those 8 conditions are met then we proceed
*/

echo "This is validate"; 
echo "<br>";
$checkok = 0;
$library = "";

$filename = 'tmp/content';
if (file_exists($filename)) {
    echo "The file $filename exists";
	$checkok++;
	$filename = $filename . "/content.json";
	echo "<br>";
	if (file_exists($filename)) {
		echo "->Inside the content folder the file $filename exists";
		$checkok++;
	}else{
		echo "The file content.json file inside the content folder does not exist";
	}
} else {
    echo "The content folder does not exist";
}
echo "<br>";

$filename = glob('tmp/FontAwesome*'); //The FontAwesome directory is called FontAwesome-x where x is a number therefore I use glob
if (file_exists($filename[0])) {
    echo "The file $filename[0] exists";
	$checkok++;
	$filename = $filename[0] . "/library.json";
	echo "<br>";
	if (file_exists($filename)) {
		echo "->Inside the FontAwesome folder the file $filename exists";
		$checkok++;
	}else{
		echo "The file library.json file inside the FontAwesome folder does not exist";
	}
} else {
    echo "The FontAwesome folder does not exist";
}
echo "<br>";

$filename = 'tmp/h5p.json';
if (file_exists($filename)) {
    echo "The file $filename exists";
	$checkok++;
	$string = file_get_contents($filename); //in case the h5p.json exists, it contains the name of the main library 
	$json_a = json_decode($string, true);
	$library = $json_a['mainLibrary'];
} else {
    echo "The h5p.json file does not exist";
}
echo "<br>";

$library = 'tmp/' . $library; //we need to see if the main library exists, not some other library
$filename = glob($library . '*');
if (file_exists($filename[0])) {
    echo "The file $filename[0] exists";
	$checkok++;
	$filename1 = $filename[0] . "/library.json";
	$filename2 = $filename[0] . "/semantics.json";
	echo "<br>";
	if (file_exists($filename1)) {
		echo "->Inside the H5P. folder the file $filename1 exists";
		$checkok++;
	}else{
		echo "The library.json file inside the H5P. folder does not exist";
	}
	echo "<br>";
	if (file_exists($filename2)) {
		echo "->Inside the H5P. folder the file $filename2 exists";
		$checkok++;
	}else{
		echo "The semantics.json file inside the H5P.folder does not exist";
	}
} else {
    echo "The H5P. folder does not exist";
}


echo "<br>";
if ($checkok == 8){
	header("location: validatePackageDefinition.php");
}else{
	echo $checkok . "/8 conditions are met.";
	echo "There's something wrong with the File structure";
}

?>