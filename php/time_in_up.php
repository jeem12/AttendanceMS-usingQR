<?php
date_default_timezone_set('Asia/Manila');
require_once "db_conn.php";
session_start();
$userId = $conn->real_escape_string($_SESSION['ID']);
$currentDate = date("Y-m-d");

// Retrieve JSON data sent from the client
$json_data = file_get_contents('php://input');

// Decode JSON data
$data = json_decode($json_data);

// Check if the JSON data is valid
if ($data === null) {
    http_response_code(400); // Bad Request
    exit("Invalid JSON data received");
}


// Extract content and image data from the decoded JSON
$content = $data->content;
$imageData = $data->image;

// Define the local folder path to store the images
$uploadDirectory = '../uploads/';

// Generate a unique filename for the image
$imageName = uniqid() . '.png';

// Decode the Base64 image data
$decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));



$query = "UPDATE `dtr` SET `image` = '$imageName' WHERE `emp_id` = '$userId' AND `date` = '$currentDate'";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
    // Save the image to the local folder
file_put_contents($uploadDirectory . $imageName, $decodedImage);
$res = [
    'status' => 200,
    'message' => 'Success'
];
echo json_encode($res);
return;
}else{
    $res = [
        'status' => 500,
        'message' => 'Failed'
    ];
    echo json_encode($res);
}