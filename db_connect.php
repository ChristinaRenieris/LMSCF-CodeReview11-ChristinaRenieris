<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );

$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "cr11_christinarenieris_petadoption";

$conn = mysqli_connect($hostName, $userName, $password, $dbName);

if(!$conn){
    die("Connection failed : " .mysqli_error());
}

?>