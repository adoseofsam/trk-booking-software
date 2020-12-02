<?php

require_once 'dbconfig.php';

try {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address_=$_POST['address_'];
    $phone=$_POST['phone'];
    $sel=$_POST['sel'];
    $date_rent=$_POST['date_rent'];

    //regex
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    //name validation
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $nameErr = "Only letters and white space allowed";
      echo $nameErr;
    }
    //lastname validation
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
        $nameErr = "Only letters and white space allowed";
        echo $nameErr;
      }
    
      //email validation
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }

    //password validation
    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        echo "Password should contain at least one number, one letter, and one capital letter and at least 8 characters long";
    } else{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        var_dump($hashed_password);

    }


    // put in 'log in code when get there' Query the database for username and password
// ...

// if(password_verify($password, $hashed_password)) {
    
// } 



    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password1);
    echo "Connected to $dbname at $host";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT into bookinfo (firstname, lastname, email, address_, phone, sel, date_rent)
    VALUES ('$firstname','$lastname','$email','$address_','$phone','$sel' , '$date_rent')";
    $conn->exec($sql);
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit;

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
$conn = null;


foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch=mysqli_query($con,"insert into bookinfo (equipment) values ('$chk')");  
if($in_ch==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   } 
?>




