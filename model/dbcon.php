<?php
//Make Connection 
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "drop_down_example";
try {
  $con = new PDO("mysql:host=$servername;dbname=$database_name;charset=utf8", $username, $password);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo json_encode(array("msgType" => 0, "msg" => 'Connection failed:' . $e->getMessage()));
}
//End Make Connection 
//Make Insert MySQL 

function getInsertMySQL($tbl, $data)
{
  $qury = 'INSERT INTO ' . $tbl . ' (';
  $numItems = count($data);
  $i = 0;
  foreach ($data as $col => $x_value) {
    if (++$i === $numItems) {
      $qury .= $col;
    } else {
      $qury .= $col . ',';
    }
  }
  $qury .= ')VALUES (';
  $i = 0;
  foreach ($data as $col => $x_value) {
    if (++$i === $numItems) {
      $qury .= ':' . $col;
    } else {
      $qury .= ':' . $col . ',';
    }
  }
  $qury .= ');';
  return $qury;
}
// END Make Insert MySQL 

//Make update 

function getUpdateMySQL($tbl, $data, $whre)
{
  $qury = 'UPDATE  ' . $tbl . ' set ';
  $numItems = count($data);
  $i = 0;
  foreach ($data as $col => $x_value) {
    if (++$i === $numItems) {
      $qury .= $col . '=:' . $col;
    } else {
      $qury .= $col . '=:' . $col . ',';
    }
  }
  $qury .= ' where ';
  $numItems = count($whre);
  $i = 0;
  foreach ($whre as $col => $x_value) {
    if (++$i === $numItems) {
      $qury .= $col . '=:' . $col;
    } else {
      $qury .= $col . '=:' . $col . 'and';
    }
  }
  $qury .= ';';
  return $qury;
}
// END Make update 

//Make Delete 
function getDeleteMySQL($tbl, $whre)
{
  $qury = 'delete from  ' . $tbl;
  $numItems = count($whre);
  $qury .= ' where ';
  $i = 0;
  foreach ($whre as $col => $x_value) {
    if (++$i === $numItems) {
      $qury .= $col . '=:' . $col;
    } else {
      $qury .= $col . '=:' . $col . 'and';
    }
  }
  $qury .= ';';
  return $qury;
}
//End Make Delete 
