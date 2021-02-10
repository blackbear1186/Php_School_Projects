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
}
else {
  $error = "The <strong>$action</strong> action was not handled in the code.";
  $realEstate = getAllRealEstate();
  $pageTitle = 'Code Error';
  include 'view/realEstate_list.php';
}


