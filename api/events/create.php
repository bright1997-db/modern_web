<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:  Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

//Initialize the session
session_start();

//Check is the user is already logged in, if yes then redirect to the home page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: home.php');
    exit;
} else {
    header('location: index.php');
}

include_once '../../config/Database.php';
include_once '../../models/Event.php';

//Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

//Instantiate blog post object
$event = new Event($db);

$data = json_decode(file_get_contents("php://input"));

$event->name        = $data->name;
$event->user_id     = $data->user_id;
$event->total_seats = $data->total_seats;
$event->description = $data->description;
$event->location    = $data->location;
$event->start_date  = $data->start_date;
$event->end_date    = $data->end_date;
$event->start_time  = $data->start_time;
$event->end_time    = $data->end_time;

//Create event
if ($event->create()) {
    echo json_encode(array('message' => 'Event created'));
} else {
    echo json_encode(array('message' => 'Event not created'));
}