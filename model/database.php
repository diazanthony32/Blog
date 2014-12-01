<?php


$host = "localhost";

//username of server
$username = "root";

//password of server
$password = "root";

//database name
$database = "blog_db";

//checks if the connection is unsuccesful or not
if($connection->connect_error){
    
    //Connection has failed and shos the problem
    die("Error: " . $connection->connect_error);
    
}

 else {
     
    //Connection Successful
    echo 'Success' . $connection->host_info;
    
 }
 
 //ends the connectiion to the server
 $connection->close();
