<?php

require_once 'config.php';


    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);

    die("Could not connect to the database $dbname :" . $pe->getMessage());
}