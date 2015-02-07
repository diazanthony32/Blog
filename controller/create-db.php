<?php

//include the info in the file
require_once(__DIR__ . "/../model/config.php");

//created a query that will create a table in order to put information
$query = $_SESSION["connection"]->query("CREATE TABLE posts ("
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
     
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
     
}

