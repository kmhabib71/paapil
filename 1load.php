<?php

//load.php
    include 'connect/login.php';
    include 'core/load.php';
    if(login::isLoggedIn()){
    $userid=login::isLoggedIn();
    
    }else{
    header('location:log.php');
    }
$connect = new PDO('mysql:host=localhost; dbname=paapil_paapil; charset=utf8mb4', 'paapil_habib', 'Khurshida@71');

$data = array();

$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
   
if($row["userid"] == $userid){
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}
}

echo json_encode($data);

?>