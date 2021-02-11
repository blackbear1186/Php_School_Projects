<?php
require 'model/database.php';
require 'model/realEstate_db.php';

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
  $action = 'list-homes';
}
if($action === 'list-homes'){
  $realEstate = getAllRealEstate();
  $pageTitle = 'List Homes';
  include 'view/realEstate_list.php';

} else if($action === 'show-add-home'){
    $pageTitle = 'Add Home';
    include 'view/realEstate_add.php';
} else if($action === 'add-home'){
    $homeTitle = filter_input(INPUT_POST, 'home-title', FILTER_SANITIZE_STRING);
    $homeAddress = filter_input(INPUT_POST, 'home-address', FILTER_SANITIZE_STRING);
    $homeCity = filter_input(INPUT_POST, 'home-city', FILTER_SANITIZE_STRING);
    $homeState = filter_input(INPUT_POST, 'home-state');
    $zipCode = filter_input(INPUT_POST, 'zip-code', FILTER_SANITIZE_NUMBER_INT);
    $homeBeds = filter_input(INPUT_POST, 'home-beds');
    $homeBaths = filter_input(INPUT_POST, 'home-baths');
    $homeSize = filter_input(INPUT_POST, 'home-size', FILTER_SANITIZE_NUMBER_INT);
    $lotSize = filter_input(INPUT_POST, 'lot-size', FILTER_SANITIZE_NUMBER_INT);
    $homePrice = filter_input(INPUT_POST, 'home-price', FILTER_SANITIZE_NUMBER_INT);

    if(!strlen($homeTitle) || !strlen($homeAddress) || !strlen($homeCity) || $homeState === 'choose' || !strlen($zipCode) || $homeBeds === 'choose' || $homeBaths === 'choose' ||
    !strlen($homeSize) || !strlen($lotSize) || !strlen($homePrice)){
        $error = 'All fields in the Add form must contain data. Please ensure all form elements contain appropriate values.';
        $pageTitle = 'Add Home';
        include 'view/realEstate_add.php';
    } else {
        addHome($homeTitle, $homeAddress, $homeCity, $homeState, $zipCode, $homeBeds, $homeBaths, $homeSize, $lotSize, $homePrice);
        $realEstate = getAllRealEstate();
        $pageTitle = 'List Homes';
        include 'view/realEstate_list.php';
    }

} else if($action === 'show-update-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $home = getHomeInfo($id);
    $pageTitle = 'Update Home';
    include 'view/realEstate_update.php';

} else if($action === 'update-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $homeTitle = filter_input(INPUT_POST, 'home-title', FILTER_SANITIZE_STRING);
    $homeAddress = filter_input(INPUT_POST, 'home-address', FILTER_SANITIZE_STRING);
    $homeCity = filter_input(INPUT_POST, 'home-city', FILTER_SANITIZE_STRING);
    $homeState = filter_input(INPUT_POST, 'home-state');
    $zipCode = filter_input(INPUT_POST, 'zip-code', FILTER_SANITIZE_NUMBER_INT);
    $homeBeds = filter_input(INPUT_POST, 'home-beds');
    $homeBaths = filter_input(INPUT_POST, 'home-baths');
    $homeSize = filter_input(INPUT_POST, 'home-size', FILTER_SANITIZE_NUMBER_INT);
    $lotSize = filter_input(INPUT_POST, 'lot-size', FILTER_SANITIZE_NUMBER_INT);
    $homePrice = filter_input(INPUT_POST, 'home-price', FILTER_SANITIZE_NUMBER_INT);

    if(!strlen($homeTitle) || !strlen($homeAddress) || !strlen($homeCity) || !strlen($zipCode) || !strlen($homeSize) || !strlen($lotSize) || !strlen($homePrice)){
        $error = 'All fields in the Add form must contain data. Please ensure all form elements contain appropriate values.';
        $home = getHomeInfo($id);
        $pageTitle = 'Update Home';
        include 'view/realEstate_update.php';

    } else {
        updateHome()($id, $homeTitle, $homeAddress, $homeCity, $homeState, $zipCode, $homeBeds, $homeBaths, $homeSize, $lotSize, $homePrice);
        $realEstate = getAllRealEstate();
        $pageTitle = 'List Homes';
        include 'view/realEstate_list.php';
    }
} else if($action === 'show-delete-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $home = getHomeInfo($id);
    $pageTitle = 'Delete Home';
    include 'view/realEstate_delete.php';

} else if ($action === 'delete-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $homeTitle = $home['Title'];
    deleteHome($id, $homeTitle);
    $realEstate = getAllRealEstate();
    $pageTitle = 'List Homes';
    include 'view/realEstate_list.php';
}
else {
  $error = "The <strong>$action</strong> action was not handled in the code.";
  $realEstate = getAllRealEstate();
  $pageTitle = 'Code Error';
  include 'view/realEstate_list.php';
}


