<?php 
require_once('db_conn.php');
extract($_POST);

$delete = $conn->query("DELETE FROM `dtr` where id = '{$id}'");
if($delete){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully deleted';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);