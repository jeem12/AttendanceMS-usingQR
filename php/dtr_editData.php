<?php 
require_once('db_conn.php');
extract($_POST);




$delete = $conn->query("UPDATE `dtr` SET `date` = '{$date}', `time_in` = '{$time_in}', `time_out` = '{$time_out}', `status` = '{$status}' WHERE `id` = '{$id}'");
if($delete){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully edited';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);