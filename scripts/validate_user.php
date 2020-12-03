<?php

require_once 'dbconnection.php';

if (isset($_POST)) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $hashedPassword = md5($password);

    $stmt = $conn->query("SELECT * FROM EmpLogin");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $flag = true;
    foreach($results as $row) {
        if($row['email'] === $email) {
            $flag = false;
            header("location: getlist.php");
            break;
        }
        else{
            echo "Invalid credentials";

        }
    }


}



}

// session_start();
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "testing";
// $message="";

// try{
//     $connect = new PDO("mysql:host=$host;dbname=$database", $username,$password);
//     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     if(isset($_POST["Login"])){
//         if(empty($_POST["username"]) || empty($_POST["password"])){
//             $message='<label>All fields are required</label';
//         }else{
//             $query = "SELECT * FROM Employee WHERE username = :username";
//             $statement = $connect->prepare($query);
//             $statement->execute(
//                 array(
//                     'username' => $_POST["username"]
//                 )
//                 );
//                 $count = $statement -> rowCount();
//                 if ($count > 0){
//                     $_SESSION["username"] = $_POST["username"];
//                     header("location: loginsucess.php");
//                 }else{
//                     $message = '<label>Wrong credentials entered</label>';
//                 }

//         }
//     }

// }catch(PDOException $error){
//     $message = $error->getMessage();

// }




// require_once 'dbconnection.php';

// if (isset($_POST)) {
//     $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $password = $_POST['password'];
//     $hashedPassword = md5($password);

//     $stmt = $conn->query("SELECT email FROM Employee JOIN email ON Employee.employee_id = TRKOwner.employee_id");
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $flag = true;
//     foreach($results as $row) {
//         if($row['robert@gmail.com'] === $email) {
//             $flag = false;
//             header("Location: manage-account.php")
//         }
//         elseif($row['email'] == $email){
//             $flag = false;
//             header("Location: booking.php")
            
//         }
//         else{
//             echo "Failed to Login";

//         }
//     }


// }


?>






	