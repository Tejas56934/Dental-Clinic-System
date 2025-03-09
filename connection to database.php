<?php


// connectiont to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "major2";


// create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `appointment3` WHERE 1";
$sql ="SELECT * FROM `registration3` WHERE 1";
$sql="SELECT 'Password' FROM registration3 WHERE Email = ?";
$sql="SELECT * FROM `payments3` WHERE 1";


//die if connection was not successful

if(!$conn){
     die("Sorry we failed to connect:".mysqli_connect_error());

}

?>