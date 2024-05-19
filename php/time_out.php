<?php

// Retrieve JSON data sent from the client
$json_data = file_get_contents('php://input');

// Decode JSON data
$data = json_decode($json_data);

// Check if the JSON data is valid
if ($data === null) {
    http_response_code(400); // Bad Request
    exit("Invalid JSON data received");
}


// Extract content from the decoded data
$content = $data->content;


// Perform MySQL database connection
require_once 'db_conn.php';

date_default_timezone_set('Asia/Manila');
$currentTime = date('H:i a');



    $query1 = "UPDATE `dtr` SET `time_out` = '$currentTime' WHERE `emp_id` = '$content'";
    $query_run1 = mysqli_query($conn, $query1);

    if ($query_run1) {
        
            $xhr = [
                'status' => 200,
    
                'message' => 'Success'
    
            ];
            echo json_encode($xhr);
            return;
        }else {
            $xhr = [
                'status' => 500,
    
                'message' => 'Failed',
    
    
            ];
            echo json_encode($xhr);
            return;

        }
        
