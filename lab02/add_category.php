<?php
    // get category name
    $categoryName = filter_input(INPUT_POST, 'category_name');

    // display error message if categoryName is empty
    if(empty($categoryName)){
        $error = 'Invalid category name. Please enter a name and try again.';
        include 'error.php';
    }
    else {
        // insert and run database
        require_once 'database.php';

        $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryName', $categoryName);
        $statement->execute();
        $statement->closeCursor();

        include 'category_list.php';
    }
?>