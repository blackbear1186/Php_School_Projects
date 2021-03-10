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
    logErrorMessage($error);
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
        logErrorMessage($error);

    }
    else {
        $successMessage = 'The movie <strong>' . $movieTitle . '</strong> was successfully added to the database.';
        logSuccessMessage($successMessage);
    }
}
function getMovieInfo($id){
    global $db;
    global $error;
    $query = 'SELECT * FROM Movies WHERE ID = :Movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':Movie_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $movie = $statement->fetch();
    $statement->closeCursor();
    if($statement->errorCode() !== 0 && empty($movie)){
        $sqlError = $statement->errorInfo();
        $error = 'SELECT error &rarr; The movie with the ID <strong>' . $id . '</strong> was not retrieved because: ' . $sqlError[2];
        logErrorMessage($error);

    }
    return $movie;
}
function updateMovie($id, $movieTitle, $movieGenre, $releaseYear, $movieRating, $imdbScore){
    global $db;
    global $error, $successMessage;
    $query = 'UPDATE Movies
                SET ID = :Movie_id,
                    MovieTitle = :MovieTitle,
                    MovieGenre = :MovieGenre,
                    ReleaseYear = :ReleaseYear,
                    MovieRating = :MovieRating,
                    IMDB_Score = :IMDB_Score
                WHERE ID = :Movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue('Movie_id', $id, PDO::PARAM_INT);
    $statement->bindValue(':MovieTitle', $movieTitle);
    $statement->bindValue(':MovieGenre', $movieGenre);
    $statement->bindValue(':ReleaseYear', $releaseYear);
    $statement->bindValue(':MovieRating', $movieRating);
    $statement->bindValue(':IMDB_Score', $imdbScore);
    $success = $statement->execute();
    $statement->closeCursor();
    if($statement->errorCode() !== 0 && $success === false){
        $sqlError = $statement->errorInfo();
        $error = 'Update error &rarr; The movie <strong>' . $movieTitle . '</strong> was not updated because: ' . $sqlError[2];
        logErrorMessage($error);

    }
    else {
        $successMessage = 'The movie <strong>' . $movieTitle . '</strong> was successfully updated.';
        logSuccessMessage($successMessage);
    }
}
function deleteMovie($id, $movieTitle){
    global $db;
    global $error, $successMessage;

    $query = 'DELETE FROM Movies WHERE ID = :Movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue('Movie_id', $id, PDO::PARAM_INT);
    $success = $statement->execute();
    $statement->closeCursor();
    if($statement->errorCode() !== 0 && $success === false){
        $sqlError = $statement->errorInfo();
        $error = 'DELETE error &rarr; The movie <strong>' . $movieTitle . '</strong> was not deleted because: ' . $sqlError[2];
        logErrorMessage($error);

    }
    else {
        $successMessage = 'The movie <strong>' . $movieTitle . '</strong> was successfully deleted.';
        logSuccessMessage($successMessage);
    }

}