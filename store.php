<?php
/*

Here we're storing the content that was uploaded to specific folders

Content goes into h5p/content/[id]
Libraries go into h5p/libraries/[name]

When everything is stored we delete the .h5p file and the temporary directory it was extracted into.

*/
echo "This is store.php";

$checklibrary = FALSE; // boolean variables to check, set to false
$checkcontent = FALSE;
$id = 0;
$path = 'tmp';
$directories = glob($path . '/*' , GLOB_ONLYDIR); // with the use of glob() function we take all the folders of the tmp folder and we check them in a loop for content.json or library.json
// var_dump($directories);

foreach($directories as $dir){
	$targetdir = substr($dir, 4);
	$jsonfilelibrary = $dir . "/library.json";
	$jsonfilecontent = $dir . "/content.json";
	if (file_exists($jsonfilelibrary)){
		echo "<br>";
		echo "The " . $jsonfilelibrary . " exists. Moving library";
		$checklibrary = TRUE;
	}
	if (file_exists($jsonfilecontent)){
		echo "<br>";
		echo "The " . $jsonfilecontent . " exists. Moving content";
		$checkcontent = TRUE;
	}
	if($checklibrary == TRUE){
		$targetdir = 'libraries/' . $targetdir;
		rename($dir,$targetdir); // using the rename() function to move the folders
		$checklibrary = FALSE;
	}
	if($checkcontent == TRUE){
		$id = get_id();
		mkdir('content/' . $id);
		$targetdir = 'content/' . $id . '/' . $targetdir;
		rename($dir,$targetdir);
		$checkcontent = FALSE;
	}
}
function get_id(){ // function for getting a new id number by counting how many folders are already in the content directory
	$content = 'content';
	$content = glob($content . '/*' , GLOB_ONLYDIR);
	return count($content);
}

function deleteDirectory($dir) { // function for deleting non-empty directories. We need it to delete tmp in case it has more files than the h5p.json
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}
$dir = 'tmp';
// deleteDirectory($dir); //not deleting right now. Integration still incomplete
?>
