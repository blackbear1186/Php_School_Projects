<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Johnson Lab 6</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <script>
            window.onload = () => {
                document.getElementById('assignment1').focus();
                document.getElementById('assignment1').select();
            }
        </script>
        <style>
            input[type='text']{
                width: 4em !important;
                text-align: right;
                margin-left: .5em;
            }
            ul {
                list-style-type: none;
                padding-left: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-6 mx-auto text-center">
                <h1>Enter Assignment Grades</h1>
                <form action="." method="post">
                    <?php
                    // create assignment grade array
                    $assignmentGrade = array();
                    // set the number assignment grades to be entered
                    $numberOfAssignments = 3;
                    // declare a variable to used for array elements - subtract 1 since array elements start at 0
                    $assignmentArrayElements = $numberOfAssignments - 1;
                    for($i = 0; $i <= $assignmentArrayElements; $i++){
                        $assignmentNumber = $i + 1;
                        // Load values from the post to the array
                        if(strlen($_POST['assignment' . $assignmentNumber]) > 0){
                            $assignmentGrade[$i] = filter_input(INPUT_POST, 'assignment' . $assignmentNumber, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        }

                        echo "<div class='form-group form-inline justify-content-center'>\n";
                        echo "<label for='assignment$assignmentNumber'>Assignment $assignmentNumber:</label>\n";
                        echo "<input type='text' class='form-control' name='assignment$assignmentNumber' id='assignment$assignmentNumber' 
                                value='$assignmentGrade[$i]'>%\n";
                        echo "</div>\n";
                    }
                    ?>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" value="Find Average of 8 Highest Assignment Grades">
                        <a href="." class="btn btn-secondary">Clear</a>
                    </div>
                </form>
                <?php

                    if(count($assignmentGrade) === $numberOfAssignments){
                        $total = 0;
                        // sort the $assignmentGrade array in descending order
                        rsort($assignmentGrade);

                        echo "<h2>Grade Assignments:</h2>";
                        echo "<ul>\n";
                        // iterate through number of assignments entered and print the percentage and letter grades
                        for($i = 0; $i < $numberOfAssignments; $i++){
                            echo "<li>$assignmentGrade[$i]% - " . getAssignmentGrade($assignmentGrade[$i]) . "</li>\n";
                        }
                        echo "<h2>Dropped Assignment Grade:</h2>";
                        // move the cursor to the end of the array and assign the value to a variable
                        $lowestAssignmentGrade = end($assignmentGrade);
                        echo "<li>$lowestAssignmentGrade% - " . getAssignmentGrade($lowestAssignmentGrade) . "</li>\n";
                        for($i = 0; $i < $numberOfAssignments - 1; $i++ ){
                            $total += $assignmentGrade[$i];
                        }
                        $num = $numberOfAssignments - 1;
                        // get the average grade for all assignments
                        $average = $total / $num;
                        echo "<p>$total</p>";
                        echo "<h2>Average of 8 Highest Assignment Grades:</h2>";
                        echo "<li>" . number_format($average, 2) . "% - " . getAssignmentGrade($average) . "</li>\n";

                        echo "</ul>\n";

                    } else {
                        if(count($assignmentGrade) > 0){
                            echo "<h2 class='text-danger'>Please enter grades in each textbox</h2>";

                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>