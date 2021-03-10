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

} else if($action === 'show-add-movie'){
    $pageTitle = 'Add Movies';
    include 'view/movie_add.php';
}
// set php variable equal to html input id
else if($action === 'add-movie'){
    $movieTitle = filter_input(INPUT_POST, 'movie-title', FILTER_SANITIZE_STRING);
    $movieGenre = filter_input(INPUT_POST, 'movie-genre', FILTER_SANITIZE_STRING);
    $releaseYear = filter_input(INPUT_POST, 'release-year', FILTER_SANITIZE_NUMBER_INT);
    $movieRating = filter_input(INPUT_POST, 'movie-rating');
    $imdbScore = filter_input(INPUT_POST, 'imdb-score', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // if any of the input values are empty display error message
    if(!strlen($movieTitle) || !strlen($movieGenre) || !strlen($releaseYear) || $movieRating === 'choose' || !strlen($imdbScore)){
        $error = 'All fields in the Add form must contain data. Please ensure all form elements contain appropriate values.';
        $pageTitle = 'Add Movie';
        include 'view/movie_add.php';
    }
    else {
        addMovie($movieTitle, $movieGenre, $releaseYear, $movieRating, $imdbScore);
        $movies = getAllMovies();
        $pageTitle = 'List Movies';
        include 'view/movies_list.php';
    }
} else if($action === 'show-update-movie'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $movie = getMovieInfo($id);
    $pageTitle = 'Update Movie';
    include 'view/movie_update.php';

} else if($action === 'update-movie'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $movieTitle = filter_input(INPUT_POST, 'movie-title', FILTER_SANITIZE_STRING);
    $movieGenre = filter_input(INPUT_POST, 'movie-genre', FILTER_SANITIZE_STRING);
    $releaseYear = filter_input(INPUT_POST, 'release-year', FILTER_SANITIZE_NUMBER_INT);
    $movieRating = filter_input(INPUT_POST, 'movie-rating');
    $imdbScore = filter_input(INPUT_POST, 'imdb-score', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // if any of the input values are empty display error message
    if(!strlen($movieTitle) || !strlen($movieGenre) || !strlen($releaseYear) || !strlen($imdbScore)){
        $error = 'All fields in the Update form must contain data. Please ensure all form elements contain appropriate values.';
        $movie = getMovieInfo($id);
        $pageTitle = 'Update Movie';
        include 'view/movie_update.php';
    } else {
        updateMovie($id, $movieTitle, $movieGenre, $releaseYear, $movieRating, $imdbScore);
        $movies = getAllMovies();
        $pageTitle = 'List Movies';
        include 'view/movies_list.php';
    }
} else if($action === 'delete-movie'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $movie = getMovieInfo($id);
    $movieTitle = $movie['MovieTitle'];
    deleteMovie($id, $movieTitle);
    $movies = getAllMovies();
    $pageTitle = 'List Movies';
    include 'view/movies_list.php';
}
else if($action === 'clear-message'){
    header('Location:.');
}
else {
  $error = "The <strong>$action</strong> action was not handled in the code.";
  $movies = getAllMovies();
  $pageTitle = 'Code Error';
  include 'view/movies_list.php';
}
