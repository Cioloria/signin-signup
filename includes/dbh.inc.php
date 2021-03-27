<?php
##Author: Cio Loria
##https://github.com/Cioloria

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = /*"insertdataBaseNameHere;*/

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection faileed: " . mysqli_connect_error());
}