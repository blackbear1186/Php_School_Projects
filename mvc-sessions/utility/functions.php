<?php
// create a function to display error message
function logErrorMessage($message){
    $_SESSION['log'][] = ['message' => $message, 'color' => 'red', 'displayed' => false];
}
// create a function to display success message
function logSuccessMessage($message){
    $_SESSION['log'][] = ['message' => $message, 'color' => 'green', 'displayed' => false];
}