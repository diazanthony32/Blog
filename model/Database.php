<?php

class Database {

    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct($host, $username, $password, $database) {

        $this->host = $host;
        $this->password = $password;
        $this->username = $username;
        $this->database = $database;
    }

    public function openConnection() {

        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);

        //checks if the connection is unsuccesful or not
        if ($this->connection->connect_error) {

            //Connection has failed and shos the problem
            die("<p>Error: " . $this->connection->connect_error) . "</p>";
        }
        
    }

    public function closeConnection() {
        
        if(isset($this->connection)){
            
            $this->connection->close();
            
        }
        
    }

    public function query($string) {
        
        $this->openConnection();
        
        $query = $this->connection->query($string);
        
        $this->closeConnection();
        
        return $query;
        
    }

}
