<?php
$dsn = 'mysql:host=localhost;dbname=webdsuco_berlin375';
$username = 'webdsuco_berlin375';
$password = 'webdsuco_berlin375';

try {
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT * FROM `strings-example`';
    $statement = $db->prepare($query);
    $statement->execute();
    $people = $statement->fetchAll();
    $statement->closeCursor();

} catch (PDOException $e) {
   $errorMessage = $e->getMessage();
   echo "<p>$errorMessage</p>";
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1">
        <title>Strings and Dates Example</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <table class="table table-bordered table-hover table-striped">
            <caption style="caption-side: top"><h1>People List - <?php echo date('l, F j, Y'); ?></h1></caption>
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Age</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person) : ?>
                    <?php
                        $fullName = $person['fullName'];
                        $phoneNumber = $person['phoneNumber'];
                        try {
                            $dateOfBirth = new DateTime($person['birthDate']);
                        } catch(PDOException $e) {
                            $dateOfBirth = $e->getMessage();
                        }
                        // find position or index of the space between the names
                        $space = strpos($fullName, ' ');


                        $firstName = substr($fullName, 0, $space);
                        $lastName = substr($fullName, $space + 1);

                        // the date format below uses no leading zeros for the month and day
                        $formattedDateOfBirth = $dateOfBirth->format('n/j/Y');

                        // calculate the age using the date_diff() function to find the number of years between the date of birth
                        // and the current date
                        $age = date_diff($dateOfBirth, date_create(date('Y-m-d')))->format('%y');

                        // format the phone number to the (999) 999-9999 format using substr() and concatenation
                        $formattedPhone = '(' . substr($phoneNumber, 0, 3) . ') ' . substr($phoneNumber, 3, 3) . '-' . substr($phoneNumber, 6);
                    ?>
                    <tr>
                        <td><?php echo $firstName;?></td>
                        <td><?php echo $lastName;?></td>
                        <td><?php echo $formattedDateOfBirth;?></td>
                        <td><?php echo $age; ?></td>
                        <td><?php echo $formattedPhone;?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
