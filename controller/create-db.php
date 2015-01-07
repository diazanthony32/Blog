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
    
    //creates a database with the chosen name
    $query = $connection->query("CREATE DATABASE $database");

    //checks if the data base was able to be successfully executed
    if($query){
        
        echo "Successfully created database: " . $database;
        
    }
    
}

 else {

    echo 'Database already exists: '. $database;
     
}

//created a query that will create a table in order to put information
$query = $connection->query("CREATE TABLE posts ("
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        . "title varchar(255) NOT NULL,"
        . "post text NOT NULL,"
        . "PRIMARY KEY(id))");

if($query){
    
    echo "Successfully created table: posts";
    
}

        //ends the connectiion to the server
 $connection->close();
