<?php

function getAllMovies(){
  global $db;
  global $error;
  $query = 'SELECT * FROM Movies ORDER BY MovieTitle';
  $statement = $db->prepare($query);
  $statement->execute();
  $movies = $statement->fetchAll();
  $statement->closeCursor();
  if($statement->errorCode() !== 0 && empty($movies)){
    $sqlError = $statement->errorInfo();
    $error = 'SELECT error &rarr; The movies were not retrieved because: ' . $sqlError[2];
  }
  return $movies;
}

function addMovie($movieTitle, $movieGenre, $releaseYear, $movieRating, $imdbScore){
    global $db;
    global $error, $successMessage;
    // INTO are the sql database field names
    // Values are the database name with colon in front
    $query = 'INSERT INTO Movies 
                 (MovieTitle, MovieGenre, ReleaseYear, MovieRating, IMDB_Score)
                 VALUES
                 (:MovieTitle, :MovieGenre, :ReleaseYear, :MovieRating, :IMDB_Score)';
    $statement = $db->prepare($query);
    // bind colon database name to function parameter variables
    $statement->bindValue(':MovieTitle', $movieTitle);
    $statement->bindValue(':MovieGenre', $movieGenre);
    $statement->bindValue(':ReleaseYear', $releaseYear);
    $statement->bindValue(':MovieRating', $movieRating);
    $statement->bindValue(':IMDB_Score', $imdbScore);
    $success = $statement->execute();
    $statement->closeCursor();
    if($statement->errorCode() !== 0 && $success === false){
        $sqlError = $statement->errorInfo();
        $error = 'INSERT error &rarr; The movie <strong>' . $movieTitle . '</strong> was not add because: ' . $sqlError[2];
    }
    else {
        $successMessage = 'The movie <strong>' . $movieTitle . '</strong> was successfully added to the database.';
    }
}
