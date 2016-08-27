<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 24-Aug-16
 * Time: 10:25 AM
 */

$myfile = fopen("../../Database/Download_Books/kaka.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>