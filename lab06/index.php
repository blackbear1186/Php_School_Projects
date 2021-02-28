<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Johnson - Lab 6</title>
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
                    $numberOfAssignments = 9;
                    // declare a variable to used for array elements - subtract 1 since array elements start at 0
                    $assignmentArrayElements = $numberOfAssignments - 1;
                    for($i = 0; $i <= $assignmentArrayElements; $i++){
                        $assignmentNumber = $i + 1;
                        // Load values from the post to the array
                        if(strlen($_POST['assignment' . $assignmentNumber]) > 0){
                            $assignmentGrade[$i] = filter_input(INPUT_POST, 'assignment' . $assignmentNumber, FILTER_SANITIZE_NUMBER_INT);
                        }

                        echo "<div class='form-group form-inline justify-content-center'>\n";
                        echo "<label for='assignment$assignmentNumber'>Assignment $assignmentNumber:</label>\n";
                        echo "<input type='text' class='form-control' name='assignment$assignmentNumber' id='assignment$assignmentNumber' 
                                value='$assignmentGrade[$i]'>%\n";
                        echo "</div>\n";
                    }
                    ?>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" value="Find Average of 8 Highest Grades">
                        <a href="." class="btn btn-secondary">Clear</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>