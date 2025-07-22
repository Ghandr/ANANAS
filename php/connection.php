<?php
session_start();
$servername = "localhost";
$username = "";
$password = "";
$db_name = "ananas";

$conn = new mysqli($servername,$username,$password,$db_name);

if($conn->connect_error){
    die("conection failed: " . $conn->connect_error);
}

?>