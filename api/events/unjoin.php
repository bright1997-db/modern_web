<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Event.php';

//Initialize the session
session_start();

//Check is the user is already logged in, if yes then redirect to the home page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: home.php');
    exit;
} else {
    header('location: index.php');
}

//Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

//Instantiate blog post object
$event = new Event($db);

//Get raw posted data (from post request)
$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$event->user_id = $data->user_id;
$event->id      = $data->id;

//Delete post
if ($event->unjoin()) {
    echo json_encode(array('message' => 'Event Unjoined'));
} else {
    echo json_encode(array('message' => 'A problem occured try again later'));
}