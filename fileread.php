<?php
echo "<h1>read file</h1>";
$myfile = fopen("user.txt", "r") or 
	die("unable to open file!");

while (!feof($myfile))
{	echo fgets($myfile) . "<br>";
}
fclose($myfile);


?>
