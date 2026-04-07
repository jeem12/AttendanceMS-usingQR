<?php
require_once('db_conn.php');
extract($_POST);

$resp = [];

if (isset($id)) {
    try {
        $stmt = $conn->prepare("SELECT * FROM `employees` WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $resp['status'] = 'success';
            $resp['data'] = $data;
        } else {
            $resp['status'] = 'failed';
            $resp['error'] = 'No record found with the given ID.';
        }

    } catch (PDOException $e) {
        $resp['status'] = 'failed';
        $resp['error'] = 'An error occurred while fetching the data: ' . $e->getMessage();
    }
} else {
    $resp['status'] = 'failed';
    $resp['error'] = 'ID not provided.';
}

echo json_encode($resp);

// $query = $conn->query("SELECT * FROM `employee` WHERE id = '{$id}'");
// if ($query) {
//         $resp['status'] = 'success';
//         $resp['data'] = $query->fetch_array();

// }else {
//     $resp['status'] = 'failed';
//     $resp['error'] = 'An error occurred while fetching the data. Error: '.$conn->error;
// }
// echo json_encode($resp);