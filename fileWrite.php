 <?php
//https://yourwebsite.com/fileWrite.php?val=good

$toBeInserted = $_GET['val'];

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $toBeInserted;
fwrite($myfile, $txt);
fclose($myfile);

echo "success";
?> 
