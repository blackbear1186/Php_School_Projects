<?php
class RealEstateDB {
    public static function getAllRealEstate(){
        $db = Database::getDB();
        global $error;
        $query = 'SELECT * FROM real_estate ORDER BY Title';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        foreach ($rows as $row) {
            $property = new RealEstate($row['Title'], $row['Address'], $row['City'], $row['State'], $row['Zip'], $row['Beds'],
                $row['Baths'], $row['HouseSize'], $row['LotSize'], $row['Price']);
            $property->setId($row['ID']);
            $realEstate[] = $property;
        }
        $statement->closeCursor();
        if($statement->errorCode() !== 0 && empty($realEstate)){
            $sqlError = $statement->errorInfo();
            $error = 'SELECT error &rarr; The houses were not retrieved because: ' . $sqlError[2];
        }
        return $realEstate;
    }
    public static function addHome(RealEstate $property){
        $db = Database::getDB();
        global $error, $successMessage;
        $homeTitle = $property->getHomeTitle();
        $homeAddress = $property->getHomeAddress();
        $homeState = $property->getHomeState();
        $homeCity = $property->getHomeCity();
        $zipCode = $property->getZipCode();
        $homeBeds = $property->getHomeBeds();
        $homeBaths = $property->getHomeBaths();
        $homeSize = $property->getHomeSize();
        $lotSize = $property->getLotSize();
        $homePrice = $property->getHomePrice();

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
            logErrorMessage($error);
        } else {
            $successMessage = 'The home <strong> ' . $homeTitle . '</strong> was successfully added.';
            logSuccessMessage($successMessage);
        }
    }
    public static function getHomeInfo($id){
        $db = Database::getDB();
        global $error;
        $query = 'SELECT * FROM real_estate WHERE ID = :Home_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':Home_id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch();
        $property = new RealEstate($row['Title'], $row['Address'], $row['City'], $row['State'], $row['Zip'], $row['Beds'], $row['Baths'], $row['HouseSize'], $row['LotSize'], $row['Price']);
        $property->getId($row['ID']);
        $statement->closeCursor();
        if($statement->errorCode() !== 0 && empty($home)){
            $sqlError = $statement->errorInfo();
            $error = 'SELECT error &rarr; The home with ID <strong>' . $id . '</strong> was not retrieved because: ' . $sqlError[2];
            logErrorMessage($error);
        }
        return $property;
    }
    public static function updateHome(RealEstate $property){
        $db = Database::getDB();
        global $error, $successMessage;

        $id = $property->getId();
        $homeTitle = $property->getHomeTitle();
        $homeAddress = $property->getHomeAddress();
        $homeState = $property->getHomeState();
        $homeCity = $property->getHomeCity();
        $zipCode = $property->getZipCode();
        $homeBeds = $property->getHomeBeds();
        $homeBaths = $property->getHomeBaths();
        $homeSize = $property->getHomeSize();
        $lotSize = $property->getLotSize();
        $homePrice = $property->getHomePrice();

        $query = 'UPDATE real_estate 
                SET ID = :Home_id,
                    Title = :Title,
                    Address = :Address,
                    City = :City,
                    State = :State,
                    Zip = :Zip,
                    Beds = :Beds,
                    Baths = :Baths,
                    HouseSize = :HouseSize,
                    LotSize = :LotSize,
                    Price = :Price
                WHERE ID = :Home_id';
        $statement = $db->prepare($query);
        $statement->bindValue('Home_id', $id, PDO::PARAM_INT);
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
            $error = 'Update error &rarr; The home <strong>' . $homeTitle . '</strong> was not updated because: ' . $sqlError[2];
            logErrorMessage($error);
        } else {
            $successMessage = 'The home <strong> ' . $homeTitle . '</strong> was successfully updated.';
            logSuccessMessage($successMessage);
        }
    }
    public static function deleteHome($id, $homeTitle){
        $db = Database::getDB();
        global $error, $successMessage;

        $query = 'DELETE FROM real_estate WHERE ID = :Home_id';
        $statement = $db->prepare($query);
        $statement->bindValue('Home_id', $id, PDO::PARAM_INT);
        $success = $statement->execute();
        $statement->closeCursor();
        if($statement->errorCode() !== 0 && $success === false){
            $sqlError = $statement->errorInfo();
            $error = 'DELETE error &rarr; The home <strong>' . $homeTitle . '</strong> was not deleted because: ' . $sqlError[2];
            logErrorMessage($error);
        } else {
            $successMessage = 'The home <strong> ' . $homeTitle . '</strong> was successfully deleted.';
            logSuccessMessage($successMessage);
        }
    }

}