<?php
session_start();

require_once 'connectdb.php';

if(isset($POST)){
    $user_id = $_POST["userid"];
    $pwd = $_POST["password"];

    $stmt = $conn->query("SELECT*FROM Employee");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row){
        if(($row['userid'] == $user_id) && ($row['password'] == md5($pwd))){
            $_SESSION['current_user'] = $user_id;
            echo "true";
            break;
        }
        else{
            echo "Failed to login";
        }
    }

}





}
