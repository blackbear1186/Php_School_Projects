<?php
function checkUsername($username) {
    $db = Database::getDB();
    $query = 'SELECT ID FROM user WHERE Username = :Username';
    $statement = $db->prepare($query);
    $statement->bindValue(':Username', $username);
    $success = $statement->execute();

    if($statement->errorCode() !== 0 && $success === false){
        $sqlError = $statement->errorCode();
        $error = 'The query to check if a user exists did not work because: ' . $sqlError[2];
        logErrorMessage($error);
    }
    $statement->closeCursor();
    return $statement->rowCount() === 1;
}

function registerUser($username, $password, $userIP) {
    $db = Database::getDB();
    $query = 'INSERT INTO user (Username, Password, IpAddress) VALUES (:Username, :Password, :userIP)';
    $statement = $db->prepare($query);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $statement->bindValue(':Username', $username);
    $statement->bindValue(':Password', $hashedPassword);
    $statement->bindValue(':userIP', $userIP);
    $success = $statement->execute();

    if($statement->errorCode() !== 0 && $success === false) {
        $sqlError = $statement->errorCode();
        $error = 'The query to register a user did not work because: ' . $sqlError[2];
        logErrorMessage($error);
    } else {
        $successMessage = 'The user <strong>' . $username . '</strong> was successfully registered.';
        logSuccessMessage($successMessage);
    }
    $statement->closeCursor();
    return $success;
}