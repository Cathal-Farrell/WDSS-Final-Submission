<?php 
require_once 'include/sqlConfig.php'; 

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}   
else {
    echo"Connected successfully";
}
