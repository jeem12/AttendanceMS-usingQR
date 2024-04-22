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


$currentTime = date("H:i:s");

if ($currentTime == "08:00:00") {
    $query1 = "INSERT INTO `dtr` (`emp_id`, `f_name`, `m_name`, `l_name`, `department`,`date`,`time_in`,`status`) SELECT `emp_id`, `f_name`, `m_name`, `l_name`, `department`, NOW(), NOW(), 'ON TIME' FROM `employee` WHERE `emp_id` = '$content'";
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
}else if ($currentTime >= "08:01:00" && $currentTime <= "12:00:00"){
    $query1 = "INSERT INTO `dtr` (`username`, `emp_id`, `f_name`, `m_name`, `l_name`, `department`,`date`,`time_in`,`status`) SELECT `username`, `emp_id`, `f_name`, `m_name`, `l_name`, `department`, NOW(), NOW(), 'LATE' FROM `employee` WHERE `emp_id` = '$content'";
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

            'message' => 'Failed'


        ];
        echo json_encode($xhr);
        return;
    }
}
else if ($currentTime >= "12:01:00" && $currentTime <= "16:59:00"){
    $query1 = "INSERT INTO `dtr` (`username`, `emp_id`, `f_name`, `m_name`, `l_name`, `department`,`date`,`time_in`,`status`) SELECT `username`, `emp_id`, `f_name`, `m_name`, `l_name`, `department`, NOW(), NOW(), 'UNDER TIME / HALF DAY' FROM `employee` WHERE `emp_id` = '$content'";
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

            'message' => 'Failed'


        ];
        echo json_encode($xhr);
        return;
    }

}else if($currentTime == "17:00:00"){
    $query1 = "UPDATE `dtr` SET `time_out` = NOW() WHERE `emp_id` = '$content' AND `date` = CURRENT_DATE";
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
}else if($currentTime >= "17:01:00" && $currentTime <= "23:59:00" || $currentTime >= "00:00:00" && $currentTime <= "07:59:00"){
    $query1 = "UPDATE `dtr` SET `time_out`= NOW(), `status` = 'Overtime', `date` = 'CURRENT_TIME' WHERE `emp_id` = '$content'";
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

}else{
    $xhr = [
        'status' => 500,

        'message' => 'Failed.'

    ];
    echo json_encode($xhr);
    return;
}




?>

