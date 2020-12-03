<?php

require_once 'dbconnection.php';

if (isset($_POST)) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = $_POST['password'];
    $hashedPassword = md5($password);

    $stmt = $conn->query("SELECT email FROM Employee JOIN email ON Employee.employee_id = TRKOwner.employee_id");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $flag = true;
    foreach($results as $row) {
        if($row['robert@gmail.com'] === $email) {
            $flag = false;
            header("Location: manage-account.php");
        }
        elseif($row['email'] == $email){
            $flag = false;
            header("Location: booking.php");
            
        }
        else{
            echo "Failed to Login";

        }
    }


}

?>


	