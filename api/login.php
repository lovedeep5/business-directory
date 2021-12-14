<?php session_start(); ?>
<?php require_once './db.php'; ?>


<?php


if(isset($_POST['submit'])){
    
    
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    
    $query = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'" );
    $userData = mysqli_fetch_assoc($query);
    
    
    if($userData['password'] == $password){
     
      $_SESSION['userData'] = array(
        "id" => $userData['id'],
        "name" => $userData['name'],
        "email" => $userData['email']
    );

      $result = array(
      "status" => 200,
      "message" => "User exists!",
      "id" => $userData['id'],
      "name" => $userData['name'],
      "email" => $userData['email']
    );
    echo json_encode($result);
    
    } else {

      $result = array(
      "status" => 100,
      "message" => "User not found, or the incorrect login details, Try Again!!"
    );
    echo json_encode($result);

    } }
?>