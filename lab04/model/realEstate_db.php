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
function addHome($homeTitle, $homeAddress, $homeCity, $homeState, $zipCode, $homeBeds, $homeBaths, $homeSize, $lotSize, $homePrice){
    global $db;
    global $error, $successMessage;
    $query = 'INSERT INTO real_estate
                (Title, Address, City, State, Zip, Beds, Baths, HouseSize, LotSize, Price)
                VALUES
                (:Title, :Address, :City, :State, :Zip, :Beds, :Baths, :HouseSize, :LotSize, :Price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Title', $homeTitle);
    $statement->bindValue(':Address', $homeAddress);
    $statement->bindValue(':City', $homeCity);
    $statement->bindValue(':State', $homeState);
    $statement->bindValue(':Zip', $zipCode);
    $statement->bindValue(':Beds', $homeBeds);
    $statement->bindValue(':Baths', $homeBaths);
    $statement->bindValue(':HouseSize', $homeSize);
    $statement->bindValue(':LotSize', $lotSize);
    $statement->bindValue(':Price', $homePrice);
    $success = $statement->execute();
    $statement->closeCursor();
    if($statement->errorCode() !== 0 && $success === false){
        $sqlError = $statement->errorInfo();
        $error = 'INSERT error &rarr; The home <strong>' . $homeTitle . '</strong> was not added because: ' . $sqlError[2];
    } else {
        $successMessage = 'The home <strong> ' . $homeTitle . '</strong> was successfully added.';
    }
}
function getHomeInfo($id){
    global $db;
    global $error;
    $query = 'SELECT * FROM real_estate WHERE ID = :Home_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':Home_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $home = $statement->fetch();
    $statement->closeCursor();
    if($statement->errorCode() !== 0 && empty($home)){
        $sqlError = $statement->errorInfo();
        $error = 'SELECT error &rarr; The home with ID <strong>' . $id . '</strong> was not retrieved because: ' . $sqlError[2];
    }
    return $home;
}
