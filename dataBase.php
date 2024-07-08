<?php


$servername="localhost";
$username="root";
$pasword="";
$database="web_11_2023_2";

$conn = new mysqli($servername, $username, $pasword,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>