<?php
$servername = "127.0.0.1";
$database = "dreamandmake";
$username = "damcomumuser";
$password = "EEFiSNRK4.tY1jUH";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection){
    die("Conexao faio:" . mysqli_connect_error());

}
echo "conexao xumbada";
?>