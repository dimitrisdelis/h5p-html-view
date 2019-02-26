<?php
/*
Here is the validation of the libraries inside the tmp/H5P
For every library we have we check firstly whether it has a library.json file inside its directory
Next we check if the library.json file has :
1) Title
2) MachineName
3) MajorVersion
4) MinorVersion
5) PatchVersion
6) Runnable

if every library has a library.json file and that files has all these 6 variables then we proceed

*/

echo "This is validateLibraryDefinition.php";
echo "<br>";
$checkok = TRUE;

$filename = glob('tmp/H5P.*');
echo "There are " . count($filename) . " libraries" ;
foreach($filename as $path){
	$checklibraryok = 0;
	echo "<br>";
	echo $path;
	$jsonfile = $path . "/library.json";
	if (file_exists($jsonfile)){
		echo "<br>";
		echo "The " . $path . " library has a library.json file";
		
		$string = file_get_contents($jsonfile); // we check the json file 
		$json_a = json_decode($string, true);
		
		if(isset($json_a['title'])){
			echo "<br>";		
			echo $jsonfile . " has title";
			echo "<br>";
			$checklibraryok++;
		}else{
			echo "<br>";
			echo $jsonfile . " DOES NOT have a title";
			echo "<br>";
		}
		if(isset($json_a['machineName'])){		
			echo $jsonfile . " has machineName";
			echo "<br>";
			$checklibraryok++;
		}else{
			echo $jsonfile . " DOES NOT have a machineName";
			echo "<br>";
		}
		if(isset($json_a['majorVersion'])){		
			echo $jsonfile . " has majorVersion";
			echo "<br>";
			$checklibraryok++;
		}else{
			echo $jsonfile . " DOES NOT have a majorVersion";
			echo "<br>";
		}
		if(isset($json_a['minorVersion'])){		
			echo $jsonfile . " has minorVersion";
			echo "<br>";
			$checklibraryok++;
		}else{
			echo $jsonfile . " DOES NOT have a minorVersion";
			echo "<br>";
		}
		if(isset($json_a['patchVersion'])){		
			echo $jsonfile . " has patchVersion";
			echo "<br>";
			$checklibraryok++;
		}else{
			echo $jsonfile . " DOES NOT have a patchVersion";
			echo "<br>";
		}
		if(isset($json_a['runnable'])){		
			echo $jsonfile . " has runnable";
			echo "<br>";
			$checklibraryok++;
		}else{
			echo $jsonfile . " DOES NOT have a runnable";
			echo "<br>";
		}
		
		if ($checklibraryok == 6){
			echo $jsonfile . " is OK";
			echo "<br>";
		}else{
			echo "IMPORTANT: " . $jsonfile . " is missing some json values";
			echo "<br>";
			$checkok = FALSE;
		}
	}else{
		echo "<br>";
		echo "IMPORTANT: The " . $path . " library does not have a library.json file";
		echo "<br>";
		$checkok = FALSE;
	}
}

if ($checkok){
	echo "Everything is ok";
	header("location: update.php");
}else{
	echo "<h1>IMPORTANT: THERE ARE ERRORS IN YOUR LIBRARY FOLDERS</h1>";
}
	

?>