<?php

$hostDetails = 'mysql:host=localhost; dbname=paapil_paapil; charset=utf8mb4';
$userAdmin = 'paapil_habib';
$pass = 'Khurshida@71';

try{
    $pdo = new PDO($hostDetails,$userAdmin,$pass);
} catch(PDOExecption $e){
    echo 'Connection error!' . $e->getMessage();
}

?>
