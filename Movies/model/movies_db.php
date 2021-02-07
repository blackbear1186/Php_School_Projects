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