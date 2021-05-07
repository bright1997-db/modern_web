<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:  Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Event.php';

//Initialize the session
session_start();

// //Check is the user is already logged in, if yes then redirect to the home page
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     header('location: home.php');
//     exit;
// } else {
//     header('location: index.php');
// }

//Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

//Instantiate blog post object
$event = new Event($db);

$data = json_decode(file_get_contents("php://input"));

$event->user_id = $data->user_id;
$event->id      = $data->event_id;

//Add to join table
if ($event->join()) {
    echo json_encode(array('message' => 'Joined sucessfully'));
} else {
    echo json_encode(array('massage' => 'An error occured'));
}