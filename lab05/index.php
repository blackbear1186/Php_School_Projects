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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1">
        <title>Johnson - Lab 5</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <table class="table table-bordered table-striped table-hover">
                <caption style="caption-side: top"><h1>Employee List - <?php echo date('m/d/Y');?></h1></caption>
                <thead>
                    <tr>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Age</th>
                        <th scope="col">Social Security</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $employee) : ?>
                        <?php
                            $fullName = $employee['employeeName'];
                            $socialSecurity = $employee['SSN'];
                            // get the first three digits of the social security number
                            $first = substr($socialSecurity, 0, 3);
                            // get the next two digits of the social security number
                            $second = substr($socialSecurity, 3, 2);
                            // get the last four digits of the social security number
                            $third = substr($socialSecurity, 5);
                            // take all three variables and concatenated them adding two dashes
                            $formattedSocSecurity = $first . '-' . $second . '-' . $third;


                            try {
                                $dateOfBirth = new DateTime($employee['dateOfBirth']);
                            } catch (PDOException $e){
                                $dateOfBirth = $e->getMessage();
                            }
                            // format the date of with a three letter month and leading zero for day
                            $formattedDateOfBirth = $dateOfBirth->format('M d, Y');
                            // calculate the age by using the date_diff() and d_create to get the difference
                            // the difference of years from the date of birth to the current date
                            $age = date_diff($dateOfBirth, date_create(date('Y-m-d')))->format('%y');

                            // find position of the comma in the name
                            $comma = strpos($fullName, ',');
                            // get the last name from the string and store in a variable
                            $lastName = substr($fullName, 0, $comma);
                            // get the first name from the string and store in a variable
                            $firstName = substr($fullName, $comma + 2);
                            // get the first intial of the first name
                            $userFirstInitial = substr($firstName, 0, 1);
                            // create a all lower case username
                            $username =  strtolower($lastName . $userFirstInitial);
                        ?>
                        <tr>
                            <td><?php echo $lastName; ?></td>
                            <td><?php echo $firstName; ?></td>
                            <td><?php echo $formattedDateOfBirth;?></td>
                            <td><?php echo $age;?></td>
                            <td><?php echo $formattedSocSecurity; ?></td>
                            <td><?php echo $username; ?></td>

                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </body>
</html>

