<?php
//Localhost.
$servername = "localhost";
//Name.
$username = "root";
//Password.
$password = "";
//Database.
$db = "php_crud";
// Create connection
$dbConnection= mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$dbConnection) {
   die("Connection failed: " . mysqli_connect_error());
}

?>