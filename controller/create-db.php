<?php

//include the info in the file
require_once(__DIR__ ."/../model/database.php");

//enable us to access info on the server
$connection = new mysqli($host, $user, $password);

//checks if the connection is unsuccesful or not
if($connection->connect_error){
    
    //Connection has failed and shos the problem
    die("Error: " . $connection->connect_error);
    
}

 else {
     
    //Connection Successful
    echo 'Success: ' . $connection->host_info;
    
 }
 
 //ends the connectiion to the server
 $connection->close();
