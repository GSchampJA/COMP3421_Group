<?php 

$servername = "localhost";      //defined in XAMPP phpMyAdmin - user account
$username = "root";             //defined in XAMPP phpMyAdmin - user account
$password = "";                 //defined in XAMPP phpMyAdmin - user account
$dbname = "comp3421_project";   //database name in xampp

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);  //change MYSQL port number according to XAMPP control panel

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
