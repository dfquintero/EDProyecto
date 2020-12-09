<?php 
$servername = "localhost";
$database = "vunme";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed{
         <br>" . mysqli_connect_error());
}

?>