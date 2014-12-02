<?php

//include the info in the file
require_once(__DIR__ . "/../model/database.php");

//enable us to access info on the server
$connection = new mysqli($host, $username, $password);

//checks if the connection is unsuccesful or not
if($connection->connect_error){
    
    //Connection has failed and shos the problem
    die("Error: " . $connection->connect_error);
    
}

//checks if the database already exits in the program
$exists = $connection->select_db($database);

//checks if the data base exists or not
if(!$exists){
    
    echo 'Database does not exists';

}
 
 //ends the connectiion to the server
 $connection->close();
