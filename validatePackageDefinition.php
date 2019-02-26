<?php
/*

Here is the validation of the Package Definition
Here we check the h5p.json file for :
1) Title
2) Language
3) mainLibrary
4) preloadedDependencies
5) embedTypes

if all these 5 variables exist in the h5p.json file we continue

*/
echo "This is validatePackageDefinition.php";
echo "<br>";
$filename = 'tmp/h5p.json';
$string = file_get_contents($filename);
$json_a = json_decode($string, true);
$checkok = 0; 

if(isset($json_a['title'])){
	echo "title exists";
	echo "<br>";
	$checkok++;
}else{
	echo "title does not exist";
}

if(isset($json_a['language'])){
	echo "language exists";
	echo "<br>";
	$checkok++;
}else{
	echo "language does not exist";
}

if(isset($json_a['mainLibrary'])){
	echo "mainLibrary exists";
	echo "<br>";
	$checkok++;
}else{
	echo "mainLibrary does not exist";
}

if(isset($json_a['preloadedDependencies'])){
	echo "preloadedDependencies exists";
	echo "<br>";
	$checkok++;
}else{
	echo "preloadedDependencies does not exist";
}

if(isset($json_a['embedTypes'])){
	echo "embedTypes exists";
	echo "<br>";
	$checkok++;
}else{
	echo "embedTypes does not exist";
}

if ($checkok == 5){
	echo "everything is ok";
	header("location: validateLibraryDefinition.php");
}else{
		echo "There's something wrong with the Package Definition";
}

?>