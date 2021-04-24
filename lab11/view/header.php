<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Johnson Lab 11<?php if (!empty($pageTitle)) echo ' - ' . $pageTitle; ?></title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/styles.css">
  </head>
    <body>
      <div class="container">
        <header>
            <?php
            if(!empty($_SESSION['log'])){
                $lastElement = end($_SESSION['log']);
                if($lastElement['displayed'] === false){
                    if($lastElement['color'] === 'red'){
                        echo "<div class='alert alert-danger text-center'>\n";
                    } else {
                        echo "<div class='alert alert-success text-center'>\n";
                    }
                    echo "<p>" . $lastElement['message'] . "</p>";
                    echo "</div>\n";
                    $_SESSION['log'][count($_SESSION['log']) - 1]['displayed'] = true;
                }

            }
            ?>
            <div class="pb-2 mt-4 border-bottom text-right">
                <p>
                    <a href=".?action=show-login-form">Log In</a>
                </p>
            </div>
        </header>
        <main>

