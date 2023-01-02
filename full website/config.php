<?php
//connect with database
$server = "localhost";
$user = "root";
$password = "";
$database = "user_db";

$conn =mysqli_connect ($server,$user,$password,$database);
if($conn){
    
    echo "connected";
}
?>