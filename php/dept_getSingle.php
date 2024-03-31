<?php
require_once('db_conn.php');
extract($_POST);
$query = $conn->query("SELECT * FROM `department` where id = '{$id}'");
if ($query) {
        $resp['status'] = 'success';
        $resp['data'] = $query->fetch_array();

}else {
    $resp['status'] = 'failed';
    $resp['error'] = 'An error occurred while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);