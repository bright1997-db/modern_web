<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

//Initialize the session
session_start();

//Check is the user is already logged in, if yes then redirect to the home page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: http://localhost/event-insider/frontend/homepage.php');
    exit;
}

include_once '../config/Database.php';
include_once '../models/User.php';

//variables for error message
$email_err    = "";
$password_err = "";

//Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

//Instantiate User post object
$user = new User($db);

//Processes data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Get raw posted data (from post request)
    $data = json_decode(file_get_contents("php://input"));

    //Check if email field is empty
    if (empty(trim($data->email))) {
        $email_err = "Please enter an email";
        echo json_encode(array('message' => "$email_err"));
        die();
    } else {
        $user->email = trim($data->email);
    }

    //Check if password field is empty
    if (empty(trim($data->password))) {
        $password_err = "Please enter a password";
        echo json_encode(array('message' => "$password_err"));
        die();
    }
    //Check password length
    elseif (strlen(trim($data->password)) < 6) {
        $password_err = "Password must have at least 6 characters";
        echo json_encode(array('message' => "$password_err"));
        die();
    } else {
        $user->password = trim($data->password);
    }

    //If there are no errors... Try loggin user in
    if (empty($email_err) && empty($password_err)) {
        if ($user->login()) {
            // //password is valid so start a session
            // session_start();

            // //Store data in session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['id']       = $user->id;
            $_SESSION['email']    = $user->email;

            // // Redirect user to welcome page
            // header('location: homepage.php');

            echo json_encode(array('message' => 'LoggedIn'));
        } else {
            echo json_encode(array('message' => "Invalid username or password"));
        }

    }
}