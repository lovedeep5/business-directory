<?php session_start(); ?>
<?php require_once './db.php'; ?>


<?php


if(isset($_POST['loadRecord'])){
  $id = $_POST['recordID'];

  $query = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$id'");
  $row = mysqli_fetch_assoc($query);

  $data = array(
    "name" => $row['name'],
    "companyName" => $row['companyName'],
    "aboutCompany" => $row['companyDetails']
  );

  echo json_encode($data);

};

if(isset($_POST['updateRecord'])){
  
  $id = $_POST['recordID'];
  $name = strtolower($_POST['name']);
  $cName = strtolower($_POST['companyName']);
  $cDetail = strtolower($_POST['aboutCompany']);

  $updateRecord = $mysqli->query("UPDATE `users` SET `name` = '$name', `companyName` = '$cName', `companyDetails` = '$cDetail' WHERE `users`.`id` = $id");

   if($updateRecord == true){
     echo "ok";
   } else {
     echo "no";
   }

};
?>