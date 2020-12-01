<?php

require_once 'configdb.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}