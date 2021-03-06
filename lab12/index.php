<?php
require 'model/database.php';
require 'model/realEstate.php';
require 'model/realEstate_db.php';
require 'utility/functions.php';
require 'model/validate.php';
require 'model/fields.php';
require 'model/login_db.php';

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
// add contact form validation
$fields->addField('name');
$fields->addField('email');
$fields->addField('phone');
$fields->addField('contact');
$fields->addField('comment');

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
        $homeTitleError = $fields->getField('home-title')->getHTML();
        $homeAddressError = $fields->getField('home-address')->getHTML();
        $homeCityError = $fields->getField('home-city')->getHTML();
        $homeStateError = $fields->getField('home-state')->getHTML();
        $zipCodeError = $fields->getField('zip-code')->getHTML();
        $homeBedError = $fields->getField('home-beds')->getHTML();
        $homeBathError = $fields->getField('home-baths')->getHTML();
        $homeSizeError = $fields->getField('home-size')->getHTML();
        $lotSizeError = $fields->getField('lot-size')->getHTML();
        $homePriceError = $fields->getField('home-price')->getHTML();
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
        $homeTitleError = $fields->getField('home-title')->getHTML();
        $homeAddressError = $fields->getField('home-address')->getHTML();
        $homeCityError = $fields->getField('home-city')->getHTML();
        $zipCodeError = $fields->getField('zip-code')->getHTML();
        $homeSizeError = $fields->getField('home-size')->getHTML();
        $lotSizeError = $fields->getField('lot-size')->getHTML();
        $homePriceError = $fields->getField('home-price')->getHTML();
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

} else if($action === 'show-login-form') {
    $pageTitle = 'Log In';
    include 'view/login.php';
} else if($action === 'show-register-form') {
    $pageTitle = 'Create Account';
    include 'view/register.php';
} else if($action === 'register') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirmPassword = filter_input(INPUT_POST, 'confirm-password', FILTER_SANITIZE_STRING);

    if(empty($username)) {
        $errorUsername = 'Please enter a username.';
    } else if(checkUsername($username) === true)  {
        $errorUsername = 'This username is already taken.';
    }
    else {
        if(strlen($username) < 5) {
            $errorUsername = 'The username must have at least 5 characters';
        }
    }

    if(empty($password)){
        $errorPassword = 'Please enter a password.';
    } else {
        if(strlen($password) < 9) {
            $errorPassword = 'The password must have at least 9 characters.<br>';
        }
        if(!preg_match('/[[:lower:]]/', $password)) {
            $errorPassword .= 'The password must contain a lowercase letter.<br>';
        }
        if(!preg_match('/[[:upper:]]/', $password)) {
            $errorPassword .= 'The password must contain a uppercase letter.<br>';
        }
        if(!preg_match('/[[:digit:]]/', $password)) {
            $errorPassword .= 'The password must contain a number.<br>';
        }
        if(!preg_match('/(!)|(@)|(#)|(%)|(&)|(\|)|(\?)/', $password)) {
            $errorPassword .= 'The password must contain at least one of the following characters: ! @ # % & | ?.';
        }
    }

    if(empty($confirmPassword)){
        $errorConfirmPassword = 'Please confirm the password.';
    } else if($confirmPassword !== $password) {
        $errorConfirmPassword = 'The passwords that were entered do not match.';
    }

    if(empty($errorUsername) && empty($errorPassword) && empty($errorConfirmPassword)){
        $userIP = $_SERVER['REMOTE_ADDR'];
        if(registerUser($username, $password, $userIP)) {
            header('Location:.?action=show-login-form');
        }
        else {
            $pageTitle = 'Create Account';
            include 'view/register.php';
        }
    } else {
        $pageTitle = 'Create Account';
        logErrorMessage('The account could not be created. Please see the errors below.');
        include 'view/register.php';
    }
} else if($action === 'log-in') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if(empty($username)) {
        $errorUsername = 'Please enter a username.';
    } else if(checkUsername($username) === false) {
        $errorUsername = 'No account found with that username.';
    } else {
        if(empty($password)) {
            $errorPassword = 'Please enter a password.';
        } else if(isValidLogin($username, $password) === false) {
            $errorPassword = 'The password is incorrect.';
        }

    }
    if(empty($errorUsername) && empty($errorPassword)) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location:.');
    } else {
        $pageTitle = 'Log In';
        logErrorMessage('Unsuccessful log in attempt. Please see the error(s) below.');
        include 'view/login.php';
    }

} else if($action === 'log-out') {
    $_SESSION = array();
    session_destroy();
    session_start();
    logSuccessMessage('You have successfully logged out.');
    header('Location:.');
    exit();
} else if($action === 'show-email-form') {
    $pageTitle = 'Send Message';
    include 'view/email.php';
} else if($action === 'send-email') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone');
    $contact = filter_input(INPUT_POST, 'contact');
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

    $validate->text('name', $name, true, 1, 50);
    $validate->email('email', $email, true);
    $validate->pattern('phone', $phone, '/^\d{3}-\d{3}-\d{4}$/', 'Please enter a phone number in the 999-999-9999 format.');
    $validate->pattern('contact', $contact, '/^(text)|(email)|(phone)$/', 'Please select your contact preference.');
    $validate->text('comment', $comment, true);

    if($fields->hasErrors()) {
        $error = 'All fields in the Contact form must contain data. Please ensure all form elements contain appropriate values.';
        logErrorMessage($error);
        $nameError = $fields->getField('name')->getHTML();
        $emailError = $fields->getField('email')->getHTML();
        $phoneError = $fields->getField('phone')->getHTML();
        $contactError = $fields->getField('contact')->getHTML();
        $commentError = $fields->getField('comment')->getHTML();
        $pageTitle = 'Send Message';
        include 'view/email.php';
    } else {
        // set $to variable equal to where the email message should be sent
        $to = "Berlin Johnson <berlin.johnson@trojans.dsu.edu>";
        // set a $subject variable of the email message
        $subject = "Comment form $name";
        // set a $message variable equal to a table that contains
        $message = "
        <table>
            <tr><th>Name:</th><td>$name</td></tr>
            <tr><th>Email:</th><td>$email</td></tr>
            <tr><th>Phone Number:</th><td>$phone</td></tr>
            <tr><th>Contact Preference:</th><td>$contact</td></tr>
            <tr><th>Comment:</th><td>$comment</td></tr>
        </table>";
        // create a $headers variable with the needed header information to send an email
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1\n";
        $headers .= "From: $name <$email>\n";
        $result = mail($to, $subject, $message, $headers);
        logSuccessMessage('The email was successfully sent.');
        $pageTitle = 'Message Sent';
        include 'view/email.php';
    }

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


