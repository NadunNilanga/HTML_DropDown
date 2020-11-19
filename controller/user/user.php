<?php
//Load table system_user 
if (!isset($_SESSION)) {
  session_start();
}
include("../../model/dbcon.php");
if ($_POST['request'] == 'user') {
  //$data = $_POST['data'];  
  try {
    $statement = $con->prepare("SELECT * FROM user");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
    $stmt = null;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $con = null;
}
//END Load  system_user 
