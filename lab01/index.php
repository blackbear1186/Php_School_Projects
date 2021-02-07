<?php
    // set first and last name
    $firstName = 'Berlin';
    $lastName = 'Johnson';
    // concatenate first and last name
    $name = $firstName . ' ' . $lastName;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Johnson Lab 1</title>
    </head>
    <body>
        <main>
            <h1>Johnson Lab 1</h1>
            <p>Hello, from <?php echo $name; ?>!</p>
        </main>
    </body>
</html>
