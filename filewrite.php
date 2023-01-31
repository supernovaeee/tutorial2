<?php
$nm = $_GET["name"];
$ag = $_GET["age"];
$av = $_GET["average"];
$txt = $nm . "," . $ag . "," . $av . "\n";
echo $txt, "<br>";

$fileopen = false;

if (
	file_exists("user.txt") &&
	($handle = fopen("user.txt", "r")) == TRUE
) {
	$fileopen = TRUE;
	$row = 0;
	while (($data = fgetcsv($handle, 1000, ",")) == TRUE) {
		$num = count($data);
		for ($c = 0; $c < $num; $c++) {
			echo "(" . $data[$c] . ")";
		}
		echo "<br>";
		$name[$row] = $data[0];
		$age[$row] = $data[1];
		$avg[$row] = $data[2];
		$keyval[$name[$row]] = array($age[$row], $avg[$row]);
		$row++;
	}
	fclose($handle);

	echo "<br><br>";
	foreach ($keyval as $k => $v) {
		echo "key is " . $k . " value=" . $v[0] . "," . $v[1] . "<br>";
	}
	echo "<br>";
} else {
	echo "file doesn't exist or not created!!" . "<br>";
}

if ($fileopen && array_key_exists($nm, $keyval)) {
	echo "duplicate name, can't insert...", "<br>";
} else {
	$myfile = fopen("user.txt", "r") or
		die("unable to open file!");
	fwrite($myfile, $txt);
	fclose($myfile);
	echo "data written...", "<br>";
}
?>