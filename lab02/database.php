<?php
    $dsn = 'mysql:host=localhost;dbname=webdsuco_berlin375';
    $username = 'webdsuco_berlin375';
    $password = 'webdsuco_berlin375';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>