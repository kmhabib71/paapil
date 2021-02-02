<?php

include 'database/connection.php';
include 'classes/users.php';
include 'classes/post.php';
include 'classes/page.php';

global $pdo;

$loadFromUser = new User($pdo);
$loadFromPost = new Post($pdo);
$loadFromPage = new Page($pdo);

define("BASE_URL", "https://paapil.com/");


?>
