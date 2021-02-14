<?php
$dsn = 'mysql:host=localhost;dbname=webdsuco_berlin375';
$username = 'webdsuco_berlin375';
$password = 'webdsuco_berlin375';

try {
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT * FROM employees';
    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement->fetchAll();
    $statement->closeCursor();

} catch (PDOException $e){
    $errorMessage = $e->getMessage();
    echo '<p>$errorMessage</p>';
    exit();
}

?>
