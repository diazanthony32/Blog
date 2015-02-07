<?php

//include the info in the file
require_once(__DIR__ . "/Database.php");

$path = "/diaza-blog/";


$host = "localhost";

//username of server
$username = "root";

//password of server
$password = "root";

//database name
$database = "blog_db";


$connection = new Database($host, $username, $password, $database);