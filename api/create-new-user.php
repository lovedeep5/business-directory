<?php require_once './db.php'; ?>


<?php

$table = "CREATE TABLE IF NOT EXISTS users (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `companyDetails` longtext NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp()
)";

$mysqli->query($table);

if(isset($_POST['submit'])){
    
    $name = strtolower($_POST['name']);
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    $cName = strtolower($_POST['companyName']);
    $cDetails = strtolower($_POST['aboutCompany']); 

    $query = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'" );
    $userData = mysqli_fetch_assoc($query);
    
    
    if($userData['id'] == true){
      
      $result = array(
      "status" => 100,
      "message" => "User already exists!",
      "id" => $userData['id'],
      "name" => $userData['name'],
      "email" => $userData['email']
    );
    echo json_encode($result);
    
    } else {
      $insertNewUser = $mysqli->query("INSERT INTO `users` (`id`, `name`, `email`, `password`, `companyName`, `companyDetails`, `timeStamp`) VALUES (NULL, '$name', '$email', '$password', '$cName', '$cDetails', current_timestamp()); ");
      
      if($insertNewUser == true){
        $result = array(
          "status" => 200,
          "message" => "New User Added!"
        );
    echo json_encode($result);
      }
    }

  } else {
    
    $result = array(
      "status" => 404,
      "message" => "Please, Try Again!!"
    );
    echo json_encode($result);

  }
  
?>