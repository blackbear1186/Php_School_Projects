<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Array Example</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <script>
            window.onload = () => {
                document.getElementById('game1').focus();
                document.getElementById('game1').select();
            }
        </script>
        <style>
            input[type="text"] {width: 4em !important; text-align: right; margin-right: .5em;}
            ul {list-style-type: none; padding-left: 0}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-6 mx-auto text-center">
                <h1>Bowling Scores</h1>
                <form action="." method="post">
                    <?php
                    // declare an array to store bowling scores
                    $bowlingScores = array();
                    // declare a variable to be used for the natural counting of the number of games
                    $numberOfGames = 3;
                    //declare a variable to used for array elements - subtract 1 since array elements start at 0
                    $gamesArrayElements = $numberOfGames - 1;
                    for($i = 0;$i <= $gamesArrayElements; $i++){
                        $gameNumber = $i + 1;
                        // load values from POST into array elements
                        if(strlen($_POST['game' . $gameNumber]) > 0){
                            $bowlingScores[$i] = filter_input(INPUT_POST, 'game' . $gameNumber, FILTER_SANITIZE_NUMBER_INT);
                        }

                        echo "<div class='form-group form-inline justify-content-center'>\n";
                        echo "<label for='game$gameNumber'>Game $gameNumber: </label>\n";
                        echo "<input type='text' class='form-control' name='game$gameNumber' id='game$gameNumber' value='$bowlingScores[$i]'>\n";
                        echo "</div>\n";
                    }
                    ?>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" value="Find Average of <?php echo $numberOfGames; ?> Bowling Scores">
                        <a href="." class="btn btn-secondary">Clear</a>
                    </div>
                </form>
                <?php
                if(count($bowlingScores) === $numberOfGames){
                    $total = 0;
                    echo "<h2>Score:</h2>";
                    echo "<ul>\n";
                    // for loop to print array elements and add each score to the total
                    for($i = 0; $i <= $gamesArrayElements; $i++){
                        echo "<li>$bowlingScores[$i] - " . getBowlingRank($bowlingScores[$i]) . "</li>\n";
                        $total += $bowlingScores[$i];
                    }
                    echo "</ul>\n";
                    $average = $total / $numberOfGames;
                    echo "<h2>Average Score:</h2>";
                    echo "<p>" . number_format($average, 1) . " - " . getBowlingRank($average) . "</p>\n";

                } else {
                    if(count($bowlingScores) > 0){
                        echo "<h2 class='text-danger'>Please enter scores in each textbox.</h2>\n";
                    }
                }

                ?>
            </div>
        </div>
    </body>
</html>