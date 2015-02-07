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


//enable us to access info on the server
        $this->connection = new mysqli($host, $username, $password);

//checks if the connection is unsuccesful or not
        if ($this->connection->connect_error) {

            //Connection has failed and shos the problem
            die("<p>Error: " . $this->connection->connect_error) . "</p>";
        }

//checks if the database already exits in the program
        $exists = $this->connection->select_db($database);

//checks if the data base exists or not
        if (!$exists) {

            //creates a database with the chosen name
            $query = $this->connection->query("CREATE DATABASE $database");

            //checks if the database was able to be created successfully
            if ($query) {

                echo "<p>Successfully created database: " . $database . "</p>";
            }
        }

//checks if the data base already exists
        else {

            echo '<p>Database already exists: ' . $database . "</p>";
        }
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

        if (isset($this->connection)) {

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
