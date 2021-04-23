<?php
require 'model/database.php';
require 'model/realEstate.php';
require 'model/realEstate_db.php';
require 'utility/functions.php';
require 'model/validate.php';
require 'model/fields.php';

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('home-title');
$fields->addField('home-address');
$fields->addField('home-city');
$fields->addField('home-state');
$fields->addField('zip-code');
$fields->addField('home-beds');
$fields->addField('home-baths');
$fields->addField('home-size');
$fields->addField('lot-size');
$fields->addField('home-price');

$getStates = '/^(AL|AZ|AR|CA|CO|CT|DE|FL|GA|HI|IA|ID|IL|IN|KS|KY|LA|MA|MD|ME|MI|MN|MO|MS|MT|NC|ND|NE|NH|NJ|NM|NV|NY|OH|OK|OR|PA|RI|SC|SD|TN|TX|UT|VA|VT|WA|WI|WV|WY)$/';

$lifetime = 60 * 60 * 24 * 7;

session_set_cookie_params($lifetime, '/');
session_start();

if(empty($_SESSION['log'])){
    $_SESSION['log'] = array();
}

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
  $realEstate = RealEstateDB::getAllRealEstate();
  $pageTitle = 'List Homes';
  include 'view/realEstate_list.php';

} else if($action === 'show-add-home'){
    $pageTitle = 'Add Home';
    include 'view/realEstate_add.php';
} else if($action === 'add-home'){
    $homeTitle = filter_input(INPUT_POST, 'home-title');
    $homeAddress = filter_input(INPUT_POST, 'home-address');
    $homeCity = filter_input(INPUT_POST, 'home-city');
    $homeState = filter_input(INPUT_POST, 'home-state');
    $zipCode = filter_input(INPUT_POST, 'zip-code');
    $homeBeds = filter_input(INPUT_POST, 'home-beds');
    $homeBaths = filter_input(INPUT_POST, 'home-baths');
    $homeSize = filter_input(INPUT_POST, 'home-size');
    $lotSize = filter_input(INPUT_POST, 'lot-size');
    $homePrice = filter_input(INPUT_POST, 'home-price');

    $validate->text('home-title', $homeTitle, true, 1, 75);
    $validate->pattern('home-address', $homeAddress, '/^\d{1,5}\s\w{1,}\s\w{1,}\s?\w{1,}$/', 'Please enter an address in the proper format.');
    $validate->text('home-city', $homeCity, true, 1, 50);
    $validate->pattern('home-state', $homeState, $getStates, 'Please choose a state.');
    $validate->pattern('zip-code', $zipCode, '/^\d{5}$/', 'Please enter a 5-digit zip code.');
    $validate->pattern('home-beds', $homeBeds, '/^(1|2|3|4|5|6|7|8)$/', 'Please choose a number of beds between 1 and 8.');
    $validate->pattern('home-baths', $homeBaths, '/^(1|2|3|4|5|6|7|8)$/', 'Please choose a number of baths between 1 and 8.');
    $validate->pattern('home-size', $homeSize, '/^\d{3,4}$/', 'Please enter a home size between 3 and 4 digits.');
    $validate->pattern('lot-size', $lotSize, '/^\d{3,6}$/', 'Please enter a lot size between 3 and 6 digits.');
    $validate->pattern('home-price', $homePrice, '/^\d{4,9}$/', 'Please enter a home price between 4 and 9 digits.');


    if($fields->hasErrors()){
        $error = 'All fields in the Add form must contain data. Please ensure all form elements contain appropriate values.';
        logErrorMessage($error);
        $pageTitleError = 'Add Home';
        $homeTitleError = $fields->getField('home-title')->getHtml();
        $homeAddressError = $fields->getField('home-address')->getHtml();
        $homeCityError = $fields->getField('home-city')->getHtml();
        $homeStateError = $fields->getField('home-state')->getHtml();
        $zipCodeError = $fields->getField('zip-code')->getHtml();
        $homeBedError = $fields->getField('home-beds')->getHtml();
        $homeBathError = $fields->getField('home-baths')->getHtml();
        $homeSizeError = $fields->getField('home-size')->getHtml();
        $lotSizeError = $fields->getField('lot-size')->getHtml();
        $homePriceError = $fields->getField('home-price')->getHtml();
        include 'view/realEstate_add.php';

    } else {
        $home = new RealEstate($homeTitle, $homeAddress, $homeCity, $homeState, $zipCode, $homeBeds, $homeBaths, $homeSize, $lotSize, $homePrice);
        RealEstateDB::addHome($home);
        $realEstate = RealEstateDB::getAllRealEstate();
        $pageTitle = 'List Homes';
        header('Location: .');
    }

} else if($action === 'show-update-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $home = RealEstateDB::getHomeInfo($id);
    $pageTitle = 'Update Home';
    include 'view/realEstate_update.php';

} else if($action === 'update-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $homeTitle = filter_input(INPUT_POST, 'home-title');
    $homeAddress = filter_input(INPUT_POST, 'home-address');
    $homeCity = filter_input(INPUT_POST, 'home-city');
    $homeState = filter_input(INPUT_POST, 'home-state');
    $zipCode = filter_input(INPUT_POST, 'zip-code');
    $homeBeds = filter_input(INPUT_POST, 'home-beds');
    $homeBaths = filter_input(INPUT_POST, 'home-baths');
    $homeSize = filter_input(INPUT_POST, 'home-size');
    $lotSize = filter_input(INPUT_POST, 'lot-size');
    $homePrice = filter_input(INPUT_POST, 'home-price');

    $validate->text('home-title', $homeTitle, true, 1, 75);
    $validate->pattern('home-address', $homeAddress, '/^\d{1,5}\s\w{1,}\s\w{1,}\s?\w{1,}$/', 'Please enter an address in the proper format.');
    $validate->text('home-city', $homeCity, true, 1, 50);
    $validate->pattern('zip-code', $zipCode, '/^\d{5}$/', 'Please enter a 5-digit zip code.');
    $validate->pattern('home-size', $homeSize, '/^\d{3,4}$/', 'Please enter a home size between 3 and 4 digits.');
    $validate->pattern('lot-size', $lotSize, '/^\d{3,6}$/', 'Please enter a lot size between 3 and 6 digits.');
    $validate->pattern('home-price', $homePrice, '/^\d{4,9}$/', 'Please enter a home price between 4 and 9 digits.');

    if($fields->hasErrors()){
        $error = 'All fields in the Update form must contain data. Please ensure all form elements contain appropriate values.';
        logErrorMessage($error);
        $home = RealEstateDB::getHomeInfo($id);
        $pageTitle = 'Update Home';
        $homeTitleError = $fields->getField('home-title')->getHtml();
        $homeAddressError = $fields->getField('home-address')->getHtml();
        $homeCityError = $fields->getField('home-city')->getHtml();
        $zipCodeError = $fields->getField('zip-code')->getHtml();
        $homeSizeError = $fields->getField('home-size')->getHtml();
        $lotSizeError = $fields->getField('lot-size')->getHtml();
        $homePriceError = $fields->getField('home-price')->getHtml();
        include 'view/realEstate_update.php';

    } else {
        $home = new RealEstate($homeTitle, $homeAddress, $homeCity, $homeState, $zipCode, $homeBeds, $homeBaths, $homeSize, $lotSize, $homePrice);
        $home->setId($id);
        RealEstateDB::updateHome($home);
        $realEstate = RealEstateDB::getAllRealEstate();
        $pageTitle = 'List Homes';
        header('Location: .');
    }
} else if($action === 'show-delete-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $home = RealEstateDB::getHomeInfo($id);
    $pageTitle = 'Delete Home';
    include 'view/realEstate_delete.php';

} else if ($action === 'delete-home'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $home = RealEstateDB::getHomeInfo($id);
    $homeTitle = $home->getHomeTitle();
    RealEstateDB::deleteHome($id, $homeTitle);
    $realEstate = RealEstateDB::getAllRealEstate();
    $pageTitle = 'List Homes';
    header('Location: .');

} else if($action == 'show-login-form') {
    $pageTitle = 'Log In';
    include 'view/login.php';
}
else if($action === 'clear-message'){
    header('Location: .');
} else if ($action === 'empty-log') {
    unset($_SESSION['log']);
    header('Location: .');
} else if($action === 'end-session') {
    $_SESSION = array();
    // clean up the session ID
    session_destroy();
    // delete the cookie from the session
    $name = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    $httponly = $params['httponly'];
    setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
    header('Location: .');
}
else {
  $error = "The <strong>$action</strong> action was not handled in the code.";
  logErrorMessage($error);
  $realEstate = RealEstateDB::getAllRealEstate();
  $pageTitle = 'Code Error';
  header('Location: .');
}


