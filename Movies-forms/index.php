<?php
require 'model/database.php';
require 'model/movies_db.php';

if(!empty($_POST)){
  $_POST = array_map('trim', $_POST);
}

if(isset($_POST['action'])){
  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
}
elseif(isset($_GET['action'])){
  $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
else {
  $action = 'list-movies';
}

if($action === 'list-movies'){
  $movies = getAllMovies();
  $pageTitle = 'List Movies';
  include 'view/movies_list.php';
}
else if($action === 'show-add-movie'){
    $pageTitle = 'Add Movies';
    include 'view/movie_add.php';
}
else {
  $error = "The <strong>$action</strong> action was not handled in the code.";
  $movies = getAllMovies();
  $pageTitle = 'Code Error';
  include 'view/movies_list.php';
}
