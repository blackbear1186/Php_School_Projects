<?php
$dsn = 'mysql:host=localhost;dbname=webdsuco_berlin375';
$username = 'webdsuco_berlin375';
$password = 'webdsuco_berlin375';

try {
  $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e){
  $errorMessage = $e->getMessage();
  include 'view/header.php';
  echo '<h1>Database Error</h1>';
  echo '<p>' . $errorMessage . '</p>';
  include 'view/footer.php';
  exit();
}
