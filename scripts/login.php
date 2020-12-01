<?php
session_start();

require_once 'connectdb.php';

if(isset($POST)){
    $user_id = $_POST["userid"];
    $pwd = $_POST["password"];

    $stmt = $conn->query("SELECT*FROM Employee");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    

}





}