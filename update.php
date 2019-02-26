<?php
/*
Here we're checking whether there needs to be an update in our libraries
If there is we're updating the libraries that need to
If we find there's no previous version for a library, then we must install it(install.php takes care of that)

*/

echo "This is update.php";
header("location: install.php"); //for later use
header("location: store.php");

?>