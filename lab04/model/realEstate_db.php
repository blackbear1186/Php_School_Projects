<?php
function getAllRealEstate(){
  global $db;
  global $error;
  $query = 'SELECT * FROM real_estate ORDER BY Title';
  $statement = $db->prepare($query);
  $statement->execute();
  $realEstate = $statement->fetchAll();
  $statement->closeCursor();
  if($statement->errorCode() !== 0 && empty($realEstate)){
    $sqlError = $statement->errorInfo();
    $error = 'SELECT error &rarr; The houses were not retrieved because: ' . $sqlError[2];
  }
  return $realEstate;
}
