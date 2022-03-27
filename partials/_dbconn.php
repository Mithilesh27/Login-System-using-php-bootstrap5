<?php


$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "techytech"; 

$conn = mysqli_connect($servername, $username, $pwd, $dbname);

// I am Checking connection here. 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    // echo 'connection succesful';
    
}





?>