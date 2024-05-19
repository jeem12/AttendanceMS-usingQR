<?php

session_start();
// Perform MySQL database connection
require_once 'db_conn.php';
// Retrieve JSON data sent from the client
$json_data = file_get_contents('php://input');

// Decode JSON data
$data = json_decode($json_data);

// Check if the JSON data is valid
if ($data === null) {
    http_response_code(400); // Bad Request
    exit("Invalid JSON data received");
}

$content = $data->content;

$userId = $conn->real_escape_string($_SESSION['ID']);

$compare = $content != $userId;

date_default_timezone_set('Asia/Manila');
 $query1 = "INSERT INTO `dtr` (`emp_id`, `username`, `f_name`, `m_name`, `l_name`, `department`,`date`,`time_in`,`status`) SELECT `emp_id`,`username`, `f_name`,  `m_name`, `l_name`, `department`, NOW(), NOW(), '1' FROM `employee` WHERE `emp_id` = '$content'";

if ($compare)  {
    http_response_code(404);
       $xhr = [
        'status' => 404,

        'message' => 'Please use your QR',


    ];
    echo json_encode($xhr);
    return;
  
}else{
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
}


   
        
