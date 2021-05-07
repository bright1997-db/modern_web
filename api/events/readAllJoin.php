<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Event.php';

//Initialize the session
session_start();

//Check is the user is already logged in, if yes then redirect to the home page
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     header('location: home.php');
//     exit;
// } else {
//     header('location: index.php');
// }

//Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

//Instantiate event object
$event = new Event($db);

//Get raw posted data (from post request)
$data = json_decode(file_get_contents("php://input"));

// $event->id      = $data->id;
$event->user_id = $data->user_id;

//Get lists of events
$result = $event->get_all_joined();

//Get total number of rows
$num = $result->rowCount();

//Check if any events
if ($num > 0) {
    //Events array
    $event_arr         = array();
    $event_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $event_item = array(
            'name'  => $name,
            'fname' => $fname,
            // 'user_id'     => $user_id,
            // 'total_seats' => $total_seats,
            // 'description' => $description,
            // 'location'    => $location,
            // 'start_time'  => $start_time,
            // 'end_time'    => $end_time,
            // 'start_date'  => $start_date,
            // 'end_date'    => $end_date,
        );

        //Push to the array
        array_push($event_arr['data'], $event_item);
    }

    //Turn to JSON & output
    echo json_encode($event_arr);

} else {
    //No  events
    echo json_encode(array('message' => 'No Events Found'));
}