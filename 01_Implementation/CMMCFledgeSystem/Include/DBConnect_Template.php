<?php
// Please fill out your DB information and change this file name to DBConnect.php
// DBConnect.php should be included in gitignore
$servername = ""; // ADD
$username   = ""; // ADD
$password   = ""; // ADD
$dbname     = ""; // ADD

$conn = new mysqli($servername, $username, $password, $dbname, 3306); //port 3306 by default, change if needed
  
if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
}
?>
