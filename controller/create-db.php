<?php

//include the info in the file
require_once(__DIR__ . "/../model/database.php");

//enable us to access info on the server
$connection = new mysqli($host, $username, $password);

//checks if the connection is unsuccesful or not
if($connection->connect_error){
    
    //Connection has failed and shos the problem
    die("<p>Error: " . $connection->connect_error). "</p>";
    
}

//checks if the database already exits in the program
$exists = $connection->select_db($database);

//checks if the data base exists or not
if(!$exists){
    
    //creates a database with the chosen name
    $query = $connection->query("CREATE DATABASE $database");

    //checks if the database was able to be created successfully
    if($query){
        
        echo "<p>Successfully created database: " . $database. "</p>";
        
    }
    
}

//checks if the data base already exists
 else {

    echo '<p>Database already exists: '. $database . "</p>";
     
}

//created a query that will create a table in order to put information
$query = $connection->query("CREATE TABLE posts ("
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        . "title varchar(255) NOT NULL,"
        . "post text NOT NULL,"
        . "PRIMARY KEY(id))");

//checks if table is created properly
if($query){
    
    echo "<p>Successfully created table: posts</p>";
    
}

//checks if the table was already there or created improperly
 else {
     
    echo "<p>$connection->error</p>";
     
}

//ends the connectiion to the server
 $connection->close();
