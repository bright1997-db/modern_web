<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Event.php';

//Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

//Instantiate blog post object
$event = new Event($db);

//Get ID
$event->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get single post
$event->read_single();

//Create array
$event_arr = array(
    'name'        => $name,
    'id'          => $id,
    'user_id'     => $user_id,
    'total_seats' => $total_seats,
    'description' => $description,
    'location'    => $location,
    'start_time'  => $start_time,
    'end_time'    => $end_time,
    'start_date'  => $start_date,
    'end_date'    => $end_date,
);

//Make JSON
print_r(json_encode($event_arr));