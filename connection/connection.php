<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mailpanel";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

mysqli_select_db($conn, $database) or die(mysqli_error());

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!isset($_SESSION)){
    session_start();
}
?>