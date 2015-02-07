<?php

//include the info in the file
require_once(__DIR__ . "/Database.php");

session_start();

$path = "/diaza-blog/";

$host = "localhost";

//username of server
$username = "root";

//password of server
$password = "root";

//database name
$database = "blog_db";

if (!isset($_SESSION["connection"])) {

    $connection = new Database($host, $username, $password, $database);

    $_SESSION["connection"] = $connection;
}